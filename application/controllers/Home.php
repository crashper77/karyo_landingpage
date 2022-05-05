<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_general', 'mg');
		
	}
	public function index(){
		
		$data['list_manual'] = $this->mg->getwhere('*', 'mobil', ['tipe_mobil'=>'manual'])->
		result_array();
		$data['list_matic'] = $this->mg->getwhere('*', 'mobil', ['tipe_mobil' => 'matic'])->result_array();
		$data['about_us'] = $this->mg->getwhere('*', 'akun', ['id_akun' => 'admin'])->result_array();
		$data['get_services'] = $this->mg->getlimit('services', 3)->result_array();
		// $data['get_articles'] = $this->mg->getlimit('articles', 3)->result_array();
		$data['get_articles'] = $this->mg->getwherelimit('*', 'articles', ['status' => 'published'], 3)->result_array();
		$data['get_promo'] = $this->mg->get('promotion');
		$data['total_cars'] = $this->mg->sum_data('mobil');
		$data['title'] = 'Home';
		$this->load->view('landingpage/header', $data);
		$this->load->view('landingpage/home', $data);
		$this->load->view('landingpage/footer', $data);
	}
	
}
