<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Setting extends My_School {
	public $get_sesi="";
	function __construct(){
		parent::__construct();            
		$this->get_sesi=$this->session->userdata('arch_sch');
	}	
	function index(){
		if ($this->input('btn-save')) {
			$id=$this->get_sesi;
			echo $id;
			if ($this->input('password')===$this->school->specific_view('password',$id)) {
				$this->school->update_no_password($id);
			}
			else{
				$this->school->update_field('id_school',$id,$this->school->get_all_field_for_update());
			}
			$this->session->set_flashdata('sukses', "Data berhasil diperbaharui.");
			redirect('school/setting');
		}
		else{
			$data=$this->panel();
			$data['res']=$this->school->get_by_id($this->get_sesi);			
			$data['body']="school/setting";	
			$this->load->view(school(),$data);
		}
	}


}
