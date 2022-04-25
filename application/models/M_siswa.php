<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_siswa extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function tampil_data()
    {
        return $this->db->get('el_siswa');
    }

    public function detail_siswa($id = null)
    {
        $query = $this->db->get_where('el_siswa', array('id' => $id))->row();
        return $query;
    }

    public function delete_siswa($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_siswa($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function insert($data){
        $insert = $this->db->insert_batch('el_siswa', $data);
        if($insert){
            return true;
        }
    }
}