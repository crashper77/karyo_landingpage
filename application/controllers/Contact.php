<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Model_general', 'mg');
		
	}
	public function index(){
		$data['about_us'] = $this->mg->getwhere('*', 'akun', ['id_akun' => 'admin'])->result_array();
		
		$data['title'] = 'Contact';
		$this->load->view(
		'landingpage/header', $data);
		$this->load->view('landingpage/contact', $data);
		$this->load->view(
		'landingpage/footer', $data);
	}
	
}
