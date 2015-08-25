<?php

class Module_model extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->database();
    }
	function get_modules() {
		$this->db->order_by("module_status", "desc");
		$this->db->order_by("module_id", "asc");
		$query=$this->db->get('modules');
		return $query->result_array();
    }
	function get_module_details($module_id) {
		$query = $this->db->get_where('modules', array('module_id' => $module_id));
        return $query->row_array();
    }
	function deactivate_module($module_name) {
		$data['module_status'] = 0;
		$this->db->update('modules', $data, array('module_name' => $module_name));
    }
	function activate_module($module_name) {
		$data['module_status'] = 1;
		$this->db->update('modules', $data, array('module_name' => $module_name));
    }
	function get_active_modules() {
		$this->db->where('module_status', 1);
		$this->db->select('module_name');
		$query=$this->db->get('modules');
		
		$result =  $query->result_array();
		$active_modules = array();
		foreach($result as $row){
			$active_modules[]= $row['module_name']; 
		}
		return $active_modules;
    }
	function is_active($module_name) {
		$this->db->where('module_name', $module_name);
		$this->db->select('module_status');
		$query=$this->db->get('modules');
		$row =  $query->row_array();
		if($row['module_status'] == 1){
			return TRUE;
		}else{
			return FALSE;
		}
    }
}

?>