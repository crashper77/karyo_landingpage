<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_login');
		
    }
    public function index()
    {
        $data['title'] = 'Login';
        $this->load->view('auth/auth-login', $data);
    }

    public function autentikasi()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('data', 'Add_Null');
            redirect('Login');
        } else {
            $this->Model_login->proseslogin();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id_akun');
        $this->session->unset_userdata('id_travel');
        $this->session->set_flashdata('data', 'Keluar');
        redirect('Login');
    }
}
