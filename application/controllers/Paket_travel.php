<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket_travel extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		fungsilogin2();
		$data = [];
		hapussession($data);
		$this->load->model('Model_role');
		$this->load->model('Model_general', 'mg');
	}

	public function index(){
		if($this->session->userdata('id_travel')){
			$login = $this->session->userdata('id_akun');
			$role = $this->session->userdata('id_department');
			$data['main']=$this->Model_role->header($role);
			$data['role'] = $role;
			$data['akun'] = $login;
			$data['id_agent'] = $this->session->userdata('id_travel');
			$data['user'] = $this->db->get_where('akun', array('id_akun' => $login))->row_array();

			// Get Data Travel
			$wheretravel = ['id_agent' => $data['id_agent']];
			$data['travel'] = $this->mg->getwhere('*','agent', $wheretravel)->row_array();
			$data['paket'] = $this->mg->getwhere('*', 'paket', $wheretravel)->result_array();

			$data['title'] = 'Detail Penjualan';
			$this->load->view('utils/sidebar', $data);
			$this->load->view('master/travel_agent/paket_travel');
		} else {
			redirect('Travel_agent');
		}
	}

	public function getid($id){
		$data = [
			'id_travel' => $id
		];
		$this->session->set_userdata($data);
		redirect('Paket_travel');
	}

	public function createpaket(){
		$this->form_validation->set_rules('nama_paket', 'Nama Paket', 'trim|required');
        $this->form_validation->set_rules('harga_paket', 'Harga Paket', 'trim|required');
		if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('data', 'Gagal');
        } else {
			if(@$_FILES['thumbnail']['name'] && @$_FILES['guide']['name']){
				$idagent = $this->session->userdata('id_travel');
				$idpakets = "PKT" . $idagent;
				$this->db->select_max('id_paket');
				$this->db->like('id_paket', $idpakets, 'after');
				$query = $this->db->get('paket')->row_array()['id_paket'];
				if(!$query){
					$urutan = 0;
				} else {
					$urutan = substr($query, 10, 4);
				}
				$urutan++;
				$kodenya = $idpakets . sprintf("%04s", $urutan);
				// PKTTRV00010001
				$in = $this->input->post(null, TRUE);
	
				// CREATE DATA PAKET
				$data = [
					'id_paket' => $kodenya,
					'nama_paket' => $in['nama_paket'],
					'harga_paket' => $in['harga_paket'],
					'id_agent' => $idagent,
				];
				$this->mg->create('paket', $data);

				// UPLOAD GAMBAR
				if(@$_FILES['thumbnail']['name']){
					date_default_timezone_set('Asia/Jakarta');
					$config['upload_path'] = './uploads/thumbnail';
					$config['allowed_types'] = 'jpg|png|jpeg';
					$config['max_size'] = '2048';
					$config['file_name'] = $kodenya.date('ymd').'-'.substr(md5(rand()),0,10);
					$this->load->library('upload', $config);
					if($this->upload->do_upload('thumbnail')){
						$gambar = $this->upload->data('file_name');
						$size = getimagesize($this->upload->data('full_path'));
						$config['image_library'] = 'gd2';
						$config['source_image'] = './uploads/thumbnail/'.$gambar;
						$config['maintain_ratio'] = FALSE;
						$config['create_thumb'] = FALSE;
						$config['quality'] = '100%';
						if($size[0]>$size[1]){
							$config['width'] = $size[1];
							$config['height'] = $size[1];
							$config['x_axis']=($size[0]-$size[1])/2;
							$config['y_axis']=0;
						} else {
							$config['width'] = $size[0];
							$config['height'] = $size[0];
							$config['x_axis']=0;
							$config['y_axis']=($size[1]-$size[0])/2;
						}
						$config['new_image'] = './uploads/thumbnail/'.$gambar;
						$this->load->library('image_lib', $config);
						$this->image_lib->crop();

						// UPDATE DB
						$wherepaket = ['id_paket' => $kodenya];
						$datathumbnail = ['thumbnail' => $gambar];
						$this->mg->update('paket', $wherepaket, $datathumbnail);
					} else{
						// GAGAL UPLOAD
						$wherepaket = ['id_paket' => $kodenya];
						$this->mg->delete('paket', $wherepaket);
						$this->session->set_flashdata('data', 'Foto');
						// Gagal mengupload Foto
						redirect('Paket_travel');
					}
				}

				// Upload PDF
				if(@$_FILES['guide']['name']){
					date_default_timezone_set('Asia/Jakarta');
					$configpdf['upload_path'] = './uploads/guide';
					$configpdf['allowed_types'] = 'pdf';
					$configpdf['max_size'] = 0;
					$configpdf['file_name'] = $kodenya.date('ymd').'-'.substr(md5(rand()),0,10);
					$this->load->library('upload', $configpdf);
					$this->upload->initialize($configpdf);
					if($this->upload->do_upload('guide')){
						// Update DB
						$pdf = $this->upload->data('file_name');
						$wherepaket = ['id_paket' => $kodenya];
						$datapdf = ['guide_travel' => $pdf];
						$this->mg->update('paket', $wherepaket, $datapdf);
					} else{
						// GAGAL UPLOAD
						$file = './uploads/guide/'.$gambar;
						unlink($file);
						$wherepaket = ['id_paket' => $kodenya];
						$this->mg->delete('paket', $wherepaket);
						$this->session->set_flashdata('data', 'Guide');
						// Gagal Menguopload PDF Guide
						redirect('Paket_travel');
					}
				}
	
				// CREATE TUJUAN WISATA
				$wisata = $in['wisata'];
				$cw = count($wisata);
				for($i=0; $i < $cw; $i++){
					$dataw = [
						'tujuan_wisata' => $wisata[$i],
						'id_paket' => $kodenya,
					]; 
					$this->mg->create('tujuan_wisata', $dataw);
				}
	
				// CREATE Fasilitas
				$fasilitas = $in['fasilitasw'];
				$cf = count($fasilitas);
				for($i=0; $i < $cf; $i++){
					$dataf = [
						'fasilitas_wisata' => $fasilitas[$i],
						'id_paket' => $kodenya,
					]; 
					$this->mg->create('fasilitas', $dataf);
				}
	
				// CREATE TITIK Kumpul
				$tikum = $in['tikum'];
				$ct = count($tikum);
				for($i=0; $i < $ct; $i++){
					$datat = [
						'nama_tikum' => $tikum[$i],
						'id_paket' => $kodenya,
					]; 
					$this->mg->create('titik_kumpul', $datat);
				}
	
				// CREATE Fasilitas
				$berangkat = $in['berangkat'];
				$pulang = $in['berangkatend'];
				$cb = count($berangkat);
				for($i=0; $i < $cb; $i++){
					$datab = [
						'tanggal_berangkat' => date('Y-m-d', strtotime($berangkat[$i])),
						'tanggal_berangkat_end' => date('Y-m-d', strtotime($pulang[$i])),
						'status_berangkat' => 'BUKA',
						'id_paket' => $kodenya,
					]; 
					$this->mg->create('keberangkatan', $datab);
				}
				$this->session->set_flashdata('data', 'Add');
			} else {
				// Upload Semua FIle
				$this->session->set_flashdata('data', 'File');
				redirect('Paket_travel');
			}
			
		}
		redirect('Paket_travel');
	}

	public function hapuspaket($id)
	{
		$hasil = $this->db->get_where('pemesanan', ['id_paket'=>$id])->row_array()['id_pemesanan'];
		if(!$hasil){
			$data = [
				'id_paket' => $id
			];
			$image = $this->mg->getwhere('thumbnail','paket', $data )->row_array()['thumbnail'];
			$file = './uploads/thumbnail/'.$image;
			unlink($file);

			$guide = $this->mg->getwhere('guide_travel','paket', $data )->row_array()['guide_travel'];
			$fileg = './uploads/guide/'.$guide;
			unlink($fileg);
			$this->mg->delete('paket', $data);
			$this->mg->delete('titik_kumpul', $data);
			$this->mg->delete('tujuan_wisata', $data);
			$this->mg->delete('fasilitas', $data);
			$this->mg->delete('keberangkatan', $data);
			$this->session->set_flashdata('data', 'Delete');
		}
		redirect('Paket_travel');
	}
}
