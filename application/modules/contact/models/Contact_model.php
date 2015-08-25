<?php
class Contact_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
    public function get_contacts($id)
	{
        $query = $this->db->get_where('contacts', array('contact_id' => $id));
        return $query->row_array();
	}
    public function get_contact_address($contact_id)
	{
		$query = $this->db->get_where('contacts', array('contact_id' => $contact_id));
		return $query->row_array();
	}
    public function insert_contact(){
	
		if($this->input->post('first_name') != false){	
            $data['first_name'] = $this->input->post('first_name');
		}
		if($this->input->post('middle_name') != false){	
            $data['middle_name'] = $this->input->post('middle_name');
		}
		if($this->input->post('last_name') != false){	
            $data['last_name'] = $this->input->post('last_name');
		}
		if($this->input->post('phone_number') != false){	
            $data['phone_number'] = $this->input->post('phone_number');
		}
		if($this->input->post('display_name') != false){
			$data['display_name'] = $this->input->post('display_name');
		}
		if($this->input->post('email') != false){
			$data['email'] = $this->input->post('email');
        }
		if($this->input->post('type') != false){
			$data['type'] = $this->input->post('type');
		}
		if($this->input->post('address_line_1') != false){
			$data['address_line_1'] = $this->input->post('address_line_1');
		}
		if($this->input->post('address_line_2') != false){
			$data['address_line_2'] = $this->input->post('address_line_2');
		}
		if($this->input->post('city') != false){
			$data['city'] = $this->input->post('city');
		}
        if($this->input->post('state') != false){
			$data['state'] = $this->input->post('state');
		}    
		if($this->input->post('postal_code') != false){
			$data['postal_code'] = $this->input->post('postal_code');
		}
		if($this->input->post('country') != false){
			$data['country'] = $this->input->post('country');
		}
		$this->db->insert('contacts', $data);
		$contact_id = $this->db->insert_id();
		
        return $contact_id;
    }
        
	function update_contact($name = NULL){
		$data['first_name']   = $this->input->post('first_name');
		$data['middle_name']  = $this->input->post('middle_name');
		$data['last_name']    = $this->input->post('last_name');
		$data['phone_number'] = $this->input->post('phone_number');
		$data['display_name'] = $this->input->post('display_name');
		$data['email'] = $this->input->post('email');
		if($name != NULL && $name != "" ){
			$data['contact_image'] = 'profile_picture/'. $name;
		}
		$this->db->update('contacts', $data, array('contact_id' =>  $this->input->post('contact_id')));
	}
        
	function update_profile_image($name,$contact_id){
		if($name != NULL && $name != "" ){
			$data['contact_image'] = 'profile_picture/'. $name;
		}else{
			$data['contact_image'] = "";
		}
		$this->db->update('contacts', $data, array('contact_id' =>  $contact_id));
	}


	function update_address(){
		$contact_id               = $this->input->post('contact_id');
		$data['type']             = $this->input->post('type');
		$data['address_line_1']   = $this->input->post('address_line_1');
		$data['address_line_2']   = $this->input->post('address_line_2');
		$data['city']             = $this->input->post('city');
		$data['state ']           = $this->input->post('state');
		$data['postal_code']      = $this->input->post('postal_code');
		$data['country']          = $this->input->post('country');
		$this->db->update('contacts', $data, array('contact_id' =>  $this->input->post('contact_id')));
	}
	function delete_contact($id)
	{
		$this->db->delete('contacts', array('contact_id' => $id)); 
	}
        /** Emails*/
	public function get_contact_email($id)
	{
		$query = $this->db->get_where('contact_details', array('contact_id' => $id,'type'=>'email'));
		return $query->result_array();
	}
}
?>
