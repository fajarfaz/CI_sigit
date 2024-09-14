<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	function __construct()
	{
	  parent::__construct();
	  $role = $this->session->userdata('role');
	  if($role != "1"){
		tampil_alert('error','DI TOLAK !','Anda tidak punya akses untuk halaman ini.!');
		redirect(base_url(''));
	  }
	
	}
	public function index(){ 
		$data['title'] = 'Setting';
		$data['list']	= $this->db->query("SELECT * from tb_setting ")->row();
		$this->template->load('template_new', 'admin/setting', $data);
	  }
	//   proses update
	public function proses_update()
	{
		$title	= $this->input->post('title');
		$deskripsi	= $this->input->post('deskripsi');
		$keyword	= $this->input->post('keyword');
		$sk	= $this->input->post('sk');
		$alamat	= $this->input->post('alamat');
		$perusahaan	= $this->input->post('perusahaan');
		 // Proses upload foto icon
		 $config['upload_path'] = 'upload/setting/';
		 $config['allowed_types'] = 'jpg|jpeg|png';
		 $config['file_name'] = 'icon_';
		 $config['overwrite'] = TRUE;
		 $config['remove_spaces'] = TRUE;
		 $this->load->library('upload', $config);
		 $this->upload->initialize($config);
		 if ($this->upload->do_upload('icon')) {
			 $icon = $this->upload->data('file_name');
		 } else {
			 $icon  = "";
			 // Tampilkan error jika upload foto KTP gagal
		 }
		 // Proses upload foto logo
		 $config['upload_path'] = 'upload/setting/';
		 $config['allowed_types'] = 'jpg|jpeg|png';
		 $config['file_name'] = 'logo_';
		 $config['overwrite'] = TRUE;
		 $config['remove_spaces'] = TRUE;
		 $this->load->library('upload', $config);
		 $this->upload->initialize($config);
		 if ($this->upload->do_upload('logo')) {
			 $logo = $this->upload->data('file_name');
		 } else {
			 $logo  = "";
			 // Tampilkan error jika upload foto KTP gagal
		 }

		 $data = array (
			'title'	=> $title,
			'deskripsi'	=> $deskripsi,
			'keyword'	=> $keyword,
			'sk'		=> $sk,
			'alamat'	=> $alamat,
			'icon'		=> $icon,
			'logo'		=> $logo,
			'perusahaan'	=> $perusahaan
		 );
		 $this->db->update('tb_setting',$data);
		 tampil_alert('success','Berhasil','Data berhasil di Perbarui !');
		 redirect(base_url('admin/setting'));

	}


	
}
