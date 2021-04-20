<?php

require_once ('vendor/autoload.php');


$zieldatei = $_POST['zieldatei'];
$format = $_POST['format'];
$output = array();
$execstring = "pandoc ";  
switch ($_POST['format']){
	case ".markdown":
		$execstring .= "uploads/$zieldatei -t markdown -s -o uploads/convert/".$zieldatei.$format;
		break;
	
		case ".latex":
		$execstring .= "uploads/$zieldatei -s -o uploads/convert/".$zieldatei.$format;
		break;
		
		case ".tex":
		$execstring .= "uploads/$zieldatei -s -o uploads/convert/".$zieldatei.$format;
		break;
			
		case ".docx":
		$execstring .= "uploads/$zieldatei -o uploads/convert/".$zieldatei.$format;
		break;
		
		case ".odt":
		$execstring .= "uploads/$zieldatei -o uploads/convert/".$zieldatei.$format;
		break;
		
		case ".asciidoc":
		$execstring .= "uploads/$zieldatei -s -o uploads/convert/".$zieldatei.$format;
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
<p class="lead"><strong>Unterschiedliche Textdateien ineinander umwandeln</strong></p>


<br/><br/><br/><strong><center><font color='red'>Die Datei wurde erfolgreich convertiert<br><br></a></font></center></strong>
<a href="download.php?zieldatei=<?php echo $zieldatei.$format;?>">Click here to Download</a>





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
