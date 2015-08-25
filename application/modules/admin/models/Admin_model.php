<?php

class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();

        $this->load->database();
    }

    function add_user() {
        $data = array(
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'level' => $this->input->post('level'),
            'password' => base64_encode($this->input->post('password'))
        );
        $this->db->insert('users', $data);
    }

    function get_users() {
        $query = $this->db->get("users");
        return $query->result_array();
    }

    function get_user_detail($user_id) {
        $query = $this->db->get_where('users', array('userid' => $user_id));
        return $query->row_array();
    }

    function get_doctor($userid = NULL) {
        if ($userid == NULL) {
            $query = $this->db->get_where('users', array('level' => 'Doctor'));
            return $query->result_array();
        }else{
            $this->db->select('userid,name');
            $query = $this->db->get_where('users', array('userid' => $userid));
            return $query->row_array();
        }
    }

    function delete_user($id) {
        $this->db->delete('users', array('userid' => $id));
    }

    function edit_user_data($id) {
        $level = $this->input->post('level');
		$data['level'] = $level;
		
		if($this->input->post('newpassword') !="" ){
			$password = base64_encode($this->input->post('newpassword'));
			$data['password'] = $password;
		}
        $data['is_active'] = $this->input->post('is_active');

        $this->db->where('userid', $id);
        $this->db->update('users', $data);
    }

    function change_profile($user_id){
        $data['name'] = $this->input->post('name');
        
        $this->db->where('userid', $user_id);
        $this->db->update('users', $data);
    }
    
    function change_password($user_id){
        $data['name'] = $this->input->post('name');
        $data['password'] = base64_encode($this->input->post('newpassword'));
        
        $this->db->where('userid', $user_id);
        $this->db->update('users', $data);
    }
	/*category Master ---------------------------------------------------------------------------------------*/
	public function find_category() {	
         $query = $this->db->get("user_categories");
        return $query->result_array();

    }
	public function get_category($id) {
            $query = $this->db->get_where('user_categories', array('id' => $id));
            return $query->row_array();
        }
		
	 public function update_category() {
		$id = $this->input->post('id');
		$data['id'] = $this->input->post('id');
		$data['category_name'] = $this->input->post('category_name');
		$this->db->update('user_categories', $data, array('id' =>  $id));		
	}
	function add_category() {       
        $data['category_name'] = $this->input->post('category_name');	
        $this->db->insert('user_categories', $data);	
		return $this->db->insert_id();		
    }
	function delete_category($id) {
        $this->db->delete('user_categories', array('id' => $id));
    }
}

?>
