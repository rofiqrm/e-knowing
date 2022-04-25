<?php

class m_angket extends CI_ModeL {
    
    public function insert_data($data)
    {
        $this->db->insert("el_angket", $data);
    }

    public function fetch_data()
    {
        return $this->db->get('el_angket')->result();
    }

    public function data_angket($id)
    {
        return $this->db->get_where('el_angket', ['id' => $id])->row();
    }

    public function ambil_data($id = null)
    {
        return $this->db->get_where('el_isi_angket', ['angket_id' => $id])->result();
    }

    public function delete_angket($where)
    {
        $this->db->where($where);
        $this->db->delete('el_angket');
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function insert_jawaban_angket($data)
    {
        $this->db->insert("el_jawaban_angket", $data);
    }

    public function delete_pernyataan($where)
    {
        $this->db->where($where);
        $this->db->delete('el_isi_angket');
    }

    public function ambil_jawaban($id = null)
    {
        return $this->db->get_where('el_jawaban_angket', ['angket_id' => $id])->result();
    }

}
?>
