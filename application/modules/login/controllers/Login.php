<?php

class login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        
		$this->load->helper('form');
		$this->load->helper('url');
        $this->load->helper('security');
		
		$this->load->model('login_model');
		$this->load->model('module/module_model');
		
		$this->lang->load('main');
    }

    function index() {
		//If Not Logged In, Go to Login Form
        if ($this->session->userdata('user_name') == '') {
			$this->load->view('login/login_signup');
		} else {
			//Go to Appointment Page if logged in
            redirect('/appointment/index', 'refresh');
        }
    }

    function valid_signin() {
		//Check if loggin details entered
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $result = FALSE;
			if($this->input->post('username')){
				//Check Login details
				$username = $this->input->post('username');
				$password = base64_encode($this->input->post('password'));
				$result = $this->login_model->login($username, $password);
			}
			//If Username and Password matches
			if ($result) {
				redirect('/appointment/index', 'refresh');
			} else {
				$data['username'] = $this->input->post('username');
				$data['level'] = $this->input->post('level');
				$data['error'] = 'Invalid Username and/or Password';
				$this->load->view('login/login_signup',$data);
			}
        }
    }

    public function logout() {
		//Destroy Session and go to login form
        $newdata = array('name' => '', 'user_name' => '', 'category' => '', 'logged_in' => FALSE,);
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
        $this->index();
    }
	public function cleardata() {
		//Display username and password for login after install
        $newdata = array('name' => '', 'user_name' => '', 'category' => '', 'logged_in' => FALSE,);
        $this->session->unset_userdata($newdata);
        $this->session->sess_destroy();
		$data['message']='Use Username / Password : admin/admin to login ';
		$this->load->view('login/login_signup',$data);
    }
}

?>
