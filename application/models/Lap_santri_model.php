<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_santri_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

     public function getDetailSantri($kategori_kelompok)
    { 
        $sql = "SELECT * , santri.nama_santri,santri.jenis_kelamin,santri.nohp,kelompok.namakelompok,kelompok.idpengajar From kelompoksantri
        
       LEFT JOIN santri ON (kelompoksantri.idsantri = santri.idsantri)
       LEFT JOIN kelompok ON (kelompoksantri.idkelompok = kelompok.idkelompok)
       LEFT JOIN pengajar ON (kelompoksantri.idpengajar= pengajar.idpengajar)
        WHERE (kelompoksantri.kategori_kelompok) = ? ";
    
        
        $query = $this->db->query($sql, array($kategori_kelompok));
        return $query->result_array();
      
  
    }
    
}
