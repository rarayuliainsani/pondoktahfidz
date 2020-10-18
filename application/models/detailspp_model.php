<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detailspp_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// Listing all Santri
	public function listing()
	{
		$this->db->select('detail_spp.*,spp.bulan,spp.tgl_bayar');
		//$this->db->from('detail_spp');
		$this->db->join('spp','spp.idspp=detail_spp.idspp','left');
		$this->db->order_by('idspp', 'desc');
		$query = $this->db->get_where('detail_spp',array('detail_spp.idspp'));
		return $query->result();
	}

	//Detail User
	public function history($idspp)
	{  
		$this->db->select('*');
		$this->db->from('spp');
		$this->db->where('idspp', $idspp);
		$this->db->order_by('idspp', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file detailspp_model.php */
/* Location: ./application/models/detailspp_model.php */