<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$data['title'] = 'Dashboard';
		// total dokumen
		$data['t_arsip'] = $this->db->query("SELECT count(id) as total FROM tb_arsip")->row();
		$data['t_divisi'] = $this->db->query("SELECT count(id) as total FROM tb_divisi")->row();
		$data['t_pinjam'] = $this->db->query("SELECT count(id) as total FROM tb_pinjam")->row();
		$data['t_user'] = $this->db->query("SELECT count(id) as total FROM tb_user")->row();
		// dokumen terbaru
		$data['terbaru'] = $this->db->query("SELECT ta.*, tu.nama_user FROM tb_arsip ta
		join tb_user tu on ta.id_user = tu.id
		WHERE ta.status = '1' order by id desc limit 5")->result();
		// dokumen populer
		$data['populer'] = $this->db->query("SELECT * FROM tb_arsip
		WHERE status = '1' order by downloader desc limit 5")->result();
		// pinjam terbaru
		$data['pinjam'] = $this->db->query("SELECT tp.*, tu.nama_user, ta.no_arsip, ta.nama as dokumen FROM tb_pinjam tp
		join tb_user tu on tp.id_user = tu.id
		join tb_arsip ta on tp.id_arsip = ta.id
		order by tp.id desc limit 10")->result();
		$this->template->load('template_new', 'admin/dashboard', $data);
	}
}
