<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajar extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengajar_model');
		if ($this->session->userdata('level')!="Admin") {
	      redirect('login');
	  }
	}

	//Data User
	public function index()
	{
		$pengajar = $this->pengajar_model->listing();

		$data = array('title' => 'Data Pengajar',
					  'pengajar'  => $pengajar,
					  'isi'   => 'admin/pengajar/list'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//Tambah User
	public function tambah()
	{
		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nip','NIP', 'required', 
			array('required'		=> '%s harus diisi'));

		

		if($valid->run()){
			$config['upload_path'] = './assets/upload/image/thumbs/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '2400';
			$config['max_width']  = '2024';
			$config['max_height']  = '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto')){
					
		//End validasi
			$data = array('title' => 'Tambah Pengajar',
						  'error'   => $this->upload->display_errors(),
					  	  'isi'   => 'admin/pengajar/tambah'
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
						  'nip'				=> $i->post('nip'),
						  'nama'			=> $i->post('nama'),
						  'tempat_lahir'	=> $i->post('tempat_lahir'),
						  'tgl_lahir'		=> $i->post('tgl_lahir'),
						  'jk'				=> $i->post('jk'),
						  'alamat'			=> $i->post('alamat'),
						  'nohp'			=> $i->post('nohp'),
						  'jml_hafalan'		=> $i->post('jml_hafalan'),
						  'alumni'			=> $i->post('jk'),
						  'nama_ortu'		=> $i->post('alumni'),
						  'alamat_ortu'		=> $i->post('alamat_ortu'),
						  'foto'			=>$upload_foto['upload_data']['file_name'],
						  'username'		=> $i->post('username'),
						   'password'		=> SHA1($i->post('password')),
						 
				);
			$datax = array(

						  'nama'			=> $i->post('nama'),
						  'username'		=> $i->post('username'),
						  'password'		=> SHA1($i->post('password')),
						  'level'			=> 'Pengajar',
					
				);

			$this->pengajar_model->tambah($data);
			$this->user_model->tambah($datax);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/pengajar'),'refresh');
		}}
		// End masuk database
		$data = array('title' => 'Tambah Pengajar',
					  'isi'   => 'admin/pengajar/tambah'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//Edit User
	public function edit($idpengajar)
    {       
        // $idsantri = '7';
       $pengajar = $this->pengajar_model->detail($idpengajar);

        //Validasi input
        $valid = $this->form_validation;

        	$valid->set_rules('nama','Nama Pengajar', 'required', 
			array('required'=> '%s harus diisi'));

        if($valid->run()){
            // cek  jika file di ganti
            if(!empty($_FILES['foto']['name'])){

            $config['upload_path'] = './assets/upload/image/thumbs/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			 $config['max_size'] = 1000000;
			 $config['overwrite'] = TRUE;


            $this->load->library('upload',$config);

            if ( ! $this->upload->do_upload('foto')){
        //End Validasi
        $data = array('title'   => 'Edit Pengajar',
                        'error'   => $this->upload->display_errors(),
                         'pengajar'  => $pengajar,
                         'isi'   => 'admin/pengajar/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
        //Masuk database
        }else{

                $upload_foto = array('upload_data' => $this->upload->data());
                //create thumbnail gambar
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
             //end create thumbnail
            $i = $this->input;
            $data = array('idpengajar'		=> $idpengajar,
						  'nip'				=> $i->post('nip'),
						  'nama'			=> $i->post('nama'),
						  'tempat_lahir'	=> $i->post('tempat_lahir'),
						  'tgl_lahir'		=> $i->post('tgl_lahir'),
						  'jk'				=> $i->post('jk'),
						  'alamat'			=> $i->post('alamat'),
						  'nohp'			=> $i->post('nohp'),
						  'jml_hafalan'		=> $i->post('jml_hafalan'),
						  'alumni'			=> $i->post('jk'),
						  'nama_ortu'		=> $i->post('alumni'),
						  'alamat_ortu'		=> $i->post('alamat_ortu'),
						  'foto'			=>$upload_foto['upload_data']['file_name'],
						  'username'		=> $i->post('username'),
						   'password'		=> SHA1($i->post('password')),
						 
				);
			$datax = array(

						  'nama'			=> $i->post('nama'),
						  'username'		=> $i->post('username'),
						  'password'		=> SHA1($i->post('password')),
						  'level'			=> 'Pengajar',
					
				);

			$this->pengajar_model->edit($data);
			$this->user_model->edit($datax);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/pengajar'),'refresh');
        }}else{
            $i = $this->input;
            $data = array('idpengajar'		=> $idpengajar,
						  'nip'				=> $i->post('nip'),
						  'nama'			=> $i->post('nama'),
						  'tempat_lahir'	=> $i->post('tempat_lahir'),
						  'tgl_lahir'		=> $i->post('tgl_lahir'),
						  'jk'				=> $i->post('jk'),
						  'alamat'			=> $i->post('alamat'),
						  'nohp'			=> $i->post('nohp'),
						  'jml_hafalan'		=> $i->post('jml_hafalan'),
						  'alumni'			=> $i->post('jk'),
						  'nama_ortu'		=> $i->post('alumni'),
						  'alamat_ortu'		=> $i->post('alamat_ortu'),
						  // 'foto'			=>$upload_foto['upload_data']['file_name'],
						  'username'		=> $i->post('username'),
						   'password'		=> SHA1($i->post('password')),
						 
				);
			$datax = array(

						  'nama'			=> $i->post('nama'),
						  'username'		=> $i->post('username'),
						  'password'		=> SHA1($i->post('password')),
						  'level'			=> 'Pengajar',
					
				);

			$this->pengajar_model->edit($data);
			$this->user_model->edit($datax);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/pengajar'),'refresh');
        }}

        //End masuk database
        $data = array('title'   => 'Edit Pengajar',
                        // 'error'   => $this->upload->display_errors(),
                        'pengajar'  => $pengajar,
                        'isi'   => 'admin/pengajar/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

	// Delete pengajar
	public function delete($idpengajar)
	{
		$data = array('idpengajar' => $idpengajar );
		$this->pengajar_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/pengajar'),'refresh');
	}

	public function detail($idpengajar){
		$pengajar = $this->pengajar_model->detail($idpengajar);
		 $data = array('title'   => 'Data Detail Pengajar',
                        'pengajar' =>$pengajar,
                        'id'=>"",
                      'isi'     => 'admin/pengajar/detail');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
   
	}



}

/* End of file pengajar.php */
/* Location: ./application/controllers/admin/pengajar.php */