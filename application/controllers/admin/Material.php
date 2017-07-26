<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends My_Admin {

	function __construct(){
        parent::__construct();        
        $this->load->model('Course_model','course');
        $this->load->helper(array('url','html','form')); 
    }
	
	public function index()
	{
		//$data['all']=$this->course->get_all_order('last_update','DESC');	
		$data['body']="back/material/all";	
		$this->load->view(admin(),$data);
	}
	public function tambah()
	{
		$data['body']="back/material/add";	
		$this->load->view(admin(),$data);
	}
	function list_of(){
		if (is_ajax()) {
			$list = $this->school->get_datatables();
			$data = array();
			$no = $_GET['start'];
			foreach ($list as $person) {
				
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $person->school_name;
				$row[] = $person->address;
				$row[] = $person->update_at;
				$row[] = $person->email;
				$row[] = $person->contact_person;
				$row[] = $person->last_login;
				$row[] = oke($person->is_valid);
				$row[] = '<a class="btn btn-xs btn-success " href='.base_url().'sekolah/view/'.$person->id_school.' title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
				<a class="btn btn-xs btn-warning" href='.base_url().'sekolah/edit/'.$person->id_school.' title="Edit" onclick="edit('."'".$person->id_school."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
				<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="d('."'".$person->id_school."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_GET['draw'],
				"recordsTotal" => $this->school->count_all(),
				"recordsFiltered" => $this->school->count_filtered(),
				"data" => $data,
				);
			echo json_encode($output);
		}
		else{
			echo "Forbidden";
		}
	}
	function upload(){
		$config['upload_path']   = FCPATH.'/upload/';
        $config['allowed_types'] = '*';
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
		//$config['max_size']      =   '5000';
        $this->load->library('upload',$config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_foto');
        	$orig_name=$this->upload->data('orig_name');
        	$nama_file=$this->upload->data('file_name');
        	$directory="upload/";
        	$mime=$this->upload->data('file_type');

        	$data = array(
        		'file_name' => $orig_name, 
        		'enc_name' => $nama_file, 
        		'directory' => $directory, 
        		'token' => $token, 
        		'mime' => $mime, 
        		'note' => $this->input('note'), 
        		'id_course' => $this->input('id_course'), 
        		);
        	$this->db->insert('course_gallery',$data);
        }
	}
	function remove_upload(){
		$token=$this->input->post('token');

		
		$foto=$this->db->get_where('course_gallery',array('token'=>$token));


		if($foto->num_rows()>0){
			$hasil=$foto->row();
			$nama_foto=$hasil->enc_name;
			if(file_exists($file=FCPATH.'/upload/'.$nama_foto)){
				unlink($file);
			}
			$this->db->delete('course_gallery',array('token'=>$token));

		}


		echo "{}";
	}

	function materials(){
		$data['body']="back/course/material/add";	
		$this->load->view(admin(),$data);
	}
	
}
