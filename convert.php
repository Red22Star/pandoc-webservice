<?php

require_once ('vendor/autoload.php');


$zieldatei = $_POST['zieldatei'];
$format = $_POST['format'];
$output = array();
$execstring = "pandoc ";  
switch ($_POST['format']){

				
		case ".docx":
		$execstring .= "uploads/$zieldatei -t docx -o uploads/convert/".$zieldatei.$format;
		break;

		case ".markdown":
		$execstring .= "uploads/$zieldatei -t markdown -s -o uploads/convert/".$zieldatei.$format;
		break;
	
		case ".latex":
		$execstring .= "uploads/$zieldatei -s -o uploads/convert/".$zieldatei.$format;
		break;
		
		case ".tex":
		$execstring .= "uploads/$zieldatei -s -o uploads/convert/".$zieldatei.$format;
		break;
		
		case ".odt":
		$execstring .= "uploads/$zieldatei -o uploads/convert/".$zieldatei.$format;
		break;
		
		case ".pdf":
		$execstring .= "uploads/$zieldatei -o uploads/convert/".$zieldatei.$format;
		break;
		
		case ".html":
		$execstring .= "uploads/$zieldatei -s -o uploads/convert/".$zieldatei.$format;
		break;
				
		case ".md":
		$execstring .= "uploads/$zieldatei -t markdown -s -o uploads/convert/".$zieldatei.$format;
		break;

		case ".asciidoc":
		$execstring .= "uploads/$zieldatei -s -o uploads/convert/".$zieldatei.$format;
		break;
}

		 var_dump($execstring);
	exec($execstring, $output);


/*
if(isset($_POST['format'])){
	if($_POST['format'] == 'Asciidoc'){
		
	}
	elseif($_POST['format'] == 'Beamer'){
		
	}
	elseif($_POST['format'] == 'HTML'){
		exec("/Users/Zakaria/AppData/Local/Pandoc/pandoc.exe 
		-s /xampp/htdocs/pandoc-webservice/$zieldatei 
		-o /xampp/htdocs/pandoc-webservice/uploads/irgendwas.html", $output);
		
	}
	elseif($_POST['format'] == 'LaTeX'){
		exec("/Users/Zakaria/AppData/Local/Pandoc/pandoc.exe 
		-s /xampp/htdocs/pandoc-webservice/$zieldatei 
		-o /xampp/htdocs/pandoc-webservice/uploads/irgendwas.tex", $output);
		
	}
	elseif($_POST['format'] == 'ms'){
		exec("/Users/Zakaria/AppData/Local/Pandoc/pandoc.exe
			-s /xampp/htdocs/pandoc-webservice/$zieldatei.pdf -t markdown -o 
			/xampp/htdocs/pandoc-webservice/uploads/$zieldatei.md", $output);
		
	}
	elseif($_POST['format'] == 'ODT'){
		exec("/Users/Zakaria/AppData/Local/Pandoc/pandoc.exe
			 /xampp/htdocs/pandoc-webservice/$zieldatei.pdf -o 
			/xampp/htdocs/pandoc-webservice/uploads/$zieldatei.odt", $output);
		
	}
	elseif($_POST['format'] == 'PDF'){
		
	}
	elseif($_POST['format'] == 'Text'){
		exec("/Users/Zakaria/AppData/Local/Pandoc/pandoc.exe
			-s /xampp/htdocs/pandoc-webservice/$zieldatei.pdf -o 
			/xampp/htdocs/pandoc-webservice/uploads/$zieldatei.txt", $output);

				
	}
	elseif($_POST['format'] == 'Markdown'){
		exec("/Users/Zakaria/AppData/Local/Pandoc/pandoc.exe 
		-s /xampp/htdocs/pandoc-webservice/$zieldatei 
		-o /xampp/htdocs/pandoc-webservice/uploads/irgendwas.text", $output);
		
	}
	
	elseif($_POST['format'] == 'XML'){
		exec("/Users/Zakaria/AppData/Local/Pandoc/pandoc.exe 
		-s /xampp/htdocs/pandoc-webservice/$zieldatei 
		-o /xampp/htdocs/pandoc-webservice/uploads/irgendwas.db", $output);
		
	}
	
	elseif($_POST['format'] == '.docx'){
		exec("/Users/Zakaria/AppData/Local/Pandoc/pandoc.exe
			-s /xampp/htdocs/pandoc-webservice/$zieldatei.pdf -o 
			/xampp/htdocs/pandoc-webservice/uploads/$zieldatei.docx", $output);
		
	}
	
	}
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Umwandlung unterschiedlicher Textformate">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<br/><br/>
<div class="w3-panel w3-white">
<h1><strong>Pandoc-Webservice</strong></h1>
<h2>Unterschiedliche Textdateien ineinander umwandeln</h2>
  </div>
<br/>
<ul class="list-unstyled">

<!-- download stylen-->
<style>
.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
</style>
</head>
<body>


<br/><br/><br/><strong><center><font color='red'>Die Datei wurde erfolgreich convertiert<br><br></a></font></center></strong>
<a href="download.php?zieldatei=<?php echo $zieldatei.$format;?>"><center><button class="btn"><i class="fa fa-download"></i> Download</button></center></a>




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
