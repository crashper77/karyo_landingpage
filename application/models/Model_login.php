<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_login extends CI_Model
{
    public function proseslogin()
    {
        $email = $this->input->post('email');
        $pin = $this->input->post('password');
        $user = $this->db->get_where('akun', ['email_akun' => $email])->row_array();
        // Jika ada User
        if ($user) {
            // Pencocokan Password
            if (password_verify($pin, $user['password'])) {
                // Pengujian akun aktif
                if($user['status_akun']=='Aktif'){
                    // Pengujian Department Aktif
                    $dep = $this->db->get_where('department', ['id_department'=>$user['id_department']])->row_array()['status_department'];
                    if($dep == "ADMIN"){
                        $data = [
                            'id_akun' => $user['id_akun'],
                            'username' => $user['email_akun'],
                            'id_department' => $user['id_department']
                        ];
                        $this->db->select('url');
                        $this->db->from('role_list_menu');
                        $this->db->join('list_menu', 'list_menu.id_list=role_list_menu.id_list');
                        $this->db->where('id_department', $user['id_department']);
                        $url = $this->db->get()->row_array()['url'];
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('data', 'Masuk');
                        redirect($url);
                    } else if($dep == 'Aktif'){
                        $data = [
                            'id_akun' => $user['id_akun'],
                            'username' => $user['email_akun'],
                            'id_department' => $user['id_department']
                        ];
                        // Mendapatkan URL Awal
                        $this->db->select('url');
                        $this->db->from('role_list_menu');
                        $this->db->join('list_menu', 'list_menu.id_list=role_list_menu.id_list');
                        $this->db->where('id_department', $user['id_department']);
                        $url = $this->db->get()->row_array()['url'];
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('data', 'Masuk');
                        redirect($url);
                    } else {
                        $this->session->set_flashdata('data', 'Department');
                        redirect('Login');
                    }
                    // End Pengujian department tidak aktif
                } else {
                    $this->session->set_flashdata('data', 'Akun');
                    redirect('Login');
                }
                // End pengujian akun aktif
            } else {
                $this->session->set_flashdata('data', 'Gagal');
                redirect('Login');
            }
            // End Password Tidak cocok
        } else {
            $this->session->set_flashdata('data', 'Kosong');
            redirect('Login');
        }
        // End gak ada user
    }
}
