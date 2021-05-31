
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
<meta name="description" content="Umwandlung unterschiedlicher Textformate">
<meta name="author" content="Zakaria Kal">
<title>Pandoc-Webservice</title>

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
<div class="container">
<a class="navbar-brand" href="https://www.uni-muenster.de/IVV5LWO/TextTransform/index.php"><h4><strong> <i class="fa fa-home"></i>&nbsp; Startseite   </strong></h4></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>

</div>
</div>
</nav>

<!-- Page Content -->
<div class="container">
<div class="row">
<div class="col-lg-12 text-center">
<br/>
<div class="w3-panel w3-white">
<h1><p class="p3">Pandoc-Webservice</p></h1>
<h2><p class="p3">Konvertierung unterschiedlicher Textdateien</p></h2>
</div>
<br/><br/><br/>
<ul class="list-unstyled">

<?php
// Wenn keine Dateien bekommen hat, drucke die html form aus
  if($do_convert == false){
    echo '<form action="selectFormat.php" method="post" enctype="multipart/form-data">
    Datei: <input type="file" name="DateiZumHochladen" id="DateiZumHochladen"  />
    <input type="submit" value="Upload" name="submit"/>
    </form>';
  }
?>
</ul>
</div>
</div>
</div>

<style>
<!--Alert-->
.danger {
	padding: 10px 12px; 
	background-color: #ffdddd;
	border-left: 6px solid #f44336;
	border-right: 6px solid #f44336;
	width: 600px;
	height: 50px;
	font-family: "Georgia", Times, serif;
	font-size: 19px;
	color: red;
}

.success {
	padding: 10px 12px; 
	background-color: #ddffdd;
	border-left: 6px solid #04AA6D;
	border-right: 6px solid #04AA6D;
	width: 600px;
	height: 50px;
	font-family: "Georgia", Times, serif;
	font-size: 19px;
	color: #2E8B57;
  
}
<!-- Konvertiern button-->
.btn {
	background-color: DodgerBlue;
	border: none;
	color: white;
	padding: 4px 10px;
	cursor: pointer;
	font-size: 18px;
}

<!-- Darker background on mouse-over -->
.btn:hover {
	background-color: RoyalBlue;
}
<!--Font-->
.p1 {
	font-family: "Copperplate", Copperplate, Fantasy;

}
.p2 {
	font-family: "Papyrus", Papyrus, Fantasy;
	font-weight: 900;
}
.p3 {
	font-family: "Georgia", "Georgia", Serif;
	font-weight: 900;
}
.p4 {
	font-family: "Times New Roman", "Times New Roman", Serif;
}
</style>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>