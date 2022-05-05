<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		fungsilogin();
		$data = ['id_travel', 'idpesan'];
		hapussession($data);
		$this->load->model('Model_role');
		$this->load->model('Model_general', 'mg');
		$this->load->helper('text');
	}

	public function index()
	{
		$login = $this->session->userdata('id_akun');
		$role = $this->session->userdata('id_department');
		$data['main'] = $this->Model_role->header($role);
		$data['role'] = $role;
		$data['akun'] = $login;
		$data['user'] = $this->db->get_where('akun', array('id_akun' => $login))->row_array();
		$data['title'] = "Artikel";
		$data['tags'] = $this->mg->get(
			'tags'
		);
		// $data['articles'] = $this->mg->getwhere('articles', []);
		$data['articles'] = $this->mg->get('articles');
		// $data['tag_article'] = $this->mg->getwhere('*', 'tags', ['id_tags' => $login ['id_tags']])->row_array();

		// $data['articles'] = $this->mg->get_multiplejoin('*', 'articles', 'tags', 'tags.id_tags=articles.id_tags','akun', 'akun.id_akun=articles.id_akun');

		$this->load->view('utils/sidebar', $data);
		$this->load->view('master/artikel/artikel', $data);
	}

	public function add_tags()
	{
		$this->form_validation->set_rules('name_tag', 'Nama Tags', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('data', 'Gagal');
		} else {
			$query = $this->db->query("SELECT MAX(id_tags) as it FROM tags")->row_array()['it'];
			if (!$query) {
				$urutan = 0;
			} else {
				$urutan = substr($query, 3, 4);
			}
			$urutan++;
			$kodenya = "T" . sprintf("%04s", $urutan);
			// TRV0001
			$in = $this->input->post(null, TRUE);
			$data = [
				'id_tags' => $kodenya,
				'name_tag' => $in['name_tag'],
			];
			$this->mg->create('tags', $data);
			$this->session->set_flashdata('data', 'Add');
		}
		redirect('Artikel');
	}

	public function edit_tags($id)
	{
		$in = $this->input->post(null, TRUE);
		$data = [
			'name_tag' => $in['name_tag'],
		];
		$where = ['id_tags' => $id];
		$this->mg->update('tags', $where, $data);
		$this->session->set_flashdata('data', 'Update');
		redirect('Artikel');
	}

	public function del_tags($id)
	{
		$data = [
			'id_tags' => $id
		];
		$this->mg->delete('tags', $data);
		$this->session->set_flashdata('data', 'Delete');
		redirect('Artikel');
	}

	// Artikel

	public function add_blogs()
	{
		$this->form_validation->set_rules('title', 'Judul Blog', 'trim|required');
		$this->form_validation->set_rules('content', 'Konten', 'trim|required');
		// $this->form_validation->set_rules('tags[]', 'Tags', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('data', 'Gagal');
		} else {
			$query = $this->db->query("SELECT MAX(id_article) as ia FROM articles")->row_array()['ia'];
			if (!$query) {
				$urutan = 0;
			} else {
				$urutan = substr($query, 3, 4);
			}
			$urutan++;
			$kodenya = "B" . sprintf("%04s", $urutan);
			// TRV0001

			date_default_timezone_set('Asia/Jakarta');
			$today = date('Y-m-d');
			$in = $this->input->post(null, TRUE);
			$data = [
				'id_article' => $kodenya,
				'title' => $in['title'],
				'content' => $in['content'],
				'tags' =>  $in['tags'],
				'id_akun' => $this->session->userdata('id_akun'),
				'update_at' => $today,
				'status' => 'draft'
			];
			$this->mg->create('articles', $data);
			$this->session->set_flashdata('data', 'Add');
			// endforeach;
		}
		redirect('Artikel');
	}

	public function edit_blogs($id)
	{
		date_default_timezone_set('Asia/Jakarta');
		$today = date('Y-m-d');
		$in = $this->input->post(null, TRUE);
		$data = [
			'title' => $in['title'],
			'content' => $in['content'],
			'tags' =>  $in['tags'],
			'id_akun' => $this->session->userdata('id_akun'),
			'update_at' => $today,
		];
		$where = ['id_article' => $id];
		$this->mg->update('articles', $where, $data);
		$this->session->set_flashdata('data', 'Update');
		redirect('Artikel');
	}

	public function publish($id)
	{
		$in = $this->input->post(null, TRUE);
		$data = [
			'status' => 'published'
		];
		$where = ['id_article' => $id];
		$this->mg->update('articles', $where, $data);
		$this->session->set_flashdata('data', 'Update');
		redirect('Artikel');
	}

	public function draft($id)
	{
		$in = $this->input->post(null, TRUE);
		$data = [
			'status' => 'draft'
		];
		$where = ['id_article' => $id];
		$this->mg->update('articles', $where, $data);
		$this->session->set_flashdata('data', 'Update');
		redirect('Artikel');
	}

	public function del_blogs($id)
	{
		$data = [
			'id_article' => $id
		];
		$this->mg->delete('articles', $data);
		$this->session->set_flashdata('data', 'Delete');
		redirect('Artikel');
	}
}
