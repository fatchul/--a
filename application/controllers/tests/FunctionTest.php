<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Dummy function testing class
* Basically do it here to test some new features or functions before using it for production
*/
class FunctionTest extends My_Front {

	function __construct(){
		parent::__construct();
	}

	function index(){
		var_dump($hash=generateHash('admin'));
		var_dump(validatePassword('admin',$hash));
	}

	/*
	* showing login test page, targeting to $this->x() function
	*/
	function coba(){
		echo form_open('tests/FunctionTest/x');			
		echo t_password('pass','pass');
		echo t_submit('masuk','masuk');
		echo form_close();//use this bro, i dont really know why, but it seems more fit. :D
	}

	/*
	* target endpoint for login submission, basically checking whether the password hashing is working or not
	*/
	function x(){
		$p_db='$2y$12$.0/CBrd3uSMOiSFQTAdtL.okHY5EcvMoXVbV6DhN1vkNQbK17hl6q';//the result hash of password 'admin'; the $2y$12$ somehow is an important notation, and shall not be removed. it determines the length of the hash generated and possibly the cause why the comparison failed. 
		// $p_db=generateHash('admin');
		$P=$this->input('pass');
		if (validatePassword($P,$p_db)) {
			echo "YES";
		}else{
			echo "FALSE";
		}
	}

}