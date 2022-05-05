<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_department extends CI_Model
{
    public function view_department(){
        return $this->db->get('department')->result_array();
    }

    public function view_departmentaktif(){
        $this->db->where('status_department','Aktif');
        return $this->db->get('department')->result_array();
    }

    public function create(){
        $query = $this->db->query("SELECT MAX(id_department) as idd FROM department")->row_array()['idd'];
        $urutan = substr($query, 1, 3);
        $urutan++;
        $kodenya = "D" . sprintf("%03s", $urutan);
        // D001

        $namanya = $this->input->post('nama_department', true);
        $data= array(
            "id_department" => $kodenya,
            "nama_department" => $namanya,
            "status_department" => "Aktif"
        );
        $this->db->insert('department', $data);
        $akses = $this->input->post('akses[]',true);
        foreach($akses as $a):
            $akasesnya = $a;
            $data = array(
                "id_list" => $akasesnya,
                "id_department" => $kodenya,
            );
            $this->db->insert('role_list_menu', $data);
        endforeach;   
    }

    public function nonaktifkan($kode){
        $data = array(
            'status_department' => "Nonaktif",
        );

        $this->db->where('id_department', $kode);
        $this->db->update('department', $data);
    }

    public function aktifkan($kode){
        $data = array(
            'status_department' => "Aktif",
        );

        $this->db->where('id_department', $kode);
        $this->db->update('department', $data);
    }

    public function update($kode){
        $data = array(
            'nama_department' => $this->input->post('nama_department', true),
        );
        $this->db->where('id_department', $kode);
        $this->db->update('department', $data);

        // DELETE PROGRAM AKSES DULU
        $this->db->where('id_department', $kode);
        $this->db->delete('role_list_menu');

        // TAMBAH AKSES BARU
        $akses = $this->input->post('akses[]',true);
        foreach($akses as $a):
            $akasesnya = $a;
            $data = array(
                "id_list" => $akasesnya,
                "id_department" => $kode,
            );
            $this->db->insert('role_list_menu', $data);
        endforeach;
    }
}
