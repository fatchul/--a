<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_Teacher extends My_Controller{    
    public $size=0;


    function __construct(){
        parent::__construct();
        if ($this->session->userdata('__usr_teacher_')==TRUE) {
            $this->load->library('breadcrumbs');
            $this->load->model('Course_model','course');
            $this->load->model('User_model','user');
            $this->load->model('Subscribe_model','subscribe');
            $this->load->model('School_model','school');
            $this->load->model('Silabus_model','silabus');
            $this->load->model('Course_endorse_model','endorse');
            
            $this->breadcrumbs->push(ucwords($this->uri->segment(2)), "".ucwords($this->uri->segment(2)));
            $this->breadcrumbs->push(ucwords($this->uri->segment(2)), '$this->uri->segment(2)/$this->uri->segment(3)');
            $this->breadcrumbs->unshift("<a href=".site_url('dashboard').">Dashboard</a> /", '/'); 

            $this->id_user=$this->user->specific_column('id_user','email',$this->session->userdata('__usr_teacher_'));
            
        }        
        if ((!$this->Sesi->session_exist($this->session->userdata('session_id')))||($this->session->userdata('__usr_teacher_')==FALSE)) {
            $this->session->unset_userdata('isLogin');
            $this->session->unset_userdata('__usr_teacher_');
            $this->session->unset_userdata('__sch_id');
            destroy_cookies();
            redirect('login');
        }
        
    }

    
    protected function totalsize(){
        return array_sum(array_map('filesize', glob('*')));       
    }

    function data_sekolah(){        
        $d=$this->school->get_all();
        $result=NULL;
        if ($d<>0) {
            foreach ($d as $key => $value) {
                $result[$value->id_school] = $value->school_name;
            }
        }
        return $result;
    }

    function role(){
        $data = array(            
            '0' => 'Guru', 
            '1' => 'Siswa', 
            );        
        return $data;  
    }
    function gender(){
        $data = array(            
            'L' => 'Laki-laki', 
            'P' => 'Perempuan', 
            );        
        return $data;  
    }
    
    
   
    function panel(){
        $mail_teacher=$this->session->userdata('__usr_teacher_');
        $id_teacher=$this->user->specific_column('id_user','email',$mail_teacher);
        $id_school=$this->user->specific_column('id_school','email',$mail_teacher);

        $nama=$this->user->specific_column('nama','email',$mail_teacher);
        $data=$this->information();
        $data['c_course']=$this->endorse->count_course_registered($id_teacher);
        $data['c_user']=$this->user->count_2_condition('role','1','id_school',$id_school);
        $data['nama']=$mail_teacher;
        $data['any_subscriber']=$this->subscribe->count_by('is_read','0');
        $data['any_user']=$this->user->count_by('is_read','0');
        $data['any_inbox']=0;   
        $data['all']=$data['any_subscriber']+$data['any_user']+$data['any_inbox'];
        return $data;
    }
    


       
}