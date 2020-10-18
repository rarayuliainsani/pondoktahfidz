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
		$this->load->model('pengajar_model');
		if ($this->session->userdata('level')!="Pengajar") {
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
					  //'santri'	=> $santri,
					  //'pertemuan'  => $pertemuan,
					  'isi'   => 'pengajar/absensi/list'
		        );
		$this->load->view('pengajar/layout/wrapper', $data, FALSE);
	}
	//Tambah User
	public function tambah()
	{
		//Validasi input
		$valid = $this->form_validation;
		$santri = $this->santri_model->listing();
		$pertemuan = $this->pertemuan_model->listing();
		$pengajar = $this->pengajar_model->listing();
		$pertemuan_json = json_encode($pertemuan);
		$valid->set_rules('idpertemuan','Pertemuan Ke', 'required', 
			array('required'		=> '%s harus diisi'));

		if($valid->run()===FALSE){
		//End validasi
			$data = array('title' => 'Tambah Absensi',
				'santri'=>$santri,
				'pertemuan'=>$pertemuan,
				'pengajar'=>$pengajar,
				'pertemuan_json' => $pertemuan_json,
				'idsantri'=>"",
				'idpertemuan'=>"",
				'idpengajar'=>"",
				'tanggal'=>"",
					  'isi'   => 'pengajar/absensi/tambah'
		        );
		$this->load->view('pengajar/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$data = array(
						  'idpertemuan' => $i->post('idpertemuan'),
						  'tanggal'		=> $i->post('tanggal'),
						  'idpengajar'  => $i->post('idpengajar'),
						  'idsantri'		 => $i->post('idsantri'),
						  'keterangan' => $i->post('keterangan'),	 
					
				);
		
		
			$this->absensi_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			$keterangan = $i->post('keterangan');
			if($keterangan=='Hadir')
			{
				redirect(base_url('pengajar/hafalan'),'refresh');
			}else
			redirect(base_url('pengajar/absensi'),'refresh');
		}
		// End masuk database
		
	}

	//Edit User
	public function edit($idabsensi)
	{
		$absensi = $this->absensi_model->detail($idabsensi);
		$santri = $this->santri_model->listing();
		$pertemuan = $this->pertemuan_model->listing();
		$pengajar = $this->pengajar_model->listing();
		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('idpertemuan','Pertemuan Ke', 'required', 
			array('required'		=> '%s harus diisi'));

		if($valid->run()===FALSE){
		//End validasi
			$data = array('title' => 'Edit Absensi',
						  'absensi'  => $absensi,
						  'santri' => $santri,
						  'pertemuan' => $pertemuan,
						  'pengajar'  => $pengajar,
					  	  'isi'   => 'pengajar/absensi/edit'
		        );
		$this->load->view('pengajar/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$data = array('idabsensi' => $idabsensi,
						  'idpertemuan' => $i->post('idpertemuan'),
						  'tanggal'		=> $i->post('tanggal'),
						  'idpengajar'	=> $i->post('idpengajar'),
						  'idsantri'	=> $i->post('idsantri'),
						  'keterangan'	=> $i->post('keterangan'),
						  
			);			  
			$this->absensi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('pengajar/absensi'),'refresh');
		}
		// End masuk database
		
	}

	// Delete santri
	public function delete($idabsensi)
	{
		$data = array('idabsensi' => $idabsensi );
		$this->absensi_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('pengajar/absensi'),'refresh');
	}



}

/* End of file santri.php */
/* Location: ./application/controllers/pengajar/santri.php */