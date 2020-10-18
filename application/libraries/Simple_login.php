<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
/**
* 
*/
class Simple_login
{
	protected$CI;
	
	public function __construct()
	{
		$this->CI =& get_instance();
		// load data model user
		$this->CI->load->model('user_model');
		
	}

	// fungi login 
	public function login($username,$password)
	{
		$check = $this->CI->user_model->login($username,$password);
		// jika ada data user , maka cerae sessiaon login
		if ($check ) {
			# code...
			$id_user  =$check->id_user;
			
			//$nama =$check->nama;
			$level =$check->level;
			//  create  seseiaon 

			$this->CI->session->set_userdata('id_user',$id_user);
			// $this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('level',$level);
			// redirek
			if ($level=='Admin'){
				redirect(base_url('admin/dasbor'),'refresh');
			}elseif ($level=='Bendahara'){
				redirect(base_url('bendahara/dasbor'),'refresh');
			}elseif ($level=='Santri'){
				redirect(base_url('santri/dasbor'),'refresh');
			}else
			{
				redirect(base_url('pengajar/dasbor'),'refresh');
			}
		}	

		else{
			// jika tidak ada data atau user name atau passwor salah
			$this->CI->session->set_flashdata('warning',' username atau password salah ');
			redirect(base_url('login'),'refresh');
 
		
		}

	}

	// fungsi cek login 
	public function cek_login()
	{
		// memeriksa appakah seseion sudah ada atau belum jika belum maka ke dasbor
		if ($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata('warning','anda belum login ');
			redirect(base_url('login'),'refresh');

			# code...
		}
	}

	//  fungsi log out 
	public function logout(){
		$this->CI->session->unset_userdata('id');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('nama');
		$this->CI->session->unset_userdata('level');
		// setelah di buang redirec
		$this->CI->session->set_flashdata('sukses','anda berhasil logout ');
			redirect(base_url('login'),'refresh');

	}

}