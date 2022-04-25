<?php

/**
 * 
 */
class M_komen extends CI_Model
{
	
	public function listkomen($id)
	{
		$query = $this->db->get_where('el_komentar', array('mapel_id' => $id))->result();
        return $query;
	}
}