<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backup extends CI_Controller {

	function __construct()
	{
	  parent::__construct();
	  $role = $this->session->userdata('role');
	  if($role != "1"){
		tampil_alert('error','DI TOLAK !','Silahkan login kembali !');
		redirect(base_url(''));
		$this->load->dbutil();
        $this->load->helper('file');
	  }
	
	}
	public function index(){ 
		$data['title'] = 'Backup';
		$this->template->load('template_new', 'admin/backup', $data);
	}
	// fitur backup
	public function backup()
		{
			$date = date('d-m-Y');
			// Load the DB utility class
			$this->load->dbutil();
			// Backup the entire database and assign it to a variable
			$backup = $this->dbutil->backup();
			// Load the file helper and write the file to your server
			$this->load->helper('file');
			write_file('/upload/backup/data_'.$date.'.sql', $backup);
			// Load the download helper and send the file to your desktop
			$this->load->helper('download');
			force_download('data_'.$date.'.sql', $backup);
		}
}
