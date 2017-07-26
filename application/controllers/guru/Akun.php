<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends My_Teacher {

	public $id_teacher="";
	public $id_school="";

	function __construct(){
		parent::__construct();
		$this->load->model('Course_transaksi_model','enroll');
		$this->load->model('Course_gallery_model','galeri_course');
		$mail_teacher=$this->session->userdata('__usr_teacher_');
		$this->id_teacher=$this->user->specific_column('id_user','email',$mail_teacher);
		$this->id_school=$this->user->specific_column('id_school','email',$mail_teacher);
		
	}
	public function setting()
	{
		$data=$this->panel();
		$data['seo']="Setting";
		$data['link']="guru";
		$data['user']=$this->user->get_by_id($this->id_teacher);
		$data['body']="front/user/setting";			
		$this->load->view("template/front/core",$data);
	}
	function see_silabus($id){
		if (is_ajax()) {
			//$data['title']=$this->course->specific_view('title',$id);
			$data['all']=$this->silabus->get_all_order_with('no_urut','ASC','id_course',$id);
			echo json_encode($this->load->view("teacher/course/silabus",$data,true));
		}
	}
	function view($id=NULL){
		$data['seo']="Course | Dashboard";
		$data=$this->panel();
		$data['res']=$this->course->get_by_id($id);	
		$data['body']="back/course/view";	
		$this->load->view(teacher(),$data);
	}
	function endorse($id=NULL){
		if (is_ajax()) {
			$data['title']=$this->course->specific_view('title',$id);
			$data['course']=$id;
			$data['all']=$this->user->list_user_union_endorse(1,$this->id_school,$id);
			$data['listed_course']=$this->user->get_user_listed($id,1);//list course user
			echo json_encode($this->load->view("teacher/course/endorse",$data,true));
		}
	}
	function save(){		
		$id=$this->input('cb');
		
		foreach ($id as $key => $value) {
		 	if ($value=='10') {
		 		$value='-';
		 	}
			$data = array(
				'id_course' => $this->input('course'), 
				'id_user' => $value, 
			);
			$this->db->insert('course_endorse',$data);
		}
		
		echo json_encode(array("status" => TRUE));
	}
	function revoke($id){
		if (is_ajax()) {
			$this->endorse->delete($id); 
			echo json_encode(array("status" => TRUE));	
		}
	}
	function revokeall(){
		if (is_ajax()) {
			
			echo json_encode(array("status" => TRUE));	
		}	
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
					$this->user->update($this->id_teacher,$data_galeri);
					$this->session->set_flashdata('sukses', "Foto berhasil di perbaharui.");
					redirect('g/akun');
				}
			}
			else{
				$this->session->set_flashdata('gagal', "Foto gagal di perbaharui.");
				redirect('g/akun');
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
			$this->user->update($this->id_teacher,$fields);
			$this->session->set_flashdata('sukses', "Profil berhasil di perbaharui.");
			redirect('g/akun');
		}
		elseif ($this->input('pwd')) {
        	$get_pass=$this->user->specific_column('password','id_user',$this->id_teacher); // change your column
        	if ($this->modul_password_auth($get_pass)) {
        		if ($this->modul_password_proceed('id_user',$this->id_teacher,'user')) {
        			$this->session->set_flashdata('sukses', "Ganti password berhasil.");
        		}
        		else{
        			$this->session->set_flashdata('gagal', "Password tidak sama.");
        		}
        	}
        	else{
        		$this->session->set_flashdata('gagal', "Password salah.");
        	}
        	redirect('g/akun');
		}
		else{
			redirect('?');
		}
	}
	function inbox(){
		$data=$this->information();
		$data['seo']="Kotak Masuk";
		
		$data['inbox']=$this->message->get_all_order_with('is_read_by_user','ASC','id_user',$this->id_user);
		$data['body']="front/user/my_inbox";			
		$this->load->view("template/front/core",$data);
	}
	function device(){

	}
	function reg(){

	}
}

