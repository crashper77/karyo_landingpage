<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_general', 'mg');
		$this->load->helper('text');
		
	}
	public function index(){
		$data['about_us'] = $this->mg->getwhere('*', 'akun', ['id_akun' =>
		'admin'])->result_array();
		$data['get_articles'] = $this->mg->getwhere('*', 'articles', ['status' => 'published'])->result_array();
		$data['title'] = 'Blog';
		$this->load->view(
		'landingpage/header', $data);
		$this->load->view('landingpage/blog', $data);
		$this->load->view(
		'landingpage/footer', $data);
	}
	
}
