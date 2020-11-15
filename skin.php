<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: home");
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
	echo '</title>
	<link rel="stylesheet" href="common.css"/>
</head>
<body>
	<header id="header">__HOME__ <span class="right">__MENÜ__</span></header>
	<div id="content">'.$content.'</div>
	<footer id="footer"><a href="https://www.h-brs.de/de/datenschutz">Datenschutzerklärung</a> • <a href="https://www.h-brs.de/de/impressum">Impressum</a></footer>
</body>
</html>';
}
?>