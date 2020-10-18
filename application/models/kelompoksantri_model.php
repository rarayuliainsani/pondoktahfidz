<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelompokSantri_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// Listing all Santri
	public function listing()
	{
		$this->db->select('kelompoksantri.*,santri.nama_santri,santri.jenis_kelamin,kelompok.kdkelompok,kelompok.namakelompok,kelompok.kategori_kelompok,pengajar.nama');
		$this->db->join('santri','santri.idsantri=kelompoksantri.idsantri','left');
		$this->db->join('kelompok','kelompok.idkelompok=kelompoksantri.idkelompok','kelompok.idpengajar=kelompoksantri.idpengajar','left');
		$this->db->join('pengajar','pengajar.idpengajar=kelompok.idpengajar','left');
		$this->db->from('kelompoksantri');

		$this->db->order_by('idkelompoksantri', 'desc');
		
		$query = $this->db->get();
		return $query->result();
	}

	//Detail User
	public function detail($idkelompoksantri)
	{  
		$this->db->select('*');
		$this->db->from('kelompoksantri');
		$this->db->where('idkelompoksantri', $idkelompoksantri);
		$this->db->order_by('idkelompoksantri', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	//Tambah
	public function tambah($data)
	{
		$this->db->insert('kelompoksantri',$data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('idkelompoksantri', $data['idkelompoksantri']);
		$this->db->update('kelompoksantri',$data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('idkelompoksantri', $data['idkelompoksantri']);
		$this->db->delete('kelompoksantri',$data);
	}

}

/* End of file kelompoksantri_model.php */
/* Location: ./application/models/kelompoksantri_model.php */