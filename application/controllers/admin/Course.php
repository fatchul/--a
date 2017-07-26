<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends My_Admin {

	function __construct(){
		parent::__construct();        
		$this->load->model('Course_model','course');
		$this->load->model('Silabus_model','silabus');
		$this->load->helper(array('url','html','form')); 
	}
	
	public function index()
	{
		$data['seo']="Course | Dashboard";
		$data['all']=$this->course->get_all_order('last_update','DESC');	
		$data['body']="back/course/all";	
		$this->load->view(admin(),$data);
	}
	public function tambah()
	{
		$data['seo']="Course | Dashboard";
		if ($this->input('btn-save')) {

			$myString = $this->input('meta');
			$myArray = explode(',', $myString);
			$pecah="";
			$data=$this->course->get_all_field();
			foreach($myArray as $my_Array){
				$pecah .= '"'.$my_Array.'",';
			}
			$data['meta'] = "{".rtrim($pecah, ',')."}";

			// add to course gallery
			$media=$this->input->post('media'); // get id media array
			if ($media) {
				foreach($media as $value){
					$data_by_media= array(
						'id_galeri_media' => $_POST['media'][$value],
						'id_course' => $this->input('id_course'), 							
						);
					$this->db->insert('course_gallery',$data_by_media);
				}
			}
			$this->course->insert_to($data);

			// add tag
			$id_tag=$this->input->post('id_tag');
			if ($id_tag) {
				foreach ($id_tag as $key => $t) {
					$data_by_tag= array(
						'id_course' => $this->input('id_course'), 						
						'id_tag' => $t,	
						);
					$this->db->insert('course_tag',$data_by_tag);
				}
			}

			if (($_FILES['thumbnail']['name'])) {
				$this->_config_upload();
				if($this->upload->do_upload('thumbnail')){
					$finfo=$this->upload->data();     
					$orig_name=$this->upload->data('orig_name');
		        	$nama_file=$this->upload->data('raw_name');
		        	$mime=$this->upload->data('file_ext');
		        	$this->createThumbnail("upload/",$finfo['file_name'],262,170);
        			$finfo['raw_name']. '_thumb' .$finfo['file_ext'];	
					$data_galeri = array(
		        		'file_name' => $orig_name, 
		        		'enc_name' => $nama_file, 
		        		'directory' => 'upload/', 
		        		'token' => "0.".has(10), 
		        		'mime' => $mime, 
		        		'note' => '',  
		        		'owner' => 'T',
	        		);
	        		$id_gallery=$this->galeri->insert_to($data_galeri);

	        		$data_course_galeri = array(
		        		'id_course' => $this->input('id_course'), 
		        		'id_galeri_media' => $id_gallery, 
	        		);
	        		$this->db->insert('course_gallery',$data_course_galeri); // insert data to course gallery
	        		$this->session->set_flashdata('sukses', "Data berhasil ditambah.");
				}
				else{
					$this->session->set_flashdata('gagal',$this->upload->display_errors());
					redirect('course/tambah');	
				}
			}
			
			else{				
				$data_by_media= array(
					'id_galeri_media' => 9999999,
					'id_course' => $this->input('id_course'), 							
				);
				$this->db->insert('course_gallery',$data_by_media);
				$this->session->set_flashdata('sukses', "Data berhasil ditambah.");
			}
			redirect('course');

		}
		else{
			$get_tag=$this->tag->get_all();
			if ($get_tag<>0) { // tag cannot ampty result
				$data['body']="back/course/add";	
				$data['tag']=$this->tag->get_all();
				$this->load->view(admin(),$data);
			}
			else{
				$this->session->set_flashdata('gagal', "Tag harus ada minimal 1. Silahkan tambahkan tag terlebih dahulu");
				redirect('tag/tambah');				
			}
			
		}
	}
	function view($id=NULL){$data['seo']="Course | Dashboard";
		$data['res']=$this->course->get_by_id($id);	
		$data['body']="back/course/view";	
		$this->load->view(admin(),$data);
	}
	function delete($id=NULL){
		if (is_ajax()) {
			$this->course->delete($id); 
			$this->galeri_course->delete_by('id_course',$id); // delete data from gallery course because media doesnt has relation with course
			$this->silabus->delete_by('id_course',$id);
			$this->course_tag->delete_by('id_course',$id);
			$this->enroll->update_field('id_course',$id,array('id_course' => '// course deleted'));
			echo json_encode(array("status" => TRUE));	
		}
	}
	function edit($id=NULL){$data['seo']="Course | Dashboard";
		if ($this->input('btn-save')) {						
			$this->course->update_by($id);
			$media=$this->input->post('media'); // get id media array
			if ($media) {
				foreach($media as $value){
					$data_by_media= array(
						'id_galeri_media' => $_POST['media'][$value],
						'id_course' => $this->input('id_course'), 							
						);
					$this->db->insert('course_gallery',$data_by_media);
				}
			}
			$id_tag=$this->input->post('id_tag');
			if ($id_tag) {
				foreach ($id_tag as $key => $t) {
					$data_by_tag= array(
						'id_course' => $this->input('id_course'), 						
						'id_tag' => $t,	
						);
					$this->db->insert('course_tag',$data_by_tag);
				}
			}
			if (($_FILES['thumbnail']['name'])) {
				$this->_config_upload();
				$get_id=$this->galeri_course->get_id_media_galery_course($id);
				$id_course_galeri=$get_id->id; //get id course gallery and then delete this id course gallery 
				$force_delete=$this->galeri_course->delete($id_course_galeri);
				$id_galeri=$get_id->gal_id; //get id gallery media and then update the owner  
				$this->galeri->update($id_galeri,array('owner' => 'C'));
					if($this->upload->do_upload('thumbnail')){
						$finfo=$this->upload->data();     
						$orig_name=$this->upload->data('orig_name');
			        	$nama_file=$this->upload->data('raw_name');
			        	$mime=$this->upload->data('file_ext');
			        	$this->createThumbnail('upload/',$finfo['file_name'],262,170);
	        			$finfo['raw_name']. '_thumb' .$finfo['file_ext'];	
						$data_galeri_edit = array(
			        		'file_name' => $orig_name, 
			        		'enc_name' => $nama_file, 
			        		'directory' => 'upload/', 
			        		'token' => "0.".has(10), 
			        		'mime' => $mime, 
			        		'note' => '',  
			        		'owner' => 'TK',
		        		);
		        		//pre_dump($data_galeri_edit);
		        		$id_gallery_edit=$this->galeri->insert_to($data_galeri_edit);

		        		$data_course_galeri_edit = array(
			        		'id_course' => $id, 
			        		'id_galeri_media' => $id_gallery_edit, 
		        		);
		        		$this->db->insert('course_gallery',$data_course_galeri_edit); // insert data to course gallery
		        		$this->session->set_flashdata('sukses', "Data berhasil ditambah.");
					}
					else{
						$this->session->set_flashdata('gagal',$this->upload->display_errors());
						redirect('course/edit/'.$id);	
					}
				
				//echo "yes you change pict";
			}
			else{
				// no change thumbnail picture
				//echo "no change pict";	
			}
			$this->session->set_flashdata('sukses', "Data berhasil diperbaharui.");
			redirect('course/edit/'.$id.'');
		}
		else{
			$data['res']=$this->course->get_by_id($id);
			$data['course_tag']=$this->course_tag->get_tag($id);	
			$data['tag']=$this->tag->get_all();
			$data['body']="back/course/edit";	
			$this->load->view(admin(),$data);
		}
		
	}
	function see_tag($id=NULL){
		if (is_ajax()) {
			$data['tema']=$this->tag->specific_view('name',$id);
			$data['all']=$this->course->retrieve_all_course_by_tag($id);
			echo json_encode($this->load->view("back/course/tag_course",$data,true));
		}
	}	
	function see_enroll($id){
		if (is_ajax()) {
			$data['title']=$this->course->specific_view('title',$id);
			$data['all']=$this->enroll->list_enrollment($id);
			echo json_encode($this->load->view("back/course/enrollmers",$data,true));
		}
	}
	function see_enroll_student($id){
		if (is_ajax()) {
			$data['title']=$this->course->specific_view('title',$id);
			$data['all']=$this->enroll->list_enrollment_by_role($id,1);
			echo json_encode($this->load->view("back/course/enrollmers",$data,true));
		}
	}
	function see_enroll_guru($id){
		if (is_ajax()) {
			$data['title']=$this->course->specific_view('title',$id);
			$data['all']=$this->enroll->list_enrollment_by_role($id,0);
			echo json_encode($this->load->view("back/course/enrollmers",$data,true));
		}
	}
	function see_silabus($id){
		if (is_ajax()) {
			//$data['title']=$this->course->specific_view('title',$id);
			$data['all']=$this->silabus->get_all_order_with('no_urut','ASC','id_course',$id);
			echo json_encode($this->load->view("back/course/silabus",$data,true));
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
	function statistik($id){
		$data['res']=$this->course->get_by_id($id);
		$data['body']="back/course/statistik";	
		$this->load->view(admin(),$data);
	}

	// statistik
	function total_enroll(){

	}
}
