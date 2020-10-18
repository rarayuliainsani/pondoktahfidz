<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajar_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// Listing all Santri
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('pengajar');
		$this->db->order_by('idpengajar', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail User
	public function detail($idpengajar)
	{  
		$this->db->select('*');
		$this->db->from('pengajar');
		$this->db->where('idpengajar', $idpengajar);
		$this->db->order_by('idpengajar', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	//Tambah
	public function tambah($data)
	{
		$this->db->insert('pengajar',$data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('idpengajar', $data['idpengajar']);
		$this->db->update('pengajar',$data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('idpengajar', $data['idpengajar']);
		$this->db->delete('pengajar',$data);
	}

}

/* End of file pengajar_model.php */
/* Location: ./application/models/pengajar_model.php */