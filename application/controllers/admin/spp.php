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
		if ($this->session->userdata('level')!="Admin") {
	      redirect('login');
	}
}

	//Data User
	public function index()
	{
		$spp = $this->spp_model->listing();

		$data = array('title' => 'Data Pembayaran SPP',
					  'spp'  => $spp,
					  'isi'   => 'admin/spp/list'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
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