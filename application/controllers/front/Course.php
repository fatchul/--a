<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends My_Front {

	public $id_user="";
	function __construct(){
		parent::__construct();
		$this->load->model('Silabus_model','silabus');
		$user_session=$this->session->userdata('__usr__');
		$teacher_session=$this->session->userdata('__usr_teacher_');


	}


	/* 
	* open page intead landing page
	* used for open the course
	* 
	*/
	function index(){
		$data['seo']="Kelas Arkademy";
		$this->track();
		$data=$this->information();
		$data['tag']=$this->tag->get_all();
		$data['course']=$this->course->retrieve_all_course();
		$data['body']="front/course/all";			
		$this->load->view("template/front/core",$data);
	}
	function open_course(){
		if (is_ajax()) {

			$id=$this->input('id');
			$token=$this->input('__token');
			$data['__id']=$id;
			$data['__title']=$this->course->see_course('title',$id);
			$data['__durasi']=$this->course->see_course('duration',$id);
			$data['__content']=$this->course->see_course('content',$id);
			
			$dir=$this->galeri->specific_column('directory','token',$token);
			$img=$this->galeri->specific_column('enc_name','token',$token);
			$mime=$this->galeri->specific_column('mime','token',$token);

			$data['__open_img']=base_url()."/".$dir."/".$img."".$mime;

			$data['is_enroll']=FALSE;
			$user_session=$this->session->userdata('__usr__');
			if ($user_session==TRUE) {
				$id_user=$this->user->specific_column('id_user','email',$user_session);
				$is_exist=$this->enroll->isExist_multiple_check('id_course',$id,'id_user',$id_user);
				$data['_token']=$id;
				if ($is_exist) {
					$data['is_enroll']=TRUE;
				}
				else{
					$data['is_enroll']=FALSE;
				}	
			}
			echo json_encode($this->load->view("front/course/modal_course",$data,true));
		}
		else{
			echo "Forbidden";
		}
	}
	function open(){
		if (is_ajax()) {
			$id=$this->input('__session');
			$token=has(30);
			$this->output
			->set_content_type("application/json")
			->set_output(json_encode(array('status'=>true, 'redirect'=>base_url("learn/enroll/".$id."/".$token."") ))); 
		}  
	}
	

	function read($slug=""){	
		

		$data=$this->information();
		$user_session=$this->session->userdata('__usr__');
		$teacher_session=$this->session->userdata('__usr_teacher_');
		$id=$this->course->specific_column('id_course','slug',$slug);
		if (!$id) {
			show_404();
		}
		$data['is_enroll']=FALSE;
		if ($user_session==TRUE || $teacher_session==TRUE) {
			if ($user_session==TRUE) {
				$id_user=$this->user->specific_column('id_user','email',$user_session);
			}
			elseif ($teacher_session==TRUE) {
				$id_user=$this->user->specific_column('id_user','email',$teacher_session);
			}

			$is_exist=$this->enroll->isExist_multiple_check('id_course',$id,'id_user',$id_user);
			if ($this->can_access($this->id_user,$id)) {
				if ($is_exist) {
					$data['is_enroll']=TRUE;
				}
				else{
					$data['is_enroll']=FALSE;
				}	
			}
			else{
				$data['msg']=TRUE;		
			}
		}
		$course=$this->course->get_by_id_course($id);
		$data['_token']=$id; // get id course
		$data['title']=$course[0]->title;
		$data['seo']=$course[0]->title;
		$data['summary']=$course[0]->summary;
		$data['content']=$course[0]->content;
		$data['__durasi']=$course[0]->duration;
		$data['all_silabus']=$this->silabus->get_silabus($id);
		$data['user']=$this->id_user;
		$data['body']="front/course/view";			
		$data['msg']=FALSE;
		$this->load->view("template/front/core",$data);
	}

	function enroll($id="",$token=""){
		
		$data=$this->information();
		if (isset($id)&&isset($token)) {

			$data['is_enroll']="";
			$user_session=$this->session->userdata('__usr__');
			$teacher_session=$this->session->userdata('__usr_teacher_');
			if ($user_session==TRUE || $teacher_session==TRUE) {	

				if ($user_session==TRUE) {
					$this->id_user=$this->user->specific_column('id_user','email',$user_session);
				}
				elseif ($teacher_session==TRUE) {
					$this->id_user=$this->user->specific_column('id_user','email',$teacher_session);
				}

				$data['user']=$this->id_user;
				$url=$this->session->set_userdata('uri',base_url(uri_string()));
				$token=$this->security->get_csrf_hash();

				$id_user=$this->user->specific_column('id_user','email',$user_session);
				$course=$this->course->get_by_id_course($id);
					$data['_token']=$id; // get id course
					$data['title']=$course[0]->title;
					$this->track("Enroll,".$id.",".$course[0]->title);
					$data['summary']=$course[0]->summary;
					$data['content']=$course[0]->content;
					$data['__durasi']=$course[0]->duration;
					$is_exist=$this->enroll->isExist_multiple_check('id_course',$id,'id_user',$this->id_user);
					$data['msg']=FALSE;
					if ($this->can_access($this->id_user,$id)) {
						if ($is_exist) {
							$data['is_enroll']=TRUE;
						}
						else{
							$data['is_enroll']=TRUE;
							$data_tr = array(
								'id_course' => $id, 
								'id_user' => $this->id_user,
								'date_enrollment' => $this->timenow(),
								);
							$this->db->insert('course_tr',$data_tr);
						}
					}
					else{
						$data['msg']=TRUE;		
					}
					$data['all_silabus']=$this->silabus->get_silabus($id);
					$data['body']="front/course/view";			
					$this->load->view("template/front/core",$data);
				}
				else{					
					$this->session->set_userdata('uri',base_url(uri_string()));
					redirect('login');
				}

			}
			else{
				show_404();
			}
		}

		public function download($id="",$enc)
		{
			$sesi=$this->session->userdata('__usr__');
			if ($sesi==TRUE) {
				if (isset($id) && isset($enc)) {
					$this->load->helper('file');
					$get_file_name=$this->galeri->specific_column('enc_name','token',$id);
					if (!$get_file_name) {
						show_404();
					}		
					else{
						$mime=$this->galeri->specific_column('mime','token',$id);		
						$this->load->helper('download');
						$pth = file_get_contents(base_url()."upload/".$get_file_name."".$mime);
						$nme = $get_file_name."".$mime;
						force_download($nme, $pth); 
					}
				}
				else{
					show_404();
				}

			}
			else{
				echo "You must login at first";
			}

		}

		function start($id,$token)
		{
			$user_session=$this->session->userdata('__usr__');
			$teacher_session=$this->session->userdata('__usr_teacher_');
			if ($user_session==TRUE || $teacher_session==TRUE) {	
				if ($user_session==TRUE) {
					$this->id_user=$this->user->specific_column('id_user','email',$user_session);
				}
				elseif ($teacher_session==TRUE) {
					$this->id_user=$this->user->specific_column('id_user','email',$teacher_session);
				}
				if (isset($id)&&isset($token)) {
					if ($this->can_access($this->id_user,$id)) {
						$start=$this->silabus->specific_column_with('id_silabus','id_course',$id,'no_urut',1);
						redirect('tutorial/'.$start);
					}
					else{
						redirect('learn/enroll/'.$id.'/redirect');
					}

				}
				else{
					show_404();
				}
			}
			else{
				redirect('login');
			}


		}

	}
