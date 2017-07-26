<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Broadcast extends My_Admin {
	
	function __construct(){
		parent::__construct();        
		$this->load->model('Broadcast_model','broadcast');
	}
	public function index()
	{
		$data['seo']="Broadcast | Dashboard";
		$data['body']="back/broadcast/all";	
		$this->load->view(admin(),$data);
	}
	public function tambah()
	{
		$data['seo']="Broadcast | Dashboard";
		$data['sekolah']=$this->school->get_all();
		$data['body']="back/broadcast/create";	
		$this->load->view(admin(),$data);
	}
	public function delete($id){
		if (is_ajax()) {
			$this->broadcast->delete($id); 
			echo json_encode(array("status" => TRUE));	
		}
	}
	public function list_of()
	{
		if (is_ajax()) {
			$list = $this->broadcast->get_datatables();
			$data = array();
			$no = $_GET['start'];
			foreach ($list as $person) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $person->judul;
				$row[] = $person->kepada;			
				$row[] = "";			
				$row[] = '
				<a class="btn btn-xs btn-success " href='.base_url().'admin/broadcast/view/'.$person->id.' title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
				<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="d('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_GET['draw'],
				"recordsTotal" => $this->broadcast->count_all(),
				"recordsFiltered" => $this->broadcast->count_filtered(),
				"data" => $data,
				);
			echo json_encode($output);
		}
		else{
			echo "Forbidden";
		}
	}

	function sent(){
		if ($this->is_connected()) {
			if (is_ajax()) {
				$status['pesan']="";
				$note="";
				$kepada="";
				$cek=$this->input('cek');
				$judul=$this->input('judul');
				$pesan=$this->input('pesan');
				$ops=$this->input('ops');

				if ($ops=='all') {
					foreach ($cek as $key => $value) {
						if ($value=='P') {
							$note.="Subscriber ";
							$emails=$this->subscribe->get_all();
							foreach($emails as $row){
								$this->sendmailnored("Hallo Subscriber Arkademy",$judul,$row->email,$pesan);
							}
						}
						if ($value=='S') {
							$note.="Sekolah ";
							$emails=$this->school->get_all();
							foreach($emails as $row){
								$this->sendmailnored("Hallo Sekolah Arkademy",$judul,$row->email,$pesan);
							}
						}
						if ($value=='G') {
							$note.="Guru ";
							$emails=$this->user->get_all_only('role','0');
							foreach($emails as $row){
								$this->sendmailnored("Hallo Guru Arkademy",$judul,$row->email,$pesan);
								$data_['id_user'] = $row->id_user;
								$data_['subjek'] = $judul;
								$data_['pesan'] =  $pesan; 
								$this->db->insert('messanger',$data_);
							}
							
						}
						if ($value=='M') {
							$note.="Murid ";
							$emails=$this->user->get_all_only('role','1');
							foreach($emails as $row){
								$this->sendmailnored("Hallo Siswa Arkademy",$judul,$row->email,$pesan);
							}
						}
					}

					$data = array(
						'id' => has(20),
						'kepada' => $note, 
						'judul' => $judul, 
						'isi' => $pesan, 
						);
					$this->db->insert('broadcast_message',$data);

					$this->output
					->set_content_type("application/json")
					->set_output(json_encode(array('status'=>true, 'redirect'=>base_url("admin/broadcast") ))); 
				}
				else{
					$notes="";
					$id_sekolah=$this->input('id_sekolah');
					$cok=$this->input('ceks'); // pilih murid atau guru per sekolahnya
					$get_email="";
					
					if ($cok<>0) {
						foreach ($cok as $key => $value) {
							if ($value=='G_') {
								
								foreach ($id_sekolah as $key => $s) {
									$kepada=$this->school->specific_view('school_name',$s).", ";
									$notes.="Guru ".$kepada;
									$get_email=$this->school->specific_view('email',$s).",";
									$emails=$this->user->get_by_multiple('id_school',$s,'role','0');
									if ($emails<>0) {
										foreach($emails as $row){
											$this->sendmailnored("Hallo Guru Arkademy Di ".$kepada." ",$judul,$row->email,$pesan);
											$data_['id_user'] = $row->id_user;
											$data_['subjek'] = $judul;
											$data_['pesan'] =  $pesan; 
											$this->db->insert('messanger',$data_);
											//echo $row->email. " ".$kepada."<br>";
										}
									}
									else{
										$status['pesan']="Tidak ada guru di ".$kepada." .";
									}
									
								}

							}
							if ($value=='M_') {
								
								
								foreach ($id_sekolah as $key => $s) {
									$kepada=$this->school->specific_view('school_name',$s).", ";
									$notes.="Murid ".$kepada;
									$get_email=$this->school->specific_view('email',$s).",";
									$emails=$this->user->get_by_multiple('id_school',$s,'role','1');
									if ($emails<>0) {
										foreach($emails as $row){
											$this->sendmailnored("Hallo Siswa Arkademy Di ".$kepada." ",$judul,$row->email,$pesan);
											$data_['id_user'] = $row->id_user;
											$data_['subjek'] = $judul;
											$data_['pesan'] =  $pesan; 
											$this->db->insert('messanger',$data_);
											//echo "kirim email ke murid ".$get_email. " yang sekolahnya di ".$kepada."<br>";
										}
									}
									else{
										$status['pesan']="Tidak ada murid di ".$kepada." .";
									}
									
								}
								
							}
							
						}
					}
					else{
						echo "Select school";
					}

					//echo $notes;
					$data = array(
						'id' => has(7),
						'kepada' => $notes, 
						'judul' => $judul, 
						'isi' => $pesan, 
						);
					$this->db->insert('broadcast_message',$data);

					// $this->output
					// ->set_content_type("application/json")
					// ->set_output(json_encode(array('status'=>true, 'redirect'=>base_url("admin/broadcast") ))); 

					echo json_encode($status);
				}
			}
		}
		else{
			echo "Email not sent, check your internet connection";
		}
	}
	function view($id){
		$data['seo']="Broadcast | Dashboard";
		$data['res']=$this->broadcast->get_by_id($id);	
		$data['body']="back/broadcast/view";	
		$this->load->view(admin(),$data);
	}
}
