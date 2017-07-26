<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Model_Main extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    protected function input($var){
        return $this->input->post($var,TRUE);
    }

    /*GLOBAL FUNCTIONS*/
    protected function timenow() {
        return date('Y-m-d H:i:s');
    }

    protected function get_db_field_string($data) {
        $string='';
        $first=1;
        foreach ($data as $col) {
            if ($first) {
                $string.=$col;
                $first = 0;
            } else {
                $string.=','.$col;
            }
        }
        return $string;
    }

    public function count_all(){

        return $this->db->count_all_results($this->get_table_name());
    }

    public function count_by($field,$data){
        $this->db->where($field,$data);
        return $this->db->count_all_results($this->get_table_name());
    }
     public function count_by_not_in($field,$data){
        $this->db->where_not_in($field,$data);
        return $this->db->count_all_results($this->get_table_name());
    }
    public function count_2_condition($field,$data,$field1,$data1){
        $this->db->where($field,$data);
        $this->db->where($field1,$data1);
        return $this->db->count_all_results($this->get_table_name());
    }
    public function count_by_array($data,$offset=0, $limit=1000000000){
        foreach($data as $row=>$val){
            $this->db->where($row,$val);
        }
        return $result=$this->db->count_all_results($this->get_table_name());
    }

    public function get_all($offset=0, $limit=1000000){

        $result=$this->db->get($this->get_table_name(),$limit,$offset);
            if ($result->num_rows() > 0) {//if there is data inside of the result array
                return $result->result(); //returning the array from database
            } else {
                return false;
            }

            
        }
    public function get_all_not_admin($column,$opt,$offset=0, $limit=10){

         $result=$this->db->where('role',0)->or_where('role',1)->order_by($column,$opt)->get($this->get_table_name(),$limit);
            if ($result->num_rows() > 0) {//if there is data inside of the result array
                return $result->result(); //returning the array from database
            } else {
                return false;
            }

            
        }
        public function get_all_order($column,$opt){

            $result=$this->db->order_by($column,$opt)->get($this->get_table_name());
            if ($result->num_rows() > 0) {//if there is data inside of the result array
                return $result->result(); //returning the array from database
            } else {
                return false;
            }

            
        }
        public function get_all_order_with($column,$opt,$where,$value){

            $result=$this->db->where($where,$value)->order_by($column,$opt)->get($this->get_table_name());
            if ($result->num_rows() > 0) {//if there is data inside of the result array
                return $result->result(); //returning the array from database
            } else {
                return false;
            }

            
        }
        public function get_all_only($col,$val,$offset=0, $limit=1000000){
            $result=$this->db->where($col,$val)->get($this->get_table_name(),$limit,$offset);
            if ($result->num_rows() > 0) {//if there is data inside of the result array
                return $result->result(); //returning the array from database
            } else {
                return false;
            }       
        }
        public function get_all_post($offset=0, $limit=1000000){

            $result=$this->db->where('is_post',1)->get($this->get_table_name(),$limit,$offset);
            if ($result->num_rows() > 0) {//if there is data inside of the result array
                return $result->result(); //returning the array from database
            } else {
                return false;
            }

            
        }
        public function get_by($field,$data,$offset=0, $limit=1000000000){
            $this->db->where($field,$data);
            $result=$this->db->get($this->get_table_name(),$limit,$offset);
            if ($result->num_rows() > 0) {//if there is data inside of the result array
                return $result->result(); //returning the array from database
            } else {
                return false;
            }
        }
         public function get_by_multiple($field,$data,$field_,$data_){
            $this->db->where($field,$data);
            $this->db->where($field_,$data_);
            $result=$this->db->get($this->get_table_name());
            if ($result->num_rows() > 0) {//if there is data inside of the result array
                return $result->result(); 
            } 
        }
        public function get_by_group($field,$offset=0, $limit=1000000000){
            $this->db->group_by($field);
            $result=$this->db->get($this->get_table_name(),$limit,$offset);
            if ($result->num_rows() > 0) {//if there is data inside of the result array
                return $result->result(); //returning the array from database
            } else {
                return false;
            }
        }

        public function get_by_array($field,$data,$offset=0, $limit=1000000000){

            $this->db->where($field,$data);
            $result=$this->db->get($this->get_table_name(),$limit,$offset);
            if ($result->num_rows() > 0) {//if there is data inside of the result array
                return $result->row_array(); //returning the array from database
            } else {
                return false;
            }
        }
        public function get_by_id($id){
            $this->db->where($this->primary(), $id);
            $this->db->limit(1);
            $result=$this->db->get($this->get_table_name());
            if ($result->num_rows() > 0) {
                return $result->result();
            } else {
            //return false;
                redirect('?');
            }
        }
        public function session_exist($id){
            $this->db->where($this->primary(), $id);
            $this->db->limit(1);
            $result=$this->db->get($this->get_table_name());
            if ($result->num_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        public function get_by_id_course($id){
            $this->db->where($this->primary(), $id)->where('is_publish',1);
            $this->db->limit(1);
            $result=$this->db->get($this->get_table_name());
            if ($result->num_rows() > 0) {
                return $result->result();
            } else {
            //return false;
                redirect('?');
            }
        }
         public function get_by_id_with($id,$col,$val){
            $this->db->where($this->primary(), $id);
            $this->db->where($col, $val);
            $this->db->limit(1);
            $result=$this->db->get($this->get_table_name());
            if ($result->num_rows() > 0) {
                return $result->result();
            } else {
            //return false;
                redirect('?');
            }
        }
        public function isExist($field,$data){
            if (isset($data)) {
                $this->db->where($field,$data);
                $result=$this->db->get($this->get_table_name());            
                if (($result->num_rows()!==null)&&($result->num_rows() > 0)) {
                    return TRUE;
                }
                else{
                    return "0";
                }
            }
            return FALSE;
        }

        public function isExist_multiple_check($field,$data,$field_,$data_){
            if (isset($data)) {
                $this->db->where($field,$data);
                $this->db->where($field_,$data_);
                $result=$this->db->get($this->get_table_name());            
                if (($result->num_rows()!==null)&&($result->num_rows() > 0)) {
                    return TRUE;
                }
                else{
                    return FALSE;
                }
            }
        }
        public function triple_check($field,$data,$field_,$data_,$field__,$data__){
            if (isset($data)) {
                $this->db->where($field,$data);
                $this->db->where($field_,$data_);
                $this->db->where($field__,$data__);
                $result=$this->db->get($this->get_table_name());            
                if (($result->num_rows()!==null)&&($result->num_rows() > 0)) {
                    return TRUE;
                }
                else{
                    return FALSE;
                }
            }
            else{
                return FALSE;
            }
        }


    public function insert_data($array_data) {//batch like
        if (isset($array_data) && (count($array_data) > 0)) {
            $affected_row=array();
            foreach ($array_data as $row => $val) {
                $this->db->insert($this->get_table_name(),$val);
                if ($this->db->affected_rows() > 0) {//if there is data inside of the result array
                    array_push($affected_row,array('status'=>1,'row_num'=>$row,'id'=>$this->db->insert_id())); //returning the array from database
                } else {
                    array_push($affected_row,array('status'=>0,'row_num'=>$row));
                }
            }
            return $affected_row;
        } else {
            return (-1);
        }
    }

    public function insert_normal(){
        $this->db->insert($this->get_table_name(),$this->get_all_field());

        if($this->db->affected_rows()>=0){
            return $this->db->insert_id();
        }else{
            return (-1);
        }
    }

    /*GIDEON*/
    public function insert_to($val){
        $this->db->insert($this->get_table_name(),$val);
        if($this->db->affected_rows()>=0){
            return $this->db->insert_id();
        }else{
            return (-1);
        }
    }

    public function update_by($data){
        $this->db->trans_begin();
        $this->db->where($this->primary(),$data);
        $this->db->update($this->get_table_name(),$this->get_all_field());
        if ($this->db->trans_status() === FALSE)
            {$this->db->trans_rollback();}
        else
            {$this->db->trans_commit();return true;}

    }
    public function update_no_id($data){
        $this->db->trans_begin();
        $this->db->where($this->primary(),$data);
        $this->db->update($this->get_table_name(),$this->get_all_field_no_id());
        if ($this->db->trans_status() === FALSE)
            {$this->db->trans_rollback();}
        else
            {$this->db->trans_commit();return true;}

    }
    
    public function update_no_password($data){
        $this->db->trans_begin();
        $this->db->where($this->primary(),$data);
        $this->db->update($this->get_table_name(),$this->get_all_field_no_password());
        if ($this->db->trans_status() === FALSE)
            {$this->db->trans_rollback();}
        else
            {$this->db->trans_commit();return true;}

    }
    public function update_field($column,$column_value,$data){
        $this->db->trans_begin();
        $this->db->where($column,$column_value);
        $this->db->update($this->get_table_name(),$data);
        if ($this->db->trans_status() === FALSE)
            {$this->db->trans_rollback();}
        else
            {$this->db->trans_commit();return true;}

    }
    public function update_password($val,$password){
        $data = array('password' => $password );
        $this->db->trans_begin();
        $this->db->where($this->primary(),$val);
        $this->db->update($this->get_table_name(),$data);
        if ($this->db->trans_status() === FALSE)
            {$this->db->trans_rollback();}
        else
            {$this->db->trans_commit();return true;}

    }
    /*END OF GIDEON*/

    public function update_field_multiple($column,$column_value,$column_1,$column_value_1,$data){
        $this->db->trans_begin();
        $this->db->where($column,$column_value);
        $this->db->where($column_1,$column_value_1);
        $this->db->update($this->get_table_name(),$data);
        if ($this->db->trans_status() === FALSE)
            {
                $this->db->trans_rollback();
            }
        else
            {
                $this->db->trans_commit();return true;
            }
    }
    public function update($id,$array){
        $this->db->where($this->primary(),$id);
        $this->db->update($this->get_table_name(),$array);
    }
    public function update_all($col,$val,$data){            
        $this->db->where($col,$val);            
        $this->db->update($this->get_table_name(),$data);
    }
    public function transact_begin(){
        $this->db->trans_begin();
    }

    public function transact_status(){//return false on failure
        return $this->db->trans_status();
    }

    public function transact_rollback(){
        $this->db->trans_rollback();
    }

    public function transact_commit(){
       $this->db->trans_commit();
   }

   protected function logging($action,$id,$array,$table_name=null){
    $user = $this->session->get_userdata();

    if($id!==null){
        $this->db->where('id',$id);
    }

    if($table_name===null){
        $old=$this->db->get($this->get_table_name());
    }else{
        $old=$this->db->get($table_name);
    }
    $old_data=$old->result();
    $data=[
    'old_data'=>json_encode($old_data[0]),
    'action'=>$action,
    'target_table'=>$this->get_table_name(),
    'data'=>json_encode($array),
    'time'=>$this->getTimeNow_string(),
    'user'=>$user['id']
    ];
    $this->db->insert('activity_log',$data);
}



public function delete($id){
    $this->db->where($this->primary(), $id);
    $this->db->delete($this->get_table_name());
}
public function delete_with($id,$col,$val){
    $this->db->where($this->primary(), $id);
    $this->db->where($col, $val);
    $this->db->delete($this->get_table_name());
}
public function delete_by($col,$val){
    $this->db->where($col, $val);
    //$this->db->where($col_, $val_);
    $this->db->delete($this->get_table_name());
}
public function delete_multiple($col,$val,$col_,$val_){
    $this->db->where($col, $val);
    $this->db->where($col_, $val_);
    $this->db->delete($this->get_table_name());
}

    //MOSTLY FOR AJAX MESSAGE RESPONDS
protected function error_noInput(){
    return array('message'=>'undefined results','success'=>false);
}

protected function successful_actions($data,$message='success'){
    return array('data'=>$data,'message'=>$message,'success'=>true);
}

/*TIMES*/

protected function timetodate($time) {
    $timestamp = $time;
    $date = date('Y-m-d H:i:s:00', $timestamp);
    return $date;
}


/*CACHE*/
protected function cache_get($name){
    if(isset($name)&&is_string($name)){
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $res=$this->cache->get($name);
        if(isset($res)&&($res!=null)){
            return $res;
        }else{
            return (-1);
        }
    }else{
        return (-1);
    }
}

protected function get_cache_or_database($model,$cachename,$duration=60,$offset=0,$limit=1000){
    if(isset($cachename)&&is_string($cachename)){
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        $res=$this->cache->get($cachename);
        if(isset($res)&&($res!=null)){
                //var_dump('from cache');
            return $res;
        }else{
                //var_dump('from database');
            $this->load->model($model);
            $data=$this->$model->get_all($limit,$offset);
            $this->cache->save($cachename,$data,$duration);
            return $data;
        }
    }else{
        return (-1);
    }
}

    protected function global_data_cache_name_prefix($name) {//for data that are globally used
        return $this->project_name() . '_' . 'global' . '_' . $name;
    }

    protected function save_cache($name,$data,$duration=60){
        if(isset($name)&&is_string($name)){
            $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
            $this->cache->save($name,$data,$duration);
            return true;
        }else{
            return false;
        }
    }

    /*MISCS*/
    protected function get_specific_column($array,$column_name){//to get only the db table column names for labels in radar generation
        $response=array();
        foreach($array as $row=>$val){
            array_push($response, $val->$column_name);
        }
        return $response;
    }

    

    public function specific_view($column,$value_of_key)
    {           
        $this->db->select($column);        
        $this->db->from($this->get_table_name());           
        $this->db->where($this->primary(), $value_of_key);   
        $this->db->limit(1);       
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row)
            {
                $data = $row->$column;
            }
            return $data;
        }
        else{
            //echo "-";
        }
        //else{redirect('err');}
    }
    public function see_course($column,$value_of_key)
    {           
        $this->db->select($column);        
        $this->db->from($this->get_table_name());           
        $this->db->where($this->primary(), $value_of_key);   
        $this->db->where('is_publish', 1);   
        $this->db->limit(1);       
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row)
            {
                $data = $row->$column;
            }
            return $data;
        }
        else{
            //echo "-";
        }
        //else{redirect('err');}
    }
    public function specific_column_array($column,$value_of_key){
        $this->db->select($column);        
        $this->db->from($this->get_table_name());           
        $this->db->where($this->primary(), $value_of_key);   
        $this->db->limit(1);       
        $query = $this->db->get();
        return $query->row_array();
    }

    public function specific_column($column,$where,$value)
    {           
        $this->db->select($column);        
        $this->db->from($this->get_table_name());           
        $this->db->where($where, $value);   
        $this->db->limit(1);       
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row)
            {
                $data = $row->$column;
            }
            return $data;
        }
        else{
            return FALSE;
        }
        //else{redirect('err');}
    }

    public function specific_column_with($column,$where,$value,$where_,$value_)
    {           
        $this->db->select($column);        
        $this->db->from($this->get_table_name());           
        $this->db->where($where, $value);   
        $this->db->where($where_, $value_);
        $this->db->limit(1);       
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row)
            {
                $data = $row->$column;
            }
            return $data;
        }
        else{
            return FALSE;
        }
        //else{redirect('err');}
    }

    protected function genRndDgt($length = 12, $specialCharacters = true) {
        $digits = '';
        $chars = "abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789";

        if($specialCharacters === true)
            $chars .= "~!@#$%^&*()_";


        for($i = 0; $i < $length; $i++) {
            $x = mt_rand(0, strlen($chars) -1);
            $digits .= $chars{$x};
        }

        return $digits;
    }

    public function genRndSalt() {
        return $this->genRndDgt(8, true);
    }
    
    public function encryptUserPwd($pwd, $salt) {
        return sha1(md5($pwd) . $salt);
    }
    function get_one_field($field){
        $result=$this->db->select('distinct('.$field.')')->get($this->get_table_name());
        if ($result->num_rows() > 0) {//if there is data inside of the result array
            return $result->result(); //returning the array from database
        } else {
            return false;
        }
    }


    private function _get_datatables_query()
    {

      $this->db->from($this->get_table_name());

      $i = 0;

          foreach ($this->column_search() as $item) // loop column 
          {
            if($_GET['search']['value']) // if datatable send POST for search
            {

              if($i===0) // first loop
              {
                $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                $this->db->like($item, $_GET['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $_GET['search']['value']);
            }

              if(count($this->column_search()) - 1 == $i) //last loop
                $this->db->group_end(); //close bracket
            }
            $i++;
        }

          if(isset($_GET['order'])) // here order processing
          {
            $this->db->order_by($this->column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables(){
        $this->_get_datatables_query();
        if($_GET['length'] != -1)
            $this->db->limit($_GET['length'], $_GET['start']);
        $query = $this->db->get();
        return $query->result();
    } 

    function count_filtered()
    {
      $this->_get_datatables_query();
      $query = $this->db->get();
      return $query->num_rows();
  }

  // datatable using condition

  function _get_data_where($column,$where)
  {
      $this->db->from($this->get_table_name())->where($column,$where);

      $i = 0;

          foreach ($this->column_search() as $item) // loop column 
          {
            if($_GET['search']['value']) // if datatable send POST for search
            {

              if($i===0) // first loop
              {
                $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                $this->db->like($item, $_GET['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $_GET['search']['value']);
            }

              if(count($this->column_search()) - 1 == $i) //last loop
                $this->db->group_end(); //close bracket
            }
            $i++;
        }

          if(isset($_GET['order'])) // here order processing
          {
            $this->db->order_by($this->column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_where($column,$where){
        $this->_get_data_where($column,$where);
        if($_GET['length'] != -1)
            $this->db->limit($_GET['length'], $_GET['start']);
        $query = $this->db->get();
        return $query->result();
    } 

    function count_filtered_where($column,$where)
    {
      $this->_get_data_where($column,$where);
      $query = $this->db->get();
      return $query->num_rows();
  }

  // datatable with condition not in
  function _get_data_where_not_in($column,$where)
  {
      $this->db->from($this->get_table_name())->where_not_in($column,$where);

      $i = 0;

          foreach ($this->column_search() as $item) // loop column 
          {
            if($_GET['search']['value']) // if datatable send POST for search
            {

              if($i===0) // first loop
              {
                $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                $this->db->like($item, $_GET['search']['value']);
            }
            else
            {
                $this->db->or_like($item, $_GET['search']['value']);
            }

              if(count($this->column_search()) - 1 == $i) //last loop
                $this->db->group_end(); //close bracket
            }
            $i++;
        }

          if(isset($_GET['order'])) // here order processing
          {
            $this->db->order_by($this->column_order[$_GET['order']['0']['column']], $_GET['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables_where_not_in($column,$where){
        $this->_get_data_where_not_in($column,$where);
        if($_GET['length'] != -1)
            $this->db->limit($_GET['length'], $_GET['start']);
        $query = $this->db->get();
        return $query->result();
    } 

    function count_filtered_where_not_in($column,$where)
    {
      $this->_get_data_where_not_in($column,$where);
      $query = $this->db->get();
      return $query->num_rows();
  }
  function resp($var){
    return $var;
  }
}
