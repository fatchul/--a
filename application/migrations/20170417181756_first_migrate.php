<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_First_migrate extends CI_Migration
{
	// 
	function up()
	{
		if(!($this->db->table_exists('cms_sosmed'))){
			/* 
			* CREATE TABLE user
			* 
			*/
			$this->dbforge->add_field(array(
				'id' => array(
					'type' => 'INT',
					'autoincrement' => TRUE,							
					),
				'sosmed' => array(
					'type' => 'VARCHAR',
					'constraint' => '200',
					),
				'favicon' => array(
					'type' => 'VARCHAR',
					'constraint' => '200',
					),
				'type' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					),
				'the_value_is' => array(
					'type' => 'TEXT',
					),
				'shows' => array(
					'type' => 'VARCHAR',
					'constraint' => '2',
					'default' => '0',
					),
				'as_a' => array(
					'type' => 'VARCHAR',
					'constraint' => '200',
					),
				'add_ico' => array(
					'type' => 'VARCHAR',
					'constraint' => '200',
					),
				));
			$this->dbforge->add_key('id', TRUE);
			$this->dbforge->create_table('cms_sosmed');

			/*
			* inserting user Geekpro Admin data seed
			*/
			$data = array(
				array(
					'id' => "1",
					'sosmed' => 'Email',
					'favicon' => 'icon-email3',
					'type' => 'text',
					'the_value_is' => '',
					'shows' => '0',
					'as_a' => '',
					'add_ico' => 'si-google',
					),
				array(
					'id' => "2",
					'sosmed' => 'Facebook',
					'favicon' => 'icon-facebook',
					'type' => 'text',
					'the_value_is' => '',
					'shows' => '0',
					'as_a' => '',
					'add_ico' => 'si-facebook',
					),
				array(
					'id' => "3",
					'sosmed' => 'Instagram',
					'favicon' => 'icon-instagram',
					'type' => 'text',
					'the_value_is' => '',
					'shows' => '0',
					'as_a' => '',
					'add_ico' => 'si-instagram',
					),
				array(
					'id' => "4",
					'sosmed' => 'Twitter',
					'favicon' => 'icon-twitter',
					'type' => 'text',
					'the_value_is' => '',
					'shows' => '0',
					'as_a' => '',
					'add_ico' => 'si-twitter',
					),
				array(
					'id' => "5",
					'sosmed' => 'Google Analytic',
					'favicon' => 'icon-email3',
					'type' => 'textarea',
					'the_value_is' => '',
					'shows' => '0',
					'as_a' => '',
					'add_ico' => 'si-google',
					),
				array(
					'id' => "6",
					'sosmed' => 'Meta Deskripsi',
					'favicon' => 'icon-email3',
					'type' => 'textarea',
					'the_value_is' => '',
					'shows' => '0',
					'as_a' => '',
					'add_ico' => 'si-google',
					),
				array(
					'id' => "7",
					'sosmed' => 'Meta Keywords',
					'favicon' => 'icon-email3',
					'type' => 'textarea',
					'the_value_is' => '',
					'shows' => '0',
					'as_a' => '',
					'add_ico' => 'si-google',
					),
				);
			$this->db->insert_batch('cms_sosmed', $data);
		}

		if(!($this->db->table_exists('user'))){
			/* 
			* CREATE TABLE user
			* 
			*/
			$this->dbforge->add_field(array(
				'id_user' => array(
					'type' => 'VARCHAR',
					'constraint' => '15',							
					),
				'id_school' => array(
					'type' => 'VARCHAR',
					'constraint' => '200',
					'null' => TRUE,
					),
				'email' => array(
					'type' => 'VARCHAR',
					'constraint' => '200',
					),
				'role' => array(
					'type' => 'VARCHAR',
					'constraint' => '100',
					'null' => TRUE,
					),
				'nama' => array(
					'type' => 'VARCHAR',
					'constraint' => '200',
					'null' => TRUE,
					),
				'phone' => array(
					'type' => 'VARCHAR',
					'constraint' => '200',
					'null' => TRUE,
					),
				'dob' => array(
					'type' => 'VARCHAR',
					'constraint' => '200',
					'null' => TRUE,
					),
				'password' => array(
					'type' => 'VARCHAR',
					'constraint' => '200',
					'null' => TRUE,
					),
				'gender' => array(
					'type' => 'VARCHAR',
					'constraint' => '25',
					'null' => TRUE,
					),
				'profile' => array(
					'type' => 'TEXT',				
					'null' => TRUE,
					),
				'last_login' => array(
					'type' => 'TIMESTAMP',				
					),
				'date_join' => array(
					'type' => 'TIMESTAMP',								
					),
				'token_reg' => array(
					'type' => 'VARCHAR',
					'constraint' => '200',
					'null' => TRUE,
					),
				'token_forgot_pass' => array(
					'type' => 'VARCHAR',
					'constraint' => '200',
					'null' => TRUE,
					),
				'level' => array(
					'type' => 'VARCHAR',
					'constraint' => '15',
					'null' => TRUE,
					),
				'address' => array(
					'type' => 'TEXT',				
					'null' => TRUE,
					),
				'facebook_url' => array(
					'type' => 'VARCHAR',
					'constraint' => '200',
					'null' => TRUE,
					),
				'pict_name' => array(
					'type' => 'VARCHAR',
					'constraint' => '200',
					'null' => TRUE,
					),
				'is_subscribe' => array(
					'type' => 'INT',
					'constraint' => 1,
					'default' => '1',
					),
				'is_valid' => array(
					'type' => 'INT',
					'constraint' => 1,
					'default' => '0',
					),
				'is_read' => array(
					'type' => 'INT',
					'constraint' => 1,
					'default' => '0',
					),
				'meta' => array(
					'type' => 'VARCHAR',
					'constraint' => '200',
					'null' => TRUE,
					),
				));
			$this->dbforge->add_key('id_user', TRUE);
			$this->dbforge->create_table('user');

			/*
			* inserting user Geekpro Admin data seed
			*/
			$data = array(
				array(
					'id_user' => curtime(),
					'email' => 'a@a.a',
					'role' => '10','is_read' => '1',
					'password' => '$2y$12$.0/CBrd3uSMOiSFQTAdtL.okHY5EcvMoXVbV6DhN1vkNQbK17hl6q',
					),
				);
			$this->db->insert_batch('user', $data);
		}

		if(!($this->db->table_exists('school'))){
		/* 
		* CREATE TABLE school
		* 
		*/
		$this->dbforge->add_field(array(
			'id_school' => array(
				'type' => 'VARCHAR',
				'constraint' => '15',							
				),

			'school_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
				),
			'address' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
				),
			'contact_person' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,
				),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => TRUE,
				),			
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => TRUE,
				),			
			'update_at' => array(
				'type' => 'TIMESTAMP',				
				),
			'last_login' => array(
				'type' => 'TIMESTAMP',				
				),
			'headmaster' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => TRUE,
				),
			'kota' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => TRUE,
				),
			'pic' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
				'default' => 'sch.jpg',
				),
			'reg_number_ministry' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
				'null' => TRUE,
				),
			'token_reg' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',

				),
			'token_forgot_pass' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',

				),			
			'is_subscribe' => array(
				'type' => 'INT',
				'constraint' => 1,
				'default' => '1',
				),
			'is_valid' => array(
				'type' => 'INT',
				'constraint' => 1,
				'default' => '1',
				),
			));
		$this->dbforge->add_key('id_school', TRUE);
		$this->dbforge->create_table('school');
	}

	if(!($this->db->table_exists('tag'))){
		
		/* 
		* CREATE TABLE tag
		* 
		*/
		$this->dbforge->add_field(array(
			'id_tag' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',							
				),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
				),
			'slug' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
				),		
			'update_at' => array(
				'type' => 'TIMESTAMP',				
				),
			'is_publish' => array(
				'type' => 'INT',
				'constraint' => 1,
				'default' => '1',
				),
			));
		$this->dbforge->add_key('id_tag', TRUE);
		$this->dbforge->create_table('tag');
	}

	if(!($this->db->table_exists('course_tag'))){
		/* 
		* CREATE TABLE course tag
		* 
		*/
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => '100',							
				'auto_increment' => TRUE
				),
			'id_tag' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',							
				),
			'id_course' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',
				),
			));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('course_tag');
	}
	if(!($this->db->table_exists('course'))){
		/* 
		* CREATE TABLE course
		* 
		*/
		$this->dbforge->add_field(array(
			'id_course' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'title' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',							
				),
			'slug' => array(
				'type' => 'VARCHAR',
				'constraint' => '200',							
				),
			'summary' => array(
				'type' => 'TEXT',
				),
			'meta' => array(
				'type' => 'VARCHAR',
				'constraint' => '500',
				),
			'content' => array(
				'type' => 'TEXT',
				
				),
			'last_update' => array(
				'type' => 'TIMESTAMP',				
				),
			'duration' => array(
				'type' => 'INT',
				'constraint' => 10,
				),
			'is_publish' => array(
				'type' => 'INT',
				'constraint' => 1,
				'default' => '0',
				),
			));
		$this->dbforge->add_key('id_course', TRUE);
		$this->dbforge->create_table('course');
	}

	if(!($this->db->table_exists('course_tr'))){
		/* 
		* CREATE TABLE course transaksi
		* 
		*/
		$this->dbforge->add_field(array(
			'id_course_enrollment' => array(
				'type' => 'INT',				
				'auto_increment' => TRUE											 
				),
			'id_course' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'id_user' => array(
				'type' => 'VARCHAR',
				'constraint' => '15',
				),
			'date_enrollment' => array(
				'type' => 'VARCHAR',	
				'constraint' => '25',
				'default' => '0000-00-00 00:00:00'
				),
			'finish_task' => array(
				'type' => 'TIMESTAMP',				
				),		
			'is_finish' => array(
				'type' => 'INT',
				'constraint' => 1,
				'default' => '0',		
				),
			'finish_task' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'default' => '0000-00-00 00:00:00',		
				),	
			));
		$this->dbforge->add_key('id_course_enrollment', TRUE);
		$this->dbforge->create_table('course_tr');
	}
	if(!($this->db->table_exists('course_gallery'))){
		/* 
		* CREATE TABLE course gallery
		* 
		*/
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',				
				'auto_increment' => TRUE											 
				),
			'id_course' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'id_galeri_media' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',											 
				)	
			));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('course_gallery');
	}
	if(!($this->db->table_exists('gallery_media'))){
		/* 
		* CREATE TABLE gallery media
		* 
		*/
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',				
				'auto_increment' => TRUE											 
				),
			'file_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',											 
				),
			'enc_name' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',											 
				),
			
			'directory' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',											 
				),

			'token' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'mime' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'meta' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',
				),	
			'note' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',
				),	
			'last_update' => array(
				'type' => 'TIMESTAMP',				
				),
			'owner' => array(
				'type' => 'VARCHAR',
				'constraint' => '1',
				),		
			));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('gallery_media');

		$data_media = array(
			array(
				'id' => '9999999',
				'token' => has(5),
				'enc_name' => 'no-image.jpg',
				'file_name' => 'no-image.jpg',
				'directory' => 'upload/',
				'owner' => 'T',
				),
			);
		$this->db->insert_batch('gallery_media', $data_media);
	}
	if(!($this->db->table_exists('silabus'))){
		/* 
		* CREATE TABLE silabus
		* 
		*/
		$this->dbforge->add_field(array(
			'id_silabus' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'id_course' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'title_silabus' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',
				),
			'summary_silabus' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',
				),
			'content_silabus' => array(
				'type' => 'TEXT',
				),
			'no_urut' => array(
				'type' => 'VARCHAR',				
				'constraint' => '5',
				),			
			'last_update' => array(
				'type' => 'TIMESTAMP',				
				),	
			'is_publish' => array(
				'type' => 'INT',
				'constraint' => '1',
				'default' => '1',
				),		
			));
		$this->dbforge->add_key('id_silabus', TRUE);
		$this->dbforge->create_table('silabus');
	}
		/* 
		* CREATE TABLE course material
		* 
		*/
		// $this->dbforge->add_field(array(
		// 	'id_course_material' => array(
		// 		'type' => 'VARCHAR',
		// 		'constraint' => '100',											 
		// 		),
		// 	'id_silabus' => array(
		// 		'type' => 'VARCHAR',
		// 		'constraint' => '100',											 
		// 		),
		
		// 	'title_material' => array(
		// 		'type' => 'VARCHAR',
		// 		'constraint' => '1000',
		// 		),
		// 	'meta' => array(
		// 		'type' => 'VARCHAR',
		// 		'constraint' => '1000',
		// 		),			
		// 	));
		//$this->dbforge->add_key('id_course_material', TRUE);
		//$this->dbforge->create_table('course_material');
		if(!($this->db->table_exists('subscribers'))){
		/* 
		* CREATE TABLE subscribers
		* 
		*/
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',											 
				),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'nama' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',	
				'null' => TRUE,										 
				),
			'profesi' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,											 
				),
			'instansi' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,											 
				),
			'telp' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,											 
				),
			'pertanyaan' => array(
				'type' => 'TEXT',
				'constraint' => '100',	
				'null' => TRUE,										 
				),
			'token' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,
				),
			'is_active' => array(
				'type' => 'INT',
				'constraint' => '1',
				'default' => '1',
				),
			'is_read' => array(
				'type' => 'INT',
				'constraint' => '1',
				'default' => '0',
				),
			'date_join' => array(
				'type' => 'TIMESTAMP',								
				),			
			));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('subscribers');
	}
	if(!($this->db->table_exists('broadcast_message'))){
		/* 
		* CREATE TABLE broadcast_message
		* 
		*/
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',											 
				),
			'kepada' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'judul' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE,
				),
			'isi' => array(
				'type' => 'TEXT',
				),
			
			'date_create' => array(
				'type' => 'TIMESTAMP',								
				),			
			));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('broadcast_message');
	}
	if(!($this->db->table_exists('messanger'))){
		/* 
		* CREATE TABLE message
		* 
		*/
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'int',
				'auto_increment' => TRUE,										 
				),
			'id_user' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'subjek' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',
				),
			'pesan' => array(
				'type' => 'TEXT',
				),
			'date_create' => array(
				'type' => 'TIMESTAMP',	
				),
			'is_read_by_user' => array(
				'type' => 'INT',
				'constraint' => '1',
				'default' => '0',
				),
			));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('messanger');
	}
	if(!($this->db->table_exists('cms_page_category'))){
		/* 
		* CREATE TABLE CMS
		* 
		*/
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'int',
				'auto_increment' => TRUE,										 
				),
			'slug' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',											 
				),
			'category' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				),
			'title' => array(
				'type' => 'TEXT',
				),
			'content' => array(
				'type' => 'TEXT',
				),
			'date_create' => array(
				'type' => 'TIMESTAMP',	
				),
			'is_post' => array(
				'type' => 'INT',
				'constraint' => '1',
				'default' => '0',
				),
			));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('cms_page_category');
	}
	if(!($this->db->table_exists('cms_article'))){
		/* 
		* CREATE TABLE POST ARTICLE
		* 
		*/
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'varchar',
				'constraint' => '100',
				'auto_increment' => TRUE,										 
				),
			'slug' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',											 
				),
			'category_post' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				),
			'title_post' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',											 
				),
			'content' => array(
				'type' => 'TEXT',
				),
			'date_create' => array(
				'type' => 'TIMESTAMP',	
				),
			'is_post' => array(
				'type' => 'INT',
				'constraint' => '1',
				'default' => '0',
				),
			'filepath' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',											 
				),
			));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('cms_article');

	}
	if(!($this->db->table_exists('menu'))){
		$this->dbforge->add_field(array(
			'id_menu' => array(
				'type' => 'int',
				'auto_increment' => TRUE,										 
				),
			'id_pages_category' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',											 
				),
			'is_parent_menu' => array(
				'type' => 'int',
				'default' => '0',
				),
			'parent_id' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',											 
				),
			'level' => array(
				'type' => 'int',
				),
			'is_updated' => array(
				'type' => 'int',	
				'default' => '0',
				),
			'act' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'role' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'default' => 'up',											 
				),
			'identified' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'table_from' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'default' => '-',											 
				),
			'colom' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			));

		$this->dbforge->add_key('id_menu', TRUE);
		$this->dbforge->create_table('menu');
	}


	// create table tracking visitor
	if(!($this->db->table_exists('_tracking'))){
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'int',
				'auto_increment' => TRUE,										 
				),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'value' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'expire' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'date_modified' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'browser' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			'note' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',											 
				),
			));

		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('_tracking');
	}
	if(!($this->db->table_exists('course_endorse'))){
		/* 
		* CREATE TABLE course endorse
		* 
		*/
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'int',
				'auto_increment' => TRUE,										 
				),
			'id_user' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',											 
				),
			'id_course' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				),
			));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('course_endorse');
	}
	if(!($this->db->table_exists('session'))){
		/* 
		* CREATE TABLE course endorse
		* 
		*/
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'varchar',
				'constraint' => '40',									
				),
			'ip_address' => array(
				'type' => 'VARCHAR',
				'constraint' => '45',									
				),
			'timestamp' => array(
				'type' => 'INT',
				'constraint' => '10',
				),
			'data' => array(
				'type' => 'blob',				
				),
			'id_user' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',									
				),
			'browser' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',									
				),
			));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('session');
	}
}	

function down(){
		//$this->dbforge->drop_table('blog');
}
}