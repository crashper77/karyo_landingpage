<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		fungsilogin2();
		$data = ['id_travel'];
		hapussession($data);
		$this->load->model('Model_role');
		$this->load->library('form_validation');
		$this->load->model('Model_profile');
		$this->load->model('Model_department');
		// $this->load->model('Model_history', 'history');
		// ;
	}

	public function index()
	{
		$login = $this->session->userdata('id_akun');
		$role = $this->session->userdata('id_department');

		$data['main'] = $this->Model_role->header($role);
		$data['role'] = $role;
		$data['akun'] = $login;
		$data['user'] = $this->db->get_where('akun', array('id_akun' => $login))->row_array();
		$data['title'] = 'Profile Company';
		$data['department'] = $this->Model_department->view_departmentaktif();
		$data['viewprofile'] = $this->Model_profile->viewprofile($login);
		// date_default_timezone_set('Asia/Jakarta');
		// $today = date('Y-m-d');
		$this->load->view('utils/sidebar', $data);
		$this->load->view('utils/profile', $data);
	}

	public function editprofile($id)
	{
		$this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'trim|required');
		$this->form_validation->set_rules('email_karyawan', 'Email Karyawan', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'Nomer Telepon', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('data', 'Gagal');
			redirect('Profile');
		} else {
			$this->Model_profile->editakun($id);
			if ($this->input->post('password')) {
				$this->Model_profile->password($id);
			}

			$this->session->set_flashdata('data', 'Update');
			redirect('Profile');
		}
	}

	public function updateAva()
	{
		$id = $this->input->post('id_akun', true);

		date_default_timezone_set('Asia/Jakarta');
		$config['upload_path'] = './uploads/profile/dark';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '2048';
		$config['file_name'] = $id . date('dmY') . '-' . substr(md5(rand()), 0, 10);
		$this->load->library('upload', $config);

		if (@$_FILES['ava_profil_dark']['name']) {
			if ($this->upload->do_upload('ava_profil_dark')) {
				$item = $this->Model_profile->namagambar($id);
				if ($item) {
					$file = './uploads/profile/dark/' . $item;
					unlink($file);
				}
				$gambar = $this->upload->data('file_name');
				$size = getimagesize($this->upload->data('full_path'));
				$config['image_library'] = 'gd2';
				$config['source_image'] = './uploads/profile/dark/' . $gambar;
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

				$config['new_image'] = './uploads/profile/dark/' . $gambar;
				$this->load->library('image_lib', $config);
				$this->image_lib->crop();
				// Simpan ke DB
				$this->Model_profile->updategambar($gambar, $id);
				$this->session->set_flashdata('data', 'Create');
				redirect('Profile');
			} else {
				$this->session->set_flashdata('data', 'Eror');
				redirect('Profile');
			}
		} else {
			$this->session->set_flashdata('data', 'Gagal');
			redirect('Profile');
		}
	}

	public function updateAva_light()
	{
		$id = $this->input->post('id_akun', true);

		date_default_timezone_set('Asia/Jakarta');
		$config['upload_path'] = './uploads/profile/light';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '2048';
		$config['file_name'] = $id . date('dmY') . '-' . substr(md5(rand()), 0, 10);
		$this->load->library('upload', $config);

		if (@$_FILES['ava_profil_light']['name']) {
			if ($this->upload->do_upload('ava_profil_light')) {
				$item = $this->Model_profile->namagambar($id);
				if ($item) {
					$file = './uploads/profile/light/' . $item;
					unlink($file);
				}
				$gambar = $this->upload->data('file_name');
				$size = getimagesize($this->upload->data('full_path'));
				$config['image_library'] = 'gd2';
				$config['source_image'] = './uploads/profile/light/' . $gambar;
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

				$config['new_image'] = './uploads/profile/light/' . $gambar;
				$this->load->library('image_lib', $config);
				$this->image_lib->crop();
				// Simpan ke DB
				$this->Model_profile->updategambarlight($gambar, $id);
				$this->session->set_flashdata('data', 'Create');
				redirect('Profile');
			} else {
				$this->session->set_flashdata('data', 'Eror');
				redirect('Profile');
			}
		} else {
			$this->session->set_flashdata('data', 'Gagal');
			redirect('Profile');
		}
	}
}
