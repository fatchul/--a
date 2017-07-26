<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends My_Front {

	public function index()
	{
		$this->track();
		$data=$this->information();	
		//$this->track();	
		$this->load->view('front/home',$data);
	}
	function email(){
		$this->load->view('front/email/template');	
	}

}
