<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Course_endorse_model extends Model_Main{    

    
    protected function get_table_name() {
        return 'course_endorse';
    }
    protected function primary() {
        return 'id';
    }
    function get_course_registered($id_teacher){
    	$this->db->select('course.*');
        $this->db->from('course');
        $this->db->join('course_endorse', 'course_endorse.id_course=course.id_course');        
        $this->db->where('course_endorse.id_user',$id_teacher);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }  
    }
    function count_course_registered($id_teacher){
        $this->db->select('count(course_endorse.id_course) as c');
        $this->db->from('course');
        $this->db->join('course_endorse', 'course_endorse.id_course=course.id_course');        
        $this->db->where('course_endorse.id_user',$id_teacher);
        $this->db->group_by('course.id_course');
        $query = $this->db->get();
        return $this->db->count_all_results(); 
    }
    function check_course($id_user,$id_course){
        $this->db->select('course_endorse.*');
        $this->db->from('course_endorse');
        $this->db->where('course_endorse.id_user',$id_user);
        $this->db->where('course_endorse.id_course',$id_course);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return TRUE;
        }  
        return FALSE; 
    }

}
