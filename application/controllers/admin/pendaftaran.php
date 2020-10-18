<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pendaftaran_model');
		$this->load->model('santri_model');
		if ($this->session->userdata('level')!="Admin") {
	      redirect('login');
	  }
	}

	//Data User
	public function index()
	{
		$pendaftaran = $this->pendaftaran_model->listing();

		$data = array('title' => 'Data Pendaftaran',
					  'pendaftaran'  => $pendaftaran,
					  'isi'   => 'admin/pendaftaran/list'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	

	public function tambah()
	{
		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_santri','nama_santri', 'required', 
			array('required'		=> '%s harus diisi'));

		

		if($valid->run()){
			$config['upload_path'] = './assets/upload/image/thumbs/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			 $config['max_size'] = 1000000;
			 $config['overwrite'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto')){

				print_r($this->upload->display_errors('<p>', '</p>')).die();
					
		//End validasi
			$data = array('title' => 'Tambah Pendaftaran',
						  'error'   => $this->upload->display_errors(),
					  	  'isi'   => 'admin/pendaftaran/tambah'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$upload_foto = array('upload_data' => $this->upload->data());

			//Create thumbnail gambar
	
				$config['image_library'] = 'gd2';
				$config['source_image'] = '/assets/upload/image/'.$upload_foto['upload_data']['file_name'];
				//lokasi folder thumbnail
				$config['new_image'] = './assets/upload/image/thumbs/';
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width']         = 250;
				$config['height']       = 250;
				$config['thumb_marker'] = '';

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();
			//End Create thubnail
			$i = $this->input;
			$data = array(
						  'nama_santri'		=> $i->post('nama_santri'),
						  'tempat_lahir'		=> $i->post('tempat_lahir'),
						  'tgl_lahir'	=> $i->post('tgl_lahir'),
						  'jenis_kelamin'	=> $i->post('jenis_kelamin'),
						  'nama_ayah'	=> $i->post('nama_ayah'),
						  'nama_ibu'	=> $i->post('nama_ibu'),
						  'pendidikan'	=> $i->post('pendidikan'),
						  'kelas'	=> $i->post('kelas'),
						  'alamat'		=> $i->post('alamat'),
						  'nohp'		=> $i->post('nohp'),
						  'tgl_daftar'	=> $i->post('tgl_daftar'),
						  'foto'=>$upload_foto['upload_data']['file_name'],
						 
				);
			$datax = array(

						 'nama_santri'		=> $i->post('nama_santri'),
						  'tempat_lahir'		=> $i->post('tempat_lahir'),
						  'tgl_lahir'	=> $i->post('tgl_lahir'),
						  'jenis_kelamin'	=> $i->post('jenis_kelamin'),
						  'nama_ayah'	=> $i->post('nama_ayah'),
						  'nama_ibu'	=> $i->post('nama_ibu'),
						  'pendidikan'	=> $i->post('pendidikan'),
						  //'kelas'	=> $i->post('kelas'),
						  'alamat'		=> $i->post('alamat'),
						  'nohp'		=> $i->post('nohp'),
						 // 'tgl_daftar'	=> $i->post('tgl_daftar'),
						  'foto'=>$upload_foto['upload_data']['file_name'],
					
				);

			$this->pendaftaran_model->tambah($data);
			$this->santri_model->tambah($datax);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/santri'),'refresh');
		}}
		// End masuk database
		$data = array('title' => 'Tambah Pendaftaran',
					  'isi'   => 'admin/pendaftaran/tambah'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Edit User
	public function edit($idpendaftaran)
	{
		$pendaftaran = $this->pendaftaran_model->detail($idpendaftaran);


		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_santri','Nama Santri', 'required', 
			array('required'=> '%s harus diisi'));

		

		if($valid->run()===FALSE){
		//End validasi
			$data = array('title' => 'Edit Pendaftaran',
						  'pendaftaran'  => $pendaftaran,
					  	  'isi'   => 'admin/pendaftaran/edit'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$data = array('idpendaftaran'	=> $idpendaftaran,
						  'nama_santri'		=> $i->post('nama_santri'),
						  'tempat_lahir'		=> $i->post('tempat_lahir'),
						  'tgl_lahir'	=> $i->post('tgl_lahir'),
						  'jenis_kelamin'	=> $i->post('jenis_kelamin'),
						  'nama_ayah'	=> $i->post('nama_ayah'),
						  'nama_ibu'	=> $i->post('nama_ibu'),
						  'pendidikan'	=> $i->post('pendidikan'),
						  'kelas'	=> $i->post('kelas'),
						  'alamat'		=> $i->post('alamat'),
						  'nohp'		=> $i->post('nohp'),
						  'tgl_daftar'	=> $i->post('tgl_daftar'),
						 // 'foto'=>$upload_foto['upload_data']['file_name'],
						  
				);
			$datax = array(
						// 'idpendaftaran'	=> $idpendaftaran,
						  'nama_santri'		=> $i->post('nama_santri'),
						  'tempat_lahir'		=> $i->post('tempat_lahir'),
						  'tgl_lahir'	=> $i->post('tgl_lahir'),
						  'jenis_kelamin'	=> $i->post('jenis_kelamin'),
						  'nama_ayah'	=> $i->post('nama_ayah'),
						  'nama_ibu'	=> $i->post('nama_ibu'),
						  'pendidikan'	=> $i->post('pendidikan'),
						  // 'kelas'	=> $i->post('kelas'),
						  'alamat'		=> $i->post('alamat'),
						  'nohp'		=> $i->post('nohp'),
						  // 'tgl_daftar'	=> $i->post('tgl_daftar'),
					
				);
			$this->pendaftaran_model->edit($data);
			$this->santri_model->edit($datax);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/pendaftaran'),'refresh');
		}
		// End masuk database
		
	}

	// Delete pendaftaran
	public function delete($idpendaftaran)
	{
		$data = array('idpendaftaran' => $idpendaftaran );
		$this->pendaftaran_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/pendaftaran'),'refresh');
	}

	public function detail($idpendaftaran){
		$pendaftaran = $this->pendaftaran_model->detail($idpendaftaran);
		 $data = array('title'   => 'Data Detail Pendaftaran',
                        'pendaftaran' =>$pendaftaran,
                        'id'=>"",
                      'isi'     => 'admin/pendaftaran/detail');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
   
	}



}

/* End of file pendaftaran.php */
/* Location: ./application/controllers/admin/pendaftaran.php */