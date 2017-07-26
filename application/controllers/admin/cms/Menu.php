<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends My_Admin {
	
	function __construct(){
		parent::__construct();        
		$this->load->model('cms/Cms_menu_model','menu');
		$this->load->model('cms/Cms_page_category_model','cms_page');
	}
	public function index()
	{
		//$data=$this->panel();
		$data['seo']="Menu | Dashboard";
		$data['l_0']=$this->menu->get_menu_parent(0,'up');
		$data['p_0']=$this->menu->get_menu_parent(0,'up');
		$data['c_0']=$this->menu->get_menu_parent(0,'up');

		$data['l_1']=$this->menu->get_menu_parent(1,'up');
		$data['p_1']=$this->menu->get_menu_parent(1,'up');
		$data['c_1']=$this->menu->get_menu_parent(1,'up');

		$data['main']=$this->menu->get_parent_menu(0,1,'up');		
		//$data['types']=$this->type_model->get_all_only('level',1);
		// $data['types']=$this->type_model->get_all();
		// if ($this->input->post('satu')) {
		// 	$submenu=$this->input->post('satu');
		// 	$value_base_main=$this->input->post('child1');
		// 	foreach ($submenu as $key => $value) {
		// 		list($sub,$id_head,$id_menu)=explode('-', $value);
		// 		$data = array(
		// 			'is_parent_menu' => 0, 
		// 			'parent_id'=>$id_head,
		// 			'level'=>2,
		// 			);
		// 		$this->menu->update($id_menu,$data);
		// 		redirect('pages/menu');
		// 	}
		// }
		// if ($this->input->post('dua')) {
		// 	$dua=$this->input->post('dua');
		// 	foreach ($dua as $key => $value) {
		// 		echo $value;
		// 	}
			
		// }
		
		// else{
		// 	//$data['menu']=$this->page->get_menu_ready('up');
		//	$data['menu']=$this->page->get_menu('up');
		$data['menu']=$this->menu->menu_not_ready();
		// 	$data['promo_page']=$this->Promo_model->get_all();
		// 	$btcategory=$this->input('btn-category');$category=$this->input('category');
		// 	$btlabel=$this->input('btn-label');$label=$this->input('label');
		// 	$bttag=$this->input('btn-tag');$tagss=$this->input('tag');
		
		
		
		
		// 	elseif ($btcategory) {
		// 		foreach ($category as $key => $value) {
		// 			$data = array('id_pages_category' => $value,'level' => '0','is_parent_menu' => '0');
		// 			$this->db->insert('menu',$data);
		// 		}
		// 		redirect('pages/menu');
		// 	}
		// 	elseif ($btlabel) {
		// 		foreach ($label as $key => $value) {
		// 			$data = array('id_pages_category' => $value,'level' => '0','is_parent_menu' => '0');
		// 			$this->db->insert('menu',$data);
		// 		}
		// 		redirect('pages/menu');
		// 	}	
		// 	elseif ($bttag) {
		// 		//var_dump($tagss);
		// 		foreach ($tagss as $key => $value) {
		// 			$data = array('id_pages_category' => $value,'level' => '0','is_parent_menu' => '0','table_from'=>'tag');
		// 			$this->db->insert('menu',$data);
		// 		}
		// 		redirect('pages/menu');
		// 	}	
		// 	else{
		// 		$data['body']=$this->_views('menu_all');
		// 		$data['label']=$this->page->get_by('category','Label');
		$data['pages']=$this->cms_page->get_all_only('category','Halaman');	
		$data['categori']=$this->cms_page->get_all_only('category','Kategori');	
		// 		$this->load->view($this->_template(),$data);	
		// 	}
		// }
		$data['body']="back/cms/menu/index";	
		$this->load->view(admin(),$data);	
	}
	function save(){
		//$data=$this->panel();
		$main = $this->input->post('main');	
		$parent_c1 = $this->input->post('parent_c1');
		$parent = $this->input->post('parent');	
			//$level=0;
			foreach ($main as $key => $value) {
				list($level,$id_menu)=explode('-', $value);
				//$level='0';
				if ($level==='0') {
					$is_parent=1;
					$parent_id=0;
					echo "0";
				}elseif ($level==='1' && $main) {
					$parent_id=$parent_c1[$key];
					$is_parent=1;
					echo "1";
				}elseif ($level==='2' && $main) {
					foreach ($parent as $key => $v) {
						$parent_id=$v;
					}

					foreach ($main as $key_parent => $v) {						
						$key=$key_parent;
					}
					$is_parent=0;
				}

				$data[] = array(
					'id_menu' => $id_menu,
					'is_parent_menu' => $is_parent, 
					'id_pages_category' => $key, 
					'level' => $level, 
					'parent_id' => $parent_id, 
					'is_updated' => 1,
					);
				
			}	
			//pre_dump($data)	;
			$this->db->update_batch('menu', $data, 'id_menu'); 
			$this->session->set_flashdata('sukses', "Menu succesfully created.");
			redirect('admin/cms/menu');	
		
	}
	function add_to_menu(){
		$btpages=$this->input('btn-pages');
		$pages=$this->input('page');
		$btcategory=$this->input('btn-category');
		$category=$this->input('category');
		if ($btpages) {
			foreach ($pages as $key => $value) {
				$data = array('id_pages_category' => $value,'level' => '0','is_parent_menu' => '0','act'=>'active');
				$this->db->insert('menu',$data);
			}
			$this->session->set_flashdata('sukses', "Menu added.");
			redirect('admin/cms/menu');
		}
		elseif ($btcategory) {
			foreach ($category as $key => $value) {
				$data = array('id_pages_category' => $value,'level' => '0','is_parent_menu' => '0','act'=>'active');
				$this->db->insert('menu',$data);
			}
			$this->session->set_flashdata('sukses', "Menu added.");
			redirect('admin/cms/menu');
		}
	}
	public function tambah()
	{
		if ($this->input('btn-save')) {
			$this->cms_page->insert_normal();
			$this->session->set_flashdata('sukses', "Data berhasil ditambah.");
			redirect('admin/cms/category/tambah');	
		}
		else{
			$get=$this->input->get('get');
			$category="Kategori";
			if ($get==='page') {
				$category="Halaman";
			}
			$data['kategori']=$category;	
			$data['body']="back/cms/category/create";	
			$this->load->view(admin(),$data);
		}
	}
	public function delete_list($id){
		$this->menu->delete($id);	
		$this->session->set_flashdata('sukses', "List deleted.");
		redirect('admin/cms/menu');
	}
	public function list_of()
	{
		if (is_ajax()) {
			$list = $this->cms_page->get_datatables();
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
				<a class="btn btn-xs btn-success " href='.base_url().'admin/cms/category/view/'.$person->id.' title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
				<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="d('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';

				$data[] = $row;
			}

			$output = array(
				"draw" => $_GET['draw'],
				"recordsTotal" => $this->cms_page->count_all(),
				"recordsFiltered" => $this->cms_page->count_filtered(),
				"data" => $data,
				);
			echo json_encode($output);
		}
		else{
			echo "Forbidden";
		}
	}

	function sent(){
		if (is_ajax()) {
			$note="";
			$cek=$this->input('cek');
			$judul=$this->input('judul');
			$pesan=$this->input('pesan');
			foreach ($cek as $key => $value) {
				if ($value=='P') {
					$note.="Subscriber ";
					$emails=$this->subscribe->get_all();
					foreach($emails as $row){
						$this->sendmailnored("Hallo Subscriber Arkana",$judul,$row->email,$pesan);
					}
				}
				if ($value=='S') {
					$note.="Sekolah ";
					$emails=$this->school->get_all();
					foreach($emails as $row){
						$this->sendmailnored("Hallo Sekolah Arkana",$judul,$row->email,$pesan);
					}
				}
				if ($value=='G') {
					$note.="Guru ";
					$emails=$this->user->get_all_only('role','0');
					foreach($emails as $row){
						$this->sendmailnored("Hallo Guru Arkana",$judul,$row->email,$pesan);
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
						$this->sendmailnored("Hallo Siswa Arkana",$judul,$row->email,$pesan);
					}
				}
			}

			$data = array(
				'id' => has(20),
				'kepada' => $note, 
				'judul' => $judul, 
				'isi' => $pesan, 
				);
			$this->db->insert('cms/page_message',$data);

			$this->output
			->set_content_type("application/json")
			->set_output(json_encode(array('status'=>true, 'redirect'=>base_url("admin/cms/page") ))); 
		}
	}
	function view($id){
		$data['res']=$this->cms_page->get_by_id($id);	
		$data['body']="back/cms/category/view";	
		$this->load->view(admin(),$data);
	}
}
