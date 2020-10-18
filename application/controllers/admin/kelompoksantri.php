<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KelompokSantri extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('kelompoksantri_model');
		$this->load->model('santri_model');
		$this->load->model('kelompok_model');
		$this->load->model('pengajar_model');
		if ($this->session->userdata('level')!="Admin") {
	      redirect('login');
	  }
	}

	//Data User
	public function index()
	{
		$kelompoksantri = $this->kelompoksantri_model->listing();
		$kelompok = $this->kelompok_model->listing();
		$pengajar = $this->pengajar_model->listing();
		$santri = $this->santri_model->listing();

	
		
		$data = array('title' => 'Data Kelompok Santri',
					  'kelompoksantri'  => $kelompoksantri,
					  'kelompok'  => $kelompok,
					  'pengajar'  => $pengajar,
					  'santri'	=> $santri,


					  'isi'   => 'admin/kelompoksantri/list'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//Tambah User
	public function tambah()
	{
		//Validasi input
		$valid = $this->form_validation;
		$santri = $this->santri_model->listing();
		$kelompok = $this->kelompok_model->listing();
		$pengajar = $this->pengajar_model->listing();
		$kelompok_json = json_encode($kelompok);
		$santri_json = json_encode($santri);
		$valid->set_rules('idsantri','Nama Santri', 'required', 
			array('required'		=> '%s harus diisi'));

		if($valid->run()===FALSE){
		//End validasi
			$data = array('title' => 'Tambah Kelompok',
				'santri'=>$santri,
				'kelompok_json' => $kelompok_json,
				'santri_json'  => $santri_json,
				'kelompok'=>$kelompok,
				'pengajar'=>$pengajar,
				'idsantri'=>"",
				'idpengajar'=>"",
				'kategori_kelompok'=>"",
				'idkelompok'=>"",
					  'isi'   => 'admin/kelompoksantri/tambah'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$data = array(
						  'idsantri'		 => $i->post('idsantri'),
						  'idkelompok'		=> $i->post('idkelompok'),	 
						  'kategori_kelompok' => $i->post('kategori_kelompok'),
						  'idpengajar'		=> $i->post('idpengajar'),
		
						
				);
			$this->kelompoksantri_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/kelompoksantri'),'refresh');
		}
		// End masuk database
		
	}

	

	// Delete santri
	public function delete($idkelompoksantri)
	{
		$data = array('idkelompoksantri' => $idkelompoksantri );
		$this->kelompoksantri_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/kelompoksantri'),'refresh');
	}



}

/* End of file santri.php */
/* Location: ./application/controllers/admin/santri.php */