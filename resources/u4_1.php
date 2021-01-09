<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u4_1");
}

function getContent($args) {
	return '<h1>Aufgabe 4.1 – Funktionen</h1>
	<p><b>Schreiben Sie eine Funktion <code>identity()</code>, die ein Argument als Parameter entgegen nimmt und dieses als Ergebnis zurück gibt.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function identity(arg) {
	return arg;
}</pre>
	</p>
	
	<p><b>Schreiben Sie eine Funktion <code>identity_function()</code>, die ein Argument als Parameter entgegen nimmt und eine Funktion zurück gibt, die dieses Argument zurück gibt.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function identity_function(arg) {
	return (function() {
		return arg;
	});
}</pre>
	</p>
	
	<p><b>Schreiben Sie zwei binäre Funktionen <code>add</code> und <code>mul</code>, die Summe und Produkt berechnen.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function add(x, y) {
	return x+y;
}

function mul(x, y) {
	return x*y;
}</pre>
	</p>
	
	<p><b>Schreiben Sie eine Addier-Funktion <code>addf()</code>, so dass <code>addf(x)(y)</code> genau <code>x + y</code> zurück gibt. (Es haben also zwei Funktionsaufrufe zu erfolgen. <code>addf(x)</code> liefert eine Funktion, die auf <code>y</code> angewandt wird.)</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function addf(x) {
	return (function(y) {
		return x+y;
	});
}</pre>
	</p>
	
	<p><b>Schreiben Sie eine Funktion <code>applyf()</code>, die aus einer binären Funktion wie <code>add(x,y)</code> eine Funktion <code>addf</code> berechnet, die mit zwei Aufrufen das gleiche Ergebnis liefert, z.B. <code>addf = applyf(add); addf(x)(y)</code> soll <code>add(x,y)</code> liefern. Entsprechend <code>applyf(mul)(5)(6)</code> soll <code>30</code> liefern, wenn <code>mul</code> die binäre Multiplikation ist.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function applyf(func) {
	return (function(x) {
		return (function(y) {
			return func(x, y);
		});
	});
}</pre>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 4.1");
}
?>