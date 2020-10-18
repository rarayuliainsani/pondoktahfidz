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

		if ($this->session->userdata('level')!="Pengajar") {
	      redirect('login');
	  }

	}

	//Data User
	public function index()
	{
		$hafalan = $this->hafalan_model->listing();

		$data = array('title' => 'Data Hafalan Santri',
					  'hafalan'  => $hafalan,
					  'isi'   => 'pengajar/hafalan/list'
		        );
		$this->load->view('pengajar/layout/wrapper', $data, FALSE);
	}
	//Tambah User
	public function tambah()
	{
		$data['santri']=$this->santri_model->listing();
		$data['pengajar']=$this->pengajar_model->listing();
		$data['surat']=$this->surat_model->listing();
		$data['surat2']=$this->surat_model->listing();

		
		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('idsantri','Nama Santri', 'required', 
			array('required'		=> '%s harus diisi'));



		if($valid->run()===FALSE){
		//End validasi
			$data = array('title' => 'Tambah Hafalan',
						  'santri'=>$data['santri'],
						  'idsantri'=>"",
						  'pengajar'=>$data['pengajar'],
						  'idpengajar'=>"",
						  'surat'=>$data['surat'],
						  'surat2'=>$data['surat2'],
						  'idsurat'=>"",

					  'isi'   => 'pengajar/hafalan/tambah'
		        );
		$this->load->view('pengajar/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$data = array(
						  'idsantri'		 => $i->post('idsantri'),
						  'idpengajar'		=> $i->post('idpengajar'),
						  'tanggal'			 => $i->post('tanggal'),
						  'dari_ayat'		=> $i->post('dari_ayat'),
						  'dari_surat'		=> $i->post('dari_surat'),
						  'sampai_ayat'		=> $i->post('sampai_ayat'),
						  'sampai_surat'	=> $i->post('sampai_surat'), 
						  //'jml_hafalan'		=> $i->post('jml_hafalan'),
				);
			$this->hafalan_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			
			redirect(base_url('pengajar/hafalan'),'refresh');
		}
		// End masuk database
		
	}

	//Edit User
	public function edit($idhafalan)
	{
		$hafalan = $this->hafalan_model->detail($idhafalan);
		$data['santri']=$this->santri_model->listing();
		$data['pengajar']=$this->pengajar_model->listing();
		$data['surat']=$this->surat_model->listing();
		$data['surat2']=$this->surat_model->listing();

		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('idsantri','Nama Santri', 'required', 
			array('required'		=> '%s harus diisi'));


		if($valid->run()===FALSE){
		//End validasi
			$data = array('title' => 'Edit Hafalan Santri',
						  'hafalan'  => $hafalan,
						  'santri'=>$data['santri'],
						  'idsantri'=>"",
						  'pengajar'=>$data['pengajar'],
						  'idpengajar'=>"",
						  'surat'=>$data['surat'],
						  'surat2'=>$data['surat2'],
						  'idsurat'=>"",
					  	  'isi'   => 'pengajar/hafalan/edit'
		        );
		$this->load->view('pengajar/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$data = array('idhafalan' => $idhafalan,
						  'idsantri'		 => $i->post('idsantri'),
						  'idpengajar'		=> $i->post('idpengajar'),
						  'tanggal'			 => $i->post('tanggal'),
						  'dari_ayat'		=> $i->post('dari_ayat'),
						  'dari_surat'		=> $i->post('dari_surat'),
						  'sampai_ayat'		=> $i->post('sampai_ayat'),
						  'sampai_surat'	=> $i->post('sampai_surat'),
						  //'jml_hafalan'		=> $i->post('jml_hafalan'),
			);			  
			$this->hafalan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('pengajar/hafalan'),'refresh');
		}
		// End masuk database
		
	}

	// Delete santri
	public function delete($idhafalan)
	{
		$data = array('idhafalan' => $idhafalan );
		$this->hafalan_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('pengajar/hafalan'),'refresh');
	}



}

/* End of file santri.php */
/* Location: ./application/controllers/admin/santri.php */