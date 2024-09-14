<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sarana extends CI_Controller {

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
		$data['title'] = 'Sarana';
		$data['ruang']	= $this->db->query("SELECT * from tb_ruang order by id desc")->result();
		$data['rak']	= $this->db->query("SELECT * from tb_rak order by id desc")->result();
		$data['box']	= $this->db->query("SELECT * from tb_box order by id desc")->result();
		$data['map']	= $this->db->query("SELECT * from tb_map order by id desc")->result();
		$this->template->load('template_new', 'admin/sarana', $data);
	}

	// tambah ruang
	public function add_ruang()
	{
		$kode	= $this->input->post('kode');
		$ruang	= $this->input->post('nama');
		$database = $this->db->database;
        $id_auto = $this->db->query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = 'tb_ruang' ")->row()->AUTO_INCREMENT;
		//proses barcode3
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
        $config['cacheable']    	= true; //boolean, the default is true
        $config['cachedir']        	= './upload/'; //string, the default is application/cache/
        $config['errorlog']        	= './upload/'; //string, the default is application/logs/
        $config['imagedir']        	= './upload/qrcode/'; //direktori penyimpanan qr code
        $config['quality']        	= true; //boolean, the default is true
        $config['size']            	= '1024'; //interger, the default is 1024
        $config['black']        	= array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        	= array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        $image_name 				= 'Ruang_'.$kode.'.png'; //buat name dari qr code sesuai dengan nim
        $params['data'] 			= base_url('Home/ruang/'.$id_auto); //data yang akan di jadikan QR CODE
        $params['level'] 			= 'H'; //H=High
        $params['size'] 			= 10;
        $params['savename'] 		= FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		$data = array(
			'kode'	=> $kode,
			'ruang'	=> $ruang,
			'qrcode'	=> $image_name,
			'status'	=> '1'
		);
		$this->db->insert('tb_ruang',$data);
		tampil_alert('success','Berhasil','Data berhasil di tambahkan !');
		redirect(base_url('admin/Sarana'));
	}
	// tambah rak
	public function add_rak()
	{
		$kode	= $this->input->post('kode');
		$rak	= $this->input->post('nama');
		$database = $this->db->database;
        $id_auto = $this->db->query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = 'tb_rak' ")->row()->AUTO_INCREMENT;
		//proses barcode3
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
        $config['cacheable']    	= true; //boolean, the default is true
        $config['cachedir']        	= './upload/'; //string, the default is application/cache/
        $config['errorlog']        	= './upload/'; //string, the default is application/logs/
        $config['imagedir']        	= './upload/qrcode/'; //direktori penyimpanan qr code
        $config['quality']        	= true; //boolean, the default is true
        $config['size']            	= '1024'; //interger, the default is 1024
        $config['black']        	= array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        	= array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        $image_name 				= 'Rak_'.$kode.'.png'; //buat name dari qr code sesuai dengan nim
        $params['data'] 			= base_url('Home/rak/'.$id_auto); //data yang akan di jadikan QR CODE
        $params['level'] 			= 'H'; //H=High
        $params['size'] 			= 10;
        $params['savename'] 		= FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		$data = array(
			'kode'	=> $kode,
			'rak'	=> $rak,
			'qrcode'	=> $image_name,
			'status'	=> '1'
		);
		$this->db->insert('tb_rak',$data);
		tampil_alert('success','Berhasil','Data berhasil di tambahkan !');
		redirect(base_url('admin/Sarana'));
	}
	// tambah box
	public function add_box()
	{
		$kode	= $this->input->post('kode');
		$box	= $this->input->post('nama');
		$database = $this->db->database;
        $id_auto = $this->db->query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = 'tb_box' ")->row()->AUTO_INCREMENT;
		//proses barcode3
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
        $config['cacheable']    	= true; //boolean, the default is true
        $config['cachedir']        	= './upload/'; //string, the default is application/cache/
        $config['errorlog']        	= './upload/'; //string, the default is application/logs/
        $config['imagedir']        	= './upload/qrcode/'; //direktori penyimpanan qr code
        $config['quality']        	= true; //boolean, the default is true
        $config['size']            	= '1024'; //interger, the default is 1024
        $config['black']        	= array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        	= array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        $image_name 				= 'Box_'.$kode.'.png'; //buat name dari qr code sesuai dengan nim
        $params['data'] 			= base_url('Home/box/'.$id_auto); //data yang akan di jadikan QR CODE
        $params['level'] 			= 'H'; //H=High
        $params['size'] 			= 10;
        $params['savename'] 		= FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		$data = array(
			'kode'	=> $kode,
			'box'	=> $box,
			'qrcode'	=> $image_name,
			'status'	=> '1'
		);
		$this->db->insert('tb_box',$data);
		tampil_alert('success','Berhasil','Data berhasil di tambahkan !');
		redirect(base_url('admin/Sarana'));
	}
	// tambah map
	public function add_map()
	{
		$kode	= $this->input->post('kode');
		$map	= $this->input->post('nama');
		$database = $this->db->database;
        $id_auto = $this->db->query("SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = '$database' AND TABLE_NAME = 'tb_map' ")->row()->AUTO_INCREMENT;
		//proses barcode3
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
        $config['cacheable']    	= true; //boolean, the default is true
        $config['cachedir']        	= './upload/'; //string, the default is application/cache/
        $config['errorlog']        	= './upload/'; //string, the default is application/logs/
        $config['imagedir']        	= './upload/qrcode/'; //direktori penyimpanan qr code
        $config['quality']        	= true; //boolean, the default is true
        $config['size']            	= '1024'; //interger, the default is 1024
        $config['black']        	= array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        	= array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        $image_name 				= 'Map_'.$kode.'.png'; //buat name dari qr code sesuai dengan nim
        $params['data'] 			= base_url('Home/map/'.$id_auto); //data yang akan di jadikan QR CODE
        $params['level'] 			= 'H'; //H=High
        $params['size'] 			= 10;
        $params['savename'] 		= FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		$data = array(
			'kode'	=> $kode,
			'map'	=> $map,
			'qrcode'	=> $image_name,
			'status'	=> '1'
		);
		$this->db->insert('tb_map',$data);
		tampil_alert('success','Berhasil','Data berhasil di tambahkan !');
		redirect(base_url('admin/Sarana'));
	}
	// hapus ruang
	function hapus_ruang($id)
    {
	 $this->db->query("DELETE  from tb_ruang where id = '$id' ");
     tampil_alert('success','Berhasil','Data berhasil di Hapus');
	 redirect(base_url('admin/Sarana'));
    }
	// hapus rak
	function hapus_rak($id)
    {
	 $this->db->query("DELETE  from tb_rak where id = '$id' ");
     tampil_alert('success','Berhasil','Data berhasil di Hapus');
	 redirect(base_url('admin/Sarana'));
    }
	// hapus rak
	function hapus_box($id)
    {
	 $this->db->query("DELETE  from tb_box where id = '$id' ");
     tampil_alert('success','Berhasil','Data berhasil di Hapus');
	 redirect(base_url('admin/Sarana'));
    }
	// hapus map
	function hapus_map($id)
    {
	 $this->db->query("DELETE  from tb_map where id = '$id' ");
     tampil_alert('success','Berhasil','Data berhasil di Hapus');
	 redirect(base_url('admin/Sarana'));
    }
	// cek kode ruang
	public function c_ruang() 
    {
      $kode = $this->input->post('kode');
      // Cek apakah NIK sudah ada di tabel my_table
      $result = $this->db->get_where('tb_ruang', array('kode' => $kode))->result();
      
      if (count($result) > 0) {
        // NIK sudah ada di tabel, kirim respons TRUE
        echo json_encode(TRUE);
        return;
      }
      
      // NIK belum ada di tabel, kirim respons FALSE
      echo json_encode(FALSE);
    }
	// cek kode rak
	public function c_rak() 
    {
      $kode = $this->input->post('kode');
      // Cek apakah NIK sudah ada di tabel my_table
      $result = $this->db->get_where('tb_rak', array('kode' => $kode))->result();
      
      if (count($result) > 0) {
        // NIK sudah ada di tabel, kirim respons TRUE
        echo json_encode(TRUE);
        return;
      }
      
      // NIK belum ada di tabel, kirim respons FALSE
      echo json_encode(FALSE);
    }
	// cek kode box
	public function c_box() 
    {
      $kode = $this->input->post('kode');
      // Cek apakah NIK sudah ada di tabel my_table
      $result = $this->db->get_where('tb_box', array('kode' => $kode))->result();
      
      if (count($result) > 0) {
        // NIK sudah ada di tabel, kirim respons TRUE
        echo json_encode(TRUE);
        return;
      }
      
      // NIK belum ada di tabel, kirim respons FALSE
      echo json_encode(FALSE);
    }
	// cek kode map
	public function c_map() 
    {
      $kode = $this->input->post('kode');
      // Cek apakah NIK sudah ada di tabel my_table
      $result = $this->db->get_where('tb_map', array('kode' => $kode))->result();
      
      if (count($result) > 0) {
        // NIK sudah ada di tabel, kirim respons TRUE
        echo json_encode(TRUE);
        return;
      }
      
      // NIK belum ada di tabel, kirim respons FALSE
      echo json_encode(FALSE);
    }
}
