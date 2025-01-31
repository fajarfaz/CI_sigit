<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	function __construct()
	{
	  parent::__construct();
	  $role = $this->session->userdata('role');
	  if($role != "2"){
		tampil_alert('error','DI TOLAK !','Silahkan login kembali !');
		redirect(base_url(''));
	  }
	
	}
	public function index(){ 
		$data['title'] = 'Kategori';
		$data['kategori']	= $this->db->query("SELECT * from tb_kategori order by id desc")->result();
		$this->template->load('template_new', 'karyawan/kategori', $data);
	}

  	// proses tambah
 	 public function add()
    {
        $kategori           = $this->input->post('kategori');
       $data = array(
		'kategori'			=> $kategori,
        'status'        => "1",
       );
	   $this->db->trans_start();
       $this->db->insert('tb_kategori',$data);
       $this->db->trans_complete();
       tampil_alert('success','Berhasil','Data Kategori Berhasil di buat');
        redirect(base_url('karyawan/Kategori'));
      
    }
	
}
