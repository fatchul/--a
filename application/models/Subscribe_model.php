<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subscribe_model extends Model_Main{    

    var $order = array('date_join' => 'desc');
    var $column_order = array('email','date_join','is_active',null);
    protected function get_table_name() {
        return 'subscribers';
    }
    protected function primary() {
        return 'id';
    }
    protected function column_search(){
        return array('email','is_active','date_join');
    }
    
    public function get_all_field() {
        if ($this->input->post('is_valid')) {
          $val=$this->input->post('is_valid');
        }
        else{
          $val=1;
        }
        $fields = array(                        
              'id ' => curtime(),               
              'email ' => $this->input->post('email'),               
              'nama ' => $this->input->post('n'),               
              'profesi' => $this->input->post('p'),               
              'instansi' => $this->input->post('i'),               
              'telp ' => $this->input->post('t'),               
              'pertanyaan' => $this->input->post('q'),               
              'date_join' => timestamp(),                            
              'token' => has(50),             
              'is_active' => $this->input->post('is_valid'),
                      
        );
        return $fields;
    } 

    

}
