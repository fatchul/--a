<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//open dashboard admin
//routing action
/*
* Geekpro Admin's School management class
*/
class School extends My_Admin {

	function __construct(){
		parent::__construct();            
	}	

	function index(){$data['seo']="Sekolah | Dashboard";
		$data['body']="back/sekolah/all";	
		$this->load->view(admin(),$data);
	}

	/*
	* retrieving data school subscriber using ajax response
	*/
	function list_of(){
		if (is_ajax()) {
			$list = $this->school->get_datatables();
			$data = array();
			$no = $_GET['start'];
			foreach ($list as $person) {
				
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $person->school_name;
				$row[] = $person->address;
				$row[] = $person->update_at;
				$row[] = $person->email;
				$row[] = $person->contact_person;
				$row[] = $person->last_login;
				$row[] = oke($person->is_valid);
				$row[] = '<a class="btn btn-xs btn-success " href='.base_url().'sekolah/view/'.$person->id_school.' title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
				<a class="btn btn-xs btn-warning" href='.base_url().'sekolah/edit/'.$person->id_school.' title="Edit" onclick="edit('."'".$person->id_school."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
				<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="d('."'".$person->id_school."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_GET['draw'],
				"recordsTotal" => $this->school->count_all(),
				"recordsFiltered" => $this->school->count_filtered(),
				"data" => $data,
				);
			echo json_encode($output);
		}
		else{
			echo "Forbidden";
		}
	}
	
	/*
	* CRUDS
	*/
	function tambah(){$data['seo']="Sekolah | Dashboard";
		if ($this->input('btn-save')) {
			$this->school->insert_normal();
			$this->session->set_flashdata('sukses', "Data berhasil ditambah.");
			redirect('admin/school');
		}
		else{
			$data['body']="back/sekolah/add";	
			$this->load->view(admin(),$data);
		}
	}
	function delete(){
		if (is_ajax()) {
			$id=$this->uri->segment(4);
			$this->school->delete($id); //Replace with your model name
			echo json_encode(array("status" => TRUE));	
		}
		else{
			echo "Forbidden";
		}
	}
	function edit($id){	$data['seo']="Sekolah | Dashboard";	
		if ($this->input('btn-save')) {						
			$this->school->update_no_id($id);
			$this->session->set_flashdata('sukses', "Data berhasil diperbaharui.");
			redirect('admin/school/');
		}
		elseif ($this->input('btn-change-password')) {
			$this->school->update_password($id,generateHash($this->input('password')));
			$this->session->set_flashdata('sukses', "Password berhasil diganti.");
			redirect('admin/school/');
		}
		else{
			$data['res']=$this->school->get_by_id($id);	
			$data['body']="back/sekolah/edit";	
			$this->load->view(admin(),$data);
		}
	}
	function view($id){$data['seo']="Sekolah | Dashboard";
		$data['res']=$this->school->get_by_id($id);	
		$data['body']="back/sekolah/view";	
		$this->load->view(admin(),$data);
	}
}
