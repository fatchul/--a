<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_School extends My_Controller{    
    public $size=0;


    function __construct(){
        parent::__construct();
        if ($this->session->userdata('arch_sch')==TRUE) {
            //
            $this->load->library('breadcrumbs');
            $this->load->model('Course_model','course');
            $this->load->model('User_model','user');
            $this->load->model('Subscribe_model','subscribe');
            $this->load->model('School_model','school');
            $this->load->model('Silabus_model','silabus');
            $this->load->model('Course_endorse_model','endorse');
            
            $this->breadcrumbs->push(ucwords($this->uri->segment(1)), "".ucwords($this->uri->segment(1)));
            $this->breadcrumbs->push(ucwords($this->uri->segment(2)), '$this->uri->segment(1)/$this->uri->segment(2)');
            $this->breadcrumbs->unshift("<a href=".site_url('dashboard').">Dashboard</a> /", '/');  
            
        }        
        else{
            redirect('sch');
            $this->session->sess_destroy(); 
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
        $data['jml']=$this->course->count_by('is_publish',1);
        $data['any_subscriber']=$this->subscribe->count_by('is_read','0');
        $data['any_user']=$this->user->count_by('is_read','0');
        $data['any_inbox']=0;   
        $data['all']=$data['any_subscriber']+$data['any_user']+$data['any_inbox'];
        return $data;
    }
    


       
}