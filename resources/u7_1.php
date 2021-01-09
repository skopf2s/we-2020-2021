<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u7_1");
}

function getContent($args) {
	return '<h1>Aufgabe 7.1 – Performanzmessungen von DOM-Operationen</h1>
	<p><b>Implementieren Sie Performanzmessungen zum Vergleich von <code>innerHTML</code>, <code>innerText</code>, <code>textContent</code> und <code>outerHTML</code> selbstständig in JavaScript durch Nutzung der <a href="https://www.w3schools.com/js/js_htmldom.asp">DOM API</a>. Geben Sie die Messergebnisse als Tabelle aus. Verwenden Sie die eingebauten Zeitmess-Funktionen <a href="https://developer.mozilla.org/en-US/docs/Web/API/Performance/now">performance.now()</a>, siehe auch <a href="https://developers.google.com/web/updates/2012/08/When-milliseconds-are-not-enough-performance-now">When-milliseconds-are-not-enough-performance-now</a>. Suchen Sie eine möglichst kurze und elegante Lösung.</b></p>
	<p><b>Dabei ist zu beachten, dass Browser, um potenzielle Sicherheitsbedrohungen wie <a href="https://spectreattack.com/">Spectre</a> oder <a href="https://de.wikipedia.org/wiki/Meltdown_(Sicherheitsl%C3%BCcke)">Meltdown</a> zu minimieren, den zurückgegebenen Wert normalerweise um einen bestimmten Betrag runden. Dies führt zu einer gewissen Ungenauigkeit. Beispielsweise rundet Firefox die zurückgegebene Zeit in Schritten von 1 Millisekunde. Diese Zwangsrundung kann man jedoch wiederum abschalten mittels Firefox setting <code>privacy.reduceTimerPrecision</code>, siehe <a href="https://stackoverflow.com/questions/50117537/how-to-get-microsecond-timings-in-javascript-since-spectre-and-meltdown">How to get microsecond timings in JavaScript since Spectre and Meltdown</a>.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<iframe src="resources/u7_1.html" title="Aufgabe 7.1"></iframe>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 7.1");
}
?>