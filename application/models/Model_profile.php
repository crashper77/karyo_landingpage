<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_profile extends CI_Model
{
    public function viewprofile($id)
    {
        $this->db->select('*');
        $this->db->from('akun');
        $this->db->join('department', 'department.id_department = akun.id_department');
        $this->db->where('id_akun', $id);
        $this->db->where('status_akun', 'Aktif');
        return $this->db->get()->result_array();
    }

    public function editakun($id)
    {
        $tanggalnya = date('Y-m-d', strtotime($this->input->post('tgl_berdiri')));
        $data = array(
            'nama_lengkap' => $this->input->post('nama_karyawan'),
            'email_akun' => $this->input->post('email_karyawan'),
            'no_telp_akun' => $this->input->post('no_telp'),
            'investor' => $this->input->post(
            'investor'),
            'alamat' => $this->input->post('alamat'),
            'about_us' => $this->input->post('about_us'),
            'url_wa' => $this->input->post('url_wa'),
            'facebook' => $this->input->post('facebook'),
            'instagram' => $this->input->post('instagram'),
            'tgl_berdiri' => $tanggalnya,

        );
        $this->db->where('id_akun', $id);
        $this->db->update('akun', $data);
    }

    public function password($id){
        $pass = $this->input->post('password');
        $data = array(
            'password' =>  password_hash($pass, PASSWORD_BCRYPT)
        );
        $this->db->where('id_akun', $id);
        $this->db->update('akun', $data);
    }

    public function namagambar($id){
        return $this->db->get_where('akun', ['id_akun' => $id])->row_array()['ava_profil_dark'];
    }

    public function namabanner($id)
    {
        return $this->db->get_where('promotion', ['id_promo' => $id])->row_array()['banner_img'];
    }
    public function namamobil($id)
    {
        return $this->db->get_where('mobil', ['id_mobil' => $id])->row_array()['mobil_img'];
    }

    public function updategambar($gambar1, $id){
        $data = [
            'ava_profil_dark' => $gambar1,
        ];
        
        $this->db->where('id_akun', $id);
        $this->db->update('akun', $data);
    }
    public function updategambarlight($gambar2, $id)
    {
        $data = [
            'ava_profil_light' => $gambar2,
        ];

        $this->db->where('id_akun', $id);
        $this->db->update('akun', $data);
    }

    public function updatebanner($banner, $id)
    {
        $data = [
            'banner_img' => $banner,
        ];

        $this->db->where('id_promo', $id);
        $this->db->update('promotion', $data);
    }
}
