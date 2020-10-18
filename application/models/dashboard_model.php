<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function get_count($jenis_kelamin){
		$sql = "SELECT count(jenis_kelamin) as jenis_kelamin
				FROM santri
				WHERE jenis_kelamin = ?";
		$query = $this->db->query($sql, array($jenis_kelamin));
		return $query->row()->jenis_kelamin;
	}

	public function get_countPengajar($nip = NULL) {
		$sql = "SELECT * 
				FROM pengajar";
		if($nip){
			$sql .= " WHERE nip = ?";  
		}
		$query = $this->db->query($sql, $nip);
		return $query->num_rows(); 
	}

}

/* End of file dashboard_model.php */
/* Location: ./application/models/dashboard_model.php */