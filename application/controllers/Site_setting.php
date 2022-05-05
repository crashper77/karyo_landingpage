<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site_setting extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		fungsilogin();
		$data = ['id_travel'];
		hapussession($data);
		$this->load->model('Model_role');
		$this->load->library('form_validation');
		$this->load->model('Model_general', 'mg');
		$this->load->model('Model_department');
		$this->load->model('Model_profile');
	}

	public function index()
	{
		$login = $this->session->userdata('id_akun');
		$role = $this->session->userdata('id_department');

		$data['main'] = $this->Model_role->header($role);
		$data['role'] = $role;
		$data['akun'] = $login;
		$data['user'] = $this->db->get_where('akun', array('id_akun' => $login))->row_array();
		$data['title'] = 'Site Setting';
		$data['serve'] = $this->mg->get('services');
		$data['promo'] = $this->mg->get('promotion');

		// $data['department'] = $this->Model_department->view_departmentaktif();
		// date_default_timezone_set('Asia/Jakarta');
		// $today = date('Y-m-d');
		// $data['history'] = $this->history->view($today);
		$this->load->view('utils/sidebar', $data);
		$this->load->view('utils/site_setting', $data);
	}



	public function add_services()
	{
		$this->form_validation->set_rules('icon', 'Icon', 'trim|required');
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('desc', 'Desc', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('data', 'Gagal');
		} else {
			$query = $this->db->query("SELECT MAX(id_serve) as iserve FROM services")->row_array()['iserve'];
			if (!$query) {
				$urutan = 0;
			} else {
				$urutan = substr($query, 3, 4);
			}
			$urutan++;
			$kodenya = "S" . sprintf("%04s", $urutan);
			// TRV0001
			$in = $this->input->post(null, TRUE);
			$data = [
				'id_serve' => $kodenya,
				'icon' => $in['icon'],
				'title' => $in['title'],
				'description' => $in['desc']
			];
			$this->mg->create('services', $data);
			$this->session->set_flashdata('data', 'Add');
		}
		redirect('Site_setting');
	}

	public function edit_services($id)
	{
		$in = $this->input->post(null, TRUE);
		$data = [
			'icon' => $in['icon'],
			'title' => $in['title'],
			'description' => $in['desc']
		];
		$where = ['id_serve' => $id];
		$this->mg->update('services', $where, $data);
		$this->session->set_flashdata('data', 'Update');
		redirect('Site_setting');
	}

	public function del_services($id)
	{
		$data = [
			'id_serve' => $id
		];
		$this->mg->delete('services', $data);
		$this->session->set_flashdata('data', 'Delete');
		redirect('Site_setting');
	}


	public function add_promo()
	{
		// $this->form_validation->set_rules('banner_img', 'Banner Image', 'trim|required');
		$this->form_validation->set_rules('url_link', 'URL Link', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('data', 'Gagal');
		} else {
			$query = $this->db->query("SELECT MAX(id_promo) as ip FROM promotion")->row_array()['ip'];
			if (!$query) {
				$urutan = 0;
			} else {
				$urutan = substr($query, 3, 4);
			}
			$urutan++;
			$kodenya = "P" . sprintf("%04s", $urutan);
			// TRV0001

			// controller image
			date_default_timezone_set('Asia/Jakarta');
			$config['upload_path'] = './uploads/banner';
			$config['allowed_types'] = 'jpg|png|jpeg';
			// $config['max_size'] = '2048';
			$config['file_name'] = $kodenya . date('dmY') . '-' . substr(md5(rand()), 0, 10);
			$this->load->library('upload', $config);

			if (@$_FILES['banner_img']['name']) {
				if ($this->upload->do_upload('banner_img')) {
					$item = $this->Model_profile->namabanner($kodenya);
					if ($item) {
						$file = './uploads/banner/' . $item;
						unlink($file);
					}
					$gambar = $this->upload->data('file_name');
					$size = getimagesize($this->upload->data('full_path'));
					$config['image_library'] = 'gd2';
					$config['source_image'] = './uploads/banner/' . $gambar;
					$config['maintain_ratio'] = FALSE;
					$config['create_thumb'] = FALSE;
					$config['quality'] = '100%';
					if ($size[0] > $size[1]) {
						$config['width'] = $size[1];
						$config['height'] = $size[1];
						$config['x_axis'] = ($size[0] - $size[1]) / 2;
						$config['y_axis'] = 0;
					} else {
						$config['width'] = $size[0];
						$config['height'] = $size[0];
						$config['x_axis'] = 0;
						$config['y_axis'] = ($size[1] - $size[0]) / 2;
					}

					$config['new_image'] = './uploads/banner/' . $gambar;
					$this->load->library('image_lib', $config);
					$this->image_lib->crop();
					// Simpan ke DB
					$in = $this->input->post(null, TRUE);
					$data = [
						'id_promo' => $kodenya,
						'banner_img' => $gambar,
						'url_link' => $in['url_link'],
					];
					$this->mg->create('promotion', $data);
					$this->session->set_flashdata('data', 'Add');
					redirect('Site_setting');
				} else {
					$this->session->set_flashdata('data', 'Eror');
					redirect('Site_setting');
				}
			} else {
				$this->session->set_flashdata('data', 'Gagal');
				redirect('Site_setting');
			}
		}
		redirect('Site_setting');
	}

	public function updateBanner()
	{
		$id = $this->input->post('id_promo', true);

		date_default_timezone_set('Asia/Jakarta');
		$config['upload_path'] = './uploads/banner';
		$config['allowed_types'] = 'jpg|png|jpeg';
		// $config['max_size'] = '2048';
		$config['file_name'] = $id . date('dmY') . '-' . substr(md5(rand()), 0, 10);
		$this->load->library('upload', $config);
		$gambar = $this->upload->data('file_name');

		var_dump($gambar);
		die;
		
		if (@$_FILES['banner_img']['name']) {
			if ($this->upload->do_upload('banner_img')) {
				$item = $this->Model_profile->namabanner($id);
				if ($item) {
					$file = './uploads/banner/' . $item;
					unlink($file);
				}
				$gambar = $this->upload->data('file_name');
				$size = getimagesize($this->upload->data('full_path'));
				$config['image_library'] = 'gd2';
				$config['source_image'] = './uploads/banner/' . $gambar;
				$config['maintain_ratio'] = FALSE;
				$config['create_thumb'] = FALSE;
				$config['quality'] = '100%';
				if ($size[0] > $size[1]) {
					$config['width'] = $size[1];
					$config['height'] = $size[1];
					$config['x_axis'] = ($size[0] - $size[1]) / 2;
					$config['y_axis'] = 0;
				} else {
					$config['width'] = $size[0];
					$config['height'] = $size[0];
					$config['x_axis'] = 0;
					$config['y_axis'] = ($size[1] - $size[0]) / 2;
				}

				$config['new_image'] = './uploads/banner/' . $gambar;
				$this->load->library('image_lib', $config);
				$this->image_lib->crop();
				// Simpan ke DB
				$this->Model_profile->updatebanner($gambar, $id);
				$this->session->set_flashdata('data', 'Create');
				redirect('Site_setting');
			} else {
				$this->session->set_flashdata('data', 'Eror');
				redirect('Site_setting');
			}
		} else {
			$this->session->set_flashdata('data', 'Gagal');
			redirect('Site_setting');
		}
	}

	public function edit_url($id)
	{
		$in = $this->input->post(null, TRUE);
		$data = [
			'url_link' => $in['url_link'],
		];
		$where = ['id_promo' => $id];
		$this->mg->update('promotion', $where, $data);
		$this->session->set_flashdata('data', 'Update');
		redirect('Site_setting');
	}

	public function del_promo($id)
	{
		$data = [
			'id_promo' => $id
		];
		$this->mg->delete('promotion', $data);
		$this->session->set_flashdata('data', 'Delete');
		redirect('Site_setting');
	}
}
