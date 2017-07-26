<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tag_model extends Model_Main{    

    protected function get_table_name() {
        return 'tag';
    }
    protected function primary() {
        return 'id_tag';
    }    
    public function get_all_field() {
      
        $fields = array(                        
              'id_tag' => rands(),               
              'name' => $this->input->post('tag'),               
              'slug' => url_title($this->input->post('tag')),                             
              'update_at' => timestamp(),                                          
              'is_publish' => $this->input->post('is_publish'),            
        );
        return $fields;
    } 
    public function get_all_field_no_id() {
      
        $fields = array(                        
                       
              'name' => $this->input->post('tag'),               
              'slug' => url_title($this->input->post('tag')),                             
              'update_at' => timestamp(),                                          
              'is_publish' => $this->input->post('is_publish'),            
        );
        return $fields;
    } 

}
