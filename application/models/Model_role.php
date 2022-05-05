<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_role extends CI_Model
{
    public function header($id)
    {
        $this->db->select('nama_menu, header_menu.menu_id, class_header');
        $this->db->from('role_list_menu');
        $this->db->join('list_menu', 'role_list_menu.id_list=list_menu.id_list');
        $this->db->join('sub_menu', 'sub_menu.sub_menu_id=list_menu.sub_menu_id');
        $this->db->join('header_menu', 'header_menu.menu_id=sub_menu.menu_id');
        $this->db->where('id_department', $id);
        $this->db->group_by('nama_menu');
        // SELECT `nama_sub_menu` FROM `role_list_menu` JOIN `list_menu`,`sub_menu` WHERE `role_list_menu`.`id_list`=`list_menu`.`id_list` AND `sub_menu`.`sub_menu_id`=`list_menu`.`sub_menu_id`;
        // $this->db->where('id_akun', $id);
        // $this->db->where('status_akun', 'Aktif');
        return $this->db->get()->result_array();
    }
}
