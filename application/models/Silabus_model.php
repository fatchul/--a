<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Silabus_model extends Model_Main{    

    var $order = array('id_course' => 'desc','last_update' => 'desc','no_urut' => 'asc');
    var $column_order = array('id_silabus','title_silabus','id_course','summary_silabus','is_publish',null);
    protected function get_table_name() {
        return 'silabus';
    }
    protected function primary() {
        return 'id_silabus';
    }
    protected function column_search(){
        return array('id_silabus','title_silabus','id_course','summary_silabus','is_publish');
    }
    
    public function get_all_field() {
      
        $fields = array(                        
              'id_silabus' => $this->input->post('id_silabus'),               
              'id_course' => $this->input->post('id_course'),               
              'title_silabus' => $this->input->post('title'),
              'summary_silabus' => $this->input->post('summary'),               
              'no_urut' => $this->input->post('no_urut'),
              'content_silabus' => $this->input->post('content'),
              'last_update' => timestamp(),                            
              'is_publish' => $this->input->post('is_publish'),
        );
        return $fields;
    } 

    function get_silabus_all_admin()
    {
        $this->db->select('s.*, c.*, c.is_publish as pub_course, s.is_publish as pub_silabus');
        $this->db->from('course c');
        $this->db->join('silabus s','c.id_course=s.id_course');               
        $this->db->order_by('s.no_urut','ASC');                                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    

    function get_silabus_all()
    {
        $this->db->select('s.*, c.*');
        $this->db->from('course c');
        $this->db->join('silabus s','c.id_course=s.id_course');
        $this->db->where('s.is_publish',1);                
        $this->db->where('c.is_publish',1);                
        $this->db->order_by('s.no_urut','ASC');                                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    function get_silabus($id_course){
        $this->db->select('s.*');
        $this->db->from('course c');
        $this->db->join('silabus s','c.id_course=s.id_course');
        $this->db->where('s.is_publish',1);                
        $this->db->where('c.is_publish',1);                
        $this->db->where('c.id_course',$id_course);
        $this->db->order_by('s.no_urut','ASC');                                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function get_silabus_active($id_course,$id_user){
        $this->db->select('s.*');
        $this->db->from('silabus s');
        $this->db->join('course c','c.id_course=s.id_course');
        $this->db->join('course_tr ct','ct.id_course=s.id_silabus');
        $this->db->where('s.is_publish',1);                
        $this->db->where('c.is_publish',1);                
        $this->db->where('c.id_course',$id_course);
        $this->db->where('ct.id_user',$id_user);
        $this->db->where('ct.is_finish',0);
        $this->db->order_by('s.no_urut','ASC');                                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function no_urut_silabus($id_course){
        $query=$this->db->query("select max(no_urut) as urut from silabus where id_course='".$id_course."'");
        foreach ($query->result() as $row)
            {
                $data = $row->urut;
            }
            return $data+1;
    }
  
    function total_silabus($id_course){
        $this->db->select('count(*) as total_silabus');
        $this->db->from('silabus');        
        $this->db->where('id_course',$id_course);
        $this->db->group_by('id_course');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row)
            {
                $data = $row->total_silabus;
            }
            
        }
        else{
            $data=0;
        }
        return $data;
    }

    function sum_prev($id_course){
        $query=$this->db->query("select SUM(course_tr.is_finish) as urut from course_tr join silabus on silabus.id_silabus=course_tr.id_course where course_tr.id_course='".$id_course."'");
        foreach ($query->result() as $row)
            {
                $data = $row->urut;
            }
            return $data;
    }
    



}
