<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends My_Admin {

	function __construct(){
        parent::__construct();        
        $this->load->model('Gallery_model','galeri');
        $this->load->helper(array('url','html','form')); 
    }
	
	public function index()
	{
		//$data['all']=$this->course->get_all_order('last_update','DESC');	
		$data['body']="back/gallery/all";	
		$this->load->view(admin(),$data);
	}
	public function tambah()
	{$data['seo']="Media | Dashboard";
		$data['body']="back/gallery/add";	
		$this->load->view(admin(),$data);
	}
	function list_of(){
		if (is_ajax()) {
			$list = $this->galeri->get_datatables();
			$data = array();
			$no = $_GET['start'];
			foreach ($list as $gal) {
				
				$no++;
				$row = array();
				$row[] = $no;
				$link=gallery_base($gal->directory)."/".$gal->enc_name."_thumb".$gal->mime;	
				$link_download=base_url()."admin/gallery/download/".$gal->token;
				$row[] = "<img src='".cek_mime($gal->mime,$link)."' class='img-thumb'>";
				
				$row[] = $gal->file_name;
				$row[] = $gal->note;
				$row[] = $gal->mime;
				
			
				$row[] = "
				<a class='btn btn-xs btn-primary ' href='javascript:void(0)' title='Get Link'><i class='glyphicon glyphicon-upload' download='source' onclick='copyclipboard(".$gal->id.")'></i></a>
				<a class='btn btn-xs btn-success ' href=".$link_download." title='Download'><i class='glyphicon glyphicon-download-alt' download='source'></i></a>
				
				<a class='btn btn-xs btn-danger' href='javascript:void(0)' title='Hapus' onclick='d(".$gal->id.")'><i class='glyphicon glyphicon-trash'></i></a>";

				$data[] = $row;
			}

			$output = array(
				"draw" => $_GET['draw'],
				"recordsTotal" => $this->galeri->count_all(),
				"recordsFiltered" => $this->galeri->count_filtered(),
				"data" => $data,
				);
			echo json_encode($output);
		}
		else{
			echo "Forbidden";
		}
	}

	function list_of_choose(){
		if (is_ajax()) {
			$list = $this->galeri->get_datatables();
			$data = array();
			$no = $_GET['start'];
			foreach ($list as $gal) {
				$no++;
				$row = array();
				$link=gallery_base($gal->directory)."/".$gal->enc_name."_thumb".$gal->mime;				
				$row[] = "<img src='".cek_mime($gal->mime,$link)."' class='img-thumb'>";
				$row[] = $gal->note;
				$row[] = $gal->mime;
				$row[] = "<input type=checkbox name=media[".$gal->id."] value=".$gal->id.">";
				$data[] = $row;
			}

			$output = array(
				"draw" => $_GET['draw'],
				"recordsTotal" => $this->galeri->count_all(),
				"recordsFiltered" => $this->galeri->count_filtered(),
				"data" => $data,
				);
			echo json_encode($output);
		}
		else{
			echo "Forbidden";
		}
	}
	function upload($par=""){
		if ($par==='silabus') {
			$path=FCPATH.'/upload/silabus/';
        	$directory="upload/silabus";
        	$owner="S";
        }
        else{
        	$path=FCPATH.'/upload/';
        	$directory="upload/";
        	$owner="C";
        }
		$config['upload_path']   = $path;
        $config['allowed_types'] = '*';
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
		//$config['max_size']      =   '5000';
        $this->load->library('upload',$config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_foto');
        	$finfo=$this->upload->data();     
        	$orig_name=$this->upload->data('orig_name');
        	$nama_file=$this->upload->data('raw_name');
        	$mime=$this->upload->data('file_ext');
        	$this->createThumbnail('upload/',$finfo['file_name'],262,150);
        	$finfo['raw_name']. '_thumb' .$finfo['file_ext'];	
        	if ($this->input('id_course')) {
        		$data = array(
	        		'file_name' => $orig_name, 
	        		'enc_name' => $nama_file, 
	        		'directory' => $directory, 
	        		'token' => $token, 
	        		'mime' => $mime, 
	        		'note' => $this->input('note'),  
	        		'owner' => $owner,
	        		);
	        	$id_gallery=$this->galeri->insert_to($data); // insert media into table gallery media than get the insertid

	        	$data_course_galeri = array(
	        		'id_course' => $this->input('id_course'), 
	        		'id_galeri_media' => $id_gallery, 
	        		);
	        	$this->db->insert('course_gallery',$data_course_galeri); // insert data to course gallery
        	}
        	else{
        		$data = array(
	        		'file_name' => $orig_name, 
	        		'enc_name' => $nama_file, 
	        		'directory' => $directory, 
	        		'token' => $token, 
	        		'mime' => $mime, 
	        		'note' => $this->input('note'), 
	        		);
	        	$this->db->insert('gallery_media',$data);
        	}
        }
	}

	function remove_upload(){
		$token=$this->input->post('token');
		$foto=$this->db->get_where('gallery_media',array('token'=>$token));
		if($foto->num_rows()>0){
			$hasil=$foto->row();
			$nama_foto=$hasil->enc_name."".$hasil->mime;
			$id=$hasil->id;
			if(file_exists($file=FCPATH.'/upload/'.$nama_foto)){
				unlink($file);
				unlink(FCPATH.'/upload/'.$hasil->enc_name.'_thumb'.$hasil->mime);
			}
			$this->db->delete('gallery_media',array('token'=>$token));
			$this->galeri_course->delete_by('id_galeri_media',$id);
			$removed="TRUE";
			echo json_encode($removed);
		}
		
	}

	function remove_upload_course(){
		$token=$this->input->post('token');
		$foto=$this->db->get_where('gallery_media',array('token'=>$token));
		if($foto->num_rows()>0){
			$hasil=$foto->row();
			$nama_foto=$hasil->enc_name."".$hasil->mime;
			$id=$hasil->id;
			if(file_exists($file=FCPATH.'/upload/'.$nama_foto)){
				unlink($file);
				unlink(FCPATH.'/upload/'.$hasil->enc_name.'_thumb'.$hasil->mime);
			}
			$this->db->delete('gallery_media',array('token'=>$token));
			$this->galeri_course->delete_by('id_galeri_media',$id);
			$removed="TRUE";
			echo json_encode($removed);
		}
		
	}
	function delete($id){		
		$foto=$this->db->get_where('gallery_media',array('id'=>$id));
		if($foto->num_rows()>0){
			$hasil=$foto->row();
			$nama_foto=$hasil->enc_name."".$hasil->mime;
			if(file_exists($file=FCPATH.'/upload/'.$nama_foto)){
				unlink($file);
				unlink(FCPATH.'/upload/'.$hasil->enc_name.'_thumb'.$hasil->mime);
			}
			$this->db->delete('gallery_media',array('id'=>$id));
			$this->galeri_course->delete_by('id_galeri_media',$id);
		}
		echo "{}";
	}

	function gallerys(){
		$data['body']="back/course/gallery/add";	
		$this->load->view(admin(),$data);
	}
	function download($id){
		$this->load->helper('file');
		$get_file_name=$this->galeri->specific_column('enc_name','token',$id);		
		$mime=$this->galeri->specific_column('mime','token',$id);		
        $this->load->helper('download');
		$pth = file_get_contents(base_url()."upload/".$get_file_name."".$mime);
		$nme = $get_file_name."".$mime;
		force_download($nme, $pth);   
	}
	function url(){
		if (is_ajax()) {
			$id=$this->uri->segment(4);
			$get=$this->galeri->specific_view('enc_name',$id)."".$this->galeri->specific_view('mime',$id);
			$token=$this->galeri->specific_view('token',$id);
			$encname=$this->galeri->specific_view('enc_name',$id);
			$data['link']=gallery_base('upload')."/".$get;
			$data['link_download']=gallery_base('')."download/".$token."/".$encname;
			echo json_encode($this->load->view("back/gallery/view",$data,true));
		}else{
			echo "ERR";
		}
		
	}
	
}
