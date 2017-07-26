<?php 
/**
* 
*/
class Page extends My_Front
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('cms/Cms_page_category_model','cms_page');
		$this->load->model('cms/Cms_post_model','cms_post');
	}

	public function index()
	{

	}

	// function open(){
	// 	$data=$this->information();		
	// 	$data['seo']="Pengumuman pemenang Arkademy IoT Challenge";
	// 	$data['body']="front/category/view";			
	// 	$this->load->view("template/front/core",$data);
	// }

	function cms($slug=""){
		$this->track();
		$data=$this->information();		
		$get_id=$this->cms_page->specific_column('id','slug',$slug);
		$get_by=$this->cms_page->get_by_id($get_id);
		$data['seo']=$get_by[0]->title;
		$data['content']=$get_by[0]->content;
		$kategori=$get_by[0]->category;
		if ($kategori=='Kategori') {
			$data['article']=$this->cms_post->get_all_only('category_post',$get_id);
			$data['body']="front/category/list";
		}
		else{

			$data['body']="front/category/view";	
		}
					
		$this->load->view("template/front/core",$data);
	}
	function subcms($slug="",$slug_2=""){
		$this->track();
		$data=$this->information();	
		$get_id=$this->cms_post->specific_column('id','slug',$slug_2);
		$get_by=$this->cms_post->get_by_id($get_id);
		$data['seo']=$get_by[0]->title_post;	
		$data['content']=$get_by[0]->content;
		$data['body']="front/category/view";	
		$this->load->view("template/front/core",$data);
	}
}