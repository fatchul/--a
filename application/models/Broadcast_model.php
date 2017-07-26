<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Broadcast_model extends Model_Main{    

    var $order = array('date_create' => 'desc');
    var $column_order = array('judul','kepada','is_read_by_user',null);
    protected function get_table_name() {
        return 'broadcast_message';
    }
    protected function primary() {
        return 'id';
    }
    protected function column_search(){
        return array('judul','kepada','isi');
    }
    
}
