<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_Front extends My_Controller{
    
    public $get_lang="";
    public $id_user="";

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

    }
    function bahasa(){
        return $this->get_lang;
    }

    function set_title($param){
        $data['title']=$param;
        return $data;
    }
    protected function alert($msg,$stat=FALSE){
        $this->load->model('User_model','Auth');

        return "<div class='col-sm-12 alert alert-danger text-center' role='alert'>
        ".$msg."
        </div>";
    }
    protected function _is_activate(){
        if ($this->_get_session()) {
            $sesi=$this->session->userdata('user');
            if ($this->Auth->specific_view('is_confirm',$sesi)==='1') {
                return $this->alert("<div class='col-sm-12 alert alert-danger text-center' role='alert'>
                    Lakukan aktivasi akun anda melalui email.
                </div>");
                    //return TRUE;
            }
            else{
                return FALSE;
            }

        }
    }



protected function user_session(){
    return $this->session->userdata('user');
}

protected function _get_session(){
    if ($this->session->userdata('user')==TRUE) {
        return TRUE;
    }
    else{
        return FALSE;
    }
}


protected function _template(){
   return "admin/template/core";
}

protected function _views($dir){
   return $this->dir()."/".$dir;
}

protected function pages(){
    $config['full_tag_open'] = '<ul class="pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_link'] = false;
    $config['last_link'] = false;
    $config['first_tag_open'] = '<li>';
    $config['first_tag_close'] = '</li>';
    $config['prev_link'] = '&laquo';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '&raquo';
    $config['next_tag_open'] = '<li>';
    $config['next_tag_close'] = '</li>';
    $config['last_tag_open'] = '<li>';
    $config['last_tag_close'] = '</li>';
    $config['cur_tag_open'] = '<li class="active"><a href="#">';
    $config['cur_tag_close'] = '</a></li>';
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    return $config;
}



}
