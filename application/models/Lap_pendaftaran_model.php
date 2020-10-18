<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_pendaftaran_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

     public function getDetailPendaftaran($tahun, $bulan)
    { 
        $sql = "SELECT * From pendaftaran
        
       
        WHERE YEAR(pendaftaran.tgl_daftar) = ?
        AND MONTH(pendaftaran.tgl_daftar) = ? ";
        
        $query = $this->db->query($sql, array($tahun, $bulan));
        return $query->result_array();
      
  
    }
     public function getDetailPendaftaranTahun($tahun)
    { 
        $sql = "SELECT * From pendaftaran
        
       
        WHERE YEAR(pendaftaran.tgl_daftar) = ?";
        
        $query = $this->db->query($sql, array($tahun));
        return $query->result_array();
      
  
    }
	
}
