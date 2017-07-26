<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Silabus extends My_Admin {

	function __construct(){
		parent::__construct();        
		$this->load->model('Course_model','course');
		$this->load->model('Silabus_model','silabus');
		$this->load->helper(array('url','html','form')); 
	}
	
	public function index()
	{
		$data['seo']="Silabus | Dashboard";
		$data['all']=$this->silabus->get_silabus_all_admin();	
		$data['body']="back/silabus/all";	
		$this->load->view(admin(),$data);
	}
	public function tambah($id="")
	{$data['seo']="Silabus | Dashboard";
		$data['all_silabus']=$this->silabus->get_silabus($id);
		if ($this->input('btn-save')) {
			$data=$this->silabus->get_all_field();			
			$how=$this->silabus->insert_to($data);
			if ($how > 0) {
				$media=$this->input->post('media'); // get id media array
				if ($media) {
					foreach($media as $value){
						$data_by_media= array(
							'id_galeri_media' => $_POST['media'][$value],
							'id_course' => $this->input('id_silabus'), 						
							);
						$this->db->insert('course_gallery',$data_by_media);
					}
				}
			}
			$this->session->set_flashdata('sukses', "Data berhasil ditambah.");
			redirect('admin/silabus');

		}
		else{
			if ($id=="") {
				$data['title']="";
				$data['hidden']="";
				$data['materi_ke']=t_text_read_only('Materi Ke','no_urut','','no');
				$data['course_id']=t_select("Course",'id_course','id_course',$this->data_course(),'id_course');

			}
			else{
				$data['course_id']="";
				$data['hidden']="<input type='hidden' name='id_course' value='".$id."'>";
				$data['materi_ke']=t_text_read_only('Materi Ke','no_urut',$this->silabus->no_urut_silabus($id));
				$res=$this->course->get_by_id($id);	
				$data['title']=" <p style='font-size: 18px'>Silabus <a href=".base_url()."learn/".$res[0]->slug." target='_blank'>".$res[0]->title."</a> </p>";
			}
			$data['body']="back/silabus/add";	
			$data['tag']=$this->tag->get_all();
			$this->load->view(admin(),$data);
		}
	}
	function view($id=NULL){
		$data['seo']="Silabus | Dashboard";
			$data['res']=$this->silabus->get_by_id($id);	
			$data['body']="back/silabus/view";	
			$this->load->view(admin(),$data);
		
	}
	function delete($id=NULL){
		if (is_ajax()) {
			$this->silabus->delete($id); 
			$this->galeri_course->delete_by('id_course',$id); // delete data from gallery course because media doesnt has relation with id silabus

			$this->enroll->update_field('id_course',$id,array('id_course' => '// silabus deleted'));
			echo json_encode(array("status" => TRUE));	
		}
	}
	function edit($id=NULL){$data['seo']="Silabus | Dashboard";
		if ($this->input('btn-save')) {						
			$fields = array(                        
	              'title_silabus' => $this->input->post('title'),
	              'summary_silabus' => $this->input->post('summary'),               
	              'no_urut' => $this->input->post('no_urut'),
	              'content_silabus' => $this->input->post('content'),
	              'last_update' => timestamp(),                            
	              'is_publish' => $this->input->post('is_publish'),
	        );
			$this->silabus->update($id,$fields);
			
			$this->session->set_flashdata('sukses', "Data berhasil diperbaharui.");
			redirect('admin/silabus/edit/'.$id.'');
		}
		else{
			$data['res']=$this->silabus->get_by_id($id);
			$data['body']="back/silabus/edit";	
			$this->load->view(admin(),$data);
		}
		
	}
	function see_tag($id=NULL){
		if (is_ajax()) {
			$data['tema']=$this->tag->specific_view('name',$id);
			$data['all']=$this->silabus->retrieve_all_course_by_tag($id);
			echo json_encode($this->load->view("back/silabus/tag_course",$data,true));
		}
	}	
	function see_enroll($id){
		if (is_ajax()) {
			$data['title']=$this->silabus->specific_view('title_silabus',$id);
			$data['all']=$this->enroll->list_enrollment($id);
			echo json_encode($this->load->view("back/course/enrollmers",$data,true));
		}
	}
	function delete_media($id){
		if (is_ajax()) {
			$this->galeri_course->delete($id); 
			echo json_encode(array("status" => TRUE));	
		}
	}
	function delete_tag($id){
		if (is_ajax()) {
			$this->course_tag->delete($id); 
			echo json_encode(array("status" => TRUE));	
		}	
	}
	function get_urut_silabus($id){
		if (is_ajax()) {
			
			if ($id=='') {
				$data['no']=0;
			}
			else{
				$data['no']=$this->silabus->no_urut_silabus($id);	
			}
			echo json_encode($data);	
		}		
	}
}
