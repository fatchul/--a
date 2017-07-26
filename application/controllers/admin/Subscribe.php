<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//open dashboard admin
//routing action
/*
* Geekpro admin's Subscribe management class
*/
class Subscribe extends My_Admin {

	function __construct(){
		parent::__construct();            

	}	

	function index(){
		$this->subscribe->update_all('is_read','0',array('is_read' => '1' ));//marking 'already viewed' data
		$data['body']="back/subscribe/all";	
		$this->load->view(admin(),$data);
	}

	// retrieving data school subscriber using ajax response
	function list_of(){
		if (is_ajax()) {
			$list = $this->subscribe->get_datatables();
			$data = array();
			$no = $_GET['start'];
			foreach ($list as $person) {
				

				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $person->email;
				$row[] = $person->nama;
				$row[] = $person->instansi;
				$row[] = $person->telp;
				$row[] = $person->date_join;			
				$row[] = oke($person->is_active);
				$row[] = '<a class="btn btn-xs btn-success " href='.base_url().'subscribe/view/'.$person->id.' title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
				<a class="btn btn-xs btn-warning" href='.base_url().'subscribe/edit/'.$person->id.' title="Edit" onclick="edit('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
				<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="d('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_GET['draw'],
				"recordsTotal" => $this->subscribe->count_all(),
				"recordsFiltered" => $this->subscribe->count_filtered(),
				"data" => $data,
				);
			echo json_encode($output);
		}
		else{
			echo "Forbidden";
		}
	}
	function tambah(){
		if ($this->input('btn-save')) {
			$this->subscribe->insert_normal();
			$this->session->set_flashdata('sukses', "Data berhasil ditambah.");
			redirect('subscribe');
		}
		else{
			$data['body']="back/subscribe/add";	
			$this->load->view(admin(),$data);
		}
	}
	function delete(){
		if (is_ajax()) {
			$id=$this->uri->segment(4);
			$this->subscribe->delete($id); //Replace with your model name
			echo json_encode(array("status" => TRUE));	
		}
		else{
			echo "Forbidden";
		}
	}
	function edit($id){		
		if ($this->input('btn-save')) {			
			$this->subscribe->update_by($id);
			$this->session->set_flashdata('sukses', "Data berhasil diperbaharui.");
			redirect('subscribe');
		}
		else{
			$data['res']=$this->subscribe->get_by_id($id);	
			$data['body']="back/subscribe/edit";	
			$this->load->view(admin(),$data);
		}
	}
	function view($id){
		$data['res']=$this->subscribe->get_by_id($id);	
		$data['body']="back/subscribe/view";	
		$this->load->view(admin(),$data);
	}
}
