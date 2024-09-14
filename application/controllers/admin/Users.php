<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
	{
	  parent::__construct();
	  $role = $this->session->userdata('role');
	  if($role != "1"){
		tampil_alert('error','DI TOLAK !','Silahkan login kembali !');
		redirect(base_url(''));
	  }
	
	}
	public function index(){ 
		$data['title'] = 'Users';
		$data['users']	= $this->db->query("SELECT tu.*, tu.role as id_role, tr.role from tb_user tu
		join tb_role_user tr on tu.role = tr.id 
		order by id desc")->result();
		$data['divisi']	= $this->db->query("SELECT * from tb_divisi where status ='1' order by id desc")->result();
		$data['role']	= $this->db->query("SELECT * from tb_role_user order by id desc")->result();
		$this->template->load('template_new', 'admin/users', $data);
	}
	// detail
	public function detail($id)
	{
		$data['title'] = 'Users';
		$data['users']	= $this->db->query("SELECT tu.*, tr.role, td.divisi from tb_user tu
		join tb_role_user tr on tu.role = tr.id 
		left join tb_divisi td on tu.id_divisi = td.id
		where tu.id = '$id'")->row();
		// dokumen terbaru
		$data['upload'] = $this->db->query("SELECT ta.*, tu.nama_user FROM tb_arsip ta
		join tb_user tu on ta.id_user = tu.id
		WHERE ta.status = '1' and ta.id_user = '$id' order by ta.created desc limit 5")->result();
		// download terbaru
		$data['download'] = $this->db->query("SELECT td.*,ta.no_arsip,ta.nama  FROM tb_download td
		join tb_arsip ta on td.id_arsip = ta.id
		WHERE td.id_user = '$id' order by td.created desc limit 5")->result();
		// pinjam terbaru
		$data['pinjam'] = $this->db->query("SELECT tp.*, ta.no_arsip, ta.nama  FROM tb_pinjam tp
		join tb_arsip ta on tp.id_arsip = ta.id
		WHERE tp.id_user = '$id' order by tp.tgl_pinjam desc limit 5")->result();
		$this->template->load('template_new', 'admin/users_detail', $data);
	}
	public function cek_username() 
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

  	// proses tambah
 	 public function add()
    {
        $nip           = $this->input->post('nip');
		$username      = $this->input->post('username');
		$password      = $this->input->post('password');
		$nama      	   = $this->input->post('nama');
		$divisi      	   = $this->input->post('divisi');
		$telp      	   = $this->input->post('telp');
		$role      	   = $this->input->post('role');
       // Simpan data user ke dalam database
       $data = array(
		'nip'			=> $nip,
        'username'      => $username,
        'nama_user'     => $nama,
        'telp'       	=> $telp,
        'password'      => $this->hash_password($password),
        'role'          => $role,
        'id_divisi'     => $divisi,
        'status'        => "1",
       );
	   $this->db->trans_start();
       $this->db->insert('tb_user',$data);
       $this->db->trans_complete();
       tampil_alert('success','Berhasil','Data User Berhasil di buat');
        redirect(base_url('admin/Users'));
      
    }
	// hapus
	function hapus($id)
    {
	 $this->db->query("DELETE  from tb_user where id = '$id' ");
     tampil_alert('success','Berhasil','Data berhasil di Hapus');
	 redirect(base_url('admin/Users'));
    }
}
