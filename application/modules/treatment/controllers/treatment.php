<?php

class Treatment extends CI_Controller {

    function __construct() {
        parent::__construct();
		
		$this->lang->load('main');
		
		$this->load->model('treatment_model');
		$this->load->model('settings/settings_model');
                $this->load->model('menu_model');
                
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->helper('currency');
                $this->load->helper('date');

                $this->load->library('session');	
                $this->load->library('form_validation');
    }
	/**Treatments*/
    public function index() { 
              //  print_r($this->session->userdata('user_name'));die();
	if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {
            $this->form_validation->set_rules('treatment', 'Treatment Name', 'trim|required|is_unique[treatments.treatment]');
            $this->form_validation->set_rules('treatment_price', 'Treatment Price', 'trim|required');
            $data['currency_postfix'] = $this->settings_model->get_currency_postfix();
            if ($this->form_validation->run() === FALSE) {
                $data['treatments'] = $this->treatment_model->get_treatments();                
                $this->load->view('templates/header');
                $this->load->view('templates/menu');
                $this->load->view('treatments_list', $data);
                $this->load->view('templates/footer');
            } else {
                $this->treatment_model->add_treatment();
                $data['treatments'] = $this->treatment_model->get_treatments();                
                $this->load->view('templates/header');
                $this->load->view('templates/menu');
                $this->load->view('treatments_list', $data);
                $this->load->view('templates/footer');
            }
        }
    }
	public function edit_treatment($id) {
        if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {
			$this->form_validation->set_rules('treatment', 'Treatment Name', 'trim|required');
            $this->form_validation->set_rules('treatment_price', 'Treatment Price', 'trim|required');
			$data['currency_postfix'] = $this->settings_model->get_currency_postfix();
			if ($this->form_validation->run() === FALSE) {
				$data['treatment'] = $this->treatment_model->get_edit_treatment($id);
				$this->load->view('templates/header');
				$this->load->view('templates/menu');
				$this->load->view('edit_treatment', $data);
				$this->load->view('templates/footer');
			} else {
				$treatment_id = $this->input->post('treatment_id');
                $this->treatment_model->edit_treatment($treatment_id);
				$data['treatments'] = $this->treatment_model->get_treatments();                
                $this->load->view('templates/header');
                $this->load->view('templates/menu');
                $this->load->view('treatments_list', $data);
                $this->load->view('templates/footer');
            }
        }
    }
	public function delete_treatment($id) {
        if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {
            $this->treatment_model->delete_treatment($id);
            $this->index();
        }
    }
}

?>