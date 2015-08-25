<?php

class Payment_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function list_payments() {
        $this->db->order_by("pay_date", "desc");
        $query = $this->db->get('view_payment');
        return $query->result_array();
    }
	function insert_payment() {
		$data = array();
		$data['bill_id'] = $this->input->post('bill_id');
		$bill_id = $data['bill_id'];
		$data['pay_amount'] = $this->input->post('payment_amount');
		$pay_amount = $data['pay_amount'];
		$data['pay_date'] = date('Y-m-d',strtotime($this->input->post('payment_date')));
		$data['pay_mode'] = $this->input->post('pay_mode');
		$this->db->insert('payment', $data);
		
		$data = array();
		$due_amount = $this->input->post('due_amount');
		$data['due_amount'] = $due_amount - $pay_amount;
		$this->db->where('bill_id', $bill_id);
		$this->db->update('bill', $data);
    }
	function get_paid_amount($bill_id){
		$this->db->select_sum('pay_amount', 'pay_total');
        $query = $this->db->get_where('payment', array('bill_id' => $bill_id));
		
        $row = $query->row();
        return $row->pay_total;
	}
}
?>