<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class My_Controller extends CI_Controller{
    public $size=0;    
    public $get_lang="";
    public $max_height="5000";
    public $max_width="5000";
    public $max_size="5000";
    public $path="./upload/";
    public $id_user="";    
    public $thumb_path="uploads";
    protected $countingsession;
    protected $ip;
    

    function __construct(){
        parent::__construct();
        $sesi=$this->session->userdata('user');
        $this->ip=$this->input->ip_address();
        $this->load->model('Sesi','sesi');
        if ($sesi==TRUE) {
            
        }
        $lang=$this->session->userdata('lang');
        if ($lang=="") {
            $lang='id';
            $this->get_lang=$lang;
        }
        else{
            $lang=$lang;
            $this->get_lang=$lang;
        }      
        $this->countingsession=$this->sesi->count_by('ip_address',$this->ip);
        $this->load->helper('cookie');
          
    }
    

    function track($n=""){
        //$id=base_url(uri_string());
        $this->is_unique_address($n);    
    }
    protected function _config_upload($path="./upload/"){
        $config['upload_path']   =   $path;
        $config['allowed_types'] =   "gif|jpg|jpeg|png"; 
        $config['max_size']      =   $this->max_size;
        $config['max_width']     =   $this->max_width;
        $config['max_height']    =   $this->max_height;
        $config['encrypt_name'] = TRUE;
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload',$config); 
        $this->upload->initialize($config); 

    }
    protected function createThumbnail($path="upload/",$filename,$width,$height)
    {
        $config['image_library']    = "gd2";      
        $config['source_image']     = $path."".$filename; 
        //$config['source_image']     = "../src.moeblofurniture.com/uploads/" .$filename;     
        $config['create_thumb']     = TRUE;       
        $config['maintain_ratio']   = FALSE;       
        $config['width'] = $width;       
        $config['height'] = $height;
        $this->load->library('image_lib',$config);
        $this->upload->initialize($config); 
        if(!$this->image_lib->resize()) 
        { 
            echo $this->image_lib->display_errors(); 
        }  
        $this->image_lib->clear();
    }
    
    function bahasa(){
        return $this->get_lang;
    }

    function unique(){

    }

    protected function _dir_img(){      
    }
    function is_connected(){
        $connected=@fsockopen("www.google.com",80);
        if ($connected) {
          $is_conn=TRUE;
          fclose($connected);
        }
        else{
          $is_conn=FALSE;
        }
        return $is_conn;
      }
    function set_title($param){
        $data['title']=$param;
        return $data;
    }
    protected function _is_activate(){
        if ($this->_get_session()) {
            $sesi=$this->session->userdata('user');
            if ($this->Auth->specific_view('is_confirm',$sesi)==='1') {
                return $this->alert("<div class='col-sm-12 alert alert-danger text-center' role='alert'>
                Lakukan aktivasi akun anda melalui email.
                </div>");
                //return TRUE;
            }
            else{
                return FALSE;
            }

        }
    }
    
    protected function input($var){
        return $this->input->post($var,TRUE);
    }
    protected function timenow() {
        return date('Y-m-d H:i:s');
    }

    function _dropdown_select($dropdown_array,$name,$array_values,$selected_value){
        $dropdown_array = form_dropdown_search($name, $array_values, $selected_value,array('class' =>'form-control' ));
        return $dropdown_array;
    }
    function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))  
        {
          $ip=$_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   
        {
          $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
          $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    protected function is_unique_address($note=""){
        $link=uri_string();
        $this->load->helper('cookie');
        $check_visitor = $this->input->cookie(urldecode($link), FALSE);
        $ip = $this->getRealIpAddr();
        if ($check_visitor == false) {
            if ($link=="") {
                $link="index";
            }
            $cookie = array(
                "name" => urldecode($link),
                "value" => "$ip",
                "expire" => round(time() + 7200),
                "date_modified" => $this->timenow(),
                "browser" => $this->getBrowser(),
                "note" => $note,
                );

            $this->input->set_cookie($cookie);
            $this->db->insert('_tracking',$cookie);
        }
    }
    function getBrowser(){

        $agent = $_SERVER['HTTP_USER_AGENT'];
        $name = 'NA';


        if (preg_match('/MSIE/i', $agent) && !preg_match('/Opera/i', $agent)) {
            $name = 'Internet Explorer';
        } elseif (preg_match('/Firefox/i', $agent)) {
            $name = 'Mozilla Firefox';
        } elseif (preg_match('/Chrome/i', $agent)) {
            $name = 'Google Chrome';
        } elseif (preg_match('/Safari/i', $agent)) {
            $name = 'Apple Safari';
        } elseif (preg_match('/Opera/i', $agent)) {
            $name = 'Opera';
        } elseif (preg_match('/Netscape/i', $agent)) {
            $name = 'Netscape';
        }


        return $name;

    }


    protected function order_number($length = 12, $specialCharacters = true) {
        $digits = '';
        $chars = "ABCDEFGHJKLMNPQRSTUVWXYZ";
        $date=date('yMd');
        $numb="23456789";

        if($specialCharacters === true)
            $chars .= $numb ;


        for($i = 0; $i < $length; $i++) {
            $x = mt_rand(0, strlen($chars) -1);
            $digits .= $chars{$x} ;
        }

        return $digits;
    }

    protected function cache_get($name=NULL,$value=NULL){
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        if ( ! $foo = $this->cache->get($name))
        {
                //echo 'Saving to the cache!<br />';
                $foo = $value;
                $this->cache->save($name, $foo, 0);
        }

        return $foo;
    }
    protected function cache_delete($name){
        return $this->output->delete_cache('/'.$name);
    }

    protected function sendmailnored_OLD($title,$subject,$to,$msg){
        $this->load->library('email');
        $this->email->from('alfa@arkademy.com',$title);
        $this->email->subject($subject);
        $this->email->to($to);
        $this->email->message($msg);

        if ($this->email->send()) {
            return TRUE;
        } else {
            return "Not Send";            
        }
    }

     function modul_password_auth($get_pass){
        //$this->load->model('Anggota_model','usr'); // change your model name

        $password_now=$this->input('password_now');
        $password_new=$this->input('password_new');
        $password_con=$this->input('password_confirmation');

        if (validatePassword($password_now,$get_pass)) {        
            return true;
        }else{
            return false;
        }

    }
    function modul_password_proceed($column,$user_now,$table){

        $password_new=$this->input('password_new');
        $password_con=$this->input('password_confirmation');
        if ($password_new==$password_con) {
            $data = array(
                'password' => generateHash($password_new), 
                );
            $this->db->where($column,$user_now);
            $this->db->update($table,$data);
            return true;
        }
        else{
            return false;
        }
    }
    
    protected function information(){
        $this->load->model('cms/Cms_menu_model','menu');
        $this->load->model('User_model','user');
        $this->load->model('Subscribe_model','subscribe');
        $this->load->model('Course_model','course');
        $this->load->model('Gallery_model','galeri');
        $this->load->model('Tag_model','tag');
        $this->load->model('Course_tag_model','course_tag');
        $this->load->model('Course_gallery_model','galeri_course'); 
        $this->load->model('Course_transaksi_model','enroll');
        $this->load->model('Silabus_model','silabus');
        $this->load->model('Message_model','message');
        $this->load->model('cms/Cms_sosmed_model','Sosmed_model');

        $sesi=$this->session->userdata('__usr__');
        $this->id_user=$this->user->specific_column('id_user','email',$sesi);
        $data = array(
            'count_msg'=> $this->message->count_2_condition('is_read_by_user',0,'id_user',$this->id_user),
            'parent_menu' => $this->menu->get_parent_menu('up',1),
            'total_course'=> $this->enroll->count_my_course($this->id_user),
            'socmed' => $this->Sosmed_model->get_by('shows',1),
            'g_a' => $this->Sosmed_model->specific_view('the_value_is',5),
            'meta_desc' => $this->Sosmed_model->specific_view('the_value_is',6),
            'meta_key' => $this->Sosmed_model->specific_view('the_value_is',7),
            'script'=>TRUE,
            );

        return $data;
    }

    function can_access($a="",$b=""){
        $this->load->model('Course_endorse_model','endorse');        
        $is_access=$this->endorse->check_course($a,$b);
        if ($is_access) {
            return TRUE;
        }
        return FALSE;
    }

    function capcha(){
        $res = $_POST['g-recaptcha-response'];
        if ($res==1) {
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    /**
    * ELASTIC MAIL SEND API 
    * the general structure in the wild would be seen like this
    * URL : https://api.elasticemail.com/v2/email/send
    * TYPE : POST
    * REQUEST BODY : from=alfa@arkademy.com&fromName=AlfaPutra&apikey=404a1788-bf36-47bc-a36a-e8e1fd787269&subject=Hithere!&to=alden.hari@gmail.com;fatchul.amin1@gmail.com&bodyHTML=<h1>Html Body Testing</h1>&isTransactional=false
    *
    * Please understand that the data sent in REQUEST BODY are sent using url encoding since there is no CONTENT-TYPE determined in the header. This example only shows about the nature of HTTP REQUEST and can not be used directly, since some symbol or characters are supposedly encoded, like "<" or "&" or even whitespaces are usually encoded into "%#.", etc to make them valid.
    */
    function sendmailnored($title,$subject,$to,$msg=""){//https://elasticemail.com/support/http-api/send/
        $url = 'https://api.elasticemail.com/v2/email/send';
        $str=$msg;
        try{
                $post = array(
                    'from' => 'alfa@arkademy.com',
                    'fromName' => 'Alfa Putra',
                    'apikey' => '404a1788-bf36-47bc-a36a-e8e1fd787269',
                    'subject' => $subject,
                    'to' => $to,
                    'bodyHtml' => "<html>".$str."</html>",
                    //'bodyText' => "",
                    'isTransactional' => false
                );
                
                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => $url,//API endpoint URL
                    CURLOPT_POST => true,//is this a POST request?
                    CURLOPT_POSTFIELDS => $post,//POST data
                    CURLOPT_RETURNTRANSFER => true,//return response from server?
                    CURLOPT_HEADER => false,//Print Header with response body?
                    CURLOPT_SSL_VERIFYPEER => false//is SSL?
                ));
                
                $result=curl_exec ($ch);
                curl_close ($ch);
                //var_dump($result);  
                return TRUE;

        }catch(Exception $ex){
            echo $ex->getMessage();
            return FALSE;
        }
    }
    
    protected function user_exist($id){
        $ge=$this->user->isExist('id_user',$id);
        if ($ge) {
            return TRUE;
        }
        return FALSE;
    }
    protected function count_session($ip){

    }
    protected function get_redirect_cookies(){
        if (cookie_exist()) {
            $ip = $this->input->ip_address(); 
            $this->load->model('User_model','user');
            $get_id_user = $this->sesi->specific_column('id_user','ip_address',$ip);
            $username=$this->user->specific_view('email',$get_id_user);
            $password=$this->user->specific_view('password',$get_id_user);
            $role=$this->user->specific_view('role',$get_id_user);
            start_cokkies($username,$password,$role); 
        }
        if (isset($_COOKIE['u_cook_name']) && isset($_COOKIE['u_cook_pwd']) && isset($_COOKIE['u_role'])) {
                $username=$_COOKIE['u_cook_name'];
                $password=$_COOKIE['u_cook_pwd'];               
                $role=$_COOKIE['u_role'];
                if ($this->user->check_user_by_cookie($username,$password)) {
                    if ($role==='0') {
                        $this->session->set_userdata('__usr_teacher_', $username);
                        redirect('g/dashboard');
                    }
                    elseif ($role==='1') {                    
                        $this->session->set_userdata('__usr__', $username);
                        redirect('u/dashboard');
                    }                   
                }
            }
    }
}
