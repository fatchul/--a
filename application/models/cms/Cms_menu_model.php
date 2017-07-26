<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cms_menu_model extends Model_Main{
    
    protected function get_table_name() {
        return 'menu';
    }
    protected function primary() {
        return 'id';
    }
    public function update($id,$data){
        $this->db->trans_begin();
        $this->db->where($this->primary(),$id);
        $this->db->update($this->get_table_name(),$data);
        if ($this->db->trans_status() === FALSE)
            {$this->db->trans_rollback();}
        else
            {$this->db->trans_commit();return true;}

    }

    function get_menu_by_category($category,$role){
        $this->db->select('cms_page_category.*,menu.*');
        $this->db->from('cms_page_category');
        $this->db->join('menu', 'cms_page_category.id=menu.cms_page_category');        
        $this->db->where('level',0);        
        $this->db->where('role',$role);
        //$this->db->where_not_in('menu.', $ignore);
        $this->db->where('category',$category);
        $this->db->where('role',$role);
        $this->db->where('menu.act','active');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {            
            return $query->result();
        }
        
    }

    function get_menu_parent($level,$role){
        $this->db->select('cms_page_category.*,menu.*');
        $this->db->from('cms_page_category');
        $this->db->join('menu', 'cms_page_category.id=menu.id_pages_category');        
        $this->db->where('level',$level);        
        //$this->db->where_not_in('menu.', $ignore);
        $this->db->where('is_updated','1');
        $this->db->where('role',$role);
        $this->db->where('menu.act','active');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {            
            return $query->result();
        }
        
    }

    function get_parent_menu($level,$is_update){
        $this->db->select('menu.*,cms_page_category.*');
        $this->db->from('menu');
        $this->db->join('cms_page_category', 'cms_page_category.id=menu.id_pages_category');
        $this->db->order_by('menu.id_menu','ASC');                    
        $this->db->where('menu.level',$level);         
        $this->db->where('is_updated',$is_update);
        $this->db->where('role','up');
        $this->db->where('menu.act','active');           
        $query = $this->db->get();
        if ($query->num_rows() > 0) {            
            return $query->result();
        }
        
        
    }

     function get_menu_ready_from_type($level,$is_update){
        $this->db->select('m.id_menu , 
                            t.type_name as page_title, 
                            t.id_type as id, 
                            m.table_from,                            
                            p.category, p.cms_page_category_en
                          ');
        $this->db->from('menu m');
        $this->db->join('cms_page_category p', 'p.id=m.cms_page_category','left');
        $this->db->join('type t', 't.id_type=m.cms_page_category','left');
        
        $this->db->where('m.act','active');
        $this->db->where('m.level',$level);         
        $this->db->where('m.is_updated',$is_update);
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        
    }

    function has_child_1($parent,$level,$is_update){
        $this->db->select('id_menu');
        $this->db->from('menu');
        $this->db->where('level',$level); 
        $this->db->where('parent_id',$parent); 
        $this->db->where('is_updated',$is_update);
        $this->db->where('role','up');
        $this->db->where('menu.act','active');
        $query = $this->db->get();
        if ($query->num_rows() > 0) { 
            return TRUE;
        }
        else{
            return FALSE;   
        }
    }

    function list_childs($level,$parent,$is_update){
        
        $q=$this->db->query("SELECT m.*, p.title
               FROM menu m
                 LEFT OUTER JOIN cms_page_category p ON p.id=m.id_pages_category  
               WHERE m.role='up' AND m.is_updated=".$is_update." AND m.parent_id=".$parent." AND m.act='active' AND m.level=".$level." ORDER BY m.colom");
        return $q->result();
    }

    function get_by_ids($id){
        $this->db->select('menu.*,cms_page_category.*');
        $this->db->from('menu');
        $this->db->join('cms_page_category', 'cms_page_category.id=menu.cms_page_category');        
        $this->db->where('menu.id_menu',$id);           
        $query = $this->db->get();
        if ($query->num_rows() > 0) {            
            return $query->result();
        }
        else{
            echo "-";
        }
    }

    function see_parent_level($parent){
        // $this->db->select('menu.parent_id,menu.cms_page_category');
        // $this->db->from('menu');            
        // $this->db->where('menu.id_menu',$id);        
        // $query = $this->db->get();
        // if ($query->num_rows() > 0) {            
        //     foreach ($query->result() as $row)
        //     {
        //         $parent = $row->parent_id;
        //         $id_pages = $row->cms_page_category;
        $query_b=$this->db->select('pages_categpage_title')->from('cms_page_category')->where('cms_page_category.id',$parent)->get();  

        foreach ($query_b->result() as $rows){
            $data = $rows->page_title;
        }  
        return $data;
        //     }
        // }
        // else{
        //     echo "-";
        // }   
        // $this->db->select('menu.*,cms_page_category.*');
        // $this->db->from('menu');
        // $this->db->join('cms_page_category', 'cms_page_category.id=menu.parent_id');        
        // $this->db->where('menu.parent_id',$id);           
        // $query = $this->db->get();
        // if ($query->num_rows() > 0) {            
        //         foreach ($query->result() as $rows){
        //             $data = $rows->page_title;
        //         }
        //         return $data;
        // }
        // else{
        //     echo "-";
        // }
    }
    function header_column(){
        $this->db->select('identified,level,id_menu');
        $this->db->from('menu');           
        //$this->db->join('cms_page_category', 'cms_page_category.id=menu.cms_page_category');           
        $this->db->where('role','down');
        $this->db->where('is_updated','1');
        // $this->db->where('menu.act','active');
        
        $this->db->group_by('level');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {            
            return $query->result();
        }
    }

    function get_data_column($level){
        $q=$this->db->select('cms_page_category.page_title,menu.id_menu, cms_page_category.cms_page_category_en')
            ->from('menu')
            ->join('cms_page_category', 'cms_page_category.id=menu.cms_page_category')
            ->where('level',$level)
            ->where('role','down')
            ->where('menu.act','active')
            ->where('is_updated','1')
            ->get();
        return $q->result();
    }

    function menu_not_ready(){
        $q=$this->db->query("SELECT m.id_menu, m.table_from, p.id, p.title FROM menu m LEFT OUTER JOIN cms_page_category p ON p.id=m.id_pages_category  WHERE m.role='up' AND m.is_updated=0 AND m.act='active'");
        if ($q->num_rows() > 0) {            
            return $q->result();
        }
        
    }

}