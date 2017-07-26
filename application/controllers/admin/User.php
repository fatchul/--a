<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//open dashboard admin
//routing action
/*
* Geekpro admin's Users management class
*/
class User extends My_Admin {

	function __construct(){
		parent::__construct();            
	}	

  /*
  * list of subscribers
  * get from tb user both of student and teacher ( not school)
  */
	function index(){
		$data['body']="back/user/all";	
		$this->load->view(admin(),$data);
	}

  /* 
  * list of subscribers
  * get from tb user who subscribe email
  */
	public function subscribe()
	{	$data['seo']="User | Dashboard";
		$data['body']="back/user/subscriber";	
		$this->load->view(admin(),$data);
	}

	/*
	* retrieving all data user using ajax response
	*/
	function list_user_all(){
		if (is_ajax()) {
			$note=$this->input->get('n');
			$list = $this->user->get_datatables_where_not_in('role',10);
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
				$row[] = subscribe($person->is_subscribe)." ".oke($person->is_valid);
				$row[] = $this->school->specific_view('school_name',$person->id_school);

				$row[] = '<a class="btn btn-xs btn-success " href='.base_url().'user/view/'.$person->id_user.' title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
				<a class="btn btn-xs btn-warning" href='.base_url().'user/edit/'.$person->id_user.' title="Edit" onclick="edit('."'".$person->id_school."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
				<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="d('."'".$person->id_user."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_GET['draw'],
				"recordsTotal" => $this->user->count_by_not_in('role',10),
				"recordsFiltered" => $this->user->count_filtered_where_not_in('role',10),
				"data" => $data,
				);
			echo json_encode($output);
		}
		else{
			echo "Forbidden";
		}
	}

	/*
	* User CRUD functions
	*/
	function tambah(){
		$data['seo']="User | Dashboard";
		if ($this->input('btn-save')) {
			$email=$this->input('email');
			$exist=$this->user->isExist('email',$email);
			if ($exist) {
				$this->session->set_flashdata('gagal', "Email sudah terdaftar.");
				redirect('user/tambah');
			}
			else{
				$this->user->insert_normal();
				$this->session->set_flashdata('sukses', "Data berhasil ditambah.");
				redirect('user');
			}
		}
		else{
			$data['list_sekolah']=$this->data_sekolah();
			$data['role']=$this->role();
			$data['gender']=$this->gender();
			$data['body']="back/user/add";	
			$this->load->view(admin(),$data);
		}
	}

	function delete(){
		if (is_ajax()) {
			$id=$this->uri->segment(4);
			$this->user->delete($id); //Replace with your model name
			echo json_encode(array("status" => TRUE));	
		}
		else{
			echo "Forbidden";
		}
	}

	function edit($id){	$data['seo']="User | Dashboard";	
		if ($this->input('btn-save')) {	
			$this->user->update_no_id($id);
			$this->session->set_flashdata('sukses', "Data berhasil diperbaharui.");
			redirect('user/');
		}
		elseif ($this->input('btn-change-password')) {
			$this->user->update_password($id,generateHash($this->input('password')));
			$this->session->set_flashdata('sukses', "Password berhasil diganti.");
			redirect('user/');
		}
		else{	
			$data['list_sekolah']=$this->_dropdown_select('id_sekolah','id_sekolah',$this->data_sekolah(),$this->user->specific_column('id_school','id_user',$id));	
			$data['role']=$this->_dropdown_select('role','role',$this->role(),$this->user->specific_column('role','id_user',$id));	
			$data['gender']=$this->_dropdown_select('gender','gender',$this->gender(),$this->user->specific_column('gender','id_user',$id));	
			$data['res']=$this->user->get_by_id($id);	
			$data['body']="back/user/edit";	
			$this->load->view(admin(),$data);
		}
	}
	function view($id){		
		$data['seo']="User | Dashboard";
			$data['res']=$this->user->get_by_id($id);	
			$data['body']="back/user/view";	
			$this->load->view(admin(),$data);
		
	}
}
