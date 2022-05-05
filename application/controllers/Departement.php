<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Departement extends CI_Controller
{
    public function __construct(){
		parent::__construct();
		fungsilogin();
        $data = ['id_travel'];
		hapussession($data);
		$this->load->model('Model_role');
        $this->load->library('form_validation');
        $this->load->model('Model_department');
		
	}

	public function index()
	{
		$login = $this->session->userdata('id_akun');
		$role = $this->session->userdata('id_department');
        date_default_timezone_set('Asia/Jakarta');
		$today = date('Y-m-d');
		$data['history'] = $this->history->view($today);
		
		$data['main']=$this->Model_role->header($role);
		$data['role'] = $role;
		$data['akun'] = $login;
		$data['user'] = $this->db->get_where('akun', array('id_akun' => $login))->row_array();
		$data['title'] = 'Departement';
        $data['view'] = $this->Model_department->view_department();
        $this->load->view('utils/sidebar', $data);
        $this->load->view('master/karyawan/departement');
	}

    public function create_department()
    {

        $this->form_validation->set_rules('nama_department', 'Nama Department', 'trim|required');
        $this->form_validation->set_rules('akses[]', 'Akses', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('data', 'Gagal');
            redirect('Departement');
        } else {
            $this->Model_department->create();
            $this->session->set_flashdata('data', 'Add');
            redirect('Departement');
        }
    }
    public function nonaktif($kode)
    {
        $this->Model_department->nonaktifkan($kode);
        $this->session->set_flashdata('data', 'Nonaktif');
        redirect('Departement');
    }

    public function aktif($kode)
    {
        $this->Model_department->aktifkan($kode);
        $this->session->set_flashdata('data', 'Aktif');
        redirect('Departement');
    }

    public function update_department($kode)
    {
        $this->form_validation->set_rules('nama_department', 'Nama Department', 'trim|required');
        $this->form_validation->set_rules('akses[]', 'Akses', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('data', 'Gagal');
            redirect('Departement');
        } else {
            $this->Model_department->update($kode);
            $this->session->set_flashdata('data', 'Edit');
            redirect('Departement');
        }
    }
}
