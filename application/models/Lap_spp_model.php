<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_spp_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

     public function getDetailSpp($idsantri)
    { 
        $sql = "SELECT * , santri.nama_santri From spp
        
       LEFT JOIN santri ON (spp.idsantri = santri.idsantri)
        WHERE spp.idsantri={$idsantri}"; 
        
        $query = $this->db->query($sql);
        return $query->result_array();
      
  
    }
	
}
