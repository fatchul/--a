<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Course_gallery_model extends Model_Main{    

    protected function get_table_name() {
        return 'course_gallery';
    }
    protected function primary() {
        return 'id';
    }
    
    function retrieve_thumbnail($id){
        $this->db->select('g.*');
        $this->db->from('course c');
        $this->db->join('course_gallery cg','cg.id_course=c.id_course','left');
        $this->db->join('gallery_media g','g.id=cg.id_galeri_media','left');        
        $this->db->where('cg.id_course',$id);
        $this->db->where('g.owner','T');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function retrieve_all_media($id){
        $this->db->select('g.*');
        $this->db->from('course c');
        $this->db->join('course_gallery cg','cg.id_course=c.id_course','left');
        $this->db->join('gallery_media g','g.id=cg.id_galeri_media','left');        
        $this->db->where('cg.id_course',$id);
        $this->db->where_not_in('g.owner','T');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function see_image($id){
        $this->db->select('gallery_media.directory, gallery_media.enc_name, gallery_media.token');
        $this->db->from('course_gallery');
        $this->db->join('gallery_media','course_gallery.id_galeri_media=gallery_media.id');
        $this->db->where('course_gallery.id_course',$id);
        $this->db->where('gallery_media.mime','image/jpeg');
        $this->db->or_where('gallery_media.mime','image/png');
        $this->db->order_by('gallery_media.last_update','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function get_id_media_galery_course($id_course){
       $this->db->select('gallery_media.id as gal_id,gallery_media.directory, gallery_media.enc_name, gallery_media.token,course_gallery.id_galeri_media,course_gallery.id');
        $this->db->from('course_gallery');
        $this->db->join('gallery_media','course_gallery.id_galeri_media=gallery_media.id');
        $this->db->where('course_gallery.id_course',$id_course);
        $this->db->where('gallery_media.owner','T');
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return "0";
        }
    }
}
