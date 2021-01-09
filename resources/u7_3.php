<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u7_3");
}

function getContent($args) {
	return '<h1>Aufgabe 7.3 – TopSort als WebApp</h1>
	<p><b>Schreiben Sie eine Web-Oberfläche, in der man beliebige Beziehungen (Vorrang-Relationen) eingeben kann, für die dann die topologische Sortierung per Knopfdruck auf der Webseite ausgegeben wird.</b></p>
	<p><b>Für die Eingabe können Sie <a href="https://www.w3schools.com/html/html_forms.asp">HTML5-Eingabefelder</a> oder <a href="https://www.w3schools.com/tags/att_global_contenteditable.asp">contentEditable</a> verwenden.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<iframe src="resources/u7_3.html"></iframe>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 7.3");
}
?>