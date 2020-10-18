<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertemuan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// Listing all Santri
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('pertemuan');
		$this->db->order_by('idpertemuan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail User
	public function detail($idpertemuan)
	{  
		$this->db->select('*');
		$this->db->from('pertemuan');
		$this->db->where('idpertemuan', $idpertemuan);
		$this->db->order_by('idpertemuan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	//Tambah
	public function tambah($data)
	{
		$this->db->insert('pertemuan',$data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('idpertemuan', $data['idpertemuan']);
		$this->db->update('pertemuan',$data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('idpertemuan', $data['idpertemuan']);
		$this->db->delete('pertemuan',$data);
	}

}

/* End of file pertemuan_model.php */
/* Location: ./application/models/pertemuan_model.php */