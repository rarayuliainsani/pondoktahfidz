<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_pendapatan_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

     public function getDetailPendapatan($tahun, $bulan)
    { 
        $sql = "SELECT * , santri.nama_santri From spp
        
       LEFT JOIN santri ON (spp.idsantri = santri.idsantri)
        WHERE YEAR(spp.tgl_bayar) = ?
        AND MONTH(spp.tgl_bayar) = ? ";
        
        $query = $this->db->query($sql, array($tahun, $bulan));
        return $query->result_array();
      
  
    }
	
}
