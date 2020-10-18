<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_santri_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// Listing all Santri
	public function edit($data)
	{
		$this->db->where('idsantri', $data['idsantri']);
		$this->db->update('santri',$data);
	
	}


	public function detail($idsantri)
	{  
		
		$query = $this->db->get_where('santri', $idsantri);
		return $query->row();
	}


	
	
}

/* End of file biodata_model */
/* Location: ./application/models/biodata_model */