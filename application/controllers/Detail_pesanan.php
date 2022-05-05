<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_pesanan extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		fungsilogin2();
		$data = ['id_travel'];
		hapussession($data);
		$this->load->model('Model_role');
		$this->load->model('Model_general', 'mg');
		
	}

	public function index(){
		if($this->session->userdata('idpesan')){
			$login = $this->session->userdata('id_akun');
			$role = $this->session->userdata('id_department');
			$data['main']=$this->Model_role->header($role);
			$data['role'] = $role;
			$data['akun'] = $login;
			$data['id'] = $this->session->userdata('idpesan');
			$data['user'] = $this->db->get_where('akun', array('id_akun' => $login))->row_array();
			$data['title'] = 'Detail Penjualan';
			$data['pesanan'] = $this->mg->getwhere('*','pemesanan',['id_pemesanan'=>$data['id']])->row_array();
			$data['paket'] = $this->mg->getwhere('*','paket',['id_paket'=>$data['pesanan']['id_paket']])->row_array();
			$this->load->view('utils/sidebar', $data);
			$this->load->view('master/pesanan/detail_pesanan');
		} else {
			redirect('Pesanan');
		}
	}

	public function getpesanan($id){
		$data = [
			'idpesan' => $id,
		];
		$this->session->set_userdata($data);
		redirect('Detail_pesanan');
	}

	
}
