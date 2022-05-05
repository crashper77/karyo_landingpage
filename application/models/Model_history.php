<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_history extends CI_Model
{
    public function add($akun, $pesan, $halaman){
        date_default_timezone_set('Asia/Jakarta');
        $today = 'H'.date('dmY');
        $query = $this->db->query("SELECT MAX(id_history) as idh FROM history WHERE id_history LIKE '$today%'")->row_array()['idh'];
        if (!$query) {
            $urutan = 0;
        } else {
            $urutan = (int) substr($query, 9, 5);
        }
        $urutan++;
        $kodenya = $today.sprintf("%05s", $urutan);
        $tanggal = date('Y-m-d');
        $waktu = date('H:i:s');
        //H08112021 00001

        if($pesan=='add'){
            $send = 'Telah menambahkan data di halaman';
        } elseif($pesan == 'update'){
            $send = 'Telah mengubah data di halaman';
        } elseif($pesan== 'delete'){
            $send = 'Telah menghapus data di halaman';
        } elseif($pesan == 'aktif'){
            $send = 'Telah mengaktifkan data di halaman';
        } elseif($pesan == 'nonaktif'){
            $send = 'Telah menonaktifkan data di halaman';
        }
        $data = array(
            'id_history' => $kodenya,
            'id_akun' => $akun,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
            'pesan' => $send,
            'halaman' => $halaman
        );
        $this->db->insert('history', $data);
    }

    public function view($tanggal){
        $this->db->select('*');
        $this->db->from('history');
        $this->db->where('tanggal', $tanggal);
        $this->db->join('akun', 'history.id_akun=akun.id_akun');
        $this->db->order_by('id_history', 'DESC');
        $this->db->limit(5);
        return $this->db->get()->result_array();
    }

    public function viewdaily($hari){
        $this->db->select('*');
        $this->db->from('history');
        $this->db->where('tanggal', $hari);
        $this->db->join('akun', 'history.id_akun=akun.id_akun');
        $this->db->order_by('id_history', 'DESC');
        return $this->db->get()->result_array();
    }
    public function viewmonthly($bulan){
        $this->db->select('*');
        $this->db->from('history');
        $this->db->like('tanggal', $bulan, 'after');
        $this->db->join('akun', 'history.id_akun=akun.id_akun');
        $this->db->order_by('id_history', 'DESC');
        return $this->db->get()->result_array();
    }
}