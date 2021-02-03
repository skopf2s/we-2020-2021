<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u8_2");
}

function getContent($args) {
	return '<h1>Aufgabe 8.2 – async / await</h1>
	<p><b>Lösen Sie die <a href="u8_1">letzte Aufgabe</a> mit async / await statt Promise.</b></p>
	<p><span>Der notwendige Code dafür sieht so aus:</span>
	<pre>&lt;!DOCTYPE HTML>
&lt;html>
&lt;meta charset="UTF-8"/>
&lt;head>
&lt;/head>
&lt;body>
&lt;script type="text/javascript">
async function multiFetch() {
	const [file1, file2] = await Promise.all([
		fetch("A.txt").then(content => content.text()),
		fetch("B.txt").then(content => content.text())
	]);
	
	lines1 = file1.split("\r\n");
	lines2 = file2.split("\r\n");
	
	Array.prototype.forEach.call(lines1, ((value, index) => {
		document.getElementById("output").innerHTML = document.getElementById("output").innerHTML+value+" ist das Pokémon mit der Nummer "+lines2[index]+"&lt;br />";
	}));
}

multiFetch();
&lt;/script>
&lt;div id="output">
&lt;/div>
&lt;/body>
&lt;/html></pre>
	</p>
	<p><span>Das Ergebnis sieht dann etwa so aus:</span>
	<iframe src="resources/u8_2.html" title="Aufgabe 8.2"></iframe>
	</p>
	<p>Namen und Nummern von Pokémon aus <a href="https://www.pokewiki.de/index.php?title=Vorlage:Namenr&action=edit">https://www.pokewiki.de/Vorlage:Namenr</a></p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 8.2");
}
?>