<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arsip extends CI_Controller {

	function __construct()
	{
	  parent::__construct();
	  $role = $this->session->userdata('role');
	  if($role != "3"){
		tampil_alert('error','DI TOLAK !','Silahkan login kembali !');
		redirect(base_url(''));
	  }
	
	}
	public function index(){ 
		$data['title'] = 'Arsip';
		$data['arsip']	= $this->db->query("SELECT ta.*, tk.kategori, td.divisi from tb_arsip ta
		join tb_kategori tk on ta.id_kategori = tk.id
		join tb_divisi td on ta.id_divisi = td.id 
		order by ta.id desc")->result();
		$data['kategori'] 	= $this->db->query("SELECT * from tb_kategori")->result();
		$data['divisi'] 	= $this->db->query("SELECT * from tb_divisi")->result();
		$data['ruang'] 	= $this->db->query("SELECT * from tb_ruang")->result();
		$data['rak'] 	= $this->db->query("SELECT * from tb_rak")->result();
		$data['box'] 	= $this->db->query("SELECT * from tb_box")->result();
		$data['map'] 	= $this->db->query("SELECT * from tb_map")->result();
		$this->template->load('template_new', 'petugas/arsip', $data);
	}

  	// proses tambah
 	 public function add()
    {
		$id_user 				= $this->session->userdata('id');
    	$no_dokumen           	= $this->input->post('no_dokumen');
    	$nama           		= $this->input->post('nama');
    	$deskripsi           	= $this->input->post('deskripsi');
    	$kategori           	= $this->input->post('kategori');
    	$divisi           		= $this->input->post('divisi');
    	$ruang           		= $this->input->post('ruang');
    	$rak           			= $this->input->post('rak');
    	$box           			= $this->input->post('box');
    	$map           			= $this->input->post('map');
		// file yg di upload
		 // Proses upload foto NPWP
		 $config['upload_path'] = 'upload/file/';
		 $config['allowed_types'] = 'jpg|jpeg|png|gif|doc|docx|xls|xlsx|csv|ppt|pptx|pdf';
		 $config['file_name'] = 'arsip_'.$no_dokumen;
		 $config['overwrite'] = TRUE;
		 $config['remove_spaces'] = TRUE;
		 $this->load->library('upload', $config);
		 $this->upload->initialize($config);
		 
		 if ($this->upload->do_upload('arsip')) {
			$data = array('upload_data' => $this->upload->data());
			 $nama_file 	= $this->upload->data('file_name');
			 $jenis_file 	= $data['upload_data']['file_type'];
			 $size_file 	= $data['upload_data']['file_size'];
			 // ubah jenis file jika diperlukan
			 if ($jenis_file == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') 
			 {
				$jenis_file = str_replace('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'xls', $jenis_file);
			 }else if($jenis_file == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document')
			 {
				$jenis_file = str_replace('application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'doc', $jenis_file);
			 }else if ($jenis_file == 'application/pdf')
			 {
				$jenis_file = str_replace('application/pdf', 'pdf', $jenis_file);
			 }
			//  proses
			$data = array(
				'id_kategori'			=> $kategori,
				'id_ruang'				=> $ruang,
				'id_box'				=> $box,
				'id_map'				=> $map,
				'id_rak'				=> $rak,
				'id_divisi'				=> $divisi,
				'no_arsip'				=> $no_dokumen,
				'nama'					=> $nama,
				'deskripsi'				=> $deskripsi,
				'file'					=> $nama_file,
				'jenis'					=> $jenis_file,
				'size'					=> $size_file,
				'status'				=> '1',
				'id_user'				=> $id_user
			   );	
			   $this->db->trans_start();
			   $this->db->insert('tb_arsip',$data);
			   $this->db->trans_complete();
			   tampil_alert('success','Berhasil','Data Arsip Berhasil di buat');
				redirect(base_url('petugas/Arsip'));
		 } else{
			tampil_alert('error','GAGAL','File tidak terbaca, silahkan coba kembali');
			redirect(base_url('petugas/Arsip'));
		 } 

       
      
    }
	// cek cek_dokumen
	public function cek_dokumen() 
    {
      $no_dokumen = $this->input->post('no_dokumen');
      // Cek apakah NIK sudah ada di tabel my_table
      $result = $this->db->get_where('tb_arsip', array('no_arsip' => $no_dokumen))->result();
      
      if (count($result) > 0) {
        // NIK sudah ada di tabel, kirim respons TRUE
        echo json_encode(TRUE);
        return;
      }
      
      // NIK belum ada di tabel, kirim respons FALSE
      echo json_encode(FALSE);
    }
	// hapus
	function hapus($id)
    {
	 $this->db->query("DELETE  from tb_arsip where id = '$id' ");
     tampil_alert('success','Berhasil','Data berhasil di Hapus');
	 redirect(base_url('petugas/Arsip'));
    }
}
