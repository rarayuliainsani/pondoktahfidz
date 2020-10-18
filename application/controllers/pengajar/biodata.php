<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller {

		public function __construct()
	{
		parent::__construct();
		$this->load->model('biodata_pengajar_model');
		$this->username = $this->session->userdata('username');

		if ($this->session->userdata('level')!="Pengajar") {
	      redirect('login');
	}

}

	
	public function index()
	{
		$data['pengajar'] = $this->biodata_pengajar_model->detail(array('username' => $this->username));

		// print_r($data['pengajar']);exit();
		$data = array('title' => 'Biodata Pengajar',
					  'pengajar'  => $data['pengajar'],
					  'isi'   => 'pengajar/biodata/detail'
		        );
		$this->load->view('pengajar/layout/wrapper', $data, FALSE);

	
	}

	public function edit($idpengajar)
	{
	// 	$data['pengajar'] = $this->biodata_pengajar_model->detail(array('nip' => $this->username));
	

	// 	//Validasi input
	// 	$valid = $this->form_validation;

	// 	$valid->set_rules('nama','Nama', 'required', 
	// 		array('required'=> '%s harus diisi'));

		

	// 	if($valid->run()===FALSE){
	// 	//End validasi
	// 		$data = array('title' => 'Edit Pengguna',
	// 					  'pengajar'  => $data['pengajar'],
	// 				  	  'isi'   => 'pengajar/biodata/edit'
	// 	        );
	// 	$this->load->view('pengajar/layout/wrapper', $data, FALSE);
	// 	//Masuk database
	// 	}else{
	// 		$i = $this->input;
	// 		$data = array('idpengajar'			=> $idpengajar,
	// 					  'nip'		=> $i->post('nip'),
	// 					  'nama'	=> $i->post('nama'),
	// 					  'tempat_lahir'		=> $i->post('tempat_lahir'),
	// 					  'tgl_lahir'	=> $i->post('tgl_lahir'),
	// 					  'jk'	=> $i->post('jk'),
	// 					  'alamat'		=> $i->post('alamat'),
	// 					  'nohp'		=> $i->post('nohp'),
	// 					  'jml_hafalan'	=> $i->post('jml_hafalan'),
	// 					  'alumni'	=> $i->post('alumni'),
	// 					  'nama_ortu'		=> $i->post('nama_ortu'),
	// 					  'alamat_ortu'		=> $i->post('alamat_ortu'),
						  
	// 			);
	// 		$this->biodata_pengajar_model->edit($data);
	// 		$this->session->set_flashdata('sukses', 'Data telah diubah');
	// 		redirect(base_url('pengajar/biodata'),'refresh');
	// 	}
	// 	// End masuk database
		
	// }
	 $data['pengajar'] = $this->biodata_pengajar_model->detail(array('username' => $this->username));

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
        $data = array('title'   => 'Edit Foto',
                        'error'   => $this->upload->display_errors(),
                         'pengajar'  => $data['pengajar'],
                         'isi'   => 'pengajar/biodata/edit');
        $this->load->view('pengajar/layout/wrapper', $data, FALSE);
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
           $data = array('idpengajar'			=> $idpengajar,
	 					  'nip'		=> $i->post('nip'),
	 					  'nama'	=> $i->post('nama'),
	 					  'tempat_lahir'		=> $i->post('tempat_lahir'),
	 					  'tgl_lahir'	=> $i->post('tgl_lahir'),
	 					  'jk'	=> $i->post('jk'),
	 					  'alamat'		=> $i->post('alamat'),
	 					  'nohp'		=> $i->post('nohp'),
	 					  'jml_hafalan'	=> $i->post('jml_hafalan'),
	 					  'alumni'	=> $i->post('alumni'),
	 					  'nama_ortu'		=> $i->post('nama_ortu'),
	 					  'alamat_ortu'		=> $i->post('alamat_ortu'),
	 					  'foto' => $upload_foto['upload_data']['file_name'],
						  
		);

           $this->biodata_pengajar_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('pengajar/biodata'),'refresh');
        }}else{
            $i = $this->input;
             $data = array('idpengajar'			=> $idpengajar,
	 					  'nip'		=> $i->post('nip'),
	 					  'nama'	=> $i->post('nama'),
	 					  'tempat_lahir'		=> $i->post('tempat_lahir'),
	 					  'tgl_lahir'	=> $i->post('tgl_lahir'),
	 					  'jk'	=> $i->post('jk'),
	 					  'alamat'		=> $i->post('alamat'),
	 					  'nohp'		=> $i->post('nohp'),
	 					  'jml_hafalan'	=> $i->post('jml_hafalan'),
	 					  'alumni'	=> $i->post('alumni'),
	 					  'nama_ortu'		=> $i->post('nama_ortu'),
	 					  'alamat_ortu'		=> $i->post('alamat_ortu'),
						  
						  // 'foto' => $upload_file['upload_data']['file_name'],
                            );

             $this->biodata_pengajar_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('pengajar/biodata'),'refresh');
        }}

        //End masuk database
        $data = array('title'   => 'Edit Biodata Pengajar',
                        // 'error'   => $this->upload->display_errors(),
                        'pengajar'  => $data['pengajar'],
                        'isi'   => 'pengajar/biodata/edit');
        $this->load->view('pengajar/layout/wrapper', $data, FALSE);
    }
}

/* End of file biodata.php */
/* Location: ./application/controllers/pengajar/biodata.php */