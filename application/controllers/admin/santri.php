<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('santri_model');
		if ($this->session->userdata('level')!="Admin") {
	      redirect('login');
	  }
	}

	//Data User
	public function index()
	{
		$santri = $this->santri_model->listing();

		$data = array('title' => 'Data Santri',
					  'santri'  => $santri,
					  'isi'   => 'admin/santri/list'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//Tambah User
	public function tambah()
	{
		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('kode_santri','Kode Santri', 'required', 
			array('required'		=> '%s harus diisi'));

		
 
		if($valid->run()){
			$config['upload_path'] = './assets/upload/image/thumbs/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = 1000000;
			 $config['overwrite'] = TRUE;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('foto')){
					

		//End validasi
			$data = array('title' => 'Tambah Santri',
						 'error'   => $this->upload->display_errors(),
					  'isi'   => 'admin/santri/tambah'
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
						  'kode_santri' => $i->post('kode_santri'),
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
						  'foto'=>$upload_foto['upload_data']['file_name'],
						  'username'		=> $i->post('username'),
						  'password'		=> SHA1($i->post('password')),

		
						
				);
			$datax = array(
						
						  'nama'			=> $i->post('nama_santri'),
						  'username'		=> $i->post('username'),
						  'password'		=> SHA1($i->post('password')),
						  'level'			=> 'Santri'
						
				);

		
			$this->santri_model->tambah($data);
			$this->user_model->tambah($datax);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/santri'),'refresh');
		}}
		// End masuk database
				$data = array('title' => 'Tambah Santri',
					  'isi'   => 'admin/santri/tambah'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	
	
}

	//Edit User
public function edit($idsantri)
    {       
        // $idsantri = '7';
       $santri = $this->santri_model->detail($idsantri);

        //Validasi input
        $valid = $this->form_validation;

        	$valid->set_rules('kode_santri','Kode Santri', 'required', 
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
        $data = array('title'   => 'Edit Santri',
                        'error'   => $this->upload->display_errors(),
                         'santri'  => $santri,
                         'isi'   => 'admin/santri/edit');
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
            $data = array(  'idsantri'  => $idsantri,
            			 'kode_santri'	=> $i->post('kode_santri'),
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
						  'username'		=> $i->post('username'),
						  'password'		=> $i->post('password'),
                            );
            $datax = array(
						
						  'nama'			=> $i->post('nama_santri'),
						  'username'		=> $i->post('username'),
						  'password'		=> SHA1($i->post('password')),
						  'level'			=> 'Santri'
						
				);

           $this->santri_model->edit($data);
           $this->user_model->edit($datax);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/santri'),'refresh');
        }}else{
            $i = $this->input;
            $data = array(  'idsantri'  => $idsantri,
            				'kode_santri' => $i->post('kode_santri'),
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
						  'username'		=> $i->post('username'),
						  'password'		=> $i->post('password'),
                            );
            $datax = array(
						
						  'nama'			=> $i->post('nama_santri'),
						  'username'		=> $i->post('username'),
						  'password'		=> SHA1($i->post('password')),
						  'level'			=> 'Santri'
						
				);

           $this->santri_model->edit($data);
           $this->user_model->tambah($datax);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/santri'),'refresh');
        }}

        //End masuk database
        $data = array('title'   => 'Edit Santri',
                        // 'error'   => $this->upload->display_errors(),
                        'santri'  => $santri,
                        'isi'   => 'admin/santri/edit');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
		
	



	// Delete santri
	public function delete($idsantri)
	{
		$data = array('idsantri' => $idsantri );
		$this->santri_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/santri'),'refresh');
	}

	public function detail($idsantri){
		$santri = $this->santri_model->detail($idsantri);
		 $data = array('title'   => 'Data Detail Santri',
                        'santri' =>$santri,
                        'id'=>"",
                      'isi'     => 'admin/santri/detail');
        $this->load->view('admin/layout/wrapper', $data, FALSE);
   
	}



}

/* End of file santri.php */
/* Location: ./application/controllers/admin/santri.php */