<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Error_404 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $data = ['daily', 'monthly'];
		hapussession($data);
    }

    public function index()
    {
        $data['title'] = 'Error 404 Page';
        $data['user'] = $this->session->userdata('usernya');
		
		$login = $this->session->userdata('id_akun');
		$role = $this->session->userdata('id_department');
		$data['akun'] = $login;
		$data['role'] = $role;
        $this->load->view('errors/error_404', $data);
    }
}