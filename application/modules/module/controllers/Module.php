<?php

class Module extends CI_Controller {

    function __construct() {
        parent::__construct();
        
		$this->load->model('menu_model');
		$this->load->model('module_model');
		
		$this->load->helper('url');
		$this->load->helper('path');
		$this->load->helper('form');
		$this->load->helper('file');
		$this->load->helper('unzip_helper');
		
		$this->load->library('session');
        $this->load->library('form_validation');
		
		$this->lang->load('main');
    }

    public function index() {
		if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {
			$data['modules'] = $this->module_model->get_modules();
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('browse',$data);
			$this->load->view('templates/footer');
        }
    }
	public function upload() {
		if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('upload_module');
			$this->load->view('templates/footer');
		}
	}
	public function deactivate_module($module_id) {
		if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {
			$this->module_model->deactivate_module($module_id);
			$this->index();
        }
	}
	
	public function clear_data($module_name) {
		if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {
			//Execute SQL file
			$sql_file_name = "./application/modules/".$module_name."/". $module_name."_dd.sql";
			//Read Files details
			$sqls = file($sql_file_name);	
			foreach($sqls as $statement){
				$dbprefix =  $this->db->dbprefix;
				$statement = str_replace("%db_prefix%",$dbprefix,$statement);
				$this->db->query($statement);
			}
			$this->index();
        }
	}
	
	public function activate_module($module_name) {
		if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {
			//Execute SQL file
			$sql_file_name = "./application/modules/".$module_name."/". $module_name.".sql";
			//Read Files details
			$sqls = file($sql_file_name);	
			foreach($sqls as $statement){
				$dbprefix =  $this->db->dbprefix;
				$statement = str_replace("%db_prefix%",$dbprefix,$statement);
				$this->db->query($statement);
			}
			$this->module_model->activate_module($module_name);
			$this->index();
        }
	}
	//File Upload 
	function do_upload() {
        $config['upload_path'] = './application/modules/';
		$config['allowed_types'] = '*';
		$config['max_size'] = '2048';
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('extension')) {
			$error = array('error' => $this->upload->display_errors());
			return $error;
		} else {
			$data = array('upload_data' => $this->upload->data());
			return $data['upload_data'];
		}
    }
	public function upload_module(){
		$file_upload = $this->do_upload(); 
		$filename= $file_upload['file_name'];
		$filname_without_ext = pathinfo($filename, PATHINFO_FILENAME);		
		if(isset($file_upload['error'])){
			$data['error'] = $file_upload['error'];		
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('upload_module',$data);
			$this->load->view('templates/footer');
		}elseif($file_upload['file_ext']!='.zip'){
			$data['error'] = "The file you are trying to upload is not a .zip file. Please try again.";		
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('extract_module',$data);
			$this->load->view('templates/footer');
		}elseif(preg_match('/^[a-z_]+$/',$filname_without_ext)) {
			$data['file_upload'] = $file_upload;		
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('extract_module',$data);
			$this->load->view('templates/footer');
		}else{			
			$data['error'] = "Make Sure the file-name doesn't have any special characters. File-name must be the name of module being installed.";		
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('extract_module',$data);
			$this->load->view('templates/footer');
		}
	}
}

?>
