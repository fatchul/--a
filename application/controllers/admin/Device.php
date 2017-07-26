<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device extends My_Admin {

	function __construct(){
        parent::__construct();        
        
    }
	
	public function index()
	{
		$data['seo']="Device | Dashboard";
		$data['all']=$this->course->get_all_order('last_update','DESC');	
		$data['body']="back/device/all";	
		$this->load->view(admin(),$data);
	}
	public function tambah()
	{$data['seo']="Device | Dashboard";
		if ($this->input('btn-save')) {
			$this->device->insert_normal();
			$this->session->set_flashdata('sukses', "Data berhasil ditambah.");
			redirect('device');
		}
		else{
			$data['body']="back/device/add";	
			$this->load->view(admin(),$data);
		}
	}
	function view($id){$data['seo']="Device | Dashboard";
		$data['body']="back/device/view";	
		$this->load->view(admin(),$data);
	}
	function delete($id){
		echo json_encode(array("status" => TRUE));	
	}
	function edit($id){$data['seo']="Device | Dashboard";
		$data['res']=$this->device->get_by_id($id);	
		$data['body']="back/device/edit";	
		$this->load->view(admin(),$data);
	}
	
}
