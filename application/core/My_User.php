<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_User extends My_Controller{    
    public $size=0;


    function __construct(){
        parent::__construct();
        $this->load->model('User_model','user');
        $this->load->model('Subscribe_model','subscribe');
        $this->load->model('Course_model','course');
        $this->load->model('Gallery_model','galeri');
        $this->load->model('Tag_model','tag');
        $this->load->model('Course_tag_model','course_tag');
        $this->load->model('Course_gallery_model','galeri_course');
        $this->load->model('Course_transaksi_model','enroll');
        $this->load->model('Silabus_model','silabus');
        $this->load->model('Message_model','message');
        $this->load->model('cms/Cms_sosmed_model','Sosmed_model');
        $this->load->model('School_model','school');
        $sesi=$this->session->userdata('__usr__');
        
        

        if ($this->session->userdata('__usr__')==TRUE) {
            $this->id_user=$this->user->specific_column('id_user','email',$sesi);
        }
        if ((!$this->Sesi->session_exist($this->session->userdata('session_id')))||($this->session->userdata('__usr__')==FALSE)) {
            $this->session->unset_userdata('isLogin');
            $this->session->unset_userdata('__usr__');
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
        $mail_teacher=$this->session->userdata('__usr__');
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