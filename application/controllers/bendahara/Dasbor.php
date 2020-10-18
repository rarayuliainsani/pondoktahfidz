<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	//Halaman utama dasbor
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
		//load model dg nama hari_model *huruf kecil aja 
		$this->load->library('session');

	    if ($this->session->userdata('level')!="Bendahara") {
	      redirect('login');
	    }
	}
	public function index()
	{

		$data = array('title' => 'Halaman Bendahara',
					  'isi'   => 'bendahara/dasbor/list'
					  );
		$data['jkpr'] = $this->dashboard_model->get_count('Perempuan');
		$data['jklk'] = $this->dashboard_model->get_count('Laki-Laki');
		$data['totgr'] = $this->dashboard_model->get_countPengajar();	
		$this->load->view('bendahara/layout/wrapper', $data, FALSE);
		if ($this->session->userdata('level')!="Bendahara") {
	      redirect('login');

	}

}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/Admin/Dasbor.php */