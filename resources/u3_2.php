<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: home");
}

function getContent($args) {
	return '<h1>Aufgabe 3.2 – Responsiv mit Grid Mobile-First</h1>
	<p><b>Spielen Sie zunächst das Grid Garden-Spiel, um Grid Layout zu lernen. Implementieren Sie dann das gleiche responsive Webdesign wie in <a href="u3_1">Aufgabe 3.1</a> allerdings mit Grid und der Mobile-First-Strategie! Vermeiden Sie diesmal außerdem das Erscheinen von Scrollbars.</b></p>
	<p>Der notwendige Code dafür sieht so aus:</p>
	<p><pre>&lt;!DOCTYPE html>
&lt;html>
&lt;head>
&lt;style>
body {
	display: grid;
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

@media only screen and (max-width: 480px) {
	body {
		grid-template-rows: 1fr 1fr 1fr 1fr;
	}
}

@media only screen and (min-width: 481px) and (max-width: 720px) {
	body {
		grid-template-rows: auto auto auto;
		grid-template-columns: 50% 50%;
	}
	
	#p1 {
		grid-column-end: span 2;
	}
	
	#p2 {
		grid-row-start: 2;
	}
	
	#p3 {
		grid-row-start: 2;
	}
	
	#p4 {
		grid-row-start: 3;
		grid-column-end: span 2;
	}
}

@media only screen and (min-width: 721px) {
	body {
		grid-template-rows: auto auto;
		grid-template-columns: 25% 50% 25%;
	}
	
	#p1 {
		grid-column-end: span 4;
	}
	
	#p2 {
		grid-row-start: 2;
	}
	
	#p3 {
		grid-row-start: 2;
	}
	
	#p3 {
		grid-row-start: 2;
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
	<div class="solution-only">
	<div id="solution-body">
<div id="p1">
Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
</div>
<div id="p2">
Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
</div>
<div id="p3">
Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
</div>
<div id="p4">
Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
</div>
</div>
</div>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 3.2",
	"style"=>".solution-only #solution-body {
	display: grid;
}

.solution-only #p1 {
	background: #FF2500;
}

.solution-only #p2 {
	background: #2CEE27;
}

.solution-only #p3 {
	background: #0533FF;
}

.solution-only #p4 {
	background: #EA3EFE;
}

@media only screen and (max-width: 480px) {
	.solution-only #solution-body {
		grid-template-rows: 1fr 1fr 1fr 1fr;
	}
}

@media only screen and (min-width: 481px) and (max-width: 720px) {
	.solution-only #solution-body {
		grid-template-rows: auto auto auto;
		grid-template-columns: 50% 50%;
	}
	
	.solution-only #p1 {
		grid-column-end: span 2;
	}
	
	.solution-only #p2 {
		grid-row-start: 2;
	}
	
	.solution-only #p3 {
		grid-row-start: 2;
	}
	
	.solution-only #p4 {
		grid-row-start: 3;
		grid-column-end: span 2;
	}
}

@media only screen and (min-width: 721px) {
	.solution-only #solution-body {
		grid-template-rows: auto auto;
		grid-template-columns: 25% 50% 25%;
	}
	
	.solution-only #p1 {
		grid-column-end: span 4;
	}
	
	.solution-only #p2 {
		grid-row-start: 2;
	}
	
	.solution-only #p3 {
		grid-row-start: 2;
	}
	
	.solution-only #p3 {
		grid-row-start: 2;
	}
}");
}
?>