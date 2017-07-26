<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sesi extends Model_Main{    

    
    protected function get_table_name() {
        return 'session';
    }
    protected function primary() {
        return 'id';
    }
    public function get_all_field() {        
        $fields = array(                        
              
              'ip_address' => $this->input->ip_address() ,
              'timestamp' => timestamp(),
              'data' => 'bin',
        );
        return $fields;
    } 
    function insert_backup($ses){
        $this->db->query("
                insert into session_backup (id_session,ip_address,login_time,logout_time,id_user,browser) 
                    select id, ip_address, timestamp, NOW(), id_user, browser from session
                    where id='".$ses."'
            ");
    }
}
