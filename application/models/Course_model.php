<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Course_model extends Model_Main{    

    var $order = array('date_join' => 'desc');
    var $column_order = array('email','date_join','is_active',null);
    protected function get_table_name() {
        return 'course';
    }
    protected function primary() {
        return 'id_course';
    }
    protected function column_search(){
        return array('email','is_active','date_join');
    }
    
    public function get_all_field() {
      
        $fields = array(                        
              'id_course' => $this->input->post('id_course'),               
              'title' => $this->input->post('title'),               
              'slug' => url_title($this->input->post('title')),
              'summary' => $this->input->post('summary'),               
              'content' => $this->input->post('content'),               
              'last_update' => timestamp(),                            
              'duration' => $this->input->post('duration'),           
              'is_publish' => $this->input->post('is_publish'),
              //'meta'=> "{".$this->input->post('meta')."}"
                      
        );
        return $fields;
    } 

    // get all list course and join with gallery table
    // this is do because we wanna retrieve 1 picture for each course
    function retrieve_all_course(){
        $this->db->select('c.id_course,c.title,g.directory,g.enc_name, g.token, c.slug, g.mime');
        $this->db->from('course c');
        $this->db->join('course_gallery cg','cg.id_course=c.id_course','left');
        $this->db->join('gallery_media g','g.id=cg.id_galeri_media','left');
        $this->db->where('g.owner','T');
        $this->db->where('c.is_publish',1);                
        $this->db->order_by('c.last_update','DESC');                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    

    function retrieve_all_course_by_tag($id_tag){
      $this->db->select('course.*');
        $this->db->from('course');
        $this->db->join('course_tag', 'course.id_course=course_tag.id_course');        
        $this->db->where('course_tag.id_tag',$id_tag);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }        
    }  

    function course_favourite(){
        $this->db->select('c.*,count(*) as total_enroll');
        $this->db->from('course_tr ct');        
        $this->db->join('course c','c.id_course=ct.id_course');
        $this->db->join('user u','u.id_user=ct.id_user');                
        $this->db->group_by('ct.id_course')->order_by('count(*)','DESC');
        $query = $this->db->get();
         if ($query->num_rows() > 0) {
            return $query->result();
        } 
    }


}
