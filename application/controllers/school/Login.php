<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Login Authentication class for Geekpro Admin school
*/
class Login extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('School_model','school');
	}

	public function index()
	{
		if ($this->input->post('sign')) {			
			if (is_empty_session()) {
				if($this->school->check_school()){
					$this->session->set_flashdata('sukses', "Welcome.");
					$this->session->set_userdata('isLogin',TRUE);
					$this->session->set_userdata('arch_sch', $get_pass=$this->school->specific_column('id_school','email',$this->input->post('username')));
					$id=$this->school->specific_column('id_school','email',$this->input->post('username'));
					$this->school->update($id,array('last_login' => date('Y-m-d H:i:s') ));
					redirect('school/user');
					
				}
				else{
					$this->session->set_flashdata('gagal', "Login failed.");
					redirect('sch');
				}
			}
			else{
				$this->session->sess_destroy();                 
				redir("Anda sudah login. Proses logout...","sch");
			}
		}
		else{
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
			$sess = $this->session->userdata('isLogin');
			if ($sess==TRUE) {                    
				$this->session->set_flashdata('gagal', "You're logged in now.");
				$this->session->sess_destroy();  				
				redirect('sch');
			}
			else{
				if($this->school->check_school()){
					$this->session->set_flashdata('sukses', "Welcome.");
					$this->session->set_userdata('isLogin',TRUE);
					$this->session->set_userdata('arch_sch', generateHash(curtime()));
					redirect('school/user');
				}
				else{
					$this->session->set_flashdata('gagal', "Login failed.");
					redirect('sch');
				}
			}
		}
		else{			
			redirect('sch');
		}
	}

	/*
	* logout endpoint
	*/
	function logout(){
		$this->session->sess_destroy();  				
		redirect('sch');
	}
}
