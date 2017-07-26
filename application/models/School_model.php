<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class School_model extends Model_Main{    

    var $order = array('last_login' => 'desc');
     var $column_order = array('school_name','address','update_at','email','headmaster','is_valid','is_valid',null);

    protected function get_table_name() {
        return 'school';
    }
    protected function primary() {
        return 'id_school';
    }
    protected function column_search(){
        return array('school_name','address','contact_person','email','headmaster','pic');
    }
    // protected function column_order(){
    //     return array('nama','email','gender',null);
    // }
    public function get_all_field() {        
        $fields = array(                        
              'id_school' => curtime() ,
              'school_name' => $this->input('nama_skolah') ,
              'address' => $this->input('alamat') ,
              'contact_person' => $this->input('kontak') ,
              'email' => $this->input('email') ,
              'password' => generateHash($this->input('password')) ,
              'kota' => $this->input('kota') , 
              'pic' => $this->input('pic') ,              
              'update_at' => timestamp(),
              'last_login' => '',
              'headmaster' => $this->input('kepsek') ,              
              'reg_number_ministry' => $this->input('gugus') ,
              'token_reg' => has(50) ,
              'token_forgot_pass' => has(49) ,
              'is_subscribe' => '1',
              'is_valid' => $this->input('is_valid'),       
        );
        return $fields;
    } 
    
    public function get_all_field_no_id() {        
        $fields = array(   
              'school_name' => $this->input('nama_skolah') ,
              'address' => $this->input('alamat') ,
              'contact_person' => $this->input('kontak') ,
              'email' => $this->input('email') ,    
              'kota' => $this->input('kota') , 
              'pic' => $this->input('pic') ,              
              'update_at' => timestamp(),
              'last_login' => '',
              'headmaster' => $this->input('kepsek') ,              
              'reg_number_ministry' => $this->input('gugus') ,
              'token_reg' => has(50) ,
              'token_forgot_pass' => has(49) ,
              'is_subscribe' => '1',
              'is_valid' => $this->input('is_valid'),       
        );
        return $fields;
    } 
   

    function check_school(){
        $u=$this->input->post('username');
        $p=$this->input->post('password');
        $this->db->select('email');
        $this->db->from('school');
        $this->db->where('email', $u);                
        //$this->db->where('role','0');
        //$this->db->or_where('role','1');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $get_pass=$this->specific_column('password','email',$u);
            if (validatePassword($p,$get_pass)) {
              //$get_role=$this->specific_column('role','email',$u);
              // if ($get_role==='0') {
              //   $data= "Sekolah";
              // }
              // else if ($get_role==='1') {
              //   $data= "Siswa";
              // }
              // else{
              //   return false;
              // }
              return true;
            }else{
              return false;
            }
        } else {
            return false;
        }
    }
    

}

