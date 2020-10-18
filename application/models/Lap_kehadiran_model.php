<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lap_kehadiran_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

   
    public function getDetailKehadiran($tahun, $bulan){
        $sql = "select s.idsantri,s.nama_santri, ifnull(hadir.hadirr,0) as hadir, 
                ifnull(izin.izinn,0)as izin, ifnull(alfa.alfa,0) as alfa,  ifnull(sakit.sakit,0) as sakit from santri s 
                left join (select idsantri, count(keterangan) as hadirr from absensi where keterangan = 'Hadir'
                AND YEAR(absensi.tanggal) = {$tahun} AND MONTH(absensi.tanggal) = {$bulan}  GROUP by idsantri) hadir on (hadir.idsantri = s.idsantri) 
                left join (select idsantri, count(keterangan) as izinn from absensi where keterangan = 'Izin' 
                AND YEAR(absensi.tanggal) = {$tahun} AND MONTH(absensi.tanggal) = {$bulan} GROUP by idsantri) izin on (izin.idsantri = s.idsantri) 
                left join (select idsantri, count(keterangan) as alfa from absensi where keterangan = 'Alfa'  AND YEAR(absensi.tanggal) = {$tahun} AND MONTH(absensi.tanggal) = {$bulan}  GROUP by idsantri) alfa on (alfa.idsantri = s.idsantri)
                left join (select idsantri, count(keterangan) as sakit from absensi where keterangan = 'Sakit'  AND YEAR(absensi.tanggal) = {$tahun} AND MONTH(absensi.tanggal) = {$bulan}  GROUP by idsantri) sakit on (sakit.idsantri = s.idsantri)" ;

        $query = $this->db->query($sql, array($tahun, $bulan));
        return $query->result_array();
    }
    
   
	
}
