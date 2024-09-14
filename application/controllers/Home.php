<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
		parent::__construct();
		$this->load->model('M_login');
	}
    public function index()
    {
        $data['token'] = $this->token();
        $this->session->set_userdata($data);
        $data['divisi']	= $this->db->query("SELECT td.*,count(ta.id) as total from tb_divisi td
        left join tb_arsip ta on td.id = ta.id_divisi
        where td.status = '1' group by td.id")->result();
        $this->load->view('home',$data);

    }
    public function token()
	{
		return $token_login = md5(uniqid(rand(), true));
	}
    // proses login
    public function proses_login()
	{
        
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run() == TRUE){
			$username = $this->input->post('username',TRUE);
			$password = $this->input->post('password',TRUE);
			$page = $this->input->post('page');

		if($this->session->userdata('token') === $this->input->post('token'))
		{
			$cek =  $this->M_login->cek_user('tb_user',$username);
			if( $cek->num_rows() != 1){
				tampil_alert('error','Information','Username belum terdaftar silahkan hubungi Administrator!');
				redirect(base_url('Home'));
			}else {
					$isi = $cek->row();
					if(password_verify($password,$isi->password) === TRUE){
						$data_session = array(
										'id' => $isi->id,
										'username' => $username,
										'nama_user' => $isi->nama_user,
										'status' => 'login',
										'role' => $isi->role,
										'last_login' => $isi->last_login,
										
						);
						$this->session->set_userdata($data_session);
						$data_login = array(
							'last_login' => date('Y-m-d H:i:s'),
						);

						$this->M_login->edit_user(['username' => $username],$data_login);
                        tampil_alert('success','Berhasil','Anda Berhasil Login !');
                        redirect(base_url($page));
					}else {
						tampil_alert('error','Gagal','username dan password salah!');
						
						redirect(base_url(''));
					}
				 }
			} else {
                tampil_alert('error','Gagal','Gagal Ambil Token Login!');
				redirect(base_url());
			}
		} 
	}
    public function arsip($arsip,$filename)
    {
        
        $data['arsip']  = $this->db->query("SELECT ta.*,tu.nama_user, tr.ruang,trk.rak,tb.box,tm.map, tk.kategori, td.divisi from tb_arsip ta
        join tb_ruang tr on ta.id_ruang = tr.id
        join tb_rak trk on ta.id_rak = trk.id
        join tb_box tb on ta.id_box = tb.id
        join tb_map tm on ta.id_map = tm.id
        join tb_kategori tk on ta.id_kategori = tk.id
        join tb_divisi td on ta.id_divisi = td.id
        join tb_user tu on ta.id_user = tu.id
        where ta.id = '$arsip'")->row();
        // proses update viewer
        $this->db->query("UPDATE tb_arsip set viewer = (viewer + 1) where id = '$arsip'");
        $this->load->view('arsip',$data);
    }
    // menampilkan data yang ada di ruangan
    public function ruang($id)
    {
        
        $data['token'] = $this->token();
        $this->session->set_userdata($data);
        $data['ruang']   = $this->db->query("SELECT * from tb_ruang where id ='$id'")->row();
        $data['arsip']   = $this->db->query("SELECT ta.*, tk.kategori, tu.nama_user, tr.ruang,trk.rak,tb.box,tm.map from tb_arsip ta
        join tb_kategori tk on ta.id_kategori = tk.id
        join tb_user tu on ta.id_user = tu.id
        join tb_ruang tr on ta.id_ruang = tr.id
        join tb_rak trk on ta.id_rak = trk.id
        join tb_box tb on ta.id_box = tb.id
        join tb_map tm on ta.id_map = tm.id
        where ta.id_ruang = '$id'")->result();
        $this->load->view('ruang',$data);
    }
    // menampilkan data yang ada di ruangan
    public function rak($id)
    {
        
        $data['token'] = $this->token();
        $this->session->set_userdata($data);
        $data['rak']   = $this->db->query("SELECT * from tb_rak where id ='$id'")->row();
        $data['arsip']   = $this->db->query("SELECT ta.*, tk.kategori, tu.nama_user, tr.ruang,trk.rak,tb.box,tm.map from tb_arsip ta
        join tb_kategori tk on ta.id_kategori = tk.id
        join tb_user tu on ta.id_user = tu.id
        join tb_ruang tr on ta.id_ruang = tr.id
        join tb_rak trk on ta.id_rak = trk.id
        join tb_box tb on ta.id_box = tb.id
        join tb_map tm on ta.id_map = tm.id
        where ta.id_rak = '$id'")->result();
        $this->load->view('rak',$data);
    }
    // menampilkan data yang ada di ruangan
    public function box($id)
    {
        
        $data['token'] = $this->token();
        $this->session->set_userdata($data);
        $data['box']   = $this->db->query("SELECT * from tb_box where id ='$id'")->row();
        $data['arsip']   = $this->db->query("SELECT ta.*, tk.kategori, tu.nama_user, tr.ruang,trk.rak,tb.box,tm.map from tb_arsip ta
        join tb_kategori tk on ta.id_kategori = tk.id
        join tb_user tu on ta.id_user = tu.id
        join tb_ruang tr on ta.id_ruang = tr.id
        join tb_rak trk on ta.id_rak = trk.id
        join tb_box tb on ta.id_box = tb.id
        join tb_map tm on ta.id_map = tm.id
        where ta.id_box = '$id'")->result();
        $this->load->view('box',$data);
    }
    // menampilkan data yang ada di ruangan
    public function map($id)
    {
        
        $data['token'] = $this->token();
        $this->session->set_userdata($data);
        $data['map']   = $this->db->query("SELECT * from tb_map where id ='$id'")->row();
        $data['arsip']   = $this->db->query("SELECT ta.*, tk.kategori, tu.nama_user, tr.ruang,trk.rak,tb.box,tm.map from tb_arsip ta
        join tb_kategori tk on ta.id_kategori = tk.id
        join tb_user tu on ta.id_user = tu.id
        join tb_ruang tr on ta.id_ruang = tr.id
        join tb_rak trk on ta.id_rak = trk.id
        join tb_box tb on ta.id_box = tb.id
        join tb_map tm on ta.id_map = tm.id
        where ta.id_map = '$id'")->result();
        $this->load->view('map',$data);
    }
    // menampilkan berdasarkan divisi
    public function divisi($id)
    {
        $data['token'] = $this->token();
        $this->session->set_userdata($data);
        $data['divisi']   = $this->db->query("SELECT * from tb_divisi where id ='$id'")->row();
        $data['arsip']   = $this->db->query("SELECT ta.*, tk.kategori, tu.nama_user from tb_arsip ta
        join tb_kategori tk on ta.id_kategori = tk.id
        join tb_user tu on ta.id_user = tu.id
        where ta.id_divisi = '$id'")->result();
        $this->load->view('divisi',$data);
    }
    // halaman hasil pencarian
    public function cari()
    {
        $key = $this->input->post('cari');
        $data['token'] = $this->token();
        $this->session->set_userdata($data);
        $data['cari']   = $this->db->query("SELECT ta.*, tk.kategori, tu.nama_user from tb_arsip ta
        join tb_kategori tk on ta.id_kategori = tk.id
        join tb_user tu on ta.id_user = tu.id
        where ta.no_arsip LIKE '%$key%' or ta.nama LIKE '%$key%' or tk.kategori LIKE '%$key%' or tu.nama_user LIKE '%$key%' ")->result();
        $this->load->view('cari',$data);
    }
    // download arsip
    public function download($id,$file)
    {
        $id_user = $this->session->userdata(id);
        $data = array(
            'id_arsip'  => $id,
            'id_user'   => $id_user,
        );
        $this->db->trans_start();
        $this->db->insert('tb_download',$data);
        $this->db->query("UPDATE tb_arsip set downloader = (downloader + 1) where id ='$id'");
        $this->db->trans_complete();
        // lokasi direktori file yang akan didownload
        $file_path = './upload/file/'.$file;
         // cek apakah file ada di direktori
        if (file_exists($file_path)) {
            // set header untuk response
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file_path).'"');
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Content-Length: '.filesize($file_path));

            // membaca file dan mengirimkan isinya ke browser
            readfile($file_path);
        } else {
            // jika file tidak ada, tampilkan error
            echo 'File not found.';
        }
    }
    // cetak ruang
    public function cetak_ruang($id)
	{
        $data['cetak'] = $this->db->query("SELECT * from tb_ruang where id ='$id'")->row();
		// Memuat view halaman yang ingin dicetak
		$this->load->view('cetak_ruang',$data);

		// Mengatur ukuran kertas menjadi A6
		$pageSize = array('width' => 298, 'height' => 420);

		// Memanggil fungsi cetak dengan halaman dan ukuran yang diinginkan
		echo '<script>window.onload = function() { window.print(); }</script>';
		echo '<script src="' . base_url('assets/js/cetak.js') . '"></script>';
		echo '<div id="print-content"></div>';
		echo '<script>printPage(document.getElementById("print-content").innerHTML, ' . json_encode($pageSize) . ');</script>';
	}
    // cetak rak
    public function cetak_rak($id)
	{
        $data['cetak'] = $this->db->query("SELECT * from tb_rak where id ='$id'")->row();
		// Memuat view halaman yang ingin dicetak
		$this->load->view('cetak_rak',$data);

		// Mengatur ukuran kertas menjadi A6
		$pageSize = array('width' => 298, 'height' => 420);

		// Memanggil fungsi cetak dengan halaman dan ukuran yang diinginkan
		echo '<script>window.onload = function() { window.print(); }</script>';
		echo '<script src="' . base_url('assets/js/cetak.js') . '"></script>';
		echo '<div id="print-content"></div>';
		echo '<script>printPage(document.getElementById("print-content").innerHTML, ' . json_encode($pageSize) . ');</script>';
	}
    // cetak box
    public function cetak_box($id)
	{
        $data['cetak'] = $this->db->query("SELECT * from tb_box where id ='$id'")->row();
		// Memuat view halaman yang ingin dicetak
		$this->load->view('cetak_box',$data);

		// Mengatur ukuran kertas menjadi A6
		$pageSize = array('width' => 298, 'height' => 420);

		// Memanggil fungsi cetak dengan halaman dan ukuran yang diinginkan
		echo '<script>window.onload = function() { window.print(); }</script>';
		echo '<script src="' . base_url('assets/js/cetak.js') . '"></script>';
		echo '<div id="print-content"></div>';
		echo '<script>printPage(document.getElementById("print-content").innerHTML, ' . json_encode($pageSize) . ');</script>';
	}
    // cetak map
    public function cetak_map($id)
	{
        $data['cetak'] = $this->db->query("SELECT * from tb_map where id ='$id'")->row();
		// Memuat view halaman yang ingin dicetak
		$this->load->view('cetak_map',$data);

		// Mengatur ukuran kertas menjadi A6
		$pageSize = array('width' => 298, 'height' => 420);

		// Memanggil fungsi cetak dengan halaman dan ukuran yang diinginkan
		echo '<script>window.onload = function() { window.print(); }</script>';
		echo '<script src="' . base_url('assets/js/cetak.js') . '"></script>';
		echo '<div id="print-content"></div>';
		echo '<script>printPage(document.getElementById("print-content").innerHTML, ' . json_encode($pageSize) . ');</script>';
	}
}
?>