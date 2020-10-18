<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model {
	
public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// Listing all Santri
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->order_by('idpendaftaran', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail User
	public function detail($idpendaftaran)
	{  
		$this->db->select('*');
		$this->db->from('pendaftaran');
		$this->db->where('idpendaftaran', $idpendaftaran);
		$this->db->order_by('idpendaftaran', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	//Tambah
	public function tambah($data)
	{
		$this->db->insert('pendaftaran',$data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('idpendaftaran', $data['idpendaftaran']);
		$this->db->update('pendaftaran',$data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('idpendaftaran', $data['idpendaftaran']);
		$this->db->delete('pendaftaran',$data);
	}

	public function getPendidikan(){
        $query = $this->db->get('pendidikan');
        return $query;  
    }
 
    public function getKelas($kelas){
        $query = $this->db->get_where('kelas', array('kelas_pendidikan' => $pendidikan));
        return $query;
    }

}

/* End of file pendaftaran_model.php */
/* Location: ./application/models/pendaftaran_model.php */