<?php

function is_active($title){
    $CI =& get_instance();

    $param['user'] = $CI->session->userdata('name');
    $param['deskripsi'] = $aksi; 

    //load model log
    $CI->load->model('M_log');

    //save to database
    $CI->M_log->simpan_log($param);

}

function status_aktif($id)
{
    if ($id==0) {
        echo "<span class='badge badge-danger badge-sm'>NON AKTIF</span>";
    }else{
        echo "<span class='badge badge-success badge-sm'>AKTIF</span>";
    }
}
function status_pinjam($id)
{
    if ($id==0) {
        echo "<span class='badge badge-warning badge-sm'>Waiting..</span>";
    }elseif ($id==1) {
        echo "<span class='badge badge-success badge-sm'>Approved..</span>";
    }elseif ($id==2) {
        echo "<span class='badge badge-primary badge-sm'>Selesai..</span>";
    }else{
        echo "<span class='badge badge-danger badge-sm'>Di tolak..</span>";
    }
}

?> 