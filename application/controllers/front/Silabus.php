<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Silabus extends My_Front {

	public $id_user="";
	function __construct(){
		parent::__construct();
		$this->load->model('Silabus_model','silabus');
		$sesi=$this->session->userdata('__usr__');
		$sesi_guru=$this->session->userdata('__usr_teacher_');
		if ($sesi==TRUE || $sesi_guru==TRUE) {
			if ($sesi_guru==TRUE) {
				$this->id_user=$this->user->specific_column('id_user','email',$sesi_guru);
			}
			elseif ($sesi==TRUE) {
				$this->id_user=$this->user->specific_column('id_user','email',$sesi);
			}
			elseif ($this->id_user=="") {
				$this->session->sess_destroy();  	
				redirect('login');
			}
			else{
				$this->session->sess_destroy();  	
				redirect('login');	
			}
		}
		else{
			redirect('login');	
		}
		//echo $sesi_guru;
	}


	/* 
	* open page intead landing page
	* used for open the course
	* 
	*/
	function index(){
		$this->track();
		$data=$this->information();
		$data['tag']=$this->tag->get_all();
		$data['course']=$this->course->retrieve_all_course();
		$data['body']="front/course/all";			
		$this->load->view("template/front/core",$data);
	}
	function view($id="")
	{
		$this->track();
		$data=$this->information();

		$user_session=$this->session->userdata('__usr__');
		$teacher_session=$this->session->userdata('__usr_teacher_');
		if ($user_session==TRUE) {
			$id_user=$this->user->specific_column('id_user','email',$user_session);
		}
		elseif ($teacher_session==TRUE) {
			$id_user=$this->user->specific_column('id_user','email',$teacher_session);
		}
		$this->id_user = $id_user;
		if (isset($id)) {
			$data['end']="0";
			$data['user']=$this->id_user;
			$id_course=$this->silabus->see_course('id_course',$id);

			$total_silabus=$this->silabus->total_silabus($id_course);
			
			$check_finish=$this->enroll->status_course('id_course',$id_course,'id_user',$this->id_user);
			$is_enroll=$this->enroll->get_by_multiple('id_course',$id_course,'id_user',$this->id_user);
			$data['seo']=$this->course->specific_view('title',$id_course)." :: ".$this->silabus->see_course('title_silabus',$id);
			$data['msg']=FALSE;
			if ($this->can_access($this->id_user,$id_course)) {
				if ($is_enroll) {
					$data_enroll = array(
						'id_course' => $id, 
						'id_user' => $this->id_user, 
						'date_enrollment' => $this->timenow(),
						);
					$check_enroll=$this->enroll->isExist_multiple_check('id_course',$id,'id_user',$this->id_user);

					$count_course_active=$this->enroll->count_2_condition('is_finish',0,'id_user',$this->id_user);
					
					if (!$check_enroll) {
						$this->enroll->insert_to($data_enroll);
					}
					$utm_id=$this->input->get('utm');
					$is_end=$this->input->get('end');
					$from=$this->silabus->see_course('id_silabus',$utm_id);
					if (isset($from)) {
						$data_enroll_update = array(
								'is_finish' => '1', 
								'finish_task' => $this->timenow(),
								);
						$this->enroll->update_field_multiple('id_course',$this->input->get('utm'),'id_user',$this->id_user,$data_enroll_update);
					}

					if ($utm_id==='end') {
						$id=$this->uri->segment(2);
						$data_enroll_update = array(
								'is_finish' => '1', 
								'finish_task' => $this->timenow(),
								);
						$data['end']="1";
						$this->enroll->update_field_multiple('id_course',$id,'id_user',$this->id_user,$data_enroll_update);
						$this->enroll->update_field_multiple('id_course',$id_course,'id_user',$this->id_user,$data_enroll_update);
					}
					
					$data['user']=$this->id_user;
					$data['all_silabus']=$this->silabus->get_silabus($id_course);
					$data['course']=$this->course->get_by_id($id_course);
					$data['silabus']=$this->silabus->get_by_id($id);
					$get_no_urut=$data['silabus'][0]->no_urut;
					$get_prev_qu=$get_no_urut-1;
					$get_next_qu=$get_no_urut+1;
					$prev_id=$this->silabus->specific_column_with('id_silabus','no_urut',$get_prev_qu,'id_course',$id_course);
					$next_id=$this->silabus->specific_column_with('id_silabus','no_urut',$get_next_qu,'id_course',$id_course);

					if ($prev_id!="") {
						$data['prev']="<li class='previous'><a href='".base_url()."tutorial/".$prev_id."' class=' btn-btn-danger'>Kembali Kelas Sebelumnya</a></li>";
					}
					else{
						$data['prev']="";
					}
					if ($next_id!="") {
						if ($check_finish=='0') {
							$data['next']="<li class='next'><a href='".base_url()."tutorial/".$next_id."?utm=".$id."'>Selesai Kelas Ini dan Lanjutkan</a></li>";
						}
						else{
							$data['next']="<li class='next'><a href='".base_url()."tutorial/".$next_id."?utm=".$id."'>Materi Selanjutnya</a></li>";	
						}
					}
					else{
						if ($check_finish=='0') {
							$data['next']="<b><li class='next'><a href='".base_url()."tutorial/".$id."?utm=end'>Akhiri pelatihan ini &#x3e;&#x3e;</a></li></b>";
						}
						else{
							$data['next']="";
						}
						
					}
					$data['body']="front/course/silabus/view";
					
				}
				else{
					$title_course=$this->course->specific_column('title','id_course',$id_course);
					$slug=$this->course->specific_column('slug','id_course',$id_course);

					$data['msg']="Anda belum melakukan Enroll kelas <a href='".base_url()."learn/".$slug."'>".$title_course."</a>.";
					$data['body']="front/error";		
				}
				$this->load->view("template/front/core",$data);
			}
			else{
				$data['msg']=TRUE;
				$data['body']="front/course/view";
				$this->load->view("template/front/core",$data);
			}
		}
		else{
			show_404();
		}
	}
	
}
