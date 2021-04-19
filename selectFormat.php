<?php

require_once ('vendor/autoload.php');

$do_convert = false;
$filename= "";
$file_extension="";



$values = array(); // values hat Dateiendung 
$options = array(); // options hat die Namen der Formate für select Liste

if(isset($_FILES["DateiZumHochladen"]["name"])){
  $do_convert = true;
  
 // File extension bekommen 
  $filename= basename($_FILES["DateiZumHochladen"]["name"]);
  // Datei in Array aufteilen
  $filename_split=explode(".", $filename);
 
 // Im letzen Element ist die Dateiendung
  $file_extension= $filename_split[sizeof($filename_split)-1];
 
	
  // Arrays nach input format befüllen
  switch($file_extension){
	case "docx":
		array_push($values,".html", ".pdf", ".txt", ".md");
		array_push($options, "HTML", "PDF", "TEXT", "MARKDOWN");
		break;
		
	case "txt":
		array_push($values,".html", ".pdf", ".db");
		array_push($options, "HTML", "PDF", "docbook");
		break;
	  
  }
 
  
};

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


<!-- Der Webserver speichert die hochgeladene Datei unter einem temporaeren Namen ab, um nun diese Datei in den Webspace zu bekommen -->

<?php
    $ziel = "uploads/";
	//Pfad zum Upload
	
	$extension = strtolower(pathinfo($_FILES["DateiZumHochladen"]["name"], PATHINFO_EXTENSION));
	$zieldatei = $ziel . basename($_FILES["DateiZumHochladen"]["name"]) . '.'.$extension;
	$zieldatei_filename =  basename($_FILES["DateiZumHochladen"]["name"]) . '.'.$extension;





// Ueberpruefung der Dateiendung
$allowed_extensions = array('biblatex','bibtex', 'commonmark', 'commonmark_x',
'creole', 'csljson','csv', 'docbook', 'docx', 'dokuwiki',
	'epub', 'fb2', 'gfm', 'haddock', 'html', 'ipynb', 'jats', 'jira', 'json',
	'latex', 'man', 'md', 'markdown', 'markdown_github', 'markdown_mmd', 'markdown_phpextra', 'markdown_strict',
 'mediawiki', 'muse', 'native', 'odt', 'opml', 'org', 'rst', 't2t', 'tex','txt', 'textile',
	'tikiwiki', 'twiki', 'vimwiki');
	

if(!in_array($extension, $allowed_extensions)) {
 die("<br/><br/><br/><strong><center><font color='red'>Dieses Format kann Pandoc nicht konvertieren</font></center></strong>");
}


// Ueberpruefung der Dateigroesse
$max_size = 100*1024;
if($_FILES["DateiZumHochladen"]["name"] > $max_size) {
 die("<br/><br/><br/><strong><center><font color='red'>Bitte keine Dateien größer als 100MB hochladen</font></center></strong>");
}

//Ueberpruefung, dass die Datei keine Fehler enthaelt
if(function_exists('exif_datatype')) { //Die exif_Dateitype-Funktion erfordert die exif-Erweiterung auf dem Server
 $allowed_types = array(filetype_pdf, filetype_txt, filetype_docx, filetype_tex, filetype_html);
 $detected_type = exif_datatype($_FILES["DateiZumHochladen"]["name"]);
 if(!in_array($detected_type, $allowed_types)) {
 die("<br/><br/><br/><strong><center><font color='red'>Nur der Upload von Textdateien ist gestattet</font></center></strong>");
 }
}



//Neuer Dateiname falls die Datei bereits existiert
if(file_exists($zieldatei)) { //Falls Datei existiert, haenge eine Zahl an den Dateinamen
 $id = 1;
 do {
 $zieldatei = $ziel . basename($_FILES["DateiZumHochladen"]["name"]).'_'.$id.'.'.$extension;
 $id++;
 } while(file_exists($zieldatei));
}




    if(move_uploaded_file($_FILES["DateiZumHochladen"]["tmp_name"], $zieldatei)) {
        echo "<br/><br/><strong><center><font color='red'>Datei erfolgreich hochgeladen</font></center></strong>";
    }
    else {
        echo "<br/><br/><br/><strong><center><font color='red'>Fehler beim Hochladen</font></center></strong>";
    }

?>


<!-- Conversion List -->
<br/><br/>



<center>


	<form action="convert.php" method="post" enctype="multipart/form-data">
    <select id="format" name="format">
      <option class="Select" value="Select">--Select--</option>
	  <?php	
		for ($i=0;  $i<sizeof($values); $i++){
		 echo('<option value="'.$values[$i].'">'.$options[$i].'</option>');
		 
		}
	  ?>
	<!--  <option value="Markup">Asciidoc</option>
	  <option value="beamer">Beamer</option>
      <option value=".html">HTML</option>	  
      <option value="LaTeX">LaTeX</option>
	  <option value="Markdown">Markdown</option>
	  <option value="ms">ms</option>
	  <option value="ODT">ODT</option>
      <option value=".pdf">PDF</option>
      <option value=".txt">Text</option>
	  <option value="Text">XML</option>
      <option value=".docx">Word</option>

    <!--  <option value="Mind Map">Mind Map</option> -->
      
    </select>
    <input type="hidden" id="zieldatei" name="zieldatei" value="<?php echo $zieldatei_filename; ?>">
  <input type="submit" value="Convert" name="submit"/>

  </form>
</p>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
