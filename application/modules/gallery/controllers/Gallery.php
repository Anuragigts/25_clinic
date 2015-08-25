<?php

class Gallery extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('patient/patient_model');
        $this->load->model('gallery_model');
		$this->load->model('menu_model');
		
        $this->load->helper('url');
        $this->load->helper('form');
		
		$this->load->library('session');
        $this->load->library('form_validation');
		
		$this->lang->load('main');
    }

    public function index($patient_id, $visit_id) {
        if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {
            $data['images'] = $this->gallery_model->get_images($patient_id);
            $data['patient'] = $this->patient_model->get_patient_detail($patient_id);
            $data['patient_id'] = $patient_id;
            $data['visit_id'] = $visit_id;
            $this->load->view('templates/header');
            $this->load->view('templates/menu');
            $this->load->view('view', $data);
            $this->load->view('templates/footer');
        }
    }

    public function add_image() {
        if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {
            $patient_id = $this->input->post('patient_id');
            $visit_id = $this->input->post('visit_id');
			
			//Upload the file with new name
            $file_upload = $this->do_upload($patient_id, $visit_id);
			
            // Check Upload Function value
			if(isset($file_upload['error'])){
				$data['error'] = $file_upload['error'];
                $data['images'] = $this->gallery_model->get_images($patient_id);
				$data['patient'] = $this->patient_model->get_patient_detail($patient_id);
				$data['patient_id'] = $patient_id;
				$data['visit_id'] = $visit_id;
				$this->load->view('templates/header');
				$this->load->view('templates/menu');
				$this->load->view('view', $data);
				$this->load->view('templates/footer');
            } else {                 
				$file_name = $file_upload['file_name'];
				$patient_id = $this->input->post('patient_id');
				$visit_id = $this->input->post('visit_id');
                $this->gallery_model->insert_image($file_name);
				$this->index($patient_id,$visit_id);
            }
        }
    }

    function do_upload($patient_id, $visit_id) {
        $config['upload_path'] = './patient_images/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '1024';
		$config['max_width'] = '1024';
		$config['max_height'] = '1024';
        $config['overwrite'] = FALSE;
        $config['file_name'] = $patient_id . "_" . $visit_id . "_" . date("hi");

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
			$error = array('error' => $this->upload->display_errors());
			return $error;
        } else {
            $data = array('upload_data' => $this->upload->data());
            return $data['upload_data'];
        }
    }

    function image_compare() {
		$patient_id = $this->input->post('patient_id');
		$data['patient'] = $this->patient_model->get_patient_detail($patient_id);
        $data['images'] = $this->input->post('patient_image');
        $this->load->view('templates/header');
        $this->load->view('templates/menu');
        $this->load->view('image_compare', $data);
        $this->load->view('templates/footer');
    }
}

?>
