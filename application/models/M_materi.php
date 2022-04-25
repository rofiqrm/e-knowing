<?php

class M_materi extends CI_Model
{
    public function tampil_data()
    {
        $this->db->from('el_materi');
        $this->db->order_by("mapel_id asc, id asc");
        $query = $this->db->get(); 
        return $query;
    }

    public function tampil_mapel()
    {
        return $this->db->get('el_mapel');
    }

    public function belajar($id = null)
    {
        $query = $this->db->get_where('el_materi', array('id' => $id))->row();
        return $query;
    }

    public function detail_materi($id = null)
    {
        $query = $this->db->get_where('el_materi', array('id' => $id))->row();
        return $query;
    }

    public function delete_materi($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function update_materi($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function pendahuluan()
    {
        $this->db->where('mapel_id', '1');
        return $this->db->get('el_materi');
    }

    public function pertemuan1()
    {
        $this->db->where('mapel_id','2');
        return $this->db->get('el_materi');
    }

    public function pertemuan2()
    {
        $this->db->where('mapel_id','3');
        return $this->db->get('el_materi');
    }

    public function pertemuan3()
    {
        $this->db->where('mapel_id','4');
        return $this->db->get('el_materi');
    }

    public function pertemuan4()
    {
        $this->db->where('mapel_id','5');
        return $this->db->get('el_materi');
    }

    public function pertemuan5()
    {
        $this->db->where('mapel_id','6');
        return $this->db->get('el_materi');
    }
}