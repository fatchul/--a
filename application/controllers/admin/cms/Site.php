<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends My_Admin {

	function __construct(){
		parent::__construct();
		$this->load->model('cms/Cms_sosmed_model','Sosmed_model'); //Replace with your model name
		//$this->load->model('Dashboards','d');
	}

	protected function dir(){
		return "admin/about";
	}

	public function index(){	
		// $data=$this->panel();		
		$data['list_sosmed']=$this->Sosmed_model->get_all();//Replace with your model name
		$data['body']="back/cms/site/index";		
		$this->load->view(admin(),$data);
	}
	
	public function submit(){
		$id=$this->input->post('id');
		$about=$this->input->post('about');
		$tag=$this->input->post('tag');
		$show=$this->input->post('show');
		foreach ($about as $key => $value) {
			$data[] = array(
				'id' => $id[$key],
				'the_value_is' => $about[$key], 
				'as_a' => $tag[$key], 
				'shows' => !empty($show[$key]) ? 1: 0 , 
			);
		}

		$this->db->update_batch('social_media', $data, 'id'); 
		redirect('about');

	}
	function save(){
		$id=$this->input->post('id');
		$about=$this->input->post('about');
		$tag=$this->input->post('tag');
		$show=$this->input->post('show');
		foreach ($about as $key => $value) {
			$data[] = array(
				'id' => $id[$key],
				'the_value_is' => $about[$key], 
				'as_a' => $tag[$key], 
				'shows' => !empty($show[$key]) ? 1: 0 , 
			);
		}

		$this->db->update_batch('cms_sosmed', $data, 'id'); 
		redirect('admin/cms/site');
	}



}