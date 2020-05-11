<?php

require_once ('vendor/autoload.php');


$zieldatei = $_POST['zieldatei'];
$format = $_POST['format'];

$output = array();
exec("/Users/Zakaria/AppData/Local/Pandoc/pandoc
	/xampp/htdocs/pandoc-webservice/$zieldatei -s -o 
	/xampp/htdocs/pandoc-webservice/uploads/ruecktrittsformular250419.pdf.txt", $output);

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


<br/><br/><br/><strong><center><font color='red'>Die Datei wurde erfolgreich convertiert<br><br></a></font></center></strong>
<a href="download.php?zieldatei=ruecktrittsformular250419.pdf.pdf">Click here to Download</a>





<ul class="list-unstyled">

</ul>
</div>
</div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
