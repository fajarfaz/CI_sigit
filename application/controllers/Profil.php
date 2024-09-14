<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	function __construct()
	{
	  parent::__construct();
	 
	
	}
	public function index(){ 
		$id_user = $this->session->userdata('id');
		$data['title'] = 'Profil';
		$data['list']	= $this->db->query("SELECT tu.*, tru.role, td.divisi from tb_user tu
		left join tb_divisi td on tu.id_divisi = td.id
		join tb_role_user tru on tu.role = tru.id
		where tu.id = '$id_user' ")->row();
		$this->template->load('template_new', 'profil', $data);
	  }
	//   proses update
	public function update()
	{
		$id_user = $this->session->userdata('id');
		$nama	= $this->input->post('nama');
		$telp	= $this->input->post('telp');
		$username	= $this->input->post('username');
		$password_baru	= $this->input->post('password_baru');
		$data = array(
			'nama_user'		=> $nama,
			'telp'			=> $telp,
			'username'		=> $username,
			'password'		=> $this->hash_password($password_baru),
		);
		$where = array(
			'id'	=> $id_user,
		);
		
		 $this->db->update('tb_user',$data,$where);
		 tampil_alert('success','Berhasil','Data berhasil di Perbarui !');
		 redirect(base_url('Profil'));

	}
	// update foto profil
	public function update_foto() 
	{
	  $id_user	= $this->session->userdata('id');
	  $config['upload_path'] = 'upload/user/';
	  $config['allowed_types'] = 'jpg|jpeg|png';
	  $config['max_size'] = '2048';
	  $config['file_name'] = 'foto_'.$id_user;
	  $config['overwrite'] = TRUE;
	  $config['remove_spaces'] = TRUE;
	  $this->load->library('upload', $config);
	  $this->upload->initialize($config);
	  
	  if (!$this->upload->do_upload('foto')) {
	  tampil_alert('error','Gagal Upload','silahkan cek kembali jenis foto yang di upload');
	  redirect(base_url('Profil'));
	  } else {
		// Jika upload berhasil, simpan data foto ke database
		$foto = $this->upload->data('file_name');
		// simpan data foto ke database sesuai dengan id data yang ingin diupdate
		$this->db->query("UPDATE tb_user set foto ='$foto' where id='$id_user'");
		tampil_alert('success','Berhasil','Data berhasil di Perbarui !');
		redirect(base_url('Profil'));

	  }
	}
	// cek username
	public function c_username() 
    {
      $username = $this->input->post('username');
      // Cek apakah NIK sudah ada di tabel my_table
      $result = $this->db->get_where('tb_user', array('username' => $username))->result();
      
      if (count($result) > 0) {
        // NIK sudah ada di tabel, kirim respons TRUE
        echo json_encode(TRUE);
        return;
      }
      
      // NIK belum ada di tabel, kirim respons FALSE
      echo json_encode(FALSE);
    }
	// sett hash password
	private function hash_password($password)
	{
		return password_hash($password,PASSWORD_DEFAULT);
	}
	// cek username
	public function c_pass() 
    {
	  $id_user	= $this->session->userdata('id');
      $password = $this->input->post('password');
      // Cek apakah NIK sudah ada di tabel my_table
      $cek = $this->db->query("SELECT * from tb_user where  id ='$id_user'")->row()->password;
	  if (!password_verify($password, $cek)) {
		// password lama tidak cocok dengan password yang dimasukkan oleh pengguna
		echo json_encode(TRUE);
        return;
		} else{
		echo json_encode(FALSE);
		return;
		}
    }
	// logout
	public function logout()
  {
    $id_user = $this->session->userdata('id');
    $this->db->query("UPDATE tb_user set last_online = null where id = '$id_user'");
    $this->session->sess_destroy();
    redirect(base_url(''));
  } 


	
}
