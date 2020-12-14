<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: home");
}

function getContent($args) {
	return '<h1>Aufgabe 4.4 – Topsort</h1>
	<p><b>In jedem Projekt fallen Aufgaben (Tasks) an. Zwischen den Aufgaben gibt es paarweise Abhängigkeiten. Z.B. kann Task2 von Task1 abhängen, d.h. erst muss Task1 fertig sein, bevor Task2 starten kann, weil es dessen Ergebnisse benötigt. Tasks können auch unabhängig voneinander sein und parallel ablaufen. In JavaScript können Sie die Abhängigkeiten in Arrays codieren, z.B. kann man bei <code>[ ["schlafen", "studieren"], ["essen", "studieren"], ["studieren", "prüfen"] ]</code> nicht prüfen, ohne vorher gegessen zu haben. Transitive Abhängigkeiten müssen also berücksichtigt werden.</b></p>
	<p><b>Schreiben Sie in JavaScript eine Funktion <code>topsort()</code>, die eine <a href="https://de.wikipedia.org/wiki/Topologische_Sortierung">topologische Sortierung</a> berechnet.</b></p>
	<p><b>Achten Sie auf Performanz. Berechnen Sie die topologische Sortierung in <a href="https://de.wikipedia.org/wiki/Topologische_Sortierung#Gesamtverhalten">linearer Zeit</a> (Average Case).</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>&lt;!DOCTYPE html>
&lt;html>
&lt;head>
&lt;meta charset="UTF-8"/>
&lt;/head>
&lt;body>
&lt;div id="content">&lt;/div>
&lt;script type="text/javascript">
function topsort(arr) {
	var length = 0;
	var predecessors = {};
	var sortedArray = [];
	
	for(var i in arr) {
		if(predecessors[arr[i][0]] == null) {
			predecessors[arr[i][0]] = 0;
			length++;
		}
		
		if(predecessors[arr[i][1]] == null) {
			predecessors[arr[i][1]] = 1;
			length++;
		} else {
			predecessors[arr[i][1]]++;
		}
	}
	
	while(length > 0) {
		for(var i in predecessors) {
			if(predecessors[i] === 0) {
				sortedArray.push(i);
				
				for(var j in arr) {
					if(arr[j][0] === i) {
						predecessors[arr[j][1]]--;
					}
				}
				
				delete predecessors[i];
				length--;
			}
		}
	}
	
	return sortedArray;
}

function pageContent() {
	return document.getElementById("content").innerHTML+"&lt;br />";
}

document.getElementById("content").innerHTML = topsort([ ["schlafen", "studieren"], ["essen", "studieren"], ["studieren", "prüfen"] ]).toString();
document.getElementById("content").innerHTML = pageContent()+topsort([ ["katze", "hund"], ["hahn", "katze"], ["hund", "esel"] ]).toString();
&lt;/script>
&lt;/body>
&lt;/html></pre>
	</p>
	
	<p><b>Testen Sie Ihren JavaScript-Code. Verwenden Sie für Ihre Tests die Funktion <a href="https://developer.mozilla.org/de/docs/Web/API/Console/assert">console.assert</a>.</b></p>
	
	<p>
	<pre>var got = topsort([ ["schlafen", "studieren"], ["essen", "studieren"], ["studieren", "prüfen"] ])[2];
var expected = "studieren";
console.log(got);
console.assert(got === expected, {expected: expected, got: got});

var got = topsort([ ["schlafen", "studieren"], ["essen", "studieren"], ["studieren", "prüfen"] ])[1];
var expected = "studieren";
console.log(got);
console.assert(got === expected, {expected: expected, got: got});

var got = topsort([ ["katze", "hund"], ["hahn", "katze"], ["hund", "esel"] ])[3];
var expected = "esel";
console.log(got);
console.assert(got === expected, {expected: expected, got: got});

var got = topsort([ ["katze", "hund"], ["hahn", "katze"], ["hund", "esel"] ])[1];
var expected = "esel";
console.log(got);
console.assert(got === expected, {expected: expected, got: got});</pre>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 4.4");
}
?>