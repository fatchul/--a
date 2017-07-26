<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//open dashboard admin
//routing action
/*
* Geekpro teacher's Users management class
*/

class User extends My_Teacher {

	public $id_teacher="";
	public $id_school="";

	function __construct(){
		parent::__construct();            
		$mail_teacher=$this->session->userdata('__usr_teacher_');
		$this->id_teacher=$this->user->specific_column('id_user','email',$mail_teacher);
		$this->id_school=$this->user->specific_column('id_school','email',$mail_teacher);
	}	

  /*
  * list of subscribers
  * get from tb user both of student and teacher ( not teacher)
  */
	function index(){
		$data=$this->panel();
		$data['body']="teacher/user/all";
		$data['count']=$this->user->count_2_condition('role','1','id_school',$this->id_school);
		$data['all']=$this->user->get_by_multiple('id_school',$this->id_school,'role',1);
		
		$this->load->view("template/front/core",$data);
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
				redirect('teacher/user/tambah');
			}
			else{
				$this->user->insert_normal();
				$this->session->set_flashdata('sukses', "Data berhasil ditambah.");
				redirect('g/siswa');
			}
		}
		else{
			$data['list_sekolah']=$this->data_sekolah();
			$data['role']=$this->role();
			$data['gender']=$this->gender();
			$data['body']="teacher/user/add";	
			$this->load->view(teacher(),$data);
		}
	}

	function delete(){
		$id=$this->uri->segment(4);
		$this->user->delete_with($id,'id_teacher',$this->id_school); //delete data with session validation
		echo json_encode(array("status" => TRUE));	
	}

	function edit($id){	
		$data=$this->panel();	
		if ($this->input('btn-save')) {			
			$this->user->update_by($id);
			$this->session->set_flashdata('sukses', "Data berhasil diperbaharui.");
			redirect('teacher/user/');
		}
		else{					
			$data['role']=$this->_dropdown_select('role','role',$this->role(),$this->user->specific_column('role','id_user',$id));	
			$data['gender']=$this->_dropdown_select('gender','gender',$this->gender(),$this->user->specific_column('gender','id_user',$id));	
			$data['res']=$this->user->get_by_id_with($id,'id_teacher',$this->id_school); //get data with session validation	 
			$data['body']="teacher/user/edit";	
			$this->load->view(teacher(),$data);
		}
	}
}
