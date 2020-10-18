<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('absensi_model');
		$this->load->model('santri_model');
		$this->load->model('pertemuan_model');
		if ($this->session->userdata('level')!="Admin") {
	      redirect('login');
	  }
	}

	//Data User
	public function index()
	{
		$absensi = $this->absensi_model->listing();

		$pertemuan = $this->pertemuan_model->listing();
		$santri = $this->santri_model->listing();


	

		
		$data = array('title' => 'Data Absensi',
					  'absensi'  => $absensi,
					  'isi'   => 'admin/absensi/list'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}