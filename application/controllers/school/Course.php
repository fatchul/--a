<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends My_School {

	public $id_school="";

	function __construct(){
		parent::__construct();
		$this->load->model('Course_transaksi_model','enroll');
		$this->load->model('Course_gallery_model','galeri_course');
		$this->id_school=$this->session->userdata('arch_sch');
		
	}
	public function index()
	{
		$data=$this->panel();
		$data['seo']="Course | Dashboard";
		$data['all']=$this->course->get_all_order('last_update','DESC');	
		$data['body']="school/course/all";	
		$this->load->view(school(),$data);
	}
	function see_silabus($id){
		if (is_ajax()) {
			//$data['title']=$this->course->specific_view('title',$id);
			$data['all']=$this->silabus->get_all_order_with('no_urut','ASC','id_course',$id);
			echo json_encode($this->load->view("school/course/silabus",$data,true));
		}
	}
	function view($id=NULL){
		$data['seo']="Course | Dashboard";
		$data=$this->panel();
		$data['res']=$this->course->get_by_id($id);	
		$data['body']="back/course/view";	
		$this->load->view(school(),$data);
	}
	function endorse($id=NULL){
		if (is_ajax()) {
			$data['skip']=TRUE;	
			if ($this->session->userdata('arch_sch')==TRUE) {
				$data['title']=$this->course->specific_view('title',$id);
				$data['course']=$id;
				$data['all']=$this->user->list_user_union_endorse(0,$this->id_school,$id);
				$data['listed_course']=$this->user->get_user_listed($id,0,$this->id_school);//list course user
			}
			else{
				$data['skip']=FALSE;	
			}
			echo json_encode($this->load->view("school/course/endorse",$data,true));
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

