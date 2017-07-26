<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tag extends My_Admin {

	function __construct(){
        parent::__construct();        
        
    }
	
	public function index()
	{
		$data['all']=$this->tag->get_all_order('update_at','DESC');	
		$data['body']="back/tag/all";	
		$this->load->view(admin(),$data);
	}
	public function tambah()
	{
		if ($this->input('btn-save')) {
			$this->tag->insert_normal();
			$this->session->set_flashdata('sukses', "Data berhasil ditambah.");
			redirect('tag');
		}
		else{
			$data['body']="back/tag/add";	
			$this->load->view(admin(),$data);
		}
	}
	function view($id){
		$data['res']=$this->tag->get_by_id($id);	
		$data['body']="back/tag/view";	
		$this->load->view(admin(),$data);
	}
	function delete($id){
		$this->tag->delete($id); 
		echo json_encode(array("status" => TRUE));	
	}
	function edit($id){
		if ($this->input('btn-save')) {			
			$this->tag->update_no_id($id);
			$this->session->set_flashdata('sukses', "Data berhasil diperbaharui.");
			redirect('tag');
		}
		else{
			$data['res']=$this->tag->get_by_id($id);	
			$data['body']="back/tag/edit";	
			$this->load->view(admin(),$data);
		}
	}
	
}
