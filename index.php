<?php 

require_once ('vendor/autoload.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>


<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Pandoc-Webservice</title>

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
<div class="container">
<a class="navbar-brand" href="#">Pandoc-Webservice</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</div>
</div>
</nav>

<!-- Page Content -->
<div class="container">
<div class="row">
<div class="col-lg-12 text-center">
<h1 class="mt-5">Pandoc-Webservice</h1>
<p class="lead"><strong>Unterschiedliche Textdateien ineinander umwandeln</strong></p>

<ul class="list-unstyled">

</ul>
</div>
</div>
</div>


<!-- Der Webserver speichert die hochgeladene Datei unter einem temporären Namen ab, um nun diese Datei in den Webspace zu bekommen --> 

<?php
    $ziel = "uploads/";
	//Pfad zum Upload
    $zieldatei = $ziel . basename($_FILES["DateiZumHochladen"]["name"]);
	$extension = strtolower(pathinfo($_FILES["DateiZumHochladen"]["name"], PATHINFO_EXTENSION));	
	
	
	

 
// Überprüfung der Dateiendung 
$allowed_extensions = array('pdf', 'txt', 'tex', 'html', 'docx');
if(!in_array($extension, $allowed_extensions)) {
 die("<br/><br/><br/><br/><strong><center><font color='red'>Vorsicht: Nur PDF, TXT, TEX, HTML und DOCX-Dateien sind erlaubt</font></center></strong>");
}
 
 
// Überprüfung der Dateigröße
$max_size = 100*1024;
if($_FILES["DateiZumHochladen"]["name"] > $max_size) {
 die("<br/><br/><br/><br/><strong><center><font color='red'>Bitte keine Dateien größer 100MB hochladen</font></center></strong>");
}
 
//Überprüfung, dass die Datei keine Fehler enthält
if(function_exists('exif_datatype')) { //Die exif_Dateitype-Funktion erfordert die exif-Erweiterung auf dem Server
 $allowed_types = array(filetype_pdf, filetype_txt, filetype_docx, filetype_tex, filetype_html);
 $detected_type = exif_datatype($_FILES["DateiZumHochladen"]["name"]);
 if(!in_array($detected_type, $allowed_types)) {
 die("<br/><br/><br/><br/><strong><center><font color='red'>Nur der Upload von Textdateien ist gestattet</font></center></strong>");
 }
}
 
//Pfad zum Upload
$zieldatei = $ziel . basename($_FILES["DateiZumHochladen"]["name"]) . '.'.$extension;
 
//Neuer Dateiname falls die Datei bereits existiert
if(file_exists($zieldatei)) { //Falls Datei existiert, hänge eine Zahl an den Dateinamen
 $id = 1;
 do {
 $zieldatei = $ziel . basename($_FILES["DateiZumHochladen"]["name"]).'_'.$id.'.'.$extension;
 $id++;
 } while(file_exists($zieldatei));
}
	
	
	
	
	
	
    if(move_uploaded_file($_FILES["DateiZumHochladen"]["tmp_name"], $zieldatei)) {
        echo "<br/><br/><br/><br/><strong><center><font color='red'>Datei erfolgreich hochgeladen</font></center></strong>";
    }
    else {
        echo "<br/><br/><br/><br/><strong><center><font color='red'>Fehler beim Hochladen</font></center></strong>";
    }
    
?>	




<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>