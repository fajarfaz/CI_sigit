<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam extends CI_Controller {

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
		$data['title'] = 'Pinjaman';
		$data['pinjam']	= $this->db->query("SELECT tp.*, ta.nama, ta.no_arsip, tu.nama_user from tb_pinjam tp
		join tb_arsip ta on tp.id_arsip = ta.id
		join tb_user tu on tp.id_user = tu.id order by tp.id desc
		")->result();
		$this->template->load('template_new', 'petugas/pinjam', $data);
	}
	// approve
	public function approve($id)
	{
		$this->db->query("UPDATE tb_pinjam set status ='1' where id ='$id'");
		tampil_alert('success','Berhasil','Data berhasil di apporve');
		redirect(base_url('petugas/Pinjam'));
	}
	// approve
	public function tolak($id)
	{
		$this->db->query("UPDATE tb_pinjam set status ='5' where id ='$id'");
		tampil_alert('info','DI TOLAK','Data Pinjaman di tolak');
		redirect(base_url('petugas/Pinjam'));
	}
	// kembali
	public function kembali($id)
	{
		$this->db->query("UPDATE tb_pinjam set status ='2' where id ='$id'");
		tampil_alert('success','SELESAI','Data Pinjaman sudah di kembalikan');
		redirect(base_url('petugas/Pinjam'));
	}

}
