<?php

class Appointment extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('appointment_model');
        $this->load->model('admin/admin_model');
		$this->load->model('contact/contact_model');
        $this->load->model('patient/patient_model');
        $this->load->model('settings/settings_model');
		$this->load->model('module/module_model');
		$this->load->model('menu_model');
		
        $this->load->helper('url');
        $this->load->helper('form');
		$this->load->helper('currency_helper');
		$this->load->helper('directory' );
		$this->load->helper('inflector');

		$this->lang->load('main'); 
		
		$this->load->library('session');	
        $this->load->library('form_validation');
        $prefs = array(
            'show_next_prev' => TRUE,
            'next_prev_url' => base_url() . 'index.php/appointment/index',
        );
        $this->load->library('calendar', $prefs);		
    }
	public function index($year = NULL, $month = NULL, $day = NULL) {
		// Check If user has logged in or not 
		if ($this->session->userdata('user_name') == '') {                    
            redirect('login/index');
        } else {
			
			//Default to today's date if date is not mentioned
            if ($year == NULL) { $year = date("Y"); }
            if ($month == NULL) { $month = date("n"); }
            if ($day == NULL) { $day = date("j");}
            $data['year'] = $year;
            $data['month'] = $month;
            $data['day'] = $day;
			
			//Fetch Time Interval from settings
            $data['time_interval'] = $this->settings_model->get_time_interval();
			$data['time_format'] = $this->settings_model->get_time_formate();
			
			//Generate display date in YYYY-MM-DD formate
            $appointment_date = date("Y-n-d", gmmktime(0, 0, 0, $month, $day, $year));                      
			$data['appointment_date']= $appointment_date;
			
			//Fetch Clinic Start Time and Clinic End Time
            $data['start_time'] = $this->settings_model->get_clinic_start_time();
            $data['end_time'] = $this->settings_model->get_clinic_end_time();
			
			//Fetch Task Details
            //$data['todos'] = $this->appointment_model->get_todos();
			$data['todos'] = $this->appointment_model->get_birthdays();
			//Display Followups for next 8 days
			$followup_date = date('Y-m-d', strtotime("+8 days"));
			$data['followups'] = $this->appointment_model->get_followup($followup_date);
			
			//Fetch all patient details
			$data['patients'] = $this->patient_model->get_patient();
			//Fetch Doctor Schedules
			$doctor="doctor";
			$doctor_active=$this->module_model->is_active($doctor);
			$data['doctor_active']=$doctor_active;
			
			if($doctor_active){	
				$this->load->model('doctor/doctor_model');			
				$data['doctors_data'] = $this->doctor_model->find_doctor();
				$data['drschedules'] = $this->doctor_model->find_drschedule();
				$data['inavailability'] = $this->appointment_model->get_dr_inavailability();
			}
			
			//Fetch Level of Current User
            $level = $this->session->userdata('category');
			
			//For Doctor's login
            if ($level == 'Doctor') {
				//Fetch this doctor's appointments for the date 
                $doctor_id = $this->session->userdata('id');
				$data['appointments'] = $this->appointment_model->get_appointments($appointment_date,$doctor_id);

            } else {
				//Fetch details of all Doctors
				$data['doctors'] = $this->admin_model->get_doctor();
				
				//Fetch appointments for the date
                $data['appointments'] = $this->appointment_model->get_appointments($appointment_date);
            }
			//Load the view
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('browse', $data);
			$this->load->view('templates/footer');
        }
    }
	/** Add Appointment */
	public function add($year = NULL, $month = NULL, $day = NULL, $hour = NULL, $min = NULL,$status = NULL,$patient_id=NULL,$doctor_id=NULL) {
		//Check if user has logged in 
		if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {
			$level = $this->session->userdata('category');
			
            if ($year == NULL) { $year = date("Y");}
            if ($month == NULL) { $month = date("n");}
            if ($day == NULL) {$day = date("j");}
			
			$data['year'] = $year;
			$data['month'] = $month;
			$data['day'] = $day;
			
            $today = date('j-n-Y');
			
			$data['hour'] = $hour;
			$data['min'] = $min;
			$time = $hour . ":" . $min;
			
            $appointment_dt = date("j-n-Y", gmmktime(0, 0, 0, $month, $day, $year));
			
            $data['appointment_date'] = $appointment_dt;
			$data['appointment_time'] = $time;
			$data['appointment_id']=0;
			if($status == NULL){
				$data['app_status'] = 'Appointments';
			}else{
				$data['app_status']=$status;
			}
				
			//Form Validation Rules
			$this->form_validation->set_rules('patient_id', 'Patient Name', 'required');
			$this->form_validation->set_rules('doctor_id', 'Doctor Name', 'required');
			$this->form_validation->set_rules('start_time', 'Start Time', 'required');
			$this->form_validation->set_rules('end_time', 'End Time', 'required');
			$this->form_validation->set_rules('appointment_date', 'Date', 'required');

			if ($this->form_validation->run() === FALSE){
				$data['clinic_start_time'] = $this->settings_model->get_clinic_start_time();
				$data['clinic_end_time'] = $this->settings_model->get_clinic_end_time();
				$data['time_interval'] = $this->settings_model->get_time_interval();
				$data['patients'] = $this->patient_model->get_patient();
				$data['def_dateformate'] = $this->settings_model->get_date_formate();
				$data['def_timeformate'] = $this->settings_model->get_time_formate();
				if ($patient_id) {
					$data['curr_patient'] = $this->patient_model->get_patient_detail($patient_id);
				}
				if ($level == 'Doctor'){
					$doctor_id = $this->session->userdata('id');
					$data['doctor']=$this->admin_model->get_doctor();
					$data['selected_doctor_id'] = $doctor_id;
				}else{
					$data['doctor'] = $this->admin_model->get_doctor();
				}
				$data['selected_doctor_id'] = $doctor_id;
				$this->load->view('templates/header');
				$this->load->view('templates/menu');
				$this->load->view('form', $data);
				$this->load->view('templates/footer');
			}else{
				$this->appointment_model->add_appointment($status);
				$year = date("Y", strtotime($this->input->post('appointment_date')));
				$month = date("m", strtotime($this->input->post('appointment_date')));
				$day = date("d", strtotime($this->input->post('appointment_date')));
				$this->index($year,$month,$day);
				
			}
        }
    }
	function edit_appointment($appointment_id) {
		//Check if user has logged in 
		if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {
			$this->form_validation->set_rules('patient_id', 'Patient Name', 'required');
			$this->form_validation->set_rules('doctor_id', 'Doctor Name', 'required');
			$this->form_validation->set_rules('start_time', 'Start Time', 'required');
			$this->form_validation->set_rules('end_time', 'End Time', 'required');
			$this->form_validation->set_rules('appointment_date', 'Date', 'required');
			if ($this->form_validation->run() === FALSE){
				$appointment = $this->appointment_model->get_appointments_id($appointment_id);
				$data['appointment']=$appointment;
				$patient_id = $appointment['patient_id'];
				$data['curr_patient']=$this->patient_model->get_patient_detail($patient_id);
				$data['patients']=$this->patient_model->get_patient();
				$doctor_id = $appointment['userid'];
				$data['doctor'] = $this->admin_model->get_doctor();
				$data['selected_doctor_id'] = $doctor_id;
				$this->load->view('templates/header');
				$this->load->view('templates/menu');
				$this->load->view('form', $data);
				$this->load->view('templates/footer');
			}else{
				$patient_id = $this->input->post('patient_id');
				$curr_patient = $this->patient_model->get_patient_detail($patient_id);
				$title = $curr_patient['first_name']." " .$curr_patient['middle_name'].$curr_patient['last_name']; 
				$this->appointment_model->update_appointment($title);
				$year = date('Y', strtotime($this->input->post('appointment_date')));
				$month = date('m', strtotime($this->input->post('appointment_date')));
				$day = date('d', strtotime($this->input->post('appointment_date')));
				$this->index($year, $month, $day);
			}
		}
	}
	public function insert_patient_add_appointment($hour = NULL, $min =NULL, $appointment_date = NULL, $status = NULL, $doc_id = NULL,$pid=NULL,$appid=NULL) {
        list($day, $month, $year) = explode('-', $appointment_date);
        if ($this->session->userdata('user_name') == '') {
            redirect('login/index/');
        } 
		else 
		{            
            $this->form_validation->set_rules('first_name', 'First Name', 'required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'required');

            if ($this->form_validation->run() === FALSE) {                				
				$this->load->view('templates/header');
				$this->load->view('templates/menu');
				$this->load->view('form', $data);
				$this->load->view('templates/footer');
            } 
			else 
			{	
                $contact_id = $this->contact_model->insert_contact();
                $patient_id = $this->patient_model->insert_patient($contact_id);
				redirect('appointment/add/' . $year . '/' . $month . '/' . $day . '/' . $hour . "/" . $min . '/Appointments/' . $patient_id . "/" . $doc_id );
            }
        }
    }
    function change_status($appointment_id = NULL,$new_status = NULL) {
        if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        }
		else 
		{
			$this->appointment_model->change_status($appointment_id,$new_status);
			$appointment = $this->appointment_model->get_appointment_from_id($appointment_id);
			$appointment_date = $appointment['appointment_date'];
			$year = date("Y", strtotime($appointment_date));
            $month = date("m", strtotime($appointment_date));
            $day = date("d", strtotime($appointment_date));
			redirect('appointment/index/'.$year.'/'. $month.'/'.$day);
        }
    }
	function change_status_visit($visit_id = NULL){
		if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {            
            $this->appointment_model->change_status_visit($visit_id);
            $this->index();
        }
	}
	
    function appointment_report() {		
        if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {
            $data['doctors'] = $this->admin_model->get_doctor();
            $level = $this->session->userdata('category');
            $data['currency_postfix'] = $this->settings_model->get_currency_postfix();
			$data['def_dateformate'] = $this->settings_model->get_date_formate();
            if ($level == 'Doctor') 
			{
                $this->form_validation->set_rules('app_date', 'Appointment Date', 'required');
                if ($this->form_validation->run() === FALSE) {
					$timezone = $this->settings_model->get_time_zone();
					if (function_exists('date_default_timezone_set'))
						date_default_timezone_set($timezone);
					$app_date = date('Y-m-d');
                    $user_id = $this->session->userdata('id');
					$data['app_date'] = $app_date;
					
                    $data['app_reports'] = $this->appointment_model->get_report($app_date, $user_id);
                } else {
                    $app_date = date('Y-m-d', strtotime($this->input->post('app_date')));
                    $user_id = $this->session->userdata('id');
					$data['app_date'] = $app_date;
                    $data['app_reports'] = $this->appointment_model->get_report($app_date, $user_id);
                }
				//var_dump($data);
                $this->load->view('templates/header');
                $this->load->view('templates/menu');
                $this->load->view('appointment/report', $data);
                $this->load->view('templates/footer');
            } 	
			else
			{
                $this->form_validation->set_rules('app_date', 'Appointment Date', 'required');
                $this->form_validation->set_rules('doctor', 'Doctor Name', 'required');
                if ($this->form_validation->run() === FALSE) {
                    $timezone = $this->settings_model->get_time_zone();
					if (function_exists('date_default_timezone_set'))
						date_default_timezone_set($timezone);
						
					$app_date = date('Y-m-d');
                    $user_id = $this->session->userdata('id');
					
					$data['app_date'] = $app_date;
					$data['doctor_id'] = $user_id;
                    $data['app_reports'] = $this->appointment_model->get_report($app_date, NULL);
                    if ($level == 'Administrator') {
                        $this->load->view('templates/header');
                        $this->load->view('templates/menu');
                        $this->load->view('appointment/report', $data);
                        $this->load->view('templates/footer');
                    } else {
                        $this->load->view('templates/header');
                        $this->load->view('templates/menu');
                        $this->load->view('appointment/report', $data);
                        $this->load->view('templates/footer');
                    }
                } 
				else 
				{
                    $app_date = date('Y-m-d', strtotime($this->input->post('app_date')));
                    $user_id = $this->input->post('doctor');
					$data['app_date'] = $app_date;
					$data['doctor_id'] = $user_id;
                    $data['app_reports'] = $this->appointment_model->get_report($app_date, $user_id);

                    if ($level == 'Administrator') {
                        $this->load->view('templates/header');
                        $this->load->view('templates/menu');
                        $this->load->view('appointment/report', $data);
                        $this->load->view('templates/footer');
                    } else {
                        $this->load->view('templates/header');
                        $this->load->view('templates/menu');
                        $this->load->view('appointment/report', $data);
                        $this->load->view('templates/footer');
                    }
                }
            }
        }
    }

    function todos() {
        $this->appointment_model->add_todos();
        $this->index();
    }

    function todos_done($done, $id) {
		
        $this->appointment_model->todo_done($done, $id);
    }

    function delete_todo($id) {
        $this->appointment_model->delete_todo($id);
        $this->index();
    }
}
?>