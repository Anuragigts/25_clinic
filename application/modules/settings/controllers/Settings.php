<?php

class Settings extends CI_Controller {

    function __construct() {
        parent::__construct();
        
		$this->load->model('menu_model');
        $this->load->model('settings_model');
        
		$this->load->helper('url');
		$this->load->helper('currency_helper');
        $this->load->helper('form');
		$this->load->helper('directory');
		$this->load->helper('file');
		$this->load->helper('unzip_helper');
		
		$this->lang->load('main');
        
		$this->load->library('session');
		$this->load->library('form_validation');
		
    }
    public function clinic() {
        if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {
            $this->form_validation->set_rules('clinic_name', 'Clinic Name', 'required');
            $this->form_validation->set_rules('start_time', 'Clinic Start Time', 'required');
            $this->form_validation->set_rules('end_time', 'Clinic End Time', 'required');
			$this->form_validation->set_rules('email', 'Email', 'valid_email');

            if ($this->form_validation->run() === FALSE) {
                $data['clinic'] = $this->settings_model->get_clinic_settings();
				$data['def_timeformate']=$this->settings_model->get_time_formate();
                $this->load->view('templates/header');
                $this->load->view('templates/menu');
                $this->load->view('settings/clinic', $data);
                $this->load->view('templates/footer');
            } else {
               $val= $this->settings_model->save_clinic_settings();
               if($val == 1){
               redirect('settings/clinic');
               }
                /*$data['clinic'] = $this->settings_model->get_clinic_settings();
				$data['def_timeformate']=$this->settings_model->get_time_formate();
                $this->load->view('templates/header');
                $this->load->view('templates/menu');
                $this->load->view('settings/clinic', $data);
                $this->load->view('templates/footer');*/
            }
        }
    }
    public function invoice() {
        if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('left_pad', 'Left Pad', 'required');
            $this->form_validation->set_rules('currency_symbol', 'Currency Symbol', 'required');

            if ($this->form_validation->run() === FALSE) {
                $data['invoice'] = $this->settings_model->get_invoice_settings();
                $this->load->view('templates/header');
                $this->load->view('templates/menu');
                $this->load->view('invoice', $data);
                $this->load->view('templates/footer');
            } else {
                $this->settings_model->save_invoice_settings();
                $data['invoice'] = $this->settings_model->get_invoice_settings();
                $this->load->view('templates/header');
                $this->load->view('templates/menu');
                $this->load->view('invoice', $data);
                $this->load->view('templates/footer');
            }
        }
    }
	public function change_settings() {
		if ($this->session->userdata('user_name') == '') {
            redirect('login/index');
        } else {
			$data['def_timezone']=$this->settings_model->get_time_zone();
			$data['def_timeformate']=$this->settings_model->get_time_formate();
			$data['def_dateformate']=$this->settings_model->get_date_formate();
			$data['languages']=directory_map('./system/language');		
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('settings',$data);
			$this->load->view('templates/footer');
		}
	}
	
	public function save_lang(){
		$this->settings_model->save_lang("default_language",$this->input->post('default_language'));
		$this->change_settings();
	}
	public function save_timezone(){
		$this->settings_model->save_timezone("default_timezone",$this->input->post('timezones'));
		$this->change_settings();
	}
	
	public function save_time_formate(){
		$this->settings_model->save_timezone("default_timeformate",$this->input->post('timeformate'));
		$this->change_settings();
	}
	
	public function save_date_formate(){
		$this->settings_model->save_timezone("default_dateformate",$this->input->post('dateformate'));
		$this->change_settings();
	}
	public function backup(){
		$this->load->view('templates/header');
		$this->load->view('templates/menu');
		$this->load->view('settings/backup');
		$this->load->view('templates/footer');
	}
	public function take_backup(){
		// Load the DB utility class
		$this->load->dbutil();
		
		$prefs = array(
                'tables'      => array(),  // Array of tables to backup.
                'ignore'      => array(),           // List of tables to omit from the backup
                'format'      => 'zip',             // gzip, zip, txt
                'filename'    => 'chikitsa-backup.sql',    // File name - NEEDED ONLY WITH ZIP FILES
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );

		// Backup your entire database and assign it to a variable
		$backup =& $this->dbutil->backup($prefs); 

		// Load the file helper and write the file to your server
		$this->load->helper('file');
		write_file('./chikitsa-backup.zip', $backup); 

		// Load the download helper and send the file to your desktop
		$this->load->helper('download');
		force_download('chikitsa-backup.zip', $backup);
		
		$this->backup();
	}
	function do_upload() {
        $config['upload_path'] = './restore_backup/';
		$config['allowed_types'] = '*';
		$config['max_size'] = '4096';
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('backup')) {
			$error = array('error' => $this->upload->display_errors());
			return $error;
		} else {
			$data = array('upload_data' => $this->upload->data());
			return $data['upload_data'];
		}
    }
	public function restore_backup(){
		//Upload File
		$file_upload = $this->do_upload(); 
		$filename = $file_upload['file_name'];
		$filname_without_ext = pathinfo($filename, PATHINFO_FILENAME);		
		if(isset($file_upload['error'])){
			$data['error'] = $file_upload['error'];		
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('settings/backup',$data);
			$this->load->view('templates/footer');
		}elseif($file_upload['file_ext']!='.zip'){
			$data['error'] = "The file you are trying to upload is not a .zip file. Please try again.";		
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('settings/backup',$data);
			$this->load->view('templates/footer');
		}else{
			$data['file_upload'] = $file_upload;	
			//Unzip
			$full_path = $file_upload['full_path'];
			$file_path = $file_upload['file_path'];
			$raw_name = $file_upload['raw_name'];
			
			$return_code = unzip($full_path,$file_path);			
			if($return_code === TRUE){
				//execute sql file
				$sql_file_name = $file_path . $raw_name.'.sql';
				$file_content = file_get_contents($sql_file_name);	
				$query_list = explode(";", $file_content);
				
				foreach($query_list as $query){
					//Remove Comments like # # Commment #
					$pos1 = strpos($query,"#\n# ");
					if($pos1 !== FALSE){
						$pos2 = strpos($query,"\n#",$pos1+3);
						$comment = substr($query,$pos1, $pos2-$pos1)."<br/>";
						$query = substr($query, $pos2+2);
					}
					$this->db->query($query);
					
				}
			}else{
				$data['error'] = $return_code;
			}
			$this->load->view('templates/header');
			$this->load->view('templates/menu');
			$this->load->view('settings/backup',$data);
			$this->load->view('templates/footer');
		}
		
		
		
	}
}

?>