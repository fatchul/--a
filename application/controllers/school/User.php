<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//open dashboard admin
//routing action
/*
* Geekpro school's Users management class
*/
class User extends My_School {
	public $get_sesi="";
	function __construct(){
		parent::__construct();            
		$this->get_sesi=$this->session->userdata('arch_sch');
	}	

  /*
  * list of subscribers
  * get from tb user both of student and teacher ( not school)
  */
	function index(){
		$data=$this->panel();
		$data['body']="school/user/all";	
		$this->load->view(school(),$data);
	}

	/*
	* retrieving data user using ajax response with session validation
	*/
	function list_user(){
		$note=$this->input->get('n');
		$list = $this->user->get_datatables_where('id_school',$this->get_sesi); //retrive data base from id school
		$data = array();
		$no = $_GET['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $person->email;
			$row[] = $person->nama;
			$row[] = $person->date_join;
			$row[] = role($person->role);
			$row[] = gender($person->gender);
			$row[] = oke($person->is_subscribe);
			$row[] = oke($person->is_valid);

			$row[] = '<a class="btn btn-xs btn-warning" href='.base_url().'school/user/edit/'.$person->id_user.' title="Edit" onclick="edit('."'".$person->id_school."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
			<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="d('."'".$person->id_user."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_GET['draw'],
			"recordsTotal" => $this->user->count_by('id_school',$this->get_sesi),
			"recordsFiltered" => $this->user->count_filtered_where('id_school',$this->get_sesi),
			"data" => $data,
			);
		echo json_encode($output);
	}

	/*
	* User CRUD functions
	*/
	function tambah(){
		$data=$this->panel();
		if ($this->input('btn-save')) {
			$email=$this->input('email');
			$exist=$this->user->isExist('email',$email);
			if ($exist) {
				$this->session->set_flashdata('gagal', "Email sudah terdaftar.");
				redirect('school/user/tambah');
			}
			else{
				$this->user->insert_normal();
				$this->session->set_flashdata('sukses', "Data berhasil ditambah.");
				redirect('school/user');
			}
		}
		else{
			$data['list_sekolah']=$this->data_sekolah();
			$data['role']=$this->role();
			$data['gender']=$this->gender();
			$data['body']="school/user/add";	
			$this->load->view(school(),$data);
		}
	}

	function delete(){
		$id=$this->uri->segment(4);
		$this->user->delete_with($id,'id_school',$this->get_sesi); //delete data with session validation
		echo json_encode(array("status" => TRUE));	
	}

	function edit($id){	
		$data=$this->panel();	
		if ($this->input('btn-save')) {	
			$this->user->update_no_id($id);
			$this->session->set_flashdata('sukses', "Data berhasil diperbaharui.");
			redirect('school/user/');
		}
		elseif ($this->input('btn-change-password')) {
			$this->user->update_password($id,generateHash($this->input('password')));
			$this->session->set_flashdata('sukses', "Password berhasil diganti.");
			redirect('school/user/');
		}
		else{					
			$data['role']=$this->_dropdown_select('role','role',$this->role(),$this->user->specific_column('role','id_user',$id));	
			$data['gender']=$this->_dropdown_select('gender','gender',$this->gender(),$this->user->specific_column('gender','id_user',$id));	
			$data['res']=$this->user->get_by_id_with($id,'id_school',$this->get_sesi); //get data with session validation	 
			$data['body']="school/user/edit";	
			$this->load->view(school(),$data);
		}
	}
}
