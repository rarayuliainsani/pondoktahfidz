<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hafalan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// Listing all Santri
	public function listing()
	{
		$this->db->select('hafalan.*,santri.nama_santri,pengajar.nama,surat.nama_surat');
		$this->db->from('hafalan');
		$this->db->join('santri','santri.idsantri=hafalan.idsantri','left');
		$this->db->join('pengajar','pengajar.idpengajar=hafalan.idpengajar','left');
		$this->db->join('surat', 'surat.idsurat = hafalan.dari_surat', 'surat.idsurat = hafalan.sampai_surat', 'left');

		$this->db->order_by('idhafalan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail User
	public function detail($idhafalan)
	{  
		$this->db->select('*');
		$this->db->from('hafalan');
		$this->db->get_where('idhafalan', $idhafalan);
		$this->db->order_by('idhafalan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function data_hafalan($username){
		$id_santri = $this->db->query("select idsantri from santri where kode_santri ='$username'")->result();
		$id = $id_santri[0]->idsantri;
		$data = $this->db->query("select * from hafalan h  LEFT JOIN surat s1
          ON h.dari_surat=s1.idsurat
          LEFT JOIN surat s2
          ON h.sampai_surat=s2.idsurat where idsantri = '$id'")->result_array();
		return $data;
	}

	
	//Tambah
	public function tambah($data)
	{
		$this->db->insert('hafalan',$data);
	}

	// Edit
	public function edit($data)
	{
		$this->db->where('idhafalan', $data['idhafalan']);
		$this->db->update('hafalan',$data);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('idhafalan', $data['idhafalan']);
		$this->db->delete('hafalan',$data);
	}

	public function getSurat(){
	  return $this->db->get("surat");
	  }

	  public function getSuratby($idsurat){
	  $this->db->select('nama_surat');
	  $this->db->where('idsurat', $idsurat);
	  $this->db->limit(1);
	  return $this->db->get("surat")->row();
	  }

}

/* End of file hafalan_model.php */
/* Location: ./application/models/hafalan_model.php */