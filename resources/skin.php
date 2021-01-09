<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../home");
}

function generateSkin($content = "", $header = array()) {
	echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>';
	if(isset($header["title"])) {
		echo $header["title"]." - Stephan Kopf - H-BRS";
	} else {
		echo "Stephan Kopf - H-BRS";
	}
	echo '</title>';
	if(isset($header["style"])) {
		echo '<style>
		'.$header["style"].'
		</style>';
	}
	echo '<link rel="stylesheet" href="resources/common.css"/>
	<script src="resources/common.js"></script>
</head>
<body>
	<header id="header"><span id="left-header"><a href="home">Home</a></span><span id="right-header" onclick="menu()"><img src="resources/menu.png" alt="Menü"></img></span></header>
	<div id="menu" style="display: none;"><ul>';
	
	require("content.php");
	
	for($i = 0; $i < count($index); $i++) {
		$prev = isset($index[$i-1]) ? $index[$i-1]["task"] : "";
		$next = isset($index[$i+1]) ? $index[$i+1]["task"] : "";
		
		if($prev !== $index[$i]["task"]) {
			echo '<li>Aufgabe '.$index[$i]["task"].'</li>';
			echo '<ul>';
		}
		
		echo '<li>'.$index[$i]["header"].'</li>';
		
		if($next !== $index[$i]["task"]) {
			echo '</ul>';
		}
	}
	
	echo '</ul></div>
	<div id="content">'.$content.'</div>
	<footer id="footer"><a href="https://www.h-brs.de/de/datenschutz">Datenschutzerklärung</a> • <a href="https://www.h-brs.de/de/impressum">Impressum</a></footer>
</body>
</html>';
}
?>