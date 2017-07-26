<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends My_Admin {
	
	function __construct(){
		parent::__construct();        
		$this->load->model('cms/Cms_page_category_model','cms_page');
	}
	public function index()
	{
		$data['seo']="Halaman | Dashboard";
		$data['all']=$this->cms_page->get_all_only('category','Halaman');	
		$data['body']="back/cms/page/all";	
		$this->load->view(admin(),$data);
	}
	public function tambah()
	{$data['seo']="Halaman | Dashboard";
		if ($this->input('btn-save')) {
			$this->cms_page->insert_normal();
			$this->session->set_flashdata('sukses', "Data berhasil ditambah.");
			redirect('admin/cms/page/tambah');	
		}
		else{
			$get=$this->input->get('get');
			$category="Kategori";
			if ($get==='page') {
				$category="Halaman";
			}
			$data['kategori']=$category;	
			$data['body']="back/cms/page/create";	
			$this->load->view(admin(),$data);
		}
	}
	public function delete($id){
		if (is_ajax()) {
			$this->cms_page->delete($id); 
			echo json_encode(array("status" => TRUE));	
		}
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
				<a class="btn btn-xs btn-success " href='.base_url().'admin/cms/page/view/'.$person->id.' title="Lihat"><i class="glyphicon glyphicon-eye-open"></i></a>
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
	function view($id){$data['seo']="Halaman | Dashboard";
		$data['res']=$this->cms_page->get_by_id($id);	
		$data['body']="back/cms/page/view";	
		$this->load->view(admin(),$data);
	}
	function edit($id){$data['seo']="Halaman | Dashboard";
		if ($this->input('btn-save')) {			
			$this->cms_page->update_by($id);
			$this->session->set_flashdata('sukses', "Data berhasil di perbaharui.");
			redirect('admin/cms/page/edit/'.$id);
		}
		else{
			$data['res']=$this->cms_page->get_by_id($id);	
			$data['body']="back/cms/page/edit";	
			$this->load->view(admin(),$data);	
		}
	}
}
