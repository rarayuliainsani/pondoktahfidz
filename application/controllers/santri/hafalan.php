<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hafalan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('hafalan_model');
		$this->load->model('surat_model');

		$this->username = $this->session->userdata('username');
		$this->id_user = $this->session->userdata('id_user');
		if ($this->session->userdata('level')!="Santri") {
	      redirect('login');
		}

	}

	
	public function index()
	{
		
		$data['hafalan'] = $this->hafalan_model->data_hafalan($this->username);
		
		// Print_r($data['hafalan']);die();
		// print_r($data['santri']);exit();
		$data = array('title' => 'Hafalan Santri',
					  'hafalan' => $data['hafalan'],
					  'isi'   => 'santri/hafalan/list'
		        );
		$this->load->view('santri/layout/wrapper', $data, FALSE);

	
	}
}