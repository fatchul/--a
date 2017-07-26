<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends My_Front {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		
		$data=$this->information();		
		$this->load->view('front/home',$data);
	}

	/*
	* create for subscription using ajax response
	* insert into table user
	* @post email
	* @output json response of text/html page
	* every ajax response protect by http request validation
	*/

	function submit(){
		if (is_ajax()) {
			$email=$this->input('email');
			$nama=$this->input('n');
			$telp=$this->input('t');
			$instansi=$this->input('i');
			$profesi=$this->input('p');
			$question=$this->input('q');

			$exist=$this->subscribe->isExist('email',$email);

			if (validasi()) {
				if ($email ==='') {
					$data['status']='2';
					echo json_encode($this->load->view("template/front/modal",$data,true));			
				}
				else{	
					if ($exist) {
			            $data['status']='0';
			            echo json_encode($this->load->view("template/front/modal",$data,true));
			        }
			        else{
						if ($this->input("email")) {
							$data = array(
								'nama' => $nama, 
								'email' => $email, 
								'profesi' => $profesi, 
								'telpon' => $telp, 
								'pertanyaan' => $question, 
								'instansi' => $instansi, 
								);
							$msg=$this->load->view('front/email/template',$data,TRUE);															
							if($this->sendmailnored('Selamat datang di Arkademy','Selamat datang di Arkademy', $email, $msg)){ //sending email 
								$data['status']='1';
								$ready=$this->subscribe->get_all_field();
								$ready['is_active']=1;
								$this->subscribe->insert_to($ready);
							}
							else{
								$data['status']='2';
							}
							echo json_encode($this->load->view("template/front/modal",$data,true));			
						}
						else{
							//redirect(base_url());
						}
					}
				}
			}
			else{
				$data['status']='3';
			    echo json_encode($this->load->view("template/front/modal",$data,true));
			}
		}
		else{
			//redirect(base_url());
		}
	}



	/* 
	* verify email address from email
	* 
	*/
	function verifikasi($token=""){
		$data=$this->information();		
		if ($this->input('tok')) {
			$get_id=$this->user->specific_column('id_user','token_forgot_pass',$token);
			$get_email=$this->user->specific_column('email','id_user',$get_id);
			$pass=$this->input('upassw');
			$passkonf=$this->input('passwkonf');
			if ($pass===$passkonf) {
				$this->user->update($get_id,array('password' => generateHash($pass)));
				$this->session->set_flashdata('sukses', "Password berhasil dirubah.");
				$this->sendmailnored("Arkademy.com | Perubahan Kata Sandi","Perubahan kata sandi berhasil",$get_email,"Perubahan kata sandi berhasil dirubah.");
				$tokens=has(51);
				$this->user->update_all('email',$get_email,array('token_forgot_pass' => $tokens));
				redirect('forgot');
			}
			else{
				$this->session->set_flashdata('gagal', "Password tidak sama.");
				redirect('verify/'.$token);
			}
			
		}
		else{
			$get_id=$this->user->specific_column('id_user','token_forgot_pass',$this->uri->segment(2));
			if ($get_id) {
				$data['id']=$get_id;
				$data['body']="front/verify";			
				$this->load->view("template/front/core",$data);
			}
			else{
				redirect('?');
			}
		}
		
	}
}
