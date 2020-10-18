<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spp_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	// Listing all Santri
	public function listing()
	{
		$this->db->select('spp.*,santri.nama_santri');
		$this->db->from('spp');

		$this->db->order_by('idspp', 'desc');
		$this->db->join('santri','santri.idsantri=spp.idsantri','left');
		$query = $this->db->get();
		return $query->result();
	}

	//Detail User
	public function detail($idspp)
	{  
		$this->db->select('*');
		$this->db->from('spp');
		$this->db->where('idspp', $idspp);
		$this->db->order_by('idspp', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function data_spp($username){
		$id_santri = $this->db->query("select idsantri from santri where kode_santri ='$username'")->result();
		$id = $id_santri[0]->idsantri;
		$data = $this->db->query("select * from spp where idsantri = '$id'")->result_array();
		return $data;
	}

	
	//Tambah
	public function tambah($data)
	{
		$this->db->insert('spp',$data);
		$insert_id = $this->db->insert_id();
		$nominal = $data['nominal'];
		$tgl_bayar = $data['tgl_bayar'];
		$data_history = array('idspp' => $insert_id,
							   'pembayaran' => $nominal,
							   'tgl_bayar'	=> $tgl_bayar);
		$this->db->insert('detail_spp', $data_history);
	}

	// Edit
	public function edit($data, $nominal)
	{
		$this->db->where('idspp', $data['idspp']);
		$this->db->update('spp',$data);
		$tgl_bayar = $data['tgl_bayar'];
		$data_history = array('idspp' => $data['idspp'],
							   'pembayaran' => $nominal,
							   'tgl_bayar'	=> $tgl_bayar);
		$this->db->insert('detail_spp', $data_history);
	}

	// Delete
	public function delete($data)
	{
		$this->db->where('idspp', $data['idspp']);
		$this->db->delete('spp',$data);
	}
	public function history($idspp)
	{
		$query = $this->db->query("select b.bulan, a.pembayaran, a.tgl_bayar from detail_spp a left join spp b on a.idspp = b.idspp where a.idspp='$idspp' ");
		return $query->result();

		// $this->db->select('detail_spp.pembayaran,spp.bulan,spp.tgl_bayar');
		// $this->db->join('detail_spp','detail_spp.idspp=spp.idspp','left');
		// $query = $this->db->get();
		// return $query->result();
	}

	// public function history($data)
	// {
	// 	$this->db->where('idspp', $data['idspp']);

	// 	// $this->db->select('detail_spp.pembayaran,spp.bulan,spp.tgl_bayar');
	// 	// $this->db->join('detail_spp','detail_spp.idspp=spp.idspp','left');
	// 	// $query = $this->db->get();
	// 	// return $query->result();
	// }

}

/* End of file spp_model.php */
/* Location: ./application/models/spp_model.php */