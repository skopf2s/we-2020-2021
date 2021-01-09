<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u5_2");
}

function getContent($args) {
	return '<h1>Aufgabe 5.2 – Topologische Iterierbarkeit</h1>
	<p><b>Stellen Sie bei Ihrer Klasse aus der letzten Aufgabe die topologische Iterierbarkeit her (zunächst über das Iterationsprotokoll, ohne Generator, ohne yield).</b></p>
	<p><b>Zum Beispiel soll dadurch folgende <code>for ... of loop</code> möglich werden, mit der die Elemente in topologischer Sortierung durchlaufen werden. Wählen Sie eine Implementierung, die universell gültig, also nicht nur für dieses Beispiel gilt.</b></b>
	<p><b>Die topologische Sortierung im Konstruktor vorzuberechnen, wäre eine triviale Lösung, bei der man einfach die Lösung von 4.4 abschreibt. Versuchen Sie stattdessen, erst beim Aufruf von next() die erforderliche Berechnung durchzuführen, allerdings mit minimalem Aufwand.</b></b>
	<p><b>Verwenden Sie so weit wie möglich High-Level-Methoden wie <a href="https://developer.mozilla.org/de/docs/Web/JavaScript/Reference/Global_Objects/Object/keys">Object.keys</a> und High-Level-Datenstrukturen wie <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Map">Map</a> und <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Set">Set</a> und deren Methoden, anstatt mühsam von Hand zu iterieren und zu zählen.</b></b>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>class Vorrang {
	constructor(arr) {
		this.arr = arr;
		this.predecessors = new Map();
		
		for(let i in arr) {
			if(this.predecessors.get(arr[i][0]) == null) {
				this.predecessors.set(arr[i][0], 0);
			}
			
			if(this.predecessors.get(arr[i][1]) == null) {
				this.predecessors.set(arr[i][1], 1);
			} else {
				this.predecessors.set(arr[i][1], this.predecessors.get(arr[i][1])+1);
			}
		}
	}
	
	deleteFromPredecessors(obj) {
		for(let i in this.arr) {
			if(this.arr[i][0] === obj) {
				this.predecessors.set(this.arr[i][1], this.predecessors.get(this.arr[i][1])-1);
			}
		}
		this.predecessors.delete(obj);
	}
	
	getSize() {
		return this.predecessors.size;
	}
	
	[Symbol.iterator]() {
		let superClass = this;
		
		return {next() {
			for(let i of superClass.predecessors) {
				if(i[1] === 0) {
					if(superClass.getSize() > 0) {
						superClass.deleteFromPredecessors(i[0]);
						return {value: i[0], done: false};
					}
					return {value: null, done: true};
				}
			}
			return {value: "Der Graph ist nicht Zyklenfrei", done: true};
		}};
	}
}

const studentenLeben = new Vorrang([ ["schlafen", "studieren"], ["essen", "studieren"], ["studieren", "prüfen"] ]);

const testInArray = ["schlafen", "studieren", "essen", "prüfen"];
var testArraySequence = ["schlafen", "essen", "studieren", "prüfen"];

for(const next of studentenLeben){
	console.assert(testInArray.includes(next));
	console.assert(testArraySequence[0] === next);
	testArraySequence.splice(0, 1);
}</pre>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 5.2");
}
?>