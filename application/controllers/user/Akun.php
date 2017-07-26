<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends My_User {

	public $id_user="";
	function __construct(){
		parent::__construct();
		$sesi=$this->session->userdata('__usr__');
		$this->id_user=$this->user->specific_column('id_user','email',$sesi);
			
	}

	function index(){
		$data=$this->information();
		$data['seo']="Profil";
		$data['link']="user";
		$data['body']="front/user/my_profile";			
		$this->load->view("template/front/core",$data);
	}
	function setting(){
		$data=$this->information();
		$data['seo']="Setting";
		$data['link']="user";
		
		$data['user']=$this->user->get_by_id($this->id_user);
		$data['body']="front/user/setting";			
		$this->load->view("template/front/core",$data);
	}
	function course(){
		$data=$this->information();
		$data['seo']="Kelas yang saya ikuti";
		$data['body']="front/user/my_course";			
		$this->load->view("template/front/core",$data);
	}
	function inbox(){
		$data=$this->information();
		$data['seo']="Kotak Masuk";
		
		$data['inbox']=$this->message->get_all_order_with('is_read_by_user','ASC','id_user',$this->id_user);
		$data['body']="front/user/my_inbox";			
		$this->load->view("template/front/core",$data);
	}
	function update(){
		if ($this->input('btn-profil')) {
			if (($_FILES['photos']['name'])) {
				$this->_config_upload();
				if($this->upload->do_upload('photos')){
					$finfo=$this->upload->data();
					$nama_file=$this->upload->data('file_name');
					$this->createThumbnail($finfo['file_name'],170,260);
					$data_galeri = array(
						'pict_name' => $nama_file, 
						);
					$this->user->update($this->id_user,$data_galeri);
					$this->session->set_flashdata('sukses', "Foto berhasil di perbaharui.");
					redirect('u/setting');
				}
			}
			else{
				$this->session->set_flashdata('gagal', "Foto gagal di perbaharui.");
				redirect('u/setting');
			}
		}
		elseif ($this->input('profil')) {
			$fields = array(                        
	              'email' => $this->input->post('email'), 
	              'nama' => $this->input->post('nama'),
	              'dob' => $this->input->post('dob'),
	              'gender' => $this->input->post('gender'),
	              'profile' => $this->input->post('profile'),              
	              'token_reg' => has(45), 
	              'token_forgot_pass' => has(42),               
	              'phone' => $this->input->post('kontak'), 
	              'address' => $this->input->post('alamat'),
	              'facebook_url' => $this->input->post('facebook')
	        );
			$this->user->update($this->id_user,$fields);
			$this->session->set_flashdata('sukses', "Profil berhasil di perbaharui.");
			redirect('u/setting');
		}
		elseif ($this->input('pwd')) {
        	$get_pass=$this->user->specific_column('password','id_user',$this->id_user); // change your column
        	if ($this->modul_password_auth($get_pass)) {
        		if ($this->modul_password_proceed('id_user',$this->id_user,'user')) {
        			$this->session->set_flashdata('sukses', "Ganti password berhasil.");
        		}
        		else{
        			$this->session->set_flashdata('gagal', "Password tidak sama.");
        		}
        	}
        	else{
        		$this->session->set_flashdata('gagal', "Password salah.");
        	}
        	redirect('u/setting');
		}
		else{
			redirect('?');
		}
	}
	
}
