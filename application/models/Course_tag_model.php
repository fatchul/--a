<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Course_tag_model extends Model_Main{    

    protected function get_table_name() {
        return 'course_tag';
    }
    protected function primary() {
        return 'id';
    }   
    function get_tag($id_course){
      $this->db->select('tag.*, course_tag.id as i');
        $this->db->from('course_tag');
        $this->db->join('tag', 'course_tag.id_tag=tag.id_tag');
        $this->db->join('course', 'course.id_course=course_tag.id_course');
        $this->db->where('course.id_course',$id_course);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }        
    }  

}
