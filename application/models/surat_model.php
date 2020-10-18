<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// Listing all Santri
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('surat');
		$this->db->order_by('idsurat', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail User
	public function detail($idsurat)
	{  
		$this->db->select('*');
		$this->db->from('surat');
		
		$this->db->order_by('idsurat', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	//Tambah
	public function tambah($data)
	{
		$this->db->insert('surat',$data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('idsurat', $data['idsurat']);
		$this->db->update('surat',$data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('idsurat', $data['idsurat']);
		$this->db->delete('surat',$data);
	}

}

/* End of file surat_model.php */
/* Location: ./application/models/surat_model.php */