<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: home");
}

function getContent($args) {
	return '<h1>Aufgabe 1.4 – HTML Wireframe</h1>
	<p><b>Mit welchem HTML-Code (ohne CSS, nur mit HTML-Tags) kann man <a href="https://kaul.inf.h-brs.de/we/assets/img/wireframe01.jpg">diesen</a> Wireframe exakt nachbilden?</b></p>
	<p>Der notwendige Code dafür sieht so aus:</p>
	<p><pre>&lt;!DOCTYPE html>
&lt;html>
&lt;head>
	&lt;title>U1.2&lt;/title>
&lt;/head>
&lt;body>
	&lt;h1>Übung 1.2: Inventors of the Web&lt;/h1>
	&lt;ul>
		&lt;li>&lt;mark>&lt;b>&lt;a href="">Tim Berners-Lee:&lt;/a>&lt;/b>&lt;/mark> WWW, HTTP, HTML, URI&lt;/li>
		&lt;li>&lt;b>Hakom Lie and Bert Bos:&lt;/b> CSS&lt;/li>
		&lt;li>&lt;b>Brendan Eich:&lt;/b> JavaScript
	&lt;/ul>
	&lt;hr>
	&lt;br>
	&lt;h2>Inventors of the WWW&lt;/h2>
	&lt;table style="border-width: 15px; border-style: solid; border-color: #AEAEAE #444444 #444444 #AEAEAE;">
		&lt;thead>
			&lt;tr>
			&lt;th colspan="4" style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;">Inventors of the WWW&lt;/th>
			&lt;/tr>
			&lt;tr>
			&lt;th style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;">WWW&lt;/th>
			&lt;th style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;">HTML&lt;/th>
			&lt;th style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;">CSS&lt;/th>
			&lt;th style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;">JavaScript&lt;/th>
			&lt;/tr>
		&lt;/thead>
		&lt;tbody>
			&lt;tr>
			&lt;td style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;">&lt;mark>Tim Berners-Lee&lt;/mark>&lt;/td>
			&lt;td style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;">&lt;mark>Tim Berners-Lee&lt;/mark>&lt;/td>
			&lt;td style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;">Hakom Lie and Ber Bos&lt;/td>
			&lt;td style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;">Brendan Eich&lt;/td>
			&lt;/tr>
		&lt;/body>
	&lt;/table>
	&lt;br>
	&lt;hr>
	&lt;table>
		&lt;caption>&lt;h3>Inventors of the WWW&lt;hr>&lt;h3>&lt;/caption>
		&lt;thead>
			&lt;tr>
			&lt;th>HTML&lt;/th>
			&lt;th>&lt;b>|&lt;/b>&lt;/th>
			&lt;th>JavaScript&lt;/th>
			&lt;/tr>
			&lt;tr>
			&lt;th>&lt;img src="https://kaul.inf.h-brs.de/we/assets/img/tbl.jpg" alt="Tim Berners-Lee" width="176" height="238">&lt;/th>
			&lt;th>&lt;b>|&lt;/b>&lt;/th>
			&lt;th>&lt;img src="https://kaul.inf.h-brs.de/we/assets/img/eich.jpg" alt="Brendan Eich" width="181" height="239">&lt;/th>
			&lt;/tr>
		&lt;/thead>
		&lt;tbody>
			&lt;tr>
			&lt;td>&lt;mark>Tim Berners-Lee&lt;/mark>&lt;/td>
			&lt;td>&lt;b>|&lt;/b>&lt;/td>
			&lt;td>Brendan Eich&lt;/td>
		&lt;/tbody>
	&lt;/table>
	&lt;hr>
&lt;/body>
&lt;/html></pre></p>
	
	<p>Das Ergebnis sieht dann etwa so aus:</p>
	<h1>Übung 1.2: Inventors of the Web</h1>
	<ul>
		<li><mark><b><a href="">Tim Berners-Lee:</a></b></mark> WWW, HTTP, HTML, URI</li>
		<li><b>Hakom Lie and Bert Bos:</b> CSS</li>
		<li><b>Brendan Eich:</b> JavaScript
	</ul>
	<hr>
	<br>
	<h2>Inventors of the WWW</h2>
	<table style="border-width: 15px; border-style: solid; border-color: #AEAEAE #444444 #444444 #AEAEAE;">
		<thead>
			<tr>
			<th colspan="4" style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;">Inventors of the WWW</th>
			</tr>
			<tr>
			<th style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;">WWW</th>
			<th style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;">HTML</th>
			<th style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;">CSS</th>
			<th style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;">JavaScript</th>
			</tr>
		</thead>
		<tbody>
			<tr>
			<td style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;"><mark>Tim Berners-Lee</mark></td>
			<td style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;"><mark>Tim Berners-Lee</mark></td>
			<td style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;">Hakom Lie and Ber Bos</td>
			<td style="border-width: 1px; border-style: solid; border-color: #444444 #AEAEAE #AEAEAE #444444;">Brendan Eich</td>
			</tr>
		</body>
	</table>
	<br>
	<hr>
	<table>
		<caption><h3>Inventors of the WWW<hr><h3></caption>
		<thead>
			<tr>
			<th>HTML</th>
			<th><b>|</b></th>
			<th>JavaScript</th>
			</tr>
			<tr>
			<th><img src="https://kaul.inf.h-brs.de/we/assets/img/tbl.jpg" alt="Tim Berners-Lee" width="176" height="238"></th>
			<th><b>|</b></th>
			<th><img src="https://kaul.inf.h-brs.de/we/assets/img/eich.jpg" alt="Brendan Eich" width="181" height="239"></th>
			</tr>
		</thead>
		<tbody>
			<tr>
			<td><mark>Tim Berners-Lee</mark></td>
			<td><b>|</b></td>
			<td>Brendan Eich</td>
		</tbody>
	</table>
	<hr>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 1.4");
}
?>
