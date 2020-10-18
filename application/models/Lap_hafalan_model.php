<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_hafalan_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

     public function getDetailHafalan($idsantri)
    { 
      
        $sql ="SELECT h.tanggal as tanggal, s1.nama_surat as ds, h.dari_ayat , s2.nama_surat as ss, h.sampai_ayat, s3.nama_santri
          FROM hafalan h
          LEFT JOIN surat s1
          ON h.dari_surat=s1.idsurat
          LEFT JOIN surat s2
          ON h.sampai_surat=s2.idsurat
          Left JOIN santri s3
          ON h.idsantri = s3.idsantri
          WHERE h.idsantri={$idsantri}"; 
        
    $query = $this->db->query($sql);
        return $query->result_array();
      
    }
     
    
	
}
