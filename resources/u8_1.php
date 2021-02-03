<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u8_1");
}

function getContent($args) {
	return '<h1>Aufgabe 8.1 – Promises</h1>
	<p><b>Erstellen Sie auf Ihrem Server www2.inf.h-brs.de (oder localhost) zwei Text-Dateien A.txt und B.txt mit ungefähr gleich vielen Zeilen. Laden Sie mit der fetch-API parallel beide Text-Dateien vom Server. Geben Sie auf einer Webseite den Inhalt beider Dateien zeilenweise aus, wobei der Anfang der Zeile aus A.txt und das Ende aus B.txt stammen soll. Die beiden Dateien sollen also zeilenweise konkateniert werden. Erzielen Sie max. Geschwindigkeit durch maximale Parallelität. Achten Sie gleichzeitig auf Korrektheit. Verwenden Sie dabei ausschließlich die Promise API ohne async / await.</b></p>
	<p><span>Der notwendige Code dafür sieht so aus:</span>
	<pre>&lt;!DOCTYPE HTML>
&lt;html>
&lt;meta charset="UTF-8"/>
&lt;head>
&lt;/head>
&lt;body>
&lt;script type="text/javascript">
function multiFetch() {
	const list1 = fetch("A.txt").then(content => content.text());
	const list2 = fetch("B.txt").then(content => content.text());
	
	Promise.all([list1, list2]).then(([file1, file2]) => {
		const lines1 = file1.split("\r\n");
		const lines2 = file2.split("\r\n");
		
		Array.prototype.forEach.call(lines1, ((value, index) => {
			document.getElementById("output").innerHTML = document.getElementById("output").innerHTML+value+" ist das Pokémon mit der Nummer "+lines2[index]+"&lt;br />";
			
		}));
	});
}

multiFetch();
&lt;/script>
&lt;div id="output">
&lt;/div>
&lt;/body>
&lt;/html></pre>
	</p>
	<p><span>Das Ergebnis sieht dann etwa so aus:</span>
	<iframe src="resources/u8_1.html" title="Aufgabe 8.1"></iframe>
	</p>
	<p>Namen und Nummern von Pokémon aus <a href="https://www.pokewiki.de/index.php?title=Vorlage:Namenr&action=edit">https://www.pokewiki.de/Vorlage:Namenr</a></p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 8.1");
}
?>