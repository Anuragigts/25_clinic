<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct() {
        parent::__construct();
		$this->load->helper('url');
		
		$this->load->model('login/login_model');
        $this->load->model('module/module_model');
		
		$this->load->library('session');	
    }

    public function index() {
		$current_version = $this->config->item('current_version');
		$db_current_version = $this->login_model->get_current_version();		
		
		//Check Database and File Version of Chikitsa
		if ($current_version == $db_current_version) {
			//Is User logged In ?
			if ($this->session->userdata('user_name') == '') {
				if($this->module_model->is_active('frontend')){
					redirect('/frontend/index', 'refresh');	
				}else{
					redirect('/login/index', 'refresh');	
				}
			}else{
				redirect('/appointment/index', 'refresh');
			}
		} else {
			//Upgrade database to latest version
			redirect(base_url().'install.php', 'refresh');
		}
    }
}

?>
