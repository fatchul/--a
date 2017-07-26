<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Login Authentication class for Geekpro Admin user
*/
class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('User_model','user');
	}

	public function index()
	{
		if ($this->input->post('sign')) {	
			$this->proceed();
		}
		else{
			// $data['user']='a@a.a';
			// $data['pass']='admin';
			$data['user']='';
			$data['pass']='';
			$this->load->view('back/login',$data);		
		}
	}
	/*
	* login submission endpoint
	*/
	function proceed(){
		if ($this->input->post('sign')) {			
			if (is_empty_session()) {
				if($this->user->check_user()){
					$this->session->set_flashdata('sukses', "Welcome.");
					$this->session->set_userdata('isLogin',TRUE);
					$this->session->set_userdata('arch', generateHash(curtime()));
					redirect('apps');
				}
				else{
					$this->session->set_flashdata('gagal', "Login failed or your email admin is not verified.");
					redirect('arkmin');
				}
			}	
			else{				
             	$this->session->sess_destroy();                 
				redir("Anda sudah login. Proses logout...","arkmin");
			}		
		}
		else{			
			redirect('arkmin');
		}
	}

	/*
	* logout endpoint
	*/
	function logout(){
		$this->session->sess_destroy();  				
		redirect('arkmin');
	}
}
