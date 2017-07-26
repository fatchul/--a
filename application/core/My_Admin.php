<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_Admin extends My_Controller{    
    public $size=0;


    function __construct(){
        parent::__construct();
        if ($this->session->userdata('arch')==TRUE) {
            //
            $this->load->library('breadcrumbs');
            $this->load->model('User_model','user');
            $this->load->model('Subscribe_model','subscribe');
            $this->load->model('School_model','school');
            $this->load->model('Gallery_model','galeri');
            $this->load->model('Course_gallery_model','galeri_course');
            $this->load->model('Tag_model','tag');
            $this->load->model('Course_tag_model','course_tag');
            $this->load->model('Course_transaksi_model','enroll');
            
            $this->breadcrumbs->push(ucwords($this->uri->segment(1)), "".ucwords($this->uri->segment(1)));
            $this->breadcrumbs->push(ucwords($this->uri->segment(2)), '$this->uri->segment(1)/$this->uri->segment(2)');
            $this->breadcrumbs->unshift("<a href=".site_url('dashboard').">Dashboard</a> /", '/');  
            
        }        
        else{
            redirect('arkmin');
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

    function data_kategori(){   
        $this->load->model('cms/Cms_page_category_model','cms_page');  
        $d=$this->cms_page->get_all_only('category','Kategori');
        $result=NULL;
        if ($d<>0) {
            foreach ($d as $key => $value) {
                $result[$value->id] = $value->title;
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
    function kategori(){
        $data = array(            
            'Halaman' => 'Halaman', 
            'Kategori' => 'Kategori', 
            );        
        return $data;  
    }
    
    function levelmenu(){
        $this->load->model('Menu_model','menu');
        $d=$this->menu->header_column();
        foreach ($d as $key => $value) {
            $result[$value->level] = $value->identified;
        }
        return $result;
    }

    function category_group(){
        $this->load->model('Collection_model','collect');
        $d=$this->collect->get_by_group('category');
        foreach ($d as $key => $value) {
            $result[$value->category] = $value->category." | ".$value->category_en;
        }
        return $result;
        
    }
    function data_course(){        
        $d=$this->course->get_all();
        $result=NULL;
        if ($d<>0) {
            $result['0'] = "--Select Course--";
            foreach ($d as $key => $value) {
                $result[$value->id_course] = $value->title;
            }
        }
        return $result;
    }
    function redirect($msg){
        echo "
            <link href='css/font-awesome.min.css' rel='stylesheet'>
            <style type='text/css'>
                .container {
                  padding-right: 15px;
                  padding-left: 15px;
                  margin-right: auto;
                  margin-left: auto;
              }
              .text-center {
                  text-align: center;
              }
              body {
                font-family: 'Roboto', sans-serif;
                background: ;
                position: relative;
                font-weight: 400px;
            }
            </style>
                <div class='container text-center'>
                    <div>
                     <br><br><br>
                     <a href='index.html'><img src='http://moeblofurniture.com/images/logo.png' alt=''></a>
                    </div>
                 <div><br><br>
                    ".$msg."
                    
                    </p>
                </div>
            </div>
        ";
        echo "<script>";
        echo "setTimeout(function(){";
        echo 'window.location="';
        echo base_url();
        echo '"';
        echo "},2000)";
        echo "</script>";
    }
    function panel(){

        $data['any_subscriber']=$this->subscribe->count_by('is_read','0');
        $data['any_user']=$this->user->count_by('is_read','0');
        $data['any_inbox']=0;   
        $data['all']=$data['any_subscriber']+$data['any_user']+$data['any_inbox'];

        // $data['data_order']=$this->d->orders();
        // $data['review']=$this->d->review_today();
        // $data['wishlist']=$this->d->wishlist_today();
        // $data['viewer']=$this->d->count_product_viewer();
        // $data['list_viewer']=$this->d->view_today();

        // $order=$this->d->count_order_today();
        // $review=$this->d->count_review_today();
        // $visitor=$this->d->count_visitor_today();
        // $wish=$this->d->count_wishlist_today();
        // $h=$order+$review+$visitor+$wish;
        // $data['today']="<span class='label label-danger min'>".$h."</span>";
        return $data;
    }
    


       
}