<html>
    <head>
        <title>Hospital Management :: IGTS</title>
		
        <!-- BOOTSTRAP STYLES-->
		<link href="assets/css/bootstrap.css" rel="stylesheet" />
		<!-- FONTAWESOME STYLES-->
		<link href="assets/css/font-awesome.css" rel="stylesheet" />
		<!-- CUSTOM STYLES-->
		<link href="assets/css/custom.css" rel="stylesheet" />
    </head>
    <body>
        <?php
        global $latest_version;
		global $display_message;
		
		$latest_version = "";
		$display_message = "";
		
		function is_installed() {
			$database_file = "application/config/database.php";
			if(!file_exists($database_file)){
				return FALSE;
			}else{
				return TRUE;
			}
		}
		function display_information($message) {
			global $display_message;
			$display_message = $display_message . $message . "<br/>";     
		}
		function display_error($message) {
            echo "<div class=\"alert alert-danger\" >$message</div>";
        }
		function application_url(){
            /* Get Page Url */
            $pageURL = 'http';
            if ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ) {
                $pageURL .= "s";
            }
            $pageURL .= "://";
            if ($_SERVER["SERVER_PORT"] != "80") {
                $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
            } else {
                $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
            }        
            $pageURL = explode("/", $pageURL);        
            $base_path = '';
            for($i=0; $i < (sizeof($pageURL)-1); $i++){
                $base_path .= $pageURL[$i] . "/";
            }
            return $base_path;
		
		}
		function get_server() {
			// Edit config/database.php file 
			$database_file = "application/config/database.php";
			$line_array = file($database_file);

			for ($i = 0; $i < count($line_array); $i++) {
				if (strstr($line_array[$i], "['default']['hostname']")) {
					$server = str_replace('$db[\'default\'][\'hostname\'] = ', "", $line_array[$i]);
					$server = str_replace("'", "", $server);
					$server = str_replace(";", "", $server);
					$server = trim($server);
					return $server;
				}
			}
		}
		function get_username() {
			// Edit config/database.php file 
			$database_file = "application/config/database.php";
			$line_array = file($database_file);

			for ($i = 0; $i < count($line_array); $i++) {
				if (strstr($line_array[$i], "['default']['username']")) {
					$username = str_replace('$db[\'default\'][\'username\'] = ', "", $line_array[$i]);
					$username = str_replace("'", "", $username);
					$username = str_replace(";", "", $username);
					$username = trim($username);
					return $username;
				}
			}
		}
		function get_password() {
			// Edit config/database.php file 
			$database_file = "application/config/database.php";
			$line_array = file($database_file);

			for ($i = 0; $i < count($line_array); $i++) {
				if (strstr($line_array[$i], "['default']['password']")) {
					$password = str_replace('$db[\'default\'][\'password\'] = ', "", $line_array[$i]);
					$password = str_replace("'", "", $password);
					$password = str_replace(";", "", $password);
					$password = trim($password);
					return $password;
				}
			}
		}
		function get_database() {
			$database_file = "application/config/database.php";
			$line_array = file($database_file);

			for ($i = 0; $i < count($line_array); $i++) {
				if (strstr($line_array[$i], "['default']['database']")) {
					$database = str_replace('$db[\'default\'][\'database\'] = ', "", $line_array[$i]);
					$database = str_replace("'", "", $database);
					$database = str_replace(";", "", $database);
					$database = trim($database);
					return $database;
				}
			}
		}
		function get_dbprefix() {
			$database_file = "application/config/database.php";
			$line_array = file($database_file);

			for ($i = 0; $i < count($line_array); $i++) {
				if (strstr($line_array[$i], "['default']['dbprefix']")) {
					$dbprefix = str_replace('$db[\'default\'][\'dbprefix\'] = ', "", $line_array[$i]);
					$dbprefix = str_replace("'", "", $dbprefix);
					$dbprefix = str_replace(";", "", $dbprefix);
					$dbprefix = trim($dbprefix);
					return $dbprefix;
				}
			}
		}
		class Database {

            var $db_connection = null;        // Database connection string
            var $db_server = null;            // Database server
            var $db_database = null;          // The database being connected to
            var $db_username = null;          // The database username
            var $db_password = null;          // The database password

            /** NewConnection Method
             * This method establishes a new connection to the database. */

            public function Connection($server, $username, $password) {

                // Assign variables
                global $db_connection, $db_server, $db_username, $db_password;
                $db_server = $server;
                $db_username = $username;
                $db_password = $password;

                // Attempt connection
                //try {
                    // Create connection to MYSQL database
                    // Fourth true parameter will allow for multiple connections to be made
                    $db_connection = @mysql_connect($server, $username, $password);
                    if (!$db_connection) {
                        return 'MySQL Connection Database Error: ' . mysql_error();
                    }
				//	return TRUE;
                //} catch (Exception $e) {
				//	return $e->getMessage();
                //}
            }

            /** Open Method
             * This method opens the database connection (only call if closed!) */
            public function Open() {
                global $db_connection, $db_server, $db_database, $db_username, $db_password;
                if (!$CONNECTED) {
                    try {
                        $db_connection = mysql_connect($db_server, $db_username, $db_password);
                        mysql_select_db($db_database);
                        if (!$db_connection) {
                            throw new Exception('MySQL Connection Database Error: ' . mysql_error());
                        }
                    } catch (Exception $e) {
                        display_error($e->getMessage());
                    }
                } else {
                    $message = "No connection has been established to the database. Cannot open connection.";
                    display_error($message());
                }
            }

            /** Close Method
             * This method closes the connection to the MySQL Database */
            public function Close() {
                global $db_connection;
                if ($db_connection) {
                    mysql_close($db_connection);
                } else {
                    $message = "No connection has been established to the database. Cannot close connection.";
                    display_error($message());
                }
            }

            public function get_Connection() {
                global $db_connection;
                return $db_connection;
            }

            /** Create Database Method
             * This method creates database */
            public function CreateDatabase($database) {
                global $db_connection;
                if ($db_connection) {
                    if (!mysql_query("CREATE DATABASE $database", $db_connection)) {
                        $message = "Cannot create database." . mysql_error();
                        display_error($message);
                    }
                } else {
                    $message = "No connection has been established to the database. Cannot create database.";
                    display_error($message);
                }
            }

        }
		function execute_sql_file($filename,$dbprefix,$con){
			$install_file = $filename;
            $line_array = file($install_file);
			
			foreach($line_array as $sql){
				$sql = trim($sql);
				if(!empty($sql)){
					$sql = str_replace("%dbprefix%",$dbprefix,$sql);
					if (!mysql_query($sql, $con)) {
						$message = "Error executing " . $sql . " : " . mysql_error();
						display_error($message);
					}
				}
			}
		}
		function delete_file($file_name){
			if(file_exists($file_name)){
				unlink ($file_name);
			}
		}
		function delete_folder($dir_name){
			if(is_dir($dir_name)){
				rmdir ($dir_name);
			}
		}
		function does_database_exist($server, $username, $password,$dbname){
			$mysql = mysql_connect($server, $username, $password);

			if(mysql_select_db($dbname)){
				return 1;
			}else{
				return 0;
			}
		}
		function are_tables_created($dbprefix,$con){
			$sql = "SHOW TABLES LIKE '".$dbprefix."version';";
            $result = mysql_query($sql, $con);
			if((mysql_num_rows($result))==0){
				return FALSE;	
			}else{		
				return TRUE;
			}
		}
		function display_form($message){
			if($message != ""){
				display_error($message);
			}
			?>
			<h5>( Fill in the details to install  )</h5>
				<br />
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<strong>Install  : Setup Database</strong>  
							</div>
							<div class="panel-body">
							<form method='post' action='install.php' >
							<input type="hidden" name="step" value="2" />
							<div class="form-group input-group">
								<span class="input-group-addon">Host Name</span>
								<input type="text" class="form-control" name="server" placeholder="localhost" required/>
							</div>
							<span class="small">You should be able to get hostname from your web host, if <strong>localhost</strong> does not work.</span>
							<div class="form-group input-group">
								<span class="input-group-addon">Database Name</span>
								<input type="text" class="form-control" name="dbname" placeholder="database" required/>
							</div>
							<div class="form-group input-group">
								<input type='checkbox' name='createdb' value='createdb'>Create database
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon">Table Prefix</span>
								<input type="text" class="form-control" name="tableprefix" placeholder="ck_" required />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon">User Name</span>
								<input type="text" class="form-control" name="username" placeholder="MySQL Username" required />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon">Password</span>
								<input type="text" class="form-control" name="password" placeholder="MySQL Password" />
							</div>
							<button type="submit" name="submit" class="btn btn-success"/>Install</button>
						</form>
						</div>
						</div>
					</div>
				</div>
			<?php
		}
		?>
		<div class="container">
	        <div class="row">
				<div class="col-md-12">
					<div class="col-md-6" style="margin:0 auto;">
					<h2> Hospital Management </h2>
        <?php
        if (!isset($_REQUEST["step"])&&!isset($_GET["auto"])) {
			/** Step 1 */
            // Check if application is installled or not      
            if (is_installed()) {
                /** Check the version */
                $server = get_server();
                $username = get_username();
                $password = get_password();
                $database = get_database();
                $dbprefix = get_dbprefix();

                // Connect to Server 
                $conn = new Database;
                echo $conn->Connection($server, $username, $password);
                $con = $conn->get_Connection();

                // Select Database 
                mysql_select_db($database, $con);
				if(mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$dbprefix."version'"))==1) 
				{
                $sql = "Select current_version from " . $dbprefix . "version;";
                $result = mysql_query($sql, $con);
                if (!$result) {
                    $current_version = '0.0.1';
                } else {
                    $row = mysql_fetch_assoc($result);
                    $current_version = $row['current_version'];
                }
               // display_information("Current Version :" . $current_version);
                if ($current_version == $latest_version) {
                    display_information("You have latest version of application installed.");
                } else {

                    if ($current_version == '0.0.1') {
                        display_information("Upgrading from 0.0.1 to 0.0.2");
						execute_sql_file("sql/002.sql",$dbprefix,$con);
                        $current_version = '0.0.2';
                    }
                    if ($current_version == '0.0.2') {
                        display_information("Upgrading from 0.0.2 to 0.0.3");
						execute_sql_file("sql/003.sql",$dbprefix,$con);
                        $current_version = '0.0.3';
                    }
                    if ($current_version == '0.0.3') {
                        display_information("Upgrading from 0.0.3 to 0.0.4");
						execute_sql_file("sql/004.sql",$dbprefix,$con);
                        $current_version = '0.0.4';
                    }
                    if ($current_version == '0.0.4') {
                        display_information("Upgrading from 0.0.4 to 0.0.5");
                        execute_sql_file("sql/005.sql",$dbprefix,$con);
                        $current_version = '0.0.5';
                    }
                    if ($current_version == '0.0.5'){
                        display_information("Upgrading from 0.0.5 to 0.0.6");
                        execute_sql_file("sql/006.sql",$dbprefix,$con);
                        $current_version = '0.0.6';
                    }
                    if ($current_version == '0.0.6'){
                        display_information("Upgrading from 0.0.6 to 0.0.7");
                        execute_sql_file("sql/007.sql",$dbprefix,$con);
                        $current_version = '0.0.7';
                    }
					if ($current_version == '0.0.7'){
                        display_information("Upgrading from 0.0.6 to 0.0.7");
                        execute_sql_file("sql/008.sql",$dbprefix,$con);
                        $current_version = '0.0.8';
                    }
					if ($current_version == '0.0.8'){
						display_information("Upgrading from 0.0.8 to 0.0.9");
						execute_sql_file("sql/009.sql",$dbprefix,$con);
						$current_version = '0.0.9';
					}		
					if ($current_version == '0.0.9'){
						display_information("Upgrading from 0.0.9 to 0.1.0");
						execute_sql_file("sql/010.sql",$dbprefix,$con);
						$current_version = '0.1.0';
					}
					if ($current_version == '0.1.0'){
						display_information("Upgrading from 0.1.0 to 0.1.1");
						execute_sql_file("sql/011.sql",$dbprefix,$con);
						$current_version = '0.1.1';
					}					
					if ($current_version == '0.1.1'){
						display_information("Upgrading from 0.1.1 to 0.1.2");
						execute_sql_file("sql/012.sql",$dbprefix,$con);
						$current_version = '0.1.2';
					}
					if ($current_version == '0.1.2'){
						display_information("Upgrading from 0.1.2 to 0.1.3");
						//Delete not required files
						delete_file("application/language/english/ck_lang.php");
						delete_file("application/models/appointment_model.php");
						delete_file("application/models/contact_model.php");
						delete_file("application/models/patient_model.php");
						delete_file("application/models/patient_model2.txt");
						delete_file("application/models/settings_model.php");
						delete_file("application/models/stock_model.php");
						delete_file("application/modules_core/admin/views/admin_login.php");
						delete_file("application/modules_core/admin/views/admin_signin_fail.php");	
						delete_file("application/modules_core/admin/views/welcome.php");		
						delete_file("application/modules_core/appointment/views/addfromfollowup.php");		
						delete_file("application/modules_core/appointment/views/editAvailableApp.php");		
						delete_file("application/modules_core/appointment/views/edit.php");
						delete_file("application/modules_core/appointment/views/add.php");
						delete_file("application/modules_core/appointment/views/addApp.php");
						delete_file("application/modules_core/appointment/views/CancelAppointment.php");
						delete_file("application/modules_core/contact/controllers/contact.php");
						delete_folder("application/modules_core/contact/controllers");
						delete_file("application/modules_core/contact/views/add.php");
						delete_file("application/modules_core/contact/views/browse.php");
						delete_file("application/modules_core/contact/views/edit.php");
						delete_folder("application/modules_core/contact/views");
						execute_sql_file("sql/013.sql",$dbprefix,$con);
						$current_version = '0.1.3';
					}
					if ($current_version == '0.1.3'){
						display_information("Upgrading from 0.1.3 to 0.1.4");
						execute_sql_file("sql/014.sql",$dbprefix,$con);
						//Delete not required files
						delete_file("application/modules_core/patient/views/add_patient.php");
						delete_file("application/modules_core/patient/views/add_patient_old.php");
						delete_file("application/modules_core/patient/views/edit.php");
						delete_file("application/modules_core/patient/views/visit_view.php");
						delete_file("application/modules_core/payment/views/advance_payment.php");
                        $current_version = '0.1.4';
					}
					if ($current_version == '0.1.4'){
						display_information("Upgrading from 0.1.4 to 0.1.5");
						execute_sql_file("sql/015.sql",$dbprefix,$con);
						$current_version = '0.1.5';
					}
					if ($current_version == '0.1.5'){
						display_information("Upgrading from 0.1.5 to 0.1.6");
						execute_sql_file("sql/016.sql",$dbprefix,$con);
						delete_file("application/modules_core/appointment/views/inavailability.php");
						$current_version = '0.1.6';
					}
					if ($current_version == '0.1.6'){
						display_information("Upgrading from 0.1.6 to 0.1.7");
						execute_sql_file("sql/017.sql",$dbprefix,$con);
						$current_version = '0.1.7';
					}
					if ($current_version == '0.1.7'){
						display_information("Upgrading from 0.1.7 to 0.1.8");
						execute_sql_file("sql/018.sql",$dbprefix,$con);
						$current_version = '0.1.8';
					}
					if ($current_version == '0.1.8'){
						display_information("Upgrading from 0.1.8 to 0.1.9");
						execute_sql_file("sql/019.sql",$dbprefix,$con);
						$current_version = '0.1.9';
					}
					if ($current_version == '0.1.9'){
						display_information("Upgrading from 0.1.9 to 0.2.0");
						execute_sql_file("sql/020.sql",$dbprefix,$con);
						$current_version = '0.2.0';
					}
					
                }?>
					<div class="alert alert-info" style="margin-top: 20px; padding: 0.7em;">
						<?php echo $display_message;?>
					</div>
					<div class="form_style">
						
						<a class="btn btn-success square-btn-adjust" title="Goto Application" href="<?php echo application_url()."index.php/login/cleardata";?>">Continue to Application</a>
					</div>	
				</div>
			</div>
			</div>
			<?php
				}else{
						$message="Database already has  installation. Clean it first to continue";
						display_form($message);
				}
            } elseif (!isset($_GET["auto"])) {
                /** Ask for Database Credentials */
					$message="";
					display_form($message);
				?>
				
				</div>
			</div>
			</div>
				<?php
            }
        } elseif ($_REQUEST["step"] == 2 || isset($_GET["auto"])) {
			
            // Step 2 - Install the application for the first time
            // Connect to Server 
			if (isset($_GET["auto"])){
				
				$server = "localhost";
				$username = "root";
				$password = "";
				$dbname = "chikitsa";
				$dbprefix  = "ck_";
				$createdb = 1;
				
			}else{
				$server = $_POST["server"];
				$username = $_POST["username"];
				$password = $_POST["password"];
				$dbname = $_POST["dbname"];
				$dbprefix = $_POST["tableprefix"];
				if (isset($_POST["createdb"]))
					$createdb = 1;
				else
					$createdb = 0;
			}
			
            $conn = new Database;
            $error_message = $conn->Connection($server, $username, $password);
			if($error_message != FALSE){
				display_form($error_message);
				exit;
			}
			
            $con = $conn->get_Connection();

            // Create Database
			if ($createdb == 1){
				//Does the database exists?
				if(does_database_exist($server, $username, $password,$dbname)){
					$error_message = "Database already exists. Cannot create Database";
					display_form($error_message);
					exit;
				}else{
					echo $conn->CreateDatabase($dbname);
				}
			}else{
				if(!does_database_exist($server, $username, $password,$dbname)){
					$error_message = "Database does not exists. Cannot Install";
					display_form($error_message);
					exit;
				}
			}

			$link = mysql_select_db($dbname, $con);
			if (!$link) {
				$error_message = 'Not connected : ' . mysql_error();
				display_form($error_message);
				exit;
			}
			if(are_tables_created($dbprefix,$con)){
				$error_message = 'Tables already installed.Try another Database or Table Prefix.';
				display_form($error_message);
				exit;
			}
			
			execute_sql_file("sql/install.sql",$dbprefix,$con);
			
			$conn->Close();

            // Edit config/database.php file 
            $sample_database_file = "application/config/sample-database.php";
			$database_file = "application/config/database.php";
			rename($sample_database_file,$database_file);
			
            $line_array = file($database_file);

            for ($i = 0; $i < count($line_array); $i++) {

                if (strstr($line_array[$i], "['default']['hostname']")) {
                    $line_array[$i] = '$db[\'default\'][\'hostname\'] = \'' . $server . '\';' . "\r\n";
                }
                if (strstr($line_array[$i], "['default']['username']")) {
                    $line_array[$i] = '$db[\'default\'][\'username\'] = \'' . $username . '\';' . "\r\n";
                }
                if (strstr($line_array[$i], "['default']['password']")) {
                    $line_array[$i] = '$db[\'default\'][\'password\'] = \'' . $password . '\';' . "\r\n";
                }
                if (strstr($line_array[$i], "['default']['database']")) {
                    $line_array[$i] = '$db[\'default\'][\'database\'] = \'' . $dbname . '\';' . "\r\n";
                }
                if (strstr($line_array[$i], "['default']['dbprefix']")) {
                    $line_array[$i] = '$db[\'default\'][\'dbprefix\'] = \'' . $dbprefix . '\';' . "\r\n";
                }
            }
            file_put_contents($database_file, $line_array);

            //Store that application is installed
			$sample_config_file = "application/config/sample-config.php";
            $config_file = "application/config/config.php";
			rename($sample_config_file,$config_file);
            $line_array = file($config_file);

            for ($i = 0; $i < count($line_array); $i++) {
                if (strstr($line_array[$i], "['install']")) {
                    $line_array[$i] = '$config[\'install\'] = 1;' . "\r\n";
                }
            }
            file_put_contents($config_file, $line_array);
			?>
			<div class="form_style">
				<div class="alert alert-success"> Use Username / Password : admin/admin to login </div>
				<a class="btn btn-success square-btn-adjust" title="Goto Application" href="<?php echo application_url()."index.php/login/cleardata";?>">Continue to Application</a>
			</div>
            <?php
        }
        ?>	
		<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
		<!-- JQUERY SCRIPTS -->
		<script src="assets/js/jquery-1.10.2.js"></script>
		  <!-- BOOTSTRAP SCRIPTS -->
		<script src="assets/js/bootstrap.min.js"></script>
		<!-- METISMENU SCRIPTS -->
		<script src="assets/js/jquery.metisMenu.js"></script>
		  <!-- CUSTOM SCRIPTS -->
		<script src="assets/js/custom.js"></script>		
    </body>
</html>