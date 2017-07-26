<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends Model_Main{    

    var $order = array('nama' => 'desc');
    var $column_order = array('email','nama','date_join','level','is_valid',null);
    protected function get_table_name() {
        return 'user';
    }
    protected function primary() {
        return 'id_user';
    }
    protected function column_search(){
        return array('nama','email','gender');
    }

    function check_user(){
        $u=$this->input->post('username');
        $p=$this->input->post('password');
        $this->db->select('email, role');
        $this->db->from('user');
        $this->db->where('email', $u);        
        $this->db->where('role', 10);
        $this->db->where('is_valid', 1);        
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $get_pass=$this->specific_column('password','email',$u);
            if (validatePassword($p,$get_pass)) {
              return true;
            }else{
              return false;
            }
        } else {
            return false;
        }
    }

    public function get_all_field() {
        if ($this->input('is_valid')) {
          $val=$this->input('is_valid');
        }
        else{
          $val=1; 
        }
        if ($this->session->userdata('arch_sch')==TRUE) {
          $sch=$this->session->userdata('arch_sch');
        }
        else{
          $sch= $this->input->post('id_sekolah');
        }
        if ($this->session->userdata('arch')==TRUE) {
          $is_read='1';
        }
        else{
          $is_read='0';
        }
        if ($this->session->userdata('__usr_teacher_')==TRUE) {
          $sch=$this->session->userdata('__id_school_');
        }
        $fields = array(                        
              'id_user' => curtime(), 
              'id_school' => $sch, 
              'email' => $this->input->post('email'), 
              'role' => $this->input->post('role'),  
              'date_join' => timestamp(),
              'nama' => $this->input->post('nama'),
              'dob' => $this->input->post('dob'),
              'meta' => $this->input->post('token'),
              'password' => generateHash($this->input->post('password')), 
              'gender' => $this->input->post('gender'),
              'profile' => $this->input->post('profile'),              
              'token_reg' => has(50), 
              'token_forgot_pass' => has(49),               
              'phone' => $this->input->post('kontak'), 
              'level' => $this->input->post('kelas'), 
              'address' => $this->input->post('alamat'),
              'facebook_url' => $this->input->post('facebook'),
              'pict_name' => $this->input->post('role'),
              'is_subscribe' => '1', 
              'is_valid' => $val,
              'is_read' => $is_read,        
        );
        return $fields;
    } 

     public function get_all_field_no_id() {
        if ($this->input('is_valid')) {
          $val=$this->input('is_valid');
        }
        else{
          $val=1; 
        }
        if ($this->session->userdata('arch_sch')==TRUE) {
          $sch=$this->session->userdata('arch_sch');
        }
        else{
          $sch= $this->input->post('id_sekolah');
        }
        if ($this->session->userdata('arch')==TRUE) {
          $is_read='1';
        }
        else{
          $is_read='0';
        }
        $fields = array(                        
              
              'id_school' => $sch, 
              'email' => $this->input->post('email'), 
              'role' => $this->input->post('role'),  
              'date_join' => timestamp(),
              'nama' => $this->input->post('nama'),
              'dob' => $this->input->post('dob'),
              'meta' => $this->input->post('token'),
               
              'gender' => $this->input->post('gender'),
              'profile' => $this->input->post('profile'),              
              'token_reg' => has(50), 
              'token_forgot_pass' => has(49),               
              'phone' => $this->input->post('kontak'), 
              'level' => $this->input->post('kelas'), 
              'address' => $this->input->post('alamat'),
              'facebook_url' => $this->input->post('facebook'),
              'pict_name' => $this->input->post('role'),
              'is_subscribe' => '1', 
              'is_valid' => $val,
              'is_read' => $is_read,        
        );
        return $fields;
    }
    
    function check_login(){
        $u=$this->input->post('uname');
        $p=$this->input->post('upassw');
        $this->db->select('email, role');
        $this->db->from('user');
        $this->db->where('email', $u);                
        $this->db->where('role','0');
        $this->db->or_where('role','1');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $get_pass=$this->specific_column('password','email',$u);
            if (validatePassword($p,$get_pass)) {
              $get_role=$this->specific_column('role','email',$u);            
              return true;
            }else{
              return false;
            }
        } else {
            return false;
        }
    }
    
    function check_user_by_cookie($u,$p){
      $this->db->select('email, role');
      $this->db->from('user');
      $this->db->where('email', $u);                
      $this->db->where('role','0');
      $this->db->or_where('role','1');
      $this->db->limit(1);
      $query = $this->db->get();
      if ($query->num_rows() > 0) {
        $get_pass=$this->specific_column('password','email',$u);
        if (validatePassword($p,$get_pass)) {
          $get_role=$this->specific_column('role','email',$u);            
          return true;
        }else{
          return false;
        }
      } else {
        return false;
      }
    }

    function list_user_union_endorse($role,$id_school,$id_course){
      $query=$this->db->query("select 
          *
          from 
          user
          where 
          user.role=".$role." 
          and 
          user.id_school='".$id_school."'
          and 
          user.id_user NOT in (
          select id_user from course_endorse where course_endorse.id_course='".$id_course."'
          )"
      );
      if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function get_user_listed($id_course,$role,$id_school)
    {
        $this->db->select('u.nama,ce.id');
        $this->db->from('user u');
        $this->db->join('course_endorse ce','ce.id_user=u.id_user');
        $this->db->join('course c','c.id_course=ce.id_course');
        $this->db->where('ce.id_course',$id_course);
        $this->db->where('u.id_school',$id_school);
        $this->db->where('u.role',$role);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

}
