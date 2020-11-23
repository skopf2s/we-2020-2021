<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: home");
}

function getContent($args) {
	return '<h1>Aufgabe 2.2 – CSS Positionierung</h1>
	<p><b>Schauen Sie sich <a href="https://www.youtube.com/watch?v=HVmnv3k4__E">folgendes Video</a> an und bauen Sie das dynamische Verhalten exakt nach (nur mit HTML und CSS, ohne JavaScript)</b></p>
	<p>Der notwendige Code dafür sieht so aus:</p>
	<p><pre>&lt;!DOCTYPE html>
&lt;html>
&lt;head>
&lt;style>
img {
	width: 100%;
	height: auto;
}

.box {
	width: auto;
	min-width: 480px;
	border: 1px solid #000000;
	padding: 5px;
}

.picture {
	visibility: hidden;
}

#check:checked ~ .box > .picture {
	visibility: visible;
}
&lt;/style>
&lt;/head>
&lt;body>
&lt;h1>Übung 2.2&lt;/h1>
&lt;input id="check" type="checkbox" checked /> &lt;label for="check">hide and show via checkbox&lt;/label>
&lt;div class="box">
&lt;img class="picture" src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Hochschule_Bonn-Rhein-Sieg_Wolfgang_G%C3%B6ddertz_Induktion.jpg" alt="Hochschule Bonn-Rhein-Sieg Wolfgang Göddertz Induktion" width="4592" height="3056"/>
&lt;/div>
&lt;/body>
&lt;/html></pre></p>
	<p>Das Ergebnis sieht dann etwa so aus:</p>
	<div class="solution-only">
	<h1>Übung 2.2</h1>
<input id="check" type="checkbox" checked /> <label for="check">hide and show via checkbox</label>
<div class="box">
<img class="picture" src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Hochschule_Bonn-Rhein-Sieg_Wolfgang_G%C3%B6ddertz_Induktion.jpg" alt="Hochschule Bonn-Rhein-Sieg Wolfgang Göddertz Induktion" width="4592" height="3056"/>
</div>
</div>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 2.2",
	"style"=>".solution-only img {
	width: 100%;
	height: auto;
}

.solution-only .box {
	width: auto;
	min-width: 480px;
	border: 1px solid #000000;
	padding: 5px;
}

.solution-only .picture {
	visibility: hidden;
}

.solution-only #check:checked ~ .box > .picture {
	visibility: visible;
}");
}
?>
