<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u3_1");
}

function getContent($args) {
	return '<h1>Aufgabe 3.1 – Responsiv mit Flexbox Desktop-First</h1>
	<p><b>Spielen Sie zunächst das Flexbox Froggy-Spiel, um Flexbox zu lernen. Implementieren Sie dann ausschließlich mit HTML und CSS Flexbox <a href="https://kaul.inf.h-brs.de/we/assets/img/holy-grail1.png">folgendes</a> responsive Webdesign nach der Desktop-First-Strategie!</b></p>
	<p>Der notwendige Code dafür sieht so aus:</p>
	<p><pre>&lt;!DOCTYPE html>
&lt;html>
&lt;head>
&lt;style>
body {
	display: flex;
	flex-wrap: wrap;
}

#p1 {
	background: #FF2500;
}

#p2 {
	background: #2CEE27;
}

#p3 {
	background: #0533FF;
}

#p4 {
	background: #EA3EFE;
}

@media only screen and (min-width: 721px) {
	#p1 {
		width: 100%;
	}

	#p2 {
		width: 25%;
	}

	#p3 {
		width: 50%;
	}

	#p4 {
		width: 25%;
	}
}

@media only screen and (max-width: 720px) and (min-width: 481px) {
	#p1 {
		width: 100%;
	}
	
	#p2 {
		width: 50%;
	}
	
	#p3 {
		width: 50%;
	}
	
	#p4 {
		width: 100%;
	}
}

@media only screen and (max-width: 480px) {
	#p1, #p2, #p3, #p4 {
		width: 100%;
	}
}
&lt;/style>
&lt;/head>
&lt;body>
&lt;div id="p1">
Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
&lt;/div>
&lt;div id="p2">
Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
&lt;/div>
&lt;div id="p3">
Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
&lt;/div>
&lt;div id="p4">
Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
&lt;/div>
&lt;/body>
&lt;/html></pre></p>
	<p>Das Ergebnis sieht dann etwa so aus:</p>
	<iframe src="resources/u3_1.html" title="Aufgabe 3.1"></iframe>
	<p>Lorem Ipsum von <a href="https://loremipsum.de/">https://loremipsum.de/</a>.</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 3.1");
}
?>