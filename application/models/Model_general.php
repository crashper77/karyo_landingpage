<?php 
class Model_general extends CI_Model {
    // Create
    public function create($table, $data){
        $this->db->insert($table, $data);
    }

    // Read
    public function get($from){
        return $this->db->get($from)->result_array();
    }

    public function getwhere($select, $from, $where){
        $this->db->select($select);
        $this->db->from($from);
        $this->db->where($where);
        return $this->db->get();
    }
    public function getwherelimit($select, $from, $where, $limit)
    {
        $this->db->select($select);
        $this->db->from($from);
        $this->db->where($where);
        $this->db->limit($limit);
        return $this->db->get();
    }

    public function getlimit($from, $limit)
    {
        $this->db->from($from);
        $this->db->limit($limit);
        return $this->db->get();
    }

    public function get_multiplejoin($select, $from, $table1, $joined1, $table2, $joined2)
    {
        $this->db->select($select);
        $this->db->from($from);
        $this->db->join($table1, $joined1);
        $this->db->join($table2, $joined2);
        return $this->db->get();
    }

    // Update
    public function update($table, $where, $data){
        $this->db->where($where);
        $this->db->update($table, $data);
    }


    // Delete
    public function delete($table, $where){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function sum_data($table)
    {
        return $this->db->count_all($table);
    }
}