<?php
class Menu_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
	public function find_menu($parent_name) {			
		$this->db->select('*');
		$this->db->where('parent_name',$parent_name);
		$this->db->order_by("menu_order","ASC");
		$this->db->from('navigation_menu');
		$query=$this->db->get();
		return $query->result_array();
    }
	public function find_version() {
		$query = $this->db->get('version');
              
		return $query->row_array();  
	}
	public function get_menu_id($menu_name){
		$query = $this->db->get_where('navigation_menu', array('menu_name'=>$menu_name));
		$row = $query->row_array();  
 
		return $row['id'];
	}
	public function has_access($menu_name,$level){
		//Fetch ID of Menu
		if($level=='Administrator'){ 
			return true;
		}else{
			$query_access = $this->db->get_where('menu_access', array('category_name'=>$level, 'allow'=>1, 'menu_name'=>$menu_name));
			$result_access = $query_access->result_array();
			$count_access= count($result_access);	
			if($count_access != 0){	
				foreach ($result_access as $access):
					if($access['allow']==1){
						return true;
					}else{
						return false;
					}
				endforeach;
			}else{
				return false;
			}
		}
	}
	public function is_module_active($module_name){
		if($module_name ==""){
			return TRUE;
		}
		$query = $this->db->get_where('modules', array('module_name' => $module_name));
		if ($query->num_rows() > 0){
			$row = $query->row_array();
			if($row['module_status']==1){
				return TRUE;
			}else{
				return FALSE;
			}
		}
	}
}
?>