<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() {
        parent::__construct();
		$this->load->helper('url');
		
		$this->load->model('login/login_model');
        //$this->load->model('module/module_model');
    }
	public function index()
	{
		$current_version = $this->config->item('current_version');
		$db_current_version = $this->login_model->get_current_version();
		if ($db_current_version == NULL){
			//Install database 
			redirect(base_url().'install.php', 'refresh');
		}
	}
}
