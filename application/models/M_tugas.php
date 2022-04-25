<?php 
	/**
	 * 
	 */
	class M_tugas extends CI_Model
	{
		
		public function tampil_data()
		{
			return $this->db->get('el_tugas');
		}

		public function tampil_tugas($id = null)
		{
			$query = $this->db->get_where('el_tugas', array('mapel_id' => $id))->row();
        	return $query;
		}

		public function delete_tugas($where, $table)
	    {
	        $this->db->where($where);
	        $this->db->delete($table);
	    }

	    public function update_tugas($where, $table)
	    {
	        return $this->db->get_where($table, $where);
	    }

	    public function tampil_jawaban()
	    {
	    	return $this->db->get('el_nilai_tugas');
	    }

	    public function insert_jawaban($data)
	    {
	       $q = $this->db->get_where('el_nilai_tugas', array(
	       	'tugas_id' => $data['tugas_id'],
	       	'siswa_id' => $data['siswa_id']
	       ));

		   if ( $q->num_rows() > 0 ) 
		   {
		      $this->db->where(array(
	       	'tugas_id' => $data['tugas_id'],
	       	'siswa_id' => $data['siswa_id']
	       ));
		      $this->db->update('el_nilai_tugas', $data);
		   } else {
		      $this->db->insert("el_nilai_tugas", $data);
		   }
	    }

	    public function update_nilai($where, $nilai)
	    {
	        $this->db->where($where);
	        $this->db->update('el_nilai_tugas', $nilai);
	    }
	}
?>