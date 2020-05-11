<?php
if(!empty($_GET['zieldatei'])){
	$fileName = basename($_GET['zieldatei']);
	$filePath = 'uploads/'.$fileName;
	if(!empty($fileName) && file_exists($filePath)){
		// Define headers
		header("Cache-Control: public");
		header("Content-Description: File Transfer");
		header('Content-Disposition: attachment; filename="'.basename($fileName).'"');
		header("Content-Type: application/zip");
		header("Content-Transfer-Encoding: binary");
		
		// Lese die Datei aus
		header('Content-Length: ' . filesize($fileName));
		readfile($file);
		exit;
		

	}
}	



?>