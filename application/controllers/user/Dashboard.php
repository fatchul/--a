<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends My_User {
	public $id_user="";
	function __construct(){
		parent::__construct();
		$sesi=$this->session->userdata('__usr__');
		$this->id_user=$this->user->specific_column('id_user','email',$sesi);
	}

	public function index(){
		$data=$this->information();
		$this->track();
		$data['user']=$this->id_user;
		$data['my_course']=$this->enroll->my_course($this->id_user);
		$data['my_course_active']=$this->enroll->my_course_active($this->id_user);
		$data['body']="front/user/dashboard";			
		$this->load->view("template/front/core",$data);
	}

	
}
