<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mobil extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		fungsilogin();
		$data = ['id_travel'];
		hapussession($data);
		$this->load->model('Model_role');
		$this->load->model('Model_general', 'mg');
		$this->load->model('Model_profile');
		
	}

	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$today = date('Y-m-d');
		$login = $this->session->userdata('id_akun');
		$role = $this->session->userdata('id_department');
		// $this->session->unset_userdata('bulan');
		// $this->session->unset_userdata('id_penjualan');
		
		$data['main']=$this->Model_role->header($role);
		$data['role'] = $role;
		$data['akun'] = $login;
		$data['user'] = $this->db->get_where('akun', array('id_akun' => $login))->row_array();
		$data['title'] = 'Data Mobil';
		$data['mobil'] = $this->mg->get('mobil');

		$this->load->view('utils/sidebar', $data);
		$this->load->view('master/mobil/mobil');
        $this->session->unset_userdata('id_penjualan');
	}

	public function tambahmobil(){
		$this->form_validation->set_rules('tipe_mobil', 'Tipe Mobil', 'trim|required');
        $this->form_validation->set_rules('merk', 'Merk', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('data', 'Gagal');
        } else {
			$query = $this->db->query("SELECT MAX(id_mobil) as ig FROM mobil")->row_array()['ig'];
			if(!$query){
				$urutan = 0;
			} else {
				$urutan = substr($query, 3, 4);
			}
			$urutan++;
			$kodenya = "M" . sprintf("%04s", $urutan);
			// TRV0001

			// controller image
			date_default_timezone_set('Asia/Jakarta');
			$config['upload_path'] = './uploads/mobil';
			$config['allowed_types'] = 'jpg|png|jpeg';
			// $config['max_size'] = '2048';
			$config['file_name'] = $kodenya . date('dmY') . '-' . substr(md5(rand()), 0, 10);
			$this->load->library('upload', $config);

			if (@$_FILES['mobil_img']['name']) {
				if ($this->upload->do_upload('mobil_img')) {
					$item = $this->Model_profile->namamobil($kodenya);
					if ($item) {
						$file = './uploads/mobil/' . $item;
						unlink($file);
					}
					$gambar = $this->upload->data('file_name');
					$size = getimagesize($this->upload->data('full_path'));
					$config['image_library'] = 'gd2';
					$config['source_image'] = './uploads/mobil/' . $gambar;
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

					$config['new_image'] = './uploads/mobil/' . $gambar;
					$this->load->library('image_lib', $config);
					$this->image_lib->crop();
					// Simpan ke DB
					$in = $this->input->post(null, TRUE);
					$data = [
						'id_mobil' => $kodenya,
						'mobil_img' => $gambar,
						'tipe_mobil' => $in['tipe_mobil'],
						'merk' => $in['merk'],
						'harga' => $in['harga']
					];
					$this->mg->create('mobil', $data);
					$this->session->set_flashdata('data', 'Add');
					redirect('Mobil');
				} else {
					$this->session->set_flashdata('data', 'Eror');
					redirect('Mobil');
				}
			} else {
				$this->session->set_flashdata('data', 'Gagal');
				redirect('Mobil');
			}
			
        }
		redirect('Mobil');


	}

	public function hapusmobil($id){
		$data = [
			'id_mobil' => $id
		];
		$this->mg->delete('mobil', $data);
		$this->session->set_flashdata('data', 'Delete');
		redirect('Mobil');
	}

	public function editmobil($id){
		$in = $this->input->post(null, TRUE);
		$data = [
			'tipe_mobil' => $in['tipe_mobil'],
			'merk' => $in['merk'],
			'harga' => $in['harga']
		];
		$where = ['id_mobil' => $id];
		$this->mg->update('mobil', $where, $data);
		$this->session->set_flashdata('data', 'Update');
		redirect('Mobil');
	}
}
