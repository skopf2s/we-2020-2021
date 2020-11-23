<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: home");
}

function getContent($args) {
	return '<h1>Aufgabe 2.3 – Wireframe with HTML and CSS</h1>
	<p><b>Mit welchem HTML- und CSS-Code kann man <a href="https://kaul.inf.h-brs.de/we/assets/img/survey.png">diesen</a> Wireframe exakt nachbilden? Schreiben Sie Ihren CSS-Code direkt in die HTML-Datei.</b></p>
	<p>Der notwendige Code dafür sieht so aus:</p>
	<p><pre>&lt;!DOCTYPE html>
&lt;html>
&lt;head>
&lt;style>
body {
	background: #b2d6d1;
}

h1 {
	text-align: center;
}

table {
	width: 100%;
}

td {
	width: 50%;
	padding: 5px;
	vertical-align: top;
}

td:first-child {
	text-align: right;
}

td:last-child {
	text-align: left;
}

#content {
	background: #FFFFFF;
	text-align: center;
	margin-left: auto;
	margin-right: auto;
	width: 90%;
	padding: 10px;
}

#selector {
	display: none;
}
&lt;/style>
&lt;/head>
&lt;body>
&lt;h1>Survey Form&lt;/h1>
&lt;div id="content">
&lt;form action="action.file">
&lt;table>
&lt;caption>Let us know how we can improve freeCodeCamp&lt;/caption>
&lt;tbody>
&lt;tr>
&lt;td>* Name:&lt;/td>
&lt;td>&lt;input type="text" name="name" placeholder="Enter your name" required />&lt;/td>
&lt;/tr>
&lt;tr>
&lt;td>* Email:&lt;/td>
&lt;td>&lt;input type="email" name="mail" placeholder="Enter your email" required />&lt;/td>
&lt;/tr>
&lt;tr>
&lt;td>* Age:&lt;/td>
&lt;td>&lt;input type="number" name="age" placeholder="Age" required />&lt;/td>
&lt;/tr>
&lt;tr>
&lt;td>Which option best describes your current role?&lt;/td>
&lt;td>&lt;select name="role">&lt;option>Guest&lt;/option>&lt;option selected>Student&lt;/option>&lt;option>Teacher&lt;/option>&lt;/select>&lt;/td>
&lt;/tr>
&lt;tr>
&lt;td>* How likely is that you would recommend freeCodeCamp to a friend?&lt;/td>
&lt;td>&lt;label>&lt;input type="radio" name="recommendation" value="definitely" required /> Definitely&lt;/label>&lt;br />&lt;label>&lt;input type="radio" name="recommendation" value="maybe" required /> Maybe&lt;/label>&lt;br />&lt;label>&lt;input type="radio" name="recommendation" value="not" required /> Not sure&lt;/label>
&lt;/tr>
&lt;tr>
&lt;td>What do you like most in FCC:&lt;/td>
&lt;td>&lt;select name="like">&lt;option id="selector" selected disabled>Select an option&lt;/option>&lt;option>This could be an option&lt;/option>&lt;option>This could be another option&lt;/option>&lt;option>Your ad here!&lt;/option>&lt;option>Please don\'t make me write more options&lt;/option>&lt;/select>
&lt;/tr>
&lt;tr>
&lt;td>Things that should be improved in the future (Check all that apply):&lt;/td>
&lt;td>&lt;label>&lt;input type="checkbox" name="front" /> Front-end Projects&lt;/label>&lt;br />&lt;label>&lt;input type="checkbox" name="back" /> Back-end Projects&lt;/label>&lt;br />&lt;label>&lt;input type="checkbox" name="data" /> Data Visualization&lt;/label>&lt;/td>
&lt;/tr>
&lt;/tbody>
&lt;/table>
&lt;/form>
&lt;/div>
&lt;/body>
&lt;/html></pre></p>
	<p>Das Ergebnis sieht dann etwa so aus:</p>
	<div class="solution-only">
	<h1>Survey Form</h1>
<div id="content">
<form action="action.file">
<table>
<caption>Let us know how we can improve freeCodeCamp</caption>
<tbody>
<tr>
<td>* Name:</td>
<td><input type="text" name="name" placeholder="Enter your name" required /></td>
</tr>
<tr>
<td>* Email:</td>
<td><input type="email" name="mail" placeholder="Enter your email" required /></td>
</tr>
<tr>
<td>* Age:</td>
<td><input type="number" name="age" placeholder="Age" required /></td>
</tr>
<tr>
<td>Which option best describes your current role?</td>
<td><select name="role"><option>Guest</option><option selected>Student</option><option>Teacher</option></select></td>
</tr>
<tr>
<td>* How likely is that you would recommend freeCodeCamp to a friend?</td>
<td><label><input type="radio" name="recommendation" value="definitely" required /> Definitely</label><br /><label><input type="radio" name="recommendation" value="maybe" required /> Maybe</label><br /><label><input type="radio" name="recommendation" value="not" required /> Not sure</label>
</tr>
<tr>
<td>What do you like most in FCC:</td>
<td><select name="like"><option id="selector" selected disabled>Select an option</option><option>This could be an option</option><option>This could be another option</option><option>Your ad here!</option><option>Please don\'t make me write more options</option></select>
</tr>
<tr>
<td>Things that should be improved in the future (Check all that apply):</td>
<td><label><input type="checkbox" name="front" /> Front-end Projects</label><br /><label><input type="checkbox" name="back" /> Back-end Projects</label><br /><label><input type="checkbox" name="data" /> Data Visualization</label></td>
</tr>
</tbody>
</table>
</form>
</div>
</div>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 2.3",
	"style"=>".solution-only body {
	background: #b2d6d1;
}

.solution-only h1 {
	text-align: center;
}

.solution-only table {
	width: 100%;
}

.solution-only td {
	width: 50%;
	padding: 5px;
	vertical-align: top;
}

.solution-only td:first-child {
	text-align: right;
}

.solution-only td:last-child {
	text-align: left;
}

.solution-only #content {
	background: #FFFFFF;
	text-align: center;
	margin-left: auto;
	margin-right: auto;
	width: 90%;
	padding: 10px;
}

.solution-only #selector {
	display: none;
}");
}
?>
