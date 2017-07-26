<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Device extends My_Teacher {

	public $id_user="";
	protected $gateway_host="";
	protected $admin_token='NDg4MzEyNTU0NS4zMzQ3Njk6';

	function __construct(){
		parent::__construct();
		$sesi=$this->session->userdata('__usr_teacher_');
		if ($sesi==FALSE) {
			redirect('login');
		}else{
			/*
			* CHECKING WHAT ENVIRONMENT ARE WE IN
			* if production, use the official production gateway
			* if development, use local development gateway
			*/
			if(ENVIRONMENT==='production'){
				$this->gateway_host='http://13.228.33.195:3000';
			}else{
				$this->gateway_host='http://13.228.33.195:3000';
			}

			$this->id_user=$this->user->specific_column('id_user','email',$sesi);
			$this->email=$this->user->specific_column('email','email',$sesi);
		}

	}

	function index(){
		$sesi=$this->session->userdata('__usr_teacher_');
		$id_user=$this->user->specific_column('id_user','email',$sesi);
			/*
			* BASICALLY JUST CHECKING FOR USER ACCOUNT EXISTENCE
			*/
			$data=$this->information();		
			// var_dump($id_user);
			$user=$this->getUserInfo('arkademy_'.$id_user);
			$user_isExist=($user==true);

			if($user_isExist){
				
				$data=$this->information();
				$getDevices=$this->getDevices($user->token);
				// var_dump($getDevices);
				$data['devices']=$getDevices->devices;
				$data['seo']="Device Management";
				$data['body']="front/teacher/my_device";
				$this->load->view("template/front/core",$data);
			}else{
				/*
				* TRYING TO CREATE USER UNTIL X TIMES (IF FAILS)!
				*/
				$trialCount=0;
				$trialLimit=3;
				while($trialCount<$trialLimit){
					$userAddResult=$this->addUsers('arkademy_'.$id_user,$this->email);
					
					if(!$userAddResult){//jika gagal menambahkan user
						$trialCount++;
			
					}else{
						/*
						* SUCCESS AT X TRIAL
						* stop the while loop and then add permission, also print the view
						*/
						$trialLimit=0;
						$permissionAdd=$this->addPermission($userAddResult->token,'arkademy_'.$id_user);
						
						$data=$this->information();

						$getDevices=$this->getDevices($userAddResult->token);
						$data['devices']=$getDevices->devices;
						$data['seo']="Device Management";
						$data['body']="front/teacher/my_device";			
						return $this->load->view("template/front/core",$data);
					}
				}
				echo 'failed to retrieve token';
			}			
	}

// maliq start here
// =================================================================================

	function reg_device()
	{
		$data = array(
				'page_title' => 'Arkademy',
				'page_description' => 'API Dashboard for Arkademy',
				'page_keywords' => 'IoT, Arkademy, Arkana, API'
		);

		$this->load->view("Docs/api-devices-teacher/index.php",$data);
	}


	function docs(){
		/*
		* BASICALLY JUST CHECKING FOR USER ACCOUNT EXISTENCE
		*/
		$data=$this->information();	

		$user=$this->getUserInfo('arkademy_'.$this->id_user);
		$user_isExist=($user==true);
		if($user_isExist){
			
			$data=$this->information();
			$data['token']=$user->token;

			$data['seo']="Arkana API Documentation";

			$data['body']="Docs/api-devices-teacher/index";
			$this->load->view("template/front/core",$data);
			
		}
	}

	function index_api(){
		/*
		* BASICALLY JUST CHECKING FOR USER ACCOUNT EXISTENCE
		*/
		$user=$this->getUserInfo('arkademy_'.$this->id_user);
		$user_isExist=($user==true);
		$data=$this->information();
		$data['script']=FALSE;
		if($user_isExist){
			
			
			$data['token']=$user->token;

			$data['seo']="Arkana API Documentation";
			$data['body']="Docs/api-devices-teacher/all";
			$this->load->view("template/front/core",$data);
			
		}else{
				/*
				* TRYING TO CREATE USER UNTIL X TIMES (IF FAILS)!
				*/
				$trialCount=0;
				$trialLimit=3;
				while($trialCount<$trialLimit){
					$userAddResult=$this->addUsers('arkademy_'.$this->id_user,$this->email);
					
					if(!$userAddResult){//jika gagal menambahkan user
						$trialCount++;
			
					}else{
						/*
						* SUCCESS AT X TRIAL
						* stop the while loop and then add permission, also print the view
						*/
						$trialLimit=0;
						$permissionAdd=$this->addPermission($userAddResult->token,'arkademy_'.$this->id_user);
						
						$data=$this->information();
						$data['token']=$user->token;

						$data['seo']="Arkana API Documentation";
						$data['body']="Docs/api-devices-public/all";
						return $this->load->view("template/front/core",$data);
					}
				}
				echo 'failed to retrieve token';
			}
	}

	function dev_man(){
		/*
		* BASICALLY JUST CHECKING FOR USER ACCOUNT EXISTENCE
		*/
		$user=$this->getUserInfo('arkademy_'.$this->id_user);
		$user_isExist=($user==true);
		if($user_isExist){
			
			$data=$this->information();
			$data['token']=$user->token;

			$data['seo']="Arkana API Documentation";
			$data['body']="Docs/api-devices-teacher/dev_man";
			$this->load->view("template/front/core",$data);
			
		}
	}

	function new_reg(){
		/*
		* BASICALLY JUST CHECKING FOR USER ACCOUNT EXISTENCE
		*/
		$user=$this->getUserInfo('arkademy_'.$this->id_user);
		$user_isExist=($user==true);
		if($user_isExist){
			
			$data=$this->information();
			$data['token']=$user->token;

			$data['seo']="Arkana API Documentation";
			$data['body']="Docs/api-devices-teacher/new_reg";
			$this->load->view("template/front/core",$data);
			
		}
	}


	function misc(){
		/*
		* BASICALLY JUST CHECKING FOR USER ACCOUNT EXISTENCE
		*/
		$user=$this->getUserInfo('arkademy_'.$this->id_user);
		$user_isExist=($user==true);
		if($user_isExist){
			
			$data=$this->information();
			$data['token']=$user->token;

			$data['seo']="Arkana API Documentation";
			$data['body']="Docs/api-devices-teacher/misc";
			$this->load->view("template/front/core",$data);
			
		}
	}


	function gpio(){
		/*
		* BASICALLY JUST CHECKING FOR USER ACCOUNT EXISTENCE
		*/
		$user=$this->getUserInfo('arkademy_'.$this->id_user);
		$user_isExist=($user==true);
		if($user_isExist){
			
			$data=$this->information();
			$data['token']=$user->token;

			$data['seo']="Arkana API Documentation";
			$data['body']="Docs/api-devices-teacher/gpio";
			$this->load->view("template/front/core",$data);
			
		}
	}

	function adc(){
		/*
		* BASICALLY JUST CHECKING FOR USER ACCOUNT EXISTENCE
		*/
		$user=$this->getUserInfo('arkademy_'.$this->id_user);
		$user_isExist=($user==true);
		if($user_isExist){
			
			$data=$this->information();
			$data['token']=$user->token;

			$data['seo']="Arkana API Documentation";
			$data['body']="Docs/api-devices-teacher/adc";
			$this->load->view("template/front/core",$data);
			
		}
	}

	function spi(){
		/*
		* BASICALLY JUST CHECKING FOR USER ACCOUNT EXISTENCE
		*/
		$user=$this->getUserInfo('arkademy_'.$this->id_user);
		$user_isExist=($user==true);
		if($user_isExist){
			
			$data=$this->information();
			$data['token']=$user->token;

			$data['seo']="Arkana API Documentation";
			$data['body']="Docs/api-devices-teacher/spi";
			$this->load->view("template/front/core",$data);
			
		}
	}

	function uart(){
		/*
		* BASICALLY JUST CHECKING FOR USER ACCOUNT EXISTENCE
		*/
		$user=$this->getUserInfo('arkademy_'.$this->id_user);
		$user_isExist=($user==true);
		if($user_isExist){
			
			$data=$this->information();
			$data['token']=$user->token;

			$data['seo']="Arkana API Documentation";
			$data['body']="Docs/api-devices-teacher/uart";
			$this->load->view("template/front/core",$data);
			
		}
	}

	function i2c(){
		/*
		* BASICALLY JUST CHECKING FOR USER ACCOUNT EXISTENCE
		*/
		$user=$this->getUserInfo('arkademy_'.$this->id_user);
		$user_isExist=($user==true);
		if($user_isExist){
			
			$data=$this->information();
			$data['token']=$user->token;

			$data['seo']="Arkana API Documentation";
			$data['body']="Docs/api-devices-teacher/i2c";
			$this->load->view("template/front/core",$data);
			
		}
	}

	function pwm(){
		/*
		* BASICALLY JUST CHECKING FOR USER ACCOUNT EXISTENCE
		*/
		$user=$this->getUserInfo('arkademy_'.$this->id_user);
		$user_isExist=($user==true);
		if($user_isExist){
			
			$data=$this->information();
			$data['token']=$user->token;

			$data['seo']="Arkana API Documentation";
			$data['body']="Docs/api-devices-teacher/pwm";
			$this->load->view("template/front/core",$data);
			
		}
	}

	function dht(){
		/*
		* BASICALLY JUST CHECKING FOR USER ACCOUNT EXISTENCE
		*/
		$user=$this->getUserInfo('arkademy_'.$this->id_user);
		$user_isExist=($user==true);
		if($user_isExist){
			
			$data=$this->information();
			$data['token']=$user->token;

			$data['seo']="Arkana API Documentation";
			$data['body']="Docs/api-devices-teacher/dht";
			$this->load->view("template/front/core",$data);

		}
	}

// maliq end here
// =================================================================================

	function apidocumentation(){
		
			$data['seo']="Arkana API Documentation";
			$data['body']="Docs/index";
			$this->load->view("template/front/core",$data);
		
	}

	//to alden you can add new device 
	function save_device($device_name=''){ 
		$device_name=$this->input('nama_device');
		$user=$this->getUserInfo('arkademy_'.$this->id_user);
		$user_isExist=($user==true);
		if($user_isExist){
			$newDeviceRegistered=$this->registerNewDevice($user->token,$device_name,$device_name,'arkademy device for : '.$this->id_user);

			if(($newDeviceRegistered!=403)&&($newDeviceRegistered!=false)){
				$this->session->set_flashdata('sukses', "New device tersimpan.");	
				$this->addNewDevice($user->token,$device_name,$device_name,'arkademy device for : '.$this->id_user);
			}else if($newDeviceRegistered==403){
				$this->addNewDevice($user->token,$device_name,$device_name,'arkademy device for : '.$this->id_user);
			}
			redirect('g/device');
		}
	}

	//to alden you can test your connection 
	function test_connect(){
		$id_token = $this->user->specific_view('meta',$this->id_user); // get token from column meta in user table
		$user=$this->getUserInfo('arkademy_'.$this->id_user);
		if($user){
			/*
			* BASICALLY JUST GRANTING USER ACCOUNT ACCESS RIGHT TO ARKANA PLATFORM
			*/
			$permission=$this->getPermission($user->token,'arkademy_'.$this->id_user);
			$permissionExist=($permission!=null);
			
			if(!$permissionExist){
				/*
				* ADDING PERMISSION IF USER DOESN'T HAVE PERMISSION YET
				*/
				$permissionAdd=$this->addPermission($user->token,'arkademy_'.$this->id_user);
				echo json_encode(array(
					"stat" => TRUE,
					'token'=>$user->token,
					'register_token'=>$user->metadata->device_register->key
				));
			}else{
				echo json_encode(array(
					"stat" => TRUE,
					'token'=>$user->token,
					'register_token'=>json_decode($permission->metadata)->device_register->key
				));
			}
			
		}else{
			echo json_encode(array("stat" => FALSE));
		}
	}
	
	function delete($id){
		$user=$this->getUserInfo('arkademy_'.$this->id_user);
		$user_isExist=($user==true);
		if($user_isExist){
			$curl = curl_init($this->gateway_host.'/v0/arkana/dmg/device');
			$data = array(
			  'target_device_id' => $id,
			  );
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json',"Authorization: Bearer ".$user->token));
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
			$response = curl_exec($curl);
			$response=json_decode($response);
			// var_dump($response);
			if($response->status){
				$this->session->set_flashdata('sukses', "Device terhapus.");
				redirect('u/device');	
			}else{
				redirect('u/device');	
			}

			if (!$response) {
			    die("Connection Failure.n");
			}
		}
		
		
		
	}

	/*
	* ADD A NEW USER
	* API POST /v1/usm/users/
	* @param user's credentials
	* @return user model
	*/
	protected function addUsers($username,$email,$password='admin',$roleId='d9bd5371-8c49-4e84-acca-ef3fe9bbb2f5'){
		$curl = curl_init($this->gateway_host.'/v1/usm/users/');
			
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json',"Authorization: Bearer ".$this->admin_token));
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode([
					'username'=>$username,
					'password'=>$password,
					'roleId'=>$roleId,//this one is default, ADMIN role
					'email'=>$email
				])
			);
			// Make the REST call, returning the result
			$response = curl_exec($curl);
			$response=json_decode($response);
			// var_dump($response);
			if($response->status){
				return ($response->data);
			}else{
				return false;
			}
			if (!$response) {
			    die("Connection Failure.n");
			}
	}

	/*
	* LOGGIN IN USING BASIC LDAP METHOD
	* get access token of an account
	* API GET /v1/usm/users/token
	* Authorization Header : Basic base64_encode('username:password');
	* @return User model with token inside
	* 
	*/
	protected function getUserInfo($username,$password='admin'){
		$curl = curl_init($this->gateway_host.'/v1/usm/users/token');
			// var_dump($this->gateway_host.'/v1/usm/users/token');
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				"Authorization: Basic ".base64_encode($username.':'.$password)
				)
			);

			// Make the REST call, returning the result
			$response = curl_exec($curl);
			$response=json_decode($response);
			// var_dump($response);
			if($response->status){
				return ($response->data);
			}else{
				return false;
			}
			if (!$response) {
			    die("Connection Failure.n");
			}
	}

	/*
	* GRANT A USER WITH ARKANA PLATFORM ACCESS RIGHT
	* so they can do Arkana things
	* Basically just like
	* $.ajax({
	*	url:http://13.228.33.195:3000/v1/applications/permission,
	*   contentType:'application/json',
	*	headers:{
	*		'Authorization':'Bearer blablabla'
	*	},
	*	data:JSON.stringify({application_name:'v0_arkana'}),
	* });
	* 
	*/
	protected function addPermission($token){

		
		$curl = curl_init($this->gateway_host.'/v1/applications/permissions');
			
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				"Authorization: Bearer ".$token
				)
			);
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode([
				'application_name'=>'v0_arkana'
			]));

			// Make the REST call, returning the result
			$response = curl_exec($curl);

			$response=json_decode($response);
			if($response->status){
				return ($response->data);
			}else{
				return false;
			}
			
			if (!$response) {
			    die("Connection Failure.n");
			}
	}

	/*
	* CREATE A NEW DEVICE
	* 
	*/
	Protected function registerNewDevice($token='MzI1NzM3NTY1NC42MTQyOTg6',$device_guid='aaa',$device_name='aaa',$description='aaa'){

		$curl = curl_init($this->gateway_host.'/v0/arkana/dmg/register/device');
			
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				"Authorization: Bearer ".$token
				)
			);
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode([
				'device_guid'=>$device_guid,
				'device_name'=>$device_name,
				'description'=>$description
			]));

			// Make the REST call, returning the result
			$response = curl_exec($curl);
			$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			curl_close($curl);
			// var_dump($response);
			// echo '<br>';
			// var_dump($http_status);
			$response=json_decode($response);
			if($response->status){
				return true;
			}else if($http_status=='403'){//device already exist
				return 403;
			}else{
				return false;
			}
			
			if (!$response) {
			    die("Connection Failure.n");
			}
	}

	/*
	* GET LIST OF DEVICES
	* 
	*/
	protected function getDevices($token){

		$curl = curl_init($this->gateway_host.'/v0/arkana/dmg/device');
			
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
					'Content-Type: application/json',
					"Authorization: Bearer ".$token
				)
			);

			// Make the REST call, returning the result
			$response = curl_exec($curl);

			$response=json_decode($response);
			// var_dump($response);
			if($response->status){
				return ($response->data);
			}else{
				return false;
			}
			
			if (!$response) {
			    die("Connection Failure.n");
			}
	}

	/*
	* ADD A NEW DEVICE INTO OUR ACCESS TOKEN
	* 
	*/
	protected function addNewDevice($token,$device_guid,$device_name,$description){

		$curl = curl_init($this->gateway_host.'/v0/arkana/dmg/device');
			
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
					'Content-Type: application/json',
					"Authorization: Bearer ".$token
				)
			);
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode([
				'new_device_id'=>$device_guid
			]));

			// Make the REST call, returning the result
			$response = curl_exec($curl);

			$response=json_decode($response);
			if($response->status){
				return ($response->data);
			}else{
				return false;
			}
			
			if (!$response) {
			    die("Connection Failure.n");
			}
	}

	/*
	* GET USER PERMISSON OF ARKANA PLATFORM ACCESS RIGHT
	* self explaining
	*/
	protected function getPermission($token,$username,$password='admin'){
		
		$curl = curl_init($this->gateway_host.'/v1/applications/permissions');
			
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER, array(
				'Content-Type: application/json',
				"Authorization: Bearer ".$token
				)
			);
			// Make the REST call, returning the result
			$response = curl_exec($curl);
			// var_dump($response);
			$response=json_decode($response);

			if($response->status){
				return ($response->data);
			}else{
				return false;
			}
			
			if (!$response) {
			    die("Connection Failure.n");
			}
	}
	
}
