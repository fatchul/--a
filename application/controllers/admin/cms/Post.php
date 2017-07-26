<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends My_Admin {
	
	function __construct(){
		parent::__construct(); 
		$this->load->model('cms/Cms_page_category_model','cms_page');       
		$this->load->model('cms/Cms_post_model','cms_post');
	}
	public function index()
	{
		$data['seo']="Post | Dashboard";
		$data['all']=$this->cms_post->get_all();	
		$data['body']="back/cms/post/all";	
		$this->load->view(admin(),$data);
	}
	public function tambah()
	{$data['seo']="Post | Dashboard";
		if ($this->input('btn-save')) {
			if (($_FILES['foto']['name'])) {
				$this->_config_upload("./upload/post/");
				if($this->upload->do_upload('foto')){
					$finfo=$this->upload->data();  
					$data_post=$this->cms_post->get_all_field();
					$this->createThumbnail("upload/post/",$finfo['file_name'],400,200);
					$name=$finfo['raw_name']. '_thumb' .$finfo['file_ext'];
					$data_post['filepath']=$name;
					$this->cms_post->insert_to($data_post);
					$this->session->set_flashdata('sukses', "Data berhasil ditambah.");
					redirect('admin/cms/post');	
				}
			}
			else{
				$this->cms_post->insert_normal();
				$this->session->set_flashdata('sukses', "Data berhasil ditambah.");
				redirect('admin/cms/post');	
			}
			
		}
		else{
			$data['kategori']=$this->data_kategori();	
			$data['body']="back/cms/post/create";	
			$this->load->view(admin(),$data);
		}
	}
	public function delete($id){
		if (is_ajax()) {
			$this->cms_post->delete($id); 
			echo json_encode(array("status" => TRUE));	
		}
	}

}