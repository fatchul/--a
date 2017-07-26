<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cms_sosmed_model extends Model_Main{

    protected function get_table_name() {
        return 'cms_sosmed';
    }
    protected function primary() {
        return 'id';
    }
    

}
