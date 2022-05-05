<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_detail extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_general', 'mg');
		$this->load->helper('text');

	}
	public function index()
	{
		if ($this->session->userdata('idblog')) {

			$data['about_us'] = $this->mg->getwhere('*', 'akun', ['id_akun' => 'admin'])->result_array();
			$data['id'] = $this->session->userdata('idblog');
			$data['detail'] = $this->mg->getwhere('*', 'articles', ['id_article' => $data['id']])->row_array();
			$data['get_articles'] = $this->mg->getwhere('*', 'articles', ['status' => 'published'])->result_array();
			$data['title'] = 'Blog Detail';
			$this->load->view(
				'landingpage/header',
				$data
			);
			$this->load->view('landingpage/blog-detail', $data);
			$this->load->view(
				'landingpage/footer',
				$data
			);
		} else {
			redirect('Blog');
		}
	}

	public function getarticle($id)
	{
		$data = [
			'idblog' => $id,
		];
		$this->session->set_userdata($data);
		redirect('Blog_detail');
	}
}
