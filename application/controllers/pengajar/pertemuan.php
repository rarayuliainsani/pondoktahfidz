<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pertemuan extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pertemuan_model');
		if ($this->session->userdata('level')!="Pengajar") {
	      redirect('login');
	  }
	}

	//Data User
	public function index()
	{
		$pertemuan = $this->pertemuan_model->listing();

		$data = array('title' => 'Data Pertemuan',
					  'pertemuan'  => $pertemuan,
					  'isi'   => 'pengajar/pertemuan/list'
		        );
		$this->load->view('pengajar/layout/wrapper', $data, FALSE);

		
	}
	//Tambah User 
	public function tambah()
	{

		 $valid = $this->form_validation;

		$valid->set_rules('pertemuanke','Pertemuan Ke', 'required', 
			array('required'		=> '%s harus diisi'));
		if($valid->run()===FALSE){
		//End validasi
			$data = array('title' => 'Tambah Pertemuan',
					     'isi'   => 'pengajar/pertemuan/tambah'
		        );
		$this->load->view('pengajar/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$data = array(
						 'pertemuanke' => $i->post('pertemuanke'),
						  'tempat'		=> $i->post('tempat'),
						  'tanggal'		=> $i->post('tanggal'),		 
				);
			$this->pertemuan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('pengajar/pertemuan'),'refresh');
		}
		// End masuk database
		
	}

	//Edit User
	public function edit($idpertemuan)
	{
		$pertemuan = $this->pertemuan_model->detail($idpertemuan);

		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('pertemuanke','Pertemuan Ke', 'required', 
			array('required'		=> '%s harus diisi'));

		if($valid->run()===FALSE){
		//End validasi
			$data = array('title' => 'Edit Pertemuan',
						  'pertemuan'  => $pertemuan,
					  	  'isi'   => 'pengajar/pertemuan/edit'
		        );
		$this->load->view('pengajar/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$data = array('idpertemuan' => $idpertemuan,
						  
						  'pertemuanke' => $i->post('pertemuanke'),
						  'tempat'		=> $i->post('tempat'),
						  'tanggal'		=> $i->post('tanggal'),
			);			  
			$this->pertemuan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('pengajar/pertemuan'),'refresh');
		}
		// End masuk database
		
	}

	// Delete santri
	public function delete($idpertemuan)
	{
		$data = array('idpertemuan' => $idpertemuan );
		$this->pertemuan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('pengajar/pertemuan'),'refresh');
	}



}

/* End of file santri.php */
/* Location: ./application/controllers/admin/santri.php */