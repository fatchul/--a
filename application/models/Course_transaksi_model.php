<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Course_transaksi_model extends Model_Main{    

    protected function get_table_name() {
        return 'course_tr';
    }
    protected function primary() {
        return 'id_course_enrollment';
    }   
    function total_enrollment($id_course){
        $this->db->select('count(*) as total_enroll');
        $this->db->from('course_tr ct');        
        $this->db->where('ct.id_course',$id_course);
        $this->db->group_by('ct.id_course');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row)
            {
                $data = $row->total_enroll;
            }
            
        }
        else{
            $data=0;
        }
        return $data;
    }

    //start statistik

    // get all avg time SELECT  AVG(TIME_TO_SEC(TIMEDIFF(finish_task,date_enrollment))) AS timediff FROM course_tr GROUP BY id_course
    function total_visit($id_course){        
        $this->db->select('count(*) as tracking');
        $this->db->from('_tracking');        
        $this->db->like('name',$id_course);
        $this->db->group_by('name');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row)
            {
                $data = $row->tracking;
            }
            
        }
        else{
            $data=0;
        }
        return $data;
    }
    function total_enrollment_role($id_course,$role){
        $this->db->select('count(*) as total_enroll');
        $this->db->from('course_tr ct');        
        $this->db->join('user u','u.id_user=ct.id_user');        
        $this->db->where('ct.id_course',$id_course);
        $this->db->where('u.role',$role);
        $this->db->group_by('ct.id_course');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row)
            {
                $data = $row->total_enroll;
            }            
        }
        else{
            $data=0;
        }
        return $data;
    }

    function avg_time_finish($id_course){
        $query=$this->db->query("SELECT  ROUND(AVG(TIME_TO_SEC(TIMEDIFF(finish_task,date_enrollment)))) AS timediff FROM course_tr where id_course='".$id_course."'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row)
            {
                $data = $row->timediff;
            }
            
        }
        return $data;
    }

    function lama_pengerjaan($id_course){
        $query=$this->db->query("SELECT  ROUND(TIME_TO_SEC(TIMEDIFF(finish_task,date_enrollment))) AS timediff FROM course_tr where id_course='".$id_course."'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row)
            {
                $data = $row->timediff;
            }
            
        }
        return $data;
    }

    function time_berjalan($id_course){
        $query=$this->db->query("SELECT  ROUND(TIME_TO_SEC(TIMEDIFF(now(),date_enrollment))) AS timediff FROM course_tr where id_course='".$id_course."'");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row)
            {
                $data = $row->timediff;
            }
            
        }
        return $data;
    }
    // end statistik

    function list_enrollment($id_course){
        $this->db->select('user.*,course_tr.*');
        $this->db->from('course_tr');
        $this->db->join('user', 'course_tr.id_user=user.id_user');        
        $this->db->where('course_tr.id_course',$id_course);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }        
    }  

    function list_enrollment_by_role($id_course,$role){
        $this->db->select('user.*,course_tr.date_enrollment');
        $this->db->from('course_tr');
        $this->db->join('user', 'course_tr.id_user=user.id_user');        
        $this->db->where('course_tr.id_course',$id_course);
        $this->db->where('user.role',$role);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }        
    }  
    
    function my_course($id_user){
        $this->db->select('course.*,g.directory,g.enc_name, g.token, g.mime');
        $this->db->from('course_tr');
        $this->db->join('course', 'course.id_course=course_tr.id_course');  

        $this->db->join('course_gallery cg','cg.id_course=course.id_course','left');
        $this->db->join('gallery_media g','g.id=cg.id_galeri_media','left');
        $this->db->where('g.owner','T');
        $this->db->where('course.is_publish',1);
        $this->db->where('course_tr.id_user',$id_user);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }        
    }

    function my_course_active($id_user){
        $this->db->select('course.*,g.directory,g.enc_name, g.token, g.mime');
        $this->db->from('course_tr');
        $this->db->join('course', 'course.id_course=course_tr.id_course');  

        $this->db->join('course_gallery cg','cg.id_course=course.id_course','left');
        $this->db->join('gallery_media g','g.id=cg.id_galeri_media','left');
        $this->db->where('g.owner','T');
        $this->db->where('course.is_publish',1);
        $this->db->where('course_tr.id_user',$id_user);
        $this->db->where('course_tr.is_finish',0);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }        
    }

    function count_my_course($id_user){
        $this->db->select('count(course_tr.id_course) as total_course');
        $this->db->from('course_tr');
        $this->db->join('course', 'course.id_course=course_tr.id_course');  
        $this->db->where('course.is_publish',1);
        $this->db->where('course_tr.id_user',$id_user);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }        
    }
    public function status_course($where,$value,$where_,$value_)
    {           
        $this->db->select('is_finish');        
        $this->db->from($this->get_table_name());           
        $this->db->where($where, $value);   
        $this->db->where($where_, $value_);
        $this->db->limit(1);       
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row)
            {
                if ($row->is_finish=='0') {
                    $data='0';
                }
                else{
                    $data='1';   
                }
            }
        }
        else{
            $data='F';
            
        }
        return $data;
    }

    function is_empty_enroll($id_user){
        $this->db->select('count(course_tr.id_user) as total_enroll_silabus');
        $this->db->from('course_tr');
        $this->db->join('silabus','silabus.id_silabus=course_tr.id_course');
        $this->db->where('course_tr.id_user',$id_user);                          
        $query = $this->db->get();
        foreach ($query->result() as $row)
        {
            if ($row->total_enroll_silabus <= 0) {
                return TRUE;
            }
            else{
                return FALSE; 
            }
        }
    }

    function last_access($id_course){      

        $this->db->select('ct.date_');
        $this->db->from('course_tr');
        $this->db->join('course', 'course.id_course=course_tr.id_course');  
        $this->db->where('course.is_publish',1);
        $this->db->where('course_tr.id_user',$id_user);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }     

        foreach ($query->result() as $row)
        {
            if ($row->total_enroll_silabus <= 0) {
                return TRUE;
            }
            else{
                return FALSE; 
            }
        }
    }

}
