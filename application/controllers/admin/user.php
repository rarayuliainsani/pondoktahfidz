<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// Load Model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		if ($this->session->userdata('level')!="Admin") {
	      redirect('login');
	  
	}
}

	//Data User
	public function index()
	{
		$user = $this->user_model->listing();

		$data = array('title' => 'Data Pengguna',
					  'user'  => $user,
					  'isi'   => 'admin/user/list'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	//Tambah User
	public function tambah()
	{
		//Validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama Lengkap', 'required', 
			array('required'		=> '%s harus diisi'));


		if($valid->run()===FALSE){
		//End validasi
			$data = array('title' => 'Tambah Pengguna',
					  'isi'   => 'admin/user/tambah'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$data = array(
						  'nama'		=> $i->post('nama'),
						  'username'	=> $i->post('username'),
						  'password'	=> SHA1($i->post('password')),
						  'level'		=> $i->post('level'),
				);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('login'),'refresh');
		}
		// End masuk database
		
	}

	//Edit User
	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);


		//Validasi input
		$valid = $this->form_validation;

	
		$valid->set_rules('nama','Nama Lengkap', 'required', 
			array('required'		=> '%s harus diisi'));


		$valid->set_rules('password','password', 'required', array('required'		=> '%s harus diisi'));

		if($valid->run()===FALSE){
		//End validasi
			$data = array('title' => 'Edit Pengguna',
						  'user'  => $user,
					  	  'isi'   => 'admin/user/edit'
		        );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//Masuk database
		}else{
			$i = $this->input;
			$data = array('id_user'			=> $id_user,

						  'nama'		=> $i->post('nama'),
						  'username'	=> $i->post('username'),
						   'password'	=> SHA1($i->post('password')),
						  'level'		=> $i->post('level'),
				);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diubah');
			redirect(base_url('admin/user'),'refresh');
		}
		// End masuk database
		
	}

	// Delete user
	public function delete($id_user)
	{
		$data = array('id_user' => $id_user );
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/user'),'refresh');
	}

}

/* End of file user.php */
/* Location: ./application/controllers/admin/user.php */