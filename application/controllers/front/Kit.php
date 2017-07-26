<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kit extends My_Front {

	public $id_user="";
	function __construct(){
		parent::__construct();
		$this->load->model('Silabus_model','silabus');
		$sesi=$this->session->userdata('__usr__');
		if ($sesi==TRUE) {
			$this->id_user=$this->user->specific_column('id_user','email',$sesi);
		}
	}


	/* 
	* open page intead landing page
	* used for open the course
	* 
	*/
	function index(){
		$data['seo']="Arkana Starter Kits";
		$this->track();
		$data=$this->information();
		
		$data['body']="front/kit/all";			
		$this->load->view("template/front/core",$data);
	}
}