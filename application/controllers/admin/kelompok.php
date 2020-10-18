<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelompok extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kelompok_model');
		$this->load->model('pengajar_model');

		if ($this->session->userdata('level')!="Admin") {
	      redirect('login');
	  }
	}

	//Data User
	public function index()
	{
		$kelompok = $this->kelompok_model->listing();

		$data = array('title' => 'Data Kelompok',
					  'kelompok'  => $kelompok,
					  'isi'   => 'admin/kelompok/list'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//Tambah User
	public function tambah()
	{
		//Validasi input
		$pengajar=$this->pengajar_model->listing();
		$valid = $this->form_validation;

		$valid->set_rules('kdkelompok','Kode Kelompok', 'required', 
			array('required'		=> '%s harus diisi'));

		if($valid->run()===FALSE){
		//End validasi
			$data = array('title' => 'Tambah Kelompok',
				'pengajar' =>$pengajar,
				'idpengajar' =>"",
					  'isi'   => 'admin/kelompok/tambah'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$data = array('kdkelompok'		=> $i->post('kdkelompok'),
						  'namakelompok'	=> $i->post('namakelompok'),
						  'kategori_kelompok'=> $i->post('kategori_kelompok'),
						  'idpengajar'		=> $i->post('idpengajar'),	 
				);
			$this->kelompok_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/kelompok'),'refresh');
		}
		// End masuk database
		
	}

	//Edit User
	public function edit($idkelompok)
	{
		$kelompok = $this->kelompok_model->detail($idkelompok);
		$pengajar = $this->pengajar_model->listing();

		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('kdkelompok','Kode Kelompok', 'required', 
			array('required'		=> '%s harus diisi'));

		if($valid->run()===FALSE){
		//End validasi
			$data = array('title' => 'Edit Kelompok',
						  'kelompok'  => $kelompok,
						  'pengajar' =>$pengajar,
						  'idkelompok' =>"",
						  'idpengajar' =>"",
					  	  'isi'   => 'admin/kelompok/edit'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$data = array('idkelompok'		=> $idkelompok,
						  'kdkelompok'		=> $i->post('kdkelompok'),
						  'namakelompok'	=> $i->post('namakelompok'),
						  'kategori_kelompok' => $i->post('kategori_kelompok'),
						  'idpengajar'		=> $i->post('idpengajar'),
			);			  
			$this->kelompok_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/kelompok'),'refresh');
		}
		// End masuk database
		
	}

	// Delete santri
	public function delete($idkelompok)
	{
		$data = array('idkelompok' => $idkelompok );
		$this->kelompok_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/kelompok'),'refresh');
	}



}

/* End of file santri.php */
/* Location: ./application/controllers/admin/santri.php */