<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hafalan extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('hafalan_model');
		$this->load->model('santri_model');
		$this->load->model('pengajar_model');
		$this->load->model('surat_model');

		if ($this->session->userdata('level')!="Admin") {
	      redirect('login');
	  }

	}

	//Data User
	public function index()
	{
		$hafalan = $this->hafalan_model->listing();

		$data = array('title' => 'Data Hafalan Santri',
					  'hafalan'  => $hafalan,
					  'isi'   => 'admin/hafalan/list'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	}
/* End of file santri.php */
/* Location: ./application/controllers/admin/santri.php */