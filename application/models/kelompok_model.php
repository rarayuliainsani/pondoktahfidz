<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelompok_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// Listing all Santri
	public function listing()
	{
		$this->db->select('kelompok.*,pengajar.nama');
		$this->db->from('kelompok');
		$this->db->join('pengajar','pengajar.idpengajar=kelompok.idpengajar','left');
		$this->db->order_by('idkelompok', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail User
	public function detail($idkelompok)
	{  
		$this->db->select('*');
		$this->db->from('kelompok');
		$this->db->where('idkelompok', $idkelompok);
		$this->db->order_by('idkelompok', 'asc');
		$query = $this->db->get();
		return $query->row();
	}
	
	//Tambah
	public function tambah($data)
	{
		$this->db->insert('kelompok',$data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('idkelompok', $data['idkelompok']);
		$this->db->update('kelompok',$data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('idkelompok', $data['idkelompok']);
		$this->db->delete('kelompok',$data);
	}

}

/* End of file kelompok_model.php */
/* Location: ./application/models/kelompok_model.php */