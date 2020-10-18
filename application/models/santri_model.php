<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri_model extends CI_Model {
public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// Listing all Santri
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('santri');
		$this->db->order_by('idsantri', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail User
	public function detail($idsantri)
	{  
		$this->db->select('*');
		$this->db->from('santri');
		$this->db->where('idsantri', $idsantri);
		$this->db->order_by('idsantri', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	//Tambah
	public function tambah($data)
	{
		$this->db->insert('santri',$data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('idsantri', $data['idsantri']);
		$this->db->update('santri',$data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('idsantri', $data['idsantri']);
		$this->db->delete('santri',$data);
	}

}

/* End of file santri_model.php */
/* Location: ./application/models/santri_model.php */