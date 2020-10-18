<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('surat_model');
		if ($this->session->userdata('level')!="Pengajar") {
	      redirect('login');
	  }
	}

	//Data User
	public function index()
	{
		$surat = $this->surat_model->listing();

		$data = array('title' => 'Data Surat',
					  'surat'  => $surat,
					  'isi'   => 'pengajar/surat/list'
		        );
		$this->load->view('pengajar/layout/wrapper', $data, FALSE);

	}
	//Tambah User
	public function tambah()
	{
		//Validasi input
		$valid = $this->form_validation;

		

		$valid->set_rules('nama_surat','Nama Surat', 'required', 
			array('required'		=> '%s harus diisi'));

		


		if($valid->run()===FALSE){
		//End validasi
			$data = array('title' => 'Tambah Surat',
					  'isi'   => 'pengajar/surat/tambah'
		        );
		$this->load->view('pengajar/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$data = array(
						  'nama_surat'	=> $i->post('nama_surat'),
						  'jumlah_ayat'		=> $i->post('jumlah_ayat'),
						  		 
				);
			$this->surat_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('pengajar/surat'),'refresh');
		}
		// End masuk database
		
	}

	//Edit User
	public function edit($idsurat)
	{
		$surat = $this->surat_model->detail($idsurat);


		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_surat','Nama Surat', 'required', 
			array('required'		=> '%s harus diisi'));

		if($valid->run()===FALSE){
		//End validasi
			$data = array('title' => 'Edit Surat',
						  'surat'  => $surat,
					  	  'isi'   => 'pengajar/surat/edit'
		        );
		$this->load->view('pengajar/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$data = array('idsurat' => $idsurat,
						  'nama_surat'		=> $i->post('nama_surat'),
						  'jumlah_ayat'		=> $i->post('jumlah_ayat'),
						 
			);			  
			$this->surat_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('pengajar/surat'),'refresh');
		}
		// End masuk database
		
	}

	// Delete santri
	public function delete($idsurat)
	{
		$data = array('idsurat' => $idsurat );
		$this->surat_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('pengajar/surat'),'refresh');
	}



}

/* End of file santri.php */
/* Location: ./application/controllers/admin/santri.php */