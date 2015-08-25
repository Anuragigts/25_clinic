<?php

require_once('pclzip.lib.php'); 

function unzip($filename,$path)
{
	$zipfile = new PclZip($filename);
	if ($zipfile -> extract(PCLZIP_OPT_PATH, $path) == 0) {
		return 'Error : ' . $zipfile -> errorInfo(true);
	}else{
		return TRUE;
	} 
}

 
?>
