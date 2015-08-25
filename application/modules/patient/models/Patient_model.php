<?php

class Patient_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }
    public function get_patient() {
        $this->db->group_by('patient_id');
        $query = $this->db->get('view_patient');
        return $query->result_array();
    }
    public function find_patient() {
        $this->db->order_by("first_name", "asc");
        $this->db->group_by('patient_id');
        $query = $this->db->get('view_patient');
        return $query->result_array();
    }
    function insert_patient($contact_id,$dob) {
        $data['contact_id'] = $contact_id;
        $data['patient_since'] = date("Y-m-d");
        $data['display_id'] = "";
        $data['reference_by'] = $this->input->post('reference_by');
		$data['dob'] = $dob;
        $this->db->insert('patient', $data);
        $p_id = $this->db->insert_id();

        $this->display_id($p_id);
        return $p_id;
    }
    function display_id($id) {
        $lname = $this->input->post('last_name');
        $str = $lname[0];
        $str = strtoupper($str);

        $p_id = $id;
        $n = 5;
        $num = str_pad((int) $p_id, $n, "0", STR_PAD_LEFT);
        $display_id = $str . $num;

        $this->db->set("display_id", $display_id);
        $this->db->where("patient_id", $p_id);
        $this->db->update("patient");
    }
    function delete_patient($patient_id) {
        $this->db->select('contact_id');
        $query = $this->db->get_where('patient', array('patient_id' => $patient_id));
        $row = $query->row();
        if($row) {
            $c_id = $row->contact_id;

            /* Delete ck_contact_details data where Contact Id = $c_id */
            $this->db->delete('contact_details', array('contact_id' => $c_id));

            /* Delete ck_contacts data where Contact Id = $c_id */
            $this->db->delete('contacts', array('contact_id' => $c_id));

            /* Delete ck_visit_img data where Patient Id = $patient_id */
            $this->db->delete('visit_img', array('patient_id' => $patient_id));

            /* Delete ck_visit data where Patient Id = $patient_id */
            $this->db->delete('visit', array('patient_id' => $patient_id));

            /* Delete ck_appointments data where Patient Id = $patient_id */
            $this->db->delete('appointments', array('patient_id' => $patient_id));

            /* Delete ck_bill data where Patient Id = $patient_id */
            $this->db->delete('bill', array('patient_id' => $patient_id));

            /* Delete ck_patient data where Patient Id = $patient_id */
            $this->db->delete('patient', array('patient_id' => $patient_id));
        }
    }
    public function get_patient_detail($patient_id) {
        $this->db->group_by('patient_id');
        $query = $this->db->get_where('view_patient', array('patient_id' => $patient_id));
        return $query->row_array();
    }
    public function get_contact_id($patient_id) {
        $query = $this->db->get_where('patient', array('patient_id' => $patient_id));
        $row = $query->row();
        if ($row)
            return $row->contact_id;
        else
            return 0;
    }
    public function get_previous_visits($patient_id) {
        $level = $this->session->userdata('category');
        if($level == 'Doctor'){
            $userid = $this->session->userdata('id');
            $this->db->order_by("visit_date", "desc");
            $query = $this->db->get_where('view_visit', array('patient_id' => $patient_id, 'userid' => $userid));
        }else{
            $this->db->order_by("visit_date", "desc");
            $query = $this->db->get_where('view_visit', array('patient_id' => $patient_id));
        }
        return $query->result_array();
    }
    public function get_visit_data($visit_id) {
        $query = $this->db->get_where('visit', array('visit_id' => $visit_id));
        return $query->row_array();
    }
    public function insert_visit($valim) {
		/* Insert New Visit */
        $data['patient_id'] = $this->input->post('patient_id');
		$patient_detail = $this->get_patient_detail($data['patient_id']);
		
		$level = $this->session->userdata('category');
		$doctor_id=$this->input->post('doctor');
        $data['userid'] = $doctor_id;
		
		$visit_date = date("Y-m-d", strtotime($this->input->post('visit_date')));
		$visit_time = date("H:i", strtotime($this->input->post('visit_time')));
		
		$data['notes'] = $this->input->post('notes');
		$data['type'] = $this->input->post('type');
		$data['prescription']	=	$this->input->post('prescription');
		$data['visit_date'] = date("Y-m-d", strtotime($this->input->post('visit_date')));
		$data['visit_time'] = date("H:i", strtotime($this->input->post('visit_time')));
		$data["visit_image"] = $valim;
		$this->db->insert('visit', $data);
		$visit_id = $this->db->insert_id();
			
		/* Update Appointment with Visit ID*/
		$data_app = array();
		$data_app['visit_id'] = $visit_id;
		$appointment_id=$this->input->post('appointment_id');
		if($appointment_id != NULL){
			$this->db->update('appointments', $data_app, array('appointment_id' => $appointment_id));
		}else{
			$data_app['appointment_date'] = $data['visit_date'];
			$data_app['start_time'] = $data['visit_time'];
			$data_app['title'] = $patient_detail['first_name'] ." ".$patient_detail['middle_name']." ".$patient_detail['last_name'];
			$data_app['patient_id'] = $data['patient_id'];
			$data_app['userid'] = $data['userid'];
			$data_app['status'] = "Consultation";
			$this->db->insert('appointments', $data_app);
		}
			
		/* Get Insert Visit's patient_id */
		$patient_id = $this->get_patient_id($visit_id);
		//$this->get_previous_due($patient_id);
			$this->db->select('bill_id');
			$this->db->order_by("bill_id", "desc");
			$this->db->limit(1);
			$query = $this->db->get_where('bill', array('patient_id' => $patient_id));
			$result = $query->row();

			if($result){
				$result = $query->row();
				$bill_id = $result->bill_id;            

				$this->db->select('due_amount');
				$query = $this->db->get_where('bill', array('bill_id' => $bill_id));
				$result = $query->row();
				$pre_due_amount = $result->due_amount;

				$this->db->select_sum('amount');
				$query = $this->db->get_where('bill_detail', array('bill_id' => $bill_id));
				$result = $query->row();
				$bill_amount = $result->amount;

				$this->db->select('amount');
				$query = $this->db->get_where('payment_transaction', array('bill_id' => $bill_id, 'payment_type' => 'bill_payment'));
				
				if($query->num_rows() > 0){
					$result = $query->row();
					$paid_amount = $result->amount;
				}else{
					$paid_amount = 0;
				}
				$due_amount = $pre_due_amount + $bill_amount - $paid_amount;

				$bill_id = $this->create_bill($visit_id, $patient_id, $due_amount);
			}else{
				$bill_id = $this->create_bill($visit_id, $patient_id);
			}
			/* Create Bill For Newly Entered Visit and Get bill_id */


			/* Get All Selected Treatments */
			$treatments = $this->input->post('treatment');

			/* Check If Treatment is Seleceted Then Perform Insert Treatment(s) In bill_detail Table */
			if ($treatments) 
			{
				foreach ($treatments as $treatment) 
				{
					$treatment = explode("/", $treatment);
					$data2['bill_id'] = $bill_id;
					$data2['purchase_id'] = NULL;
					$data2['particular'] = $treatment[1];
					$data2['amount'] = $treatment[2];
					$data2['quantity'] = 1;
					$data2['mrp'] = $treatment[2];
					$data2['type'] = 'treatment';
					$this->db->insert('bill_detail', $data2);
				}
			}
    }
	public function get_previous_due($patient_id){
		$this->db->order_by("bill_id", "desc");
		$query = $this->db->get_where('bill', array('patient_id' => $patient_id));
		$bills = $query->result_array();
		foreach($bills as $bill){
			$bill_id = $bill->bill_id;
			$pre_due_amount = $bill->due_amount;
			$bill_amount = $bill->amount;
			$paid_amount = $this->bill_payment($bill_id);
			$due_amount = $pre_due_amount + $bill_amount - $paid_amount;
		}
		
	}
	public function bill_payment($bill_id){
		$this->db->select('amount');
		$query = $this->db->get_where('payment_transaction', array('bill_id' => $bill_id, 'payment_type' => 'bill_payment'));
		
		if($query->num_rows() > 0){
			$result = $query->row();
			$paid_amount = $result->amount;
		}else{
			$paid_amount = 0;
		}
		return $paid_amount;
	}
    public function edit_visit_data($visit_id) {

        /* Get Value Of Notes Field */
		$data['userid'] = $this->input->post('visit_doctor');
		$data['visit_date'] = $this->input->post('visit_date');
		$data['visit_date'] = date('Y-m-d', strtotime($data['visit_date']));
		
		$data['visit_time'] = $this->input->post('visit_time');
		$data['visit_time'] = date('H:i:s', strtotime($data['visit_time']));
		
		$data['type'] = $this->input->post('type');
		$data['prescription']	=	$this->input->post('prescription');
        $data['notes'] = $this->input->post('notes');

        /* Update Visit Data With Visit Id */
        $this->db->where('visit_id', $visit_id);
        $this->db->update('visit', $data);
        
        $this->edit_treatment($visit_id);
    }
    public function edit_treatment($visit_id){
        /* Get bill_id Of visit_id */
        $bill_id = $this->get_bill_id($visit_id);

        $result = $this->db->get_where('bill_detail',array('bill_id' => $bill_id, 'type' => 'treatment'));
        if($result){
            $this->db->delete('bill_detail', array('bill_id' => $bill_id, 'type' => 'treatment'));
        }
        /* Get All Selected Treatments */
        $treatments = $this->input->post('treatment');

        /* Check If Treatment is Seleceted Then Perform Insert Treatment(s) In bill_detail Table */
        if ($treatments) {
            foreach ($treatments as $treatment) {
                $treatment = explode("/", $treatment);
                $data2['bill_id'] = $bill_id;
                $data2['purchase_id'] = NULL;
                $data2['particular'] = $treatment[1];
                $data2['amount'] = $treatment[2];
                $data2['quantity'] = 1;
                $data2['mrp'] = $treatment[2];
                $data2['type'] = 'treatment';
                $this->db->insert('bill_detail', $data2);
            }
        }
    }
    public function get_visit_by_patient($patient_id){
        $this->db->order_by('visit_id','desc');
        $this->db->limit(1);
        $query = $this->db->get_where('visit',array('patient_id' => $patient_id));
        return $query->row_array();
    }
    public function get_visit_treatments(){
        $query = $this->db->get('view_visit_treatments');
        return $query->result_array();
    }
    public function get_patient_id($visit_id) {
        $query = $this->db->get_where('visit', array('visit_id' => $visit_id));
        $row = $query->row();
        if ($row)
            return $row->patient_id;
        else
            return 0;
    }
	public function get_doctor_id($visit_id) {
        $query = $this->db->get_where('visit', array('visit_id' => $visit_id));
        $row = $query->row();
        if ($row)
            return $row->userid;
        else
            return 0;
    }
    /** *Bill** */
    public function create_bill($visit_id, $patient_id, $due_amount = NULL) {
        $data['bill_date'] = date('Y-m-d');
        $data['patient_id'] = $patient_id;
        $data['visit_id'] = $visit_id;
        if($due_amount == NULL){
            $data['due_amount'] = 0.00;
        }else{
            $data['due_amount'] = $due_amount;
        }
        $this->db->insert('bill', $data);
        return $this->db->insert_id();
    }
    public function add_bill_item($action, $bill_id, $item, $qnt = NULL, $amt = NULL, $mrp = NULL, $item_id = NULL) {
		
		//If item already exists,just update item
		$data['bill_id'] = $bill_id;
		$data['particular'] = $item;
		$data['quantity'] = $qnt;
		$data['amount'] = $amt;
		$data['mrp'] = $mrp;
		$data['type'] = $action;
		$data['item_id'] = $item_id;
		if ($item_id != NULL){
			$query = $this->db->get_where('bill_detail', array('bill_id ' => $bill_id, 'item_id ' => $item_id));
			if ($query->num_rows() > 0)
			{	
				$bill_detail = $query->row_array();
				$data['quantity'] = $qnt + $bill_detail['quantity'];
				$data['amount'] = $amt + $bill_detail['amount'];
				$this->db->update('bill_detail', $data,array('bill_id ' => $bill_id, 'item_id ' => $item_id));
			}else{
				$this->db->insert('bill_detail', $data);
			}
		}else{
			$this->db->insert('bill_detail', $data);
		}

        $sql = "update " . $this->db->dbprefix('bill') . " set total_amount = total_amount + ? where bill_id = ?;";
        $this->db->query($sql, array($amt, $bill_id));
		
		$sql = "update " . $this->db->dbprefix('bill') . " set due_amount = due_amount + ? where bill_id = ?;";
        $this->db->query($sql, array($amt, $bill_id));
    }
    function get_bill_report() {
        $from_data = date('Y-m-d', strtotime($this->input->post('bill_from_date')));
        $to_date = date('Y-m-d', strtotime($this->input->post('bill_to_date')));
        $level = $this->session->userdata('category');
        if ($level == 'Doctor') {
            $doctor = $this->session->userdata('id');
            if ($option == 'all') {
                $query = $this->db->get_where('view_bill', array('bill_date <=' => $to_date, 'bill_date >=' => $from_data, 'userid' => $doctor));
                return $query->result_array();
            } else {
                $query = $this->db->get_where('view_bill', array('bill_date <=' => $to_date, 'bill_date >=' => $from_data, 'userid' => $doctor, 'type' => $option));
                return $query->result_array();
            }
        } else {
            $doctor = $this->input->post('doctor');
            if ($doctor == 'all') {
                $query = $this->db->get_where('view_bill', array('bill_date <=' => $to_date, 'bill_date >=' => $from_data));
                return $query->result_array();
            }
            if ($doctor <> 'all') {
                $query = $this->db->get_where('view_bill', array('bill_date <=' => $to_date, 'bill_date >=' => $from_data, 'userid' => $doctor));
                return $query->result_array();
            }
        }
    }
    public function update_available_quantity($quantity_sold, $purchase_id) {
        $sql = "update " . $this->db->dbprefix('purchase') . " set remain_quantity = remain_quantity - ? where purchase_id = ?;";
        $this->db->query($sql, array($quantity_sold, $purchase_id));
    }
    public function get_bill($visit_id) {
        $query = $this->db->get_where('bill', array('visit_id' => $visit_id));
        return $query->row_array();
    }
	public function get_pending_bills() {
        $query = $this->db->get_where('bill', array('due_amount >' => 0));
        return $query->result_array();
    }
    public function get_bill_amount($bill_id) {
        $query = $this->db->get_where('bill', array('bill_id' => $bill_id));
        $row = $query->row();
        if ($row)
            return $row->amount;
        else
            return 0;
    }
    public function get_bill_id($visit_id) {
        $query = $this->db->get_where('bill', array('visit_id' => $visit_id));
        $row = $query->row();
        if ($row)
            return $row->bill_id;
    }
    public function get_visit_id($bill_id) {
        $query = $this->db->get_where('bill', array('bill_id' => $bill_id));
        $row = $query->row();
        if ($row)
            return $row->visit_id;
        else
            return 0;
    }
    public function get_bill_detail($visit_id) {
        $bill_id = $this->get_bill_id($visit_id);
        $this->db->order_by("type", "desc");
        $query = $this->db->get_where('bill_detail', array('bill_id' => $bill_id));
        return $query->result_array();
    }
    public function get_bill_detail_amount($bill_detail_id) {
        $query = $this->db->get_where('bill_detail', array('bill_detail_id' => $bill_detail_id));
        $row = $query->row();
        if ($row)
            return $row->amount;
        else
            return 0;
    }
    function update_remaining_quantity($bill_detail_id) {
        $this->db->select('purchase_id,quantity');
        $query = $this->db->get_where('bill_detail', array('bill_detail_id' => $bill_detail_id));
        $row = $query->row();
        if ($row)
            return $row;
        else
            return 0;
    }
    public function delete_bill_detail($bill_detail_id = NULL, $bill_id = NULL) {
        $amount = $this->get_bill_detail_amount($bill_detail_id);

        $purchase_id = 0;
        $quantity = 0;

        $remain_quantity = $this->update_remaining_quantity($bill_detail_id);
        if ($remain_quantity) {
            $purchase_id = $remain_quantity->purchase_id;
            $quantity = $remain_quantity->quantity;
        }

        $this->db->delete('bill_detail', array('bill_detail_id' => $bill_detail_id));

        $sql = "update " . $this->db->dbprefix('bill') . " set total_amount = total_amount - ? where bill_id = ?;";
        $this->db->query($sql, array($amount, $bill_id));
		
		$sql = "update " . $this->db->dbprefix('bill') . " set due_amount = due_amount - ? where bill_id = ?;";
        $this->db->query($sql, array($amount, $bill_id));

    }
    /** *Payment** */
    public function get_payment($bill_id) {
        $query = $this->db->get_where('payment', array('bill_id' => $bill_id));
        return $query->result_array();
    }
    public function insert_payment() {
        $data['bill_id'] = $this->input->post('bill_id');
        $data['pay_date'] = $this->input->post('pay_date');
        $data['pay_mode'] = $this->input->post('pay_mode');
        $data['amount'] = $this->input->post('amount');
        $data['cheque_no'] = $this->input->post('cheque_no');
        $this->db->insert('payment', $data);

        $sql = "update " . $this->db->dbprefix('bill') . " set paid_amount = paid_amount + ? where bill_id = ?;";
        $this->db->query($sql, array($this->input->post('amount'), $this->input->post('bill_id')));
    }
    function get_detail($item) {
        $this->db->select('item_id');
        $query = $this->db->get_where('item', array('item_name' => $item));

        if ($query)
            return $query->result_array();
        else
            return 0;
    }
    function get_item_detail($id) {
        $query = $this->db->get_where('purchase', array('item_id' => $id, 'remain_quantity !=' => 0));
        if ($query)
            return $query->result_array();
        else
            return 0;
    }
    function get_price($id) {
        $this->db->select('mrp');
        $query = $this->db->get_where('purchase', array('item_id' => $id));
        if ($query)
            return $query->result_array();
        else
            return 0;
    }
    function dismiss_followup($patient_id) {
        $sql = "update " . $this->db->dbprefix('patient') . " set followup_date = ? where patient_id = ?;";
        $this->db->query($sql, array('0000:00:00', $patient_id));
    }
    function change_followup_date($patient_id) {
        $date['followup_date'] = date('Y-m-d', strtotime($this->input->post('followup_date')));
        $sql = "update " . $this->db->dbprefix('patient') . " set followup_date = ? where patient_id = ?;";
        $this->db->query($sql, array($date['followup_date'], $patient_id));
    }
    function get_medicine_total($visit_id) {
        $this->db->select_sum('amount', 'medicine_total');
        $query = $this->db->get_where('view_bill', array('visit_id' => $visit_id, 'type' => 'medicine'));
        $row = $query->row();
        return $row->medicine_total;
    }
    function get_treatment_total($visit_id) {
        $this->db->select_sum('amount', 'treatment_total');
        $query = $this->db->get_where('view_bill_detail_report', array('visit_id' => $visit_id, 'type' => 'treatment'));
        $row = $query->row();
        return $row->treatment_total;
    }
	function get_item_total($visit_id) {
        $this->db->select_sum('amount', 'item_total');
        $query = $this->db->get_where('view_bill_detail_report', array('visit_id' => $visit_id, 'type' => 'item'));
        $row = $query->row();
        return $row->item_total;
    }
	function get_particular_total($visit_id) {
        $this->db->select_sum('amount', 'particular_total');
        $query = $this->db->get_where('view_bill_detail_report', array('visit_id' => $visit_id,'type'=>'particular'));
        $row = $query->row();
        return $row->particular_total;
    }
	function get_fee_total($visit_id) {
        $this->db->select_sum('amount', 'fees_total');
        $query = $this->db->get_where('view_bill_detail_report', array('visit_id' => $visit_id,'type'=>'fees'));
        $row = $query->row();
        return $row->fees_total;
    }
	public function get_paid_amount($bill_id) {
        $query = $this->db->get_where('payment', array('bill_id' => $bill_id));
        $result = $query->row_array();
		if ($query->num_rows() > 0){
			$row = $query->row_array();
			$payment_amount = $row['amount'];
		}else{
			$payment_amount = 0;
		}
        return $payment_amount;
    }
	public function get_due_amount($bill_id) {
        $query = $this->db->get_where('bill', array('bill_id' => $bill_id));
        $result = $query->row_array();
		if ($query->num_rows() > 0){
			$row = $query->row_array();
			$due_amount = $row['due_amount'];
		}else{
			$due_amount = 0;
		}
        return $due_amount;
    }
    function new_inquiries() {

        /* Select Patientid with only one visit or no visits */
		$sql = "SELECT *
				  FROM (SELECT patient.patient_id,
							   count( visit.patient_id ) AS count,
							   CONCAT( IFNULL(contacts.first_name,''), ' ', IFNULL(contacts.middle_name,''), ' ', IFNULL(contacts.last_name,'' )) AS patient_name,
							   contacts.phone_number 
						  FROM " . $this->db->dbprefix('patient') ." AS patient
							   LEFT JOIN " . $this->db->dbprefix('contacts') ."  AS contacts ON contacts.contact_id = patient.contact_id	
							   LEFT JOIN " . $this->db->dbprefix('visit') ." AS visit ON visit.patient_id = patient.patient_id
						 GROUP BY patient_id) AS A
				  WHERE A.count <= 1
				  ORDER BY A.count DESC";
        $result = $this->db->query($sql);
        return $result->result_array();
    }
    public function get_reference_by($patient_id){
        $query = $this->db->get_where('patient', array('patient_id' => $patient_id));
        return $query->row_array();
    }
    public function update_reference_by($patient_id){
        $data['reference_by'] = $this->input->post('reference_by');
        $this->db->update('patient', $data, array('patient_id' => $patient_id));
    }
	public function update_display_id(){
		$patient_id = $this->input->post('patient_id');
        $data['display_id'] = $this->input->post('display_id');
        $this->db->update('patient', $data, array('patient_id' => $patient_id));
    }
	function get_balance_amount($bill_id) {
		//Fetch Patient ID from bill id
		$query = $this->db->get_where('bill', array('bill_id' => $bill_id));
		if ($query->num_rows() > 0){
			$bill = $query->row_array();
			$patient_id = $bill['patient_id'];
		
			//Fetch all payments done till now.
			$query = $this->db->query("SELECT SUM( amount ) as payment_amount FROM ".$this->db->dbprefix('payment_transaction') ." WHERE patient_id = ".$patient_id);
			
			if ($query->num_rows() > 0){
				$row = $query->row_array();
				$payment_amount = $row['payment_amount'];
			}else{
				$payment_amount = 0;
			}
		   
			//All Bill total till now , exclude current bill 
			$visit_id = $this->get_visit_id($bill_id);
			
			$visit = $this->get_visit_data($visit_id);
			
			$visit_date = $visit['visit_date'];
			$query = $this->db->query("SELECT SUM( total_amount ) as bill_amount FROM ".$this->db->dbprefix('bill') ." as b , ".$this->db->dbprefix('visit') ." v WHERE v.patient_id = ".$patient_id . " AND v.visit_date < '". $visit_date ."' and b.visit_id = v.visit_id" );
			
			$row = $query->row_array();
			$previous_bill_amount= $row['bill_amount'];    
			
			return $payment_amount;
		}else{
			return 0;
		}
    }
	function get_patient_id_from_bill_id($bill_id){
		$query = $this->db->get_where('bill', array('bill_id' => $bill_id));
        
		if ($query->num_rows() > 0){
			$bill = $query->row_array();
			$patient_id = $bill['patient_id'];
		}else{
			$patient_id = 0;
		}
		return $patient_id;
	}
	function get_template(){
		$query = $this->db->get_where('receipt_template', array('is_default' => 1,'type'=>'bill'));
        $row = $query->row_array();
		return $row;
	}
}
?>