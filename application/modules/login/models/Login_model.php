<?php

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
		$this->load->database();
    }
    
    public function get_current_version(){	
		$query = $this->db->get('version');
		$row = $query->row();        
		return $row->current_version;       
    }
    function login($username, $password) {
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $query = $this->db->get("users");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $rows) {
                //add all data to session
                $newdata = array(
                    'name' => $rows->name,
                    'user_name' => $rows->username,
                    'category' => $rows->level,
                    'id' => $rows->userid,
                    'logged_in' => TRUE,
                );
            }
            $this->session->set_userdata($newdata);
            return true;
        }
        return false;
    }

}

?>
