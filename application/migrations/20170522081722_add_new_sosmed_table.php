<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Add_new_sosmed_table extends CI_Migration
{
	
	function up()
	{
		if(!($this->db->table_exists('cms_sosmeds'))){
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
			$this->dbforge->create_table('cms_sosmeds');

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
				);
			$this->db->insert_batch('cms_sosmeds', $data);
		}
	}
	function down()
	{
		
	}
}