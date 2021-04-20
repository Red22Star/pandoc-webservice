<?php 

require_once ('vendor/autoload.php');

// Kann die Datei nicht konvertiert werden, wird ein Fehler gezeigt
	$do_convert = false;
	if(isset($_FILES["DateiZumHochladen"]["name"])){
	$do_convert = true;
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
<a class="navbar-brand" href="https://www.uni-muenster.de/IVV5LWO/TextTransform/index.php">Pandoc-Webservice</a>
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
<p class="lead"><strong>Unterschiedliche Textdateien ineinander umwandeln<br/><br/><br/></strong></p>
<ul class="list-unstyled">

<?php
// Wenn keine Dateien bekommen hat, drucke die html form aus
  if($do_convert == false){
    echo '<form action="selectFormat.php" method="post" enctype="multipart/form-data">
    Datei: <input type="file" name="DateiZumHochladen" id="DateiZumHochladen"/>
    <input type="submit" value="Upload" name="submit"/>
    </form>';
  }
?>

</ul>
</div>
</div>
</div>




<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>