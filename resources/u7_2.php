<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u7_2");
}

function getContent($args) {
	return '<h1>Aufgabe 7.2 – Rednerliste mit Zeitmessung</h1>
	<p><b>Implementieren Sie die interaktive Anwendung "Rednerliste mit Zeitmessung" selbstständig in JavaScript durch Nutzung der <a href="https://www.w3schools.com/js/js_htmldom.asp">DOM API</a> und der <a href="https://www.w3schools.com/js/js_timing.asp">Timer-Funktionen</a>. Neue Redner sollen auf Knopfdruck hinzugefügt werden können. Deren Uhr wird dann sofort automatisch gestartet und alle anderen Uhren angehalten. Bei jedem Redner soll die individuelle, gemessene Redezeit sekundengenau angezeigt werden. Für jeden Redner soll es einen eigenen Start-/Stopp-Button geben. Es soll immer nur eine Uhr laufen. Angezeigt werden sollen die bisherigen Summenzeiten aller Redebeiträge der betreffenden Person. Suchen Sie eine möglichst kurze und elegante Lösung. Achten Sie gleichzeitig auf gute Usability: z.B. wenn die Eingabe mit einem Return beendet wird, soll der Button-Click nicht mehr erforderlich sein, usw.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<iframe src="resources/u7_2.html" title="Aufgabe 7.2"></iframe>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 7.2");
}
?>