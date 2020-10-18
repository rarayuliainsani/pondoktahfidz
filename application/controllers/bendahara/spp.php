<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spp extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('spp_model');
		$this->load->model('detailspp_model');
		$this->load->model('santri_model');
		if ($this->session->userdata('level')!="Bendahara") {
	      redirect('login');
	}
}

	//Data User
	public function index()
	{
		$spp = $this->spp_model->listing();

		$data = array('title' => 'Data Pembayaran SPP',
					  'spp'  => $spp,
					  'isi'   => 'bendahara/spp/list'
		        );
		$this->load->view('bendahara/layout/wrapper', $data, FALSE);
	}
	//Tambah User 
	public function tambah()
	{
		

		 $santri=$this->santri_model->listing();
		 $valid = $this->form_validation;

		$valid->set_rules('bulan','Bulan', 'required', 
			array('required'		=> '%s harus diisi'));
		if($valid->run()===FALSE){
		//End validasi
			$data = array('title' => 'Tambah SPP',
						  'santri' => $santri,
						  'idsantri' =>"",
					     'isi'   => 'bendahara/spp/tambah'
		        );
		$this->load->view('bendahara/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$data = array('bulan'		=> $i->post('bulan'),
						  'idsantri'	=> $i->post('idsantri'),
						  'nominal'		=> $i->post('nominal'),
						  'tgl_bayar'		=> $i->post('tgl_bayar'),	
						  'status'		=> $i->post('status'),
						  'tunggakan'	=> $i->post('tunggakan'),
				);
			
			$this->spp_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('bendahara/spp'),'refresh');
		}
		// End masuk database
		
	}

	//Edit User
	public function edit($idspp)
	{
		$spp = $this->spp_model->detail($idspp);
		$santri    = $this->santri_model->listing();

		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('bulan','Bulan', 'required', 
			array('required'		=> '%s harus diisi'));

		if($valid->run()===FALSE){
		//End validasi
			$data = array('title' => 'Edit SPP',
						  'spp'   => $spp,
						  'santri' => $santri,
						  'idsantri' =>"",
					  	  'isi'   => 'bendahara/spp/edit'
		        );
		$this->load->view('bendahara/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$nominal_value = $i->post("nominal_value");
			$nominal_first = $i->post("nominal");
			$nominal = $nominal_value + $nominal_first;
			$data = array('idspp' => $idspp,
						  'bulan'		=> $i->post('bulan'),
						  'idsantri'	=> $i->post('idsantri'),
						  'nominal'		=> $nominal,
						  'tgl_bayar'	=> $i->post('tgl_bayar'),	
						  'status'		=> $i->post('status'),
						  'tunggakan'	=> $i->post('tunggakan'),
			);			  
			$this->spp_model->edit($data, $nominal_first);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('bendahara/spp'),'refresh');
		}
		// End masuk database
		
	}

	// Delete santri
	public function delete($idspp)
	{
		$data = array('idspp' => $idspp );
		$this->spp_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('bendahara/spp'),'refresh');
	}

	public function history($idspp)
	{
		$spp_history = $this->spp_model->history($idspp);
		// print_r($spp_history).die();
		// $idSpp = $this->input->get('idspp');
		$detail_spp= $this->detailspp_model->listing();
		 $data = array('title'   => 'History Angsuran Spp',
                        'detail_spp' =>$detail_spp,
                        // 'idSpp' => $idSpp,
                        'spp'  => $spp_history,
                       'idspp'=>"",
                      'isi'     => 'bendahara/spp/history');
		 $this->detailspp_model->history($idspp);
        $this->load->view('bendahara/layout/wrapper', $data, FALSE);
	}



}

/* End of file santri.php */
/* Location: ./application/controllers/admin/santri.php */