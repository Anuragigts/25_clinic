<?php

class Treatment_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_treatments(){
        $result = $this->db->get('treatments');
        return $result->result_array();
    }
    
    public function add_treatment() {
        $data['treatment'] = $this->input->post('treatment');
        $data['price'] = $this->input->post('treatment_price');
        $this->db->insert('treatments',$data);
    }
    
    public function get_edit_treatment($id) {    
        $this->db->where("id", $id);
        $query = $this->db->get("treatments");
        return $query->row_array();    
    }
    
    public function edit_treatment($id){
        $data['treatment'] = $this->input->post('treatment');
        $data['price'] = $this->input->post('treatment_price');
        $this->db->where('id', $id);
        $this->db->update('treatments', $data);
    }
    
    public function delete_treatment($id) {
        $this->db->delete('treatments', array('id' => $id));
    }
    
    public function get_visit_treatment($visit_id){
        $bill_id = patient_model::get_bill_id($visit_id);
        
        $query = $this->db->get_where('bill_detail', array('bill_id' => $bill_id));
        return $query->result_array();
    }
}

?>
