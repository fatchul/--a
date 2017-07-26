<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends My_Teacher {

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
}

