<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cms_post_model extends Model_Main{    

    // var $order = array('date_create' => 'desc');
    // var $column_order = array('judul','kepada','is_read_by_user',null);
    protected function get_table_name() {
        return 'cms_article';
    }
    protected function primary() {
        return 'id';
    }
    protected function column_search(){
        //return array('judul','kepada','isi');
    }
    public function get_all_field() {        
        $fields = array(                        
              'id' => has(11),
              'category_post' => $this->input('kategori') ,
              'title_post' => $this->input('title') ,
              'content' => $this->input('konten') ,
              'slug' => url_title($this->input('title')) ,
              'date_create' => timestamp(),
              'is_post' => $this->input('is_post'),       
        );
        return $fields;
    }
    
    
}
