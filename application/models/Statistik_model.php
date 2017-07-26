<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Statistik_model extends Model_Main{    

    var $order = array('date_join' => 'desc');
    var $column_order = array('email','date_join','is_active',null);
    protected function get_table_name() {
        return 'session_backup';
    }
    protected function primary() {
        return 'id';
    }
    function statistic_user()
    {
        $this->db->select('*');
        $this->db->from('session_backup sb');
        $this->db->join('user u','u.id_user=sb.id_user');               
        $this->db->order_by('sb.logout_time','DESC');                                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    function still_login()
    {
        $this->db->select('*');
        $this->db->from('session s');
        $this->db->join('user u','u.id_user=s.id_user');               
        $this->db->order_by('s.timestamp','DESC');                                
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
    

}
