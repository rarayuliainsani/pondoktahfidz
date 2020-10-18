<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata_santri extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('biodata_santri_model');
		$this->username = $this->session->userdata('username');

		if ($this->session->userdata('level')!="Santri") {
	      redirect('login');
	}

}

	
	public function index()
	{
		$data['santri'] = $this->biodata_santri_model->detail(array('username' => $this->username));

		// print_r($data['santri']);exit();
		$data = array('title' => 'Biodata Santri',
					  'santri'  => $data['santri'],
					  'isi'   => 'santri/biodata_santri/detail'
		        );
		$this->load->view('santri/layout/wrapper', $data, FALSE);

	
	}

	// public function edit($idsantri)
	// {
		
	// 	$data['santri'] = $this->biodata_santri_model->detail(array('username' => $this->username));
	


	// 	//Validasi input
	// 	$valid = $this->form_validation;

	// 	$valid->set_rules('nama_santri','Nama Santri', 'required', 
	// 		array('required'=> '%s harus diisi'));

		

	// 	if($valid->run()===FALSE){
	// 	//End validasi
	// 		$data = array('title' => 'Edit Biodata',
	// 					  'santri'  => $data['santri'],
	// 				  	  'isi'   => 'santri/biodata_santri/edit'
	// 	        );
	// 	$this->load->view('santri/layout/wrapper', $data, FALSE);
	// 	//Masuk database
	// 	}else{
	// 		$i = $this->input;
	// 		$data = array(
	// 					  'idsantri'  => $idsantri,
	// 					  'nama_santri'		=> $i->post('nama_santri'),
	// 					  'tempat_lahir'		=> $i->post('tempat_lahir'),
	// 					  'tgl_lahir'	=> $i->post('tgl_lahir'),
	// 					  'jenis_kelamin'	=> $i->post('jenis_kelamin'),
	// 					  'pendidikan'		=> $i->post('pendidikan'),
	// 					  'tanggal_masuk'		=> $i->post('tanggal_masuk'),
	// 					  'alamat'		=> $i->post('alamat'),
	// 					  'asal_sekolah'		=> $i->post('asal_sekolah'),
	// 					  'nama_ayah'		=> $i->post('nama_ayah'),
	// 					  'pekerjaan_ayah'		=> $i->post('pekerjaan_ayah'),
	// 					  'nama_ibu'		=> $i->post('nama_ibu'),
	// 					  'pekerjaan_ibu'		=> $i->post('pekerjaan_ibu'),
	// 					  'nohp'		=> $i->post('nohp'),
	// 					  'jumlah_hafalan'		=> $i->post('jumlah_hafalan'),
						
						
	// 			);

	// 		$this->biodata_santri_model->edit($data);

		
	// 		$this->session->set_flashdata('sukses', 'Data telah diubah');
	// 		redirect(base_url('santri/biodata_santri'),'refresh');
	// 	}
		// End masuk databases

		public function edit($idsantri)
    {       
        // $idsantri = '7';
       $data['santri'] = $this->biodata_santri_model->detail(array('username' => $this->username));

        //Validasi input
        $valid = $this->form_validation;

        	$valid->set_rules('nama_santri','Nama Santri', 'required', 
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
                         'santri'  => $data['santri'],
                         'isi'   => 'santri/biodata_santri/edit');
        $this->load->view('santri/layout/wrapper', $data, FALSE);
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
            $data = array(  'idsantri'  => $idsantri,
						  'nama_santri'		=> $i->post('nama_santri'),
						  'tempat_lahir'		=> $i->post('tempat_lahir'),
						  'tgl_lahir'	=> $i->post('tgl_lahir'),
						  'jenis_kelamin'	=> $i->post('jenis_kelamin'),
						  'pendidikan'		=> $i->post('pendidikan'),
						  'tanggal_masuk'		=> $i->post('tanggal_masuk'),
						  'alamat'		=> $i->post('alamat'),
						  'asal_sekolah'		=> $i->post('asal_sekolah'),
						  'nama_ayah'		=> $i->post('nama_ayah'),
						  'pekerjaan_ayah'		=> $i->post('pekerjaan_ayah'),
						  'nama_ibu'		=> $i->post('nama_ibu'),
						  'pekerjaan_ibu'		=> $i->post('pekerjaan_ibu'),
						  'nohp'		=> $i->post('nohp'),
						  'jumlah_hafalan'		=> $i->post('jumlah_hafalan'),
						  'foto' => $upload_foto['upload_data']['file_name'],

                            );

           $this->biodata_santri_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('santri/biodata_santri'),'refresh');
        }}else{
            $i = $this->input;
            $data = array(  'idsantri'  => $idsantri,
						  'nama_santri'		=> $i->post('nama_santri'),
						  'tempat_lahir'		=> $i->post('tempat_lahir'),
						  'tgl_lahir'	=> $i->post('tgl_lahir'),
						  'jenis_kelamin'	=> $i->post('jenis_kelamin'),
						  'pendidikan'		=> $i->post('pendidikan'),
						  'tanggal_masuk'		=> $i->post('tanggal_masuk'),
						  'alamat'		=> $i->post('alamat'),
						  'asal_sekolah'		=> $i->post('asal_sekolah'),
						  'nama_ayah'		=> $i->post('nama_ayah'),
						  'pekerjaan_ayah'		=> $i->post('pekerjaan_ayah'),
						  'nama_ibu'		=> $i->post('nama_ibu'),
						  'pekerjaan_ibu'		=> $i->post('pekerjaan_ibu'),
						  'nohp'		=> $i->post('nohp'),
						  'jumlah_hafalan'		=> $i->post('jumlah_hafalan'),
						  // 'foto' => $upload_file['upload_data']['file_name'],
                            );

             $this->biodata_santri_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('santri/biodata_santri'),'refresh');
        }}

        //End masuk database
        $data = array('title'   => 'Edit Biodata Santri',
                        // 'error'   => $this->upload->display_errors(),
                        'santri'  => $data['santri'],
                        'isi'   => 'santri/biodata_santri/edit');
        $this->load->view('santri/layout/wrapper', $data, FALSE);
    }
		
	


}

/* End of file biodata.php */
/* Location: ./application/controllers/santri/biodata.php */