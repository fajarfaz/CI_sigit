<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {

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
		$data['title'] = 'Divisi';
		$data['divisi']	= $this->db->query("SELECT * from tb_divisi order by id desc")->result();
		$this->template->load('template_new', 'admin/divisi', $data);
	}
	// tambah divisi
	public function add()
	{
		$divisi	= $this->input->post('divisi');
		$deskripsi	= $this->input->post('deskripsi');
		$data = array(
			'divisi'	=> $divisi,
			'deskripsi'	=> $deskripsi,
			'status'	=> '1'
		);
		$this->db->insert('tb_divisi',$data);
		tampil_alert('success','Berhasil','Divisi berhasil di tambahkan !');
		redirect(base_url('admin/Divisi'));
	}
	// update divisi
	public function update()
	{
		$id_divisi	= $this->input->post('id_divisi');
		$divisi	= $this->input->post('divisi');
		$deskripsi	= $this->input->post('deskripsi');
		$status	= $this->input->post('status');
		$data = array(
			'divisi'	=> $divisi,
			'deskripsi'	=> $deskripsi,
			'status'	=> $status,
		);
		$where = array(
			'id'	=> $id_divisi
		);
		$this->db->update('tb_divisi',$data,$where);
		tampil_alert('success','Berhasil','Divisi berhasil di update !');
		redirect(base_url('admin/Divisi'));
	}
	// hapus
	function hapus($id)
    {
	 $this->db->query("DELETE  from tb_divisi where id = '$id' ");
     tampil_alert('success','Berhasil','Data berhasil di Hapus');
	 redirect(base_url('admin/Divisi'));
    }
}
