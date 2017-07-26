<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery_model extends Model_Main{    

    var $order = array('last_update' => 'desc');
    var $column_order = array('file_name','file_name','last_update','file_name','file_name',null);
    protected function get_table_name() {
        return 'gallery_media';
    }
    protected function primary() {
        return 'id';
    }
    protected function column_search(){
        return array('note','file_name');
    }
    
    public function get_all_field() {
      
        $fields = array(                        
              'id_course' => $this->input->post('id_course'),               
              'title' => $this->input->post('title'),               
              'summary' => $this->input->post('summary'),               
              'content' => $this->input->post('content'),               
              'last_update' => timestamp(),                            
              'duration' => $this->input->post('duration'),           
              'is_publish' => $this->input->post('is_publish'),
              //'meta'=> "{".$this->input->post('meta')."}"
                      
        );
        return $fields;
    } 

    

}
