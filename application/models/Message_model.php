<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Message_model extends Model_Main{    

    protected function get_table_name() {
        return 'messanger';
    }
    protected function primary() {
        return 'id';
    }
    

}
