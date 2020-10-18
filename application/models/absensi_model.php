<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// Listing all Santri
	public function listing()
	{
		$this->db->select('absensi.*,santri.nama_santri,pertemuan.pertemuanke, pengajar.nama');
		$this->db->from('absensi');
		$this->db->join('santri','santri.idsantri=absensi.idsantri','left');
		$this->db->join('pertemuan','pertemuan.idpertemuan=absensi.idpertemuan', 'pertemuan.tanggal=absensi.tanggal','left');
		$this->db->join('pengajar','pengajar.idpengajar=absensi.idpengajar','left');
		$this->db->order_by('idabsensi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail User
	public function detail($idabsensi)
	{  
		$this->db->select('*');
		$this->db->from('absensi');
		$this->db->where('idabsensi', $idabsensi);
		$this->db->order_by('idabsensi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	//Tambah
	public function tambah($data)
	{
		$this->db->insert('absensi',$data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('idabsensi', $data['idabsensi']);
		$this->db->update('absensi',$data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('idabsensi', $data['idabsensi']);
		$this->db->delete('absensi',$data);
	}

}

/* End of file absensi_model.php */
/* Location: ./application/models/absensi_model.php */