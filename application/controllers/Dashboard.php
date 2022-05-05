<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		fungsilogin();
		$data = ['id_travel', 'idpesan'];
		hapussession($data);
		$this->load->model('Model_role');
		$this->load->model('Model_general', 'mg');
		
	}
	public function index(){
		// date_default_timezone_set('Asia/Jakarta');
		// $today = date('Y-m-d');
		$login = $this->session->userdata('id_akun');
		$role = $this->session->userdata('id_department');
		$data['main'] = $this->Model_role->header($role);
		$data['role'] = $role;
		$data['akun'] = $login;
		$data['user'] = $this->db->get_where('akun', array('id_akun' => $login))->row_array();
		$data['mobil'] = $this->mg->get('mobil');
		$data['count_mobil'] = $this->mg->sum_data(
		'mobil');
		// $data['count_paket'] = $this->mg->sum_data(
		// 'paket');
		// $data['count_pesanan'] = $this->mg->sum_data(
		// 'pemesanan');
		$data['title'] = 'Dashboard';
		$this->load->view('utils/sidebar', $data);
		$this->load->view('main/dashboard');
	}
	
}
