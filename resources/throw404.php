<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../home");
}

function getContent($args = array()) {
	header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
	return '<h1>Seite nicht gefunden</h1>
	<p>Die von Ihnen angeforderte Seite „'.$args["title"].'“ konnte auf dem Server nicht gefunden werden.</p>
	<p>Zurück zur <a href="home">Hauptseite</a>.</p>';
}

function getHeader($args = array()) {
	return array("title"=>"Seite nicht gefunden");
}