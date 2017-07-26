<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Preferences extends My_Admin {

	public function __construct()
    {
        parent::__construct();
       
        $this->load->model('Statistik_model','statistik');
    }

	public function index()
	{		
		echo "Forbidden";
	}

	//create local backup
	//save in ./backup
	function backup(){
		ini_set('memory_limit','-1');
		$this->load->dbutil();
		$prefs = array(     
			'format'      => 'zip',             
			'filename'    => 'backup-arkana-'. date("Y-m-d-H-i-s") .'.sql'
			);
		$backup =& $this->dbutil->backup($prefs); 
		$db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
		$save = 'backup/'.$db_name;
		$this->load->helper('file');
		write_file($save, $backup); 
		$this->load->helper('download');
		force_download($db_name, $backup); 
	}

	function validate($token){
		$this->load->model('User_model','user');
		$get_id_token=$this->user->specific_column('id_user','token_forgot_pass',$token);

		if(!$get_id_token){
			show_404();
		}
		else{
			$get_role=$this->user->specific_column('role','id_user',$get_id_token);
			if ($get_role==='10') {
				$token=has(56);
				$data_ = array('is_valid'=>'1','token_forgot_pass'=>$token);
				$up=$this->user->update_field('id_user',$get_id_token,$data_);
				if ($up) {
					echo "Validasi berhasil";
				}
				else{
					echo "Validasi gagal";	
				}
			}
			else{
				echo "user";
			}
		}
	}
	function statistics(){
		$data=$this->panel();
		$data['login_time']=$this->statistik->statistic_user();
		$data['still_login']=$this->statistik->still_login();
		
		$data['body']="back/statistik";	
		$this->load->view(admin(),$data);
	}
	function kill($id=""){
		$this->sesi->delete($id);
		redirect("preferences/statistics");
	}
}
