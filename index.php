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
<!--    </button>
<div class="collapse navbar-collapse" id="navbarResponsive">
<ul class="navbar-nav ml-auto">
<li class="nav-item active">
<a class="nav-link" href="#">Home
<span class="sr-only">(current)</span>
</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">About</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Services</a>
</li>
<li class="nav-item">
<a class="nav-link" href="#">Contact</a>
</li>
</ul>	-->
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
<!--  <li>Bootstrap 4.3.1</li>
<li>jQuery 3.4.1</li>	-->
</ul>
</div>
</div>
</div>




<!-- Der Webserver speichert die hochgeladene Datei unter einem temporären Namen ab, um nun diese Datei in den Webspace zu bekommen --> 

<?php
    $ziel = "uploads/";
    $zieldatei = $ziel . basename($_FILES["DateiZumHochladen"]["name"]);
    if(move_uploaded_file($_FILES["DateiZumHochladen"]["tmp_name"], $zieldatei)) {
        echo "Datei erfolgreich hochgeladen";
    }
    else {
        echo "Fehler beim Hochladen";
    }
    

?>	

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

