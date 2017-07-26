<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('test_method'))
{
    function icon(){
        return "http://localhost/development-workflow/asset/images/ico_logo.png";
    }
    function icon_sm(){
        return "http://arkademy.com/asset/images/ico_logo.png";
    }
    function hidden_script($state=FALSE){
        return false;
    }
    function pre_dump($var){
        echo "<pre>";
        var_dump($var);
        echo "</pre>";        
    }
    function gallery_base($dir){
        return "".base_url()."".$dir;
    }
    function pricing($var)
    {
    	$var = str_replace(',', '', $var);
        if (is_numeric($var)) {
            return number_format($var,0,",",".");
        }
        throw new \Exception("Invalid number to format: $var");
    } 
    function curtime(){
        // $no=date('Y-m-d-H-i-s');
        // list($y,$m,$d,$h,$i,$s)=explode('-', $no);
        return strtotime(date(timestamp()));
        //return $no;
    }  
    function rands(){
       return md5(uniqid(rand(), true));
    }
    function tanggal($var){
        $no=date('Y-m-d-H-i-s');
        list($y,$m,$d,$h,$i,$s)=explode('-', $no);
        return $d."".$m."".$s;
    }  
    function dates($param){
        list($tanggal,$jam)=explode(' ', $param);
        $newDate = date("d-m-Y", strtotime($tanggal));
        return $newDate." Jam ".$jam;
    }
    function timestamp(){
        return date('Y-m-d H:i:s');
    }
    function pajak($value){
        $percentage=5;
        $total=$value;
        $calculate=($percentage/100)*$value;
        return $calculate;
    }
    function subs($value){
        $word=strlen($value);
        if ($word > 15) {
            return substr($value,0,15)."..";
        }
        else{
            return $value;
        }
    }

    function oke($var){
        if ($var==1) {
            $data="<span class=' btn-success btn-xs' title='Confirmed'>&nbsp</span>";
        }
        else{
            $data="<span class=' btn-danger btn-xs' title='Not Confirmed'>&nbsp</span>";
        }
        return $data;
    }
    function subscribe($var){
        if ($var==1) {
            $data="<span class=' btn-success btn-xs' title='Subscribed'>&nbsp</span>";
        }
        else{
            $data="<span class=' btn-danger btn-xs' title='Not Subscribed'>&nbsp</span>";
        }
        return $data;
    }
    function is_publish($var){
        if ($var==1) {
            $data="<span class='btn btn-success btn-xs' title='Published'>&nbsp</span>";
        }
        else{
            $data="<span class='btn btn-danger btn-xs' title='Draft'>&nbsp</span>";
        }
        return $data;
    }
    function gender($var){
        if ($var=='L') {
            $data="Laki-laki";
        }
        else{
            $data="Perempuan";
        }
        return $data;
    }
    function role($var){
        if ($var==1) {
            $data="<span class='btn-xs btn-primary'>Siswa</span>";
        }
        elseif ($var==0) {
            $data="<span class='btn-xs btn-primary'><b><u>Guru</u></b></span>";
        }
        else{
            $data="-";
        }
        return $data;
    }
    function kelamin(){
        $option = array(
            'L' => 'Laki-laki', 
            'P' => 'Perempuan', 
            );
        return $option;
    }

    function drop_bootstrap($label,$name,$option=array()){        
        $x='class="form-control"';
        return
        "
        <div class='form-group'>
            <label class='control-label col-md-3'>".$label."</label>
            <div class='col-md-9'>
                ".form_dropdown($name, $option,'',$x)."              
                <span class='help-block'></span>
            </div>                            
        </div>
        ";
    }
    //template for geek pro
    function admin(){
        return "template/back/core";
    }
    //template for geek school
    function school(){
        return "template/school/core";
    }
    //template for geek teacher
    function teacher(){
        return "template/teacher/core";
    }
    /*
    * generate password hash using bcrypt, almost the same with function $this->generateHash()
    */
    function hashpass($var){
        $salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
        $hash = crypt($var, '$2y$12$d' . $salt);
        return $hash;
    }
    function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }
    function has($length){
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
        }

        return $token;
    }


    /*
    * password hash generation, see https://gist.github.com/dzuelke/972386
    */
    function generateHash($password){
        // secure hashing of passwords using bcrypt, needs PHP 5.3+
        // see http://codahale.com/how-to-safely-store-a-password/
        // salt for bcrypt needs to be 22 base64 characters (but just [./0-9A-Za-z]), see http://php.net/crypt
        $salt = substr(strtr(base64_encode(openssl_random_pseudo_bytes(22)), '+', '.'), 0, 22);
        // 2y is the bcrypt algorithm selector, see http://php.net/crypt
        // 12 is the workload factor (around 300ms on my Core i7 machine), see http://php.net/crypt
        $hash = crypt($password, '$2y$12$' . $salt);//the $2y$12$ is an important notation, and shall not be removed. it determines the length of the hash generated and possibly the cause why the comparison failed. 
        // we can now use the generated hash as the argument to crypt(), since it too will contain $2y$12$... with a variation of the hash. No need to store the salt anymore, just the hash is enough!
        return $hash;
    }

    /*
    * password hash validation, see https://gist.github.com/dzuelke/972386
    */
    function validatePassword($password,$hash){
        $result=hash_equals($hash, crypt($password, $hash));
        return $result;
    }
    
    function any_user(){
        $CI = get_instance();
        $CI->load->model('User_model','user');         
        $data = $CI->user->count_by('is_read','0');    
        return $data;
    }
    function any_subscribers(){
        $CI = get_instance();
        $CI->load->model('Subscribe_model','sub');         
        $data = $CI->sub->count_by('is_read','0');    
        return $data;
    }
    function any_inbox(){
        $CI = get_instance();
        $CI->load->model('Subscribe_model','sub');         
        $data = $CI->sub->count_by('is_read','0');    
        return $data;
    }
    function all(){
        return any_inbox()+any_subscribers()+any_user();
    }
    function is_ajax(){
        if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
        {
            return true;
        }
        else{
            return false;
            echo "404";
        }
    }
    function active($par){
        if ($par==='0') {
            $data='Non-aktif';
        }
        else{
            $data='Aktif';   
        }
        return $data;        
    }
     function publish($par){
        if ($par==='0') {
            $data='Draft';
        }
        else{
            $data='Publish';   
        }
        return $data;        
    }
    function cek_mime($par,$link=""){
        if ($par=='.mp3') {
            $img=base_url()."asset/images/mp3.png";
        }
        elseif ($par=='.mp4') {
            $img=base_url()."asset/images/video.png";
        }
        elseif ($par=='.pdf') {
            $img=base_url()."asset/images/pdf.png";
        }
        else{
            $img=$link;
        }
        return $img;
    }
    
    function validasi(){
        $res = $_POST['g-recaptcha-response'];
        if ($res==1) {
            return TRUE;
        }
        else{
            return FALSE;
        } 
    }
    function sesi_guru(){
        $CI = get_instance();
        $CI->load->library('session');        
        if ($CI->session->userdata('__usr_teacher_')==TRUE) {
            return TRUE;
        }
        return FALSE;
    }
    
    function sesi_admin_sekolah(){
        $CI = get_instance();
        $CI->load->library('session');        
        if ($CI->session->userdata('arch_sch')==TRUE) {
            return TRUE;
        }
        return FALSE;
    }
    function sesi_siswa(){
        $CI = get_instance();
        $CI->load->library('session');        
        if ($CI->session->userdata('__usr__')==TRUE) {
            return TRUE;
        }
        return FALSE;
    }
    function is_empty_session(){
        $CI = get_instance();
        $CI->load->library('session');   
        $ip = $CI->input->ip_address();     
        if ($CI->session->userdata('isLogin')==FALSE) {            
            return TRUE;
            $this->session->set_userdata('isLogin',TRUE);
        }
        else{
            return FALSE;   
              
        }
    }
    function redir($msg,$link){
        echo "
            <link href='css/font-awesome.min.css' rel='stylesheet'>
            <style type='text/css'>
                .container {
                  padding-right: 15px;
                  padding-left: 15px;
                  margin-right: auto;
                  margin-left: auto;
              }
              .text-center {
                  text-align: center;
              }
              body {
                font-family: 'Roboto', sans-serif;
                background: ;
                position: relative;
                font-weight: 400px;
            }
            </style>
                <div class='container text-center'>
                    <div>
                     <br><br><br>
                     
                 <div><br><br>
                    ".$msg."
                    </p>
                </div>
            </div>
        ";        
        echo "<script>";
        echo "setTimeout(function(){";
        echo 'window.location="';
        echo site_url($link);
        echo '"';
        echo "},1000)";
        echo "</script>";
    }
    function count_sesi(){
        $CI = get_instance();
        $CI->load->model('Sesi','sesi'); 
        $ip = $CI->input->ip_address();         
        $data = $CI->sesi->count_by('ip_address',$ip);
        if ($data < 1) {
            return TRUE;
        }
        else{
            // $CI->load->model('User_model','user');
            // $get_id_user = $CI->sesi->specific_column('id_user','ip_address',$ip);
            // $username=$CI->user->specific_view('email',$get_id_user);
            // $password=$CI->user->specific_view('password',$get_id_user);
            // $password=$CI->user->specific_view('role',$get_id_user);
            // start_cokkies($username,$password,$role);            
            return FALSE;
        }
    }
    function cookie_exist(){
        $CI = get_instance();
        $CI->load->model('Sesi','sesi'); 
        $ip = $CI->input->ip_address();         
        $data = $CI->sesi->count_by('ip_address',$ip);
        if ($data == 1) {
                       
            return TRUE;
        }
        else{
            destroy_cookies();
            return FALSE;
        }

    }
    function sesi_ready(){
        $CI = get_instance();
        $CI->load->model('Sesi','sesi'); 
        $sesi=$CI->session->userdata('session_id');
        $ip=$CI->sesi->specific_view('ip_address',$sesi);
        if (empty($ip)) {
            return FALSE;
        }
        else{
            return TRUE;
        }
    }
    function count_time($val){
        return gmdate("H:i:s", $val);
    }
    function dir_profile(){
        return base_url()."upload/";
    }
    function destroy_cookies(){
        setcookie('u_cook_name','',0,"/");      
        setcookie('u_cook_pwd','',0,"/");   
        setcookie('u_role','',0,"/");   
    }
    function start_cokkies($username,$password,$role){
        $CI = get_instance();
        $remember=$CI->input->post('remember'); 
        if ($remember!=NULL) {
            setcookie('u_cook_name',$username, time() + (86400*2),"/");
            setcookie('u_cook_pwd',$password, time() + (86400*2),"/");
            setcookie('u_role',$role, time() + (86400*2),"/");
        }
    }
    function selisih_waktu($end,$start){
        $end=strtotime($end);
        $start=strtotime($start);
        $selisih= $end-$start;
        return $selisih;
    }
    
}