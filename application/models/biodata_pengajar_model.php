<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_pengajar_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	
	public function detail($idpengajar)
	{  
		$query = $this->db->get_where('pengajar', $idpengajar);
		//$query = $this->db->get_where();
		return $query->row();
	}

		public function edit($data)
	{
		$this->db->where('idpengajar', $data['idpengajar']);
		$this->db->update('pengajar',$data);

	}
	

}

/* End of file biodata_model */
/* Location: ./application/models/biodata_model */