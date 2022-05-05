<?php
function fungsilogin(){
    $banjaran = get_instance();
    if(!$banjaran->session->userdata('id_akun')){
        redirect(base_url());
    } else {
        $url = $banjaran->uri->segment(1);
        $dep = $banjaran->session->userdata('id_department');
        $id_list = $banjaran->db->get_where('list_menu', ['url' => $url])->row_array()['id_list'];
        $akses = $banjaran->db->get_where('role_list_menu', ['id_list' => $id_list, 'id_department' => $dep]);

        // Pengujian Akses
        if($akses -> num_rows() < 1){
            redirect('Error_404');
        }
        // end pengujian akses
    }
}

function fungsilogin2(){
    $banjaran = get_instance();
    if(!$banjaran->session->userdata('id_akun')){
        redirect(base_url());
    }
}

function hapussession($data){
    $banjaran = get_instance();
    $n = count($data);
    for($i= 0; $i < $n; $i++){
        $banjaran->session->unset_userdata($data[$i]);
    }
}

function tutuporder() {
    $banjaran = get_instance();
    date_default_timezone_set('Asia/Jakarta');
    $today = date('Y-m-d');
    $id = $banjaran->db->get_where('keberangkatan', ['tanggal_berangkat' => $today, 'status_berangkat'=>'BUKA'])->result_array();
    foreach($id as $i):
        $id_tanggal = $i['id_keberangkatan'];
        $dataupdate = [
            'status_berangkat' => 'TUTUP'
        ];
        $banjaran->db->where('id_keberangkatan', $id_tanggal);
        $banjaran->db->update('keberangkatan', $dataupdate);
    endforeach;
}