<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam extends CI_Controller {

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
		$data['title'] = 'Pinjaman';
		$id_user	= $this->session->userdata('id');
		$data['pinjam']	= $this->db->query("SELECT tp.*, ta.nama, ta.no_arsip, tu.nama_user from tb_pinjam tp
		join tb_arsip ta on tp.id_arsip = ta.id
		join tb_user tu on ta.id_user = tu.id
		where tp.id_user = '$id_user' and tp.status != '2' order by tp.id desc")->result();
		// dokumen yg di pinjam
		$data['dokumen']	= $this->db->query("SELECT * from tb_arsip where id_user != '$id_user'")->result();
		$this->template->load('template_new', 'karyawan/pinjam', $data);
	}
	// fungsi add pinjam
	public function add()
	{
		$id_user 	= $this->session->userdata('id');
		$id_arsip	= $this->input->post('dokumen');
		$tgl_pinjam	= $this->input->post('tgl_pinjam');
		$tgl_kembali	= $this->input->post('tgl_kembali');
		$data = array(
			'id_arsip'		=> $id_arsip,
			'tgl_pinjam'	=> $tgl_pinjam,
			'tgl_kembali'	=> $tgl_kembali,
			'id_user'		=> $id_user,
			'status'		=> '0'
		);
		$this->db->insert('tb_pinjam',$data);
		tampil_alert('success','Berhasil','Data Berhasil di buat');
		redirect(base_url('karyawan/Pinjam'));
	}
	// hapus
	function hapus($id)
    {
	 $this->db->query("DELETE  from tb_pinjam where id = '$id' ");
     tampil_alert('success','Berhasil','Data berhasil di Hapus');
	 redirect(base_url('karyawan/Pinjam'));
    }

}
