<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u5_3");
}

function getContent($args) {
	return '<h1>Aufgabe 5.3 – Topologischer Generator</h1>
	<p><b>Stellen Sie bei Ihrer Klasse aus der vorletzten Aufgabe die topologische Iterierbarkeit mittels Generator her.</b></p>
	<p><b>Wählen Sie eine Implementierung, die universell gültig, also nicht nur für das Beispiel gilt.</b></b>
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
	
	* gen() {
		while(this.getSize() > 0) {
			for(let i of this.predecessors) {
				if(i[1] === 0) {
					this.deleteFromPredecessors(i[0]);
					yield i[0];
				}
			}
		}
	}
}

const studentenLeben = new Vorrang([ ["schlafen", "studieren"], ["essen", "studieren"], ["studieren", "prüfen"] ]);

const testInArray = ["schlafen", "studieren", "essen", "prüfen"];
var testArraySequence = ["schlafen", "essen", "studieren", "prüfen"];

for(const next of studentenLeben.gen()) {
	console.assert(testInArray.includes(next));
	console.assert(testArraySequence[0] === next);
	testArraySequence.splice(0, 1);
}</pre>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 5.3");
}
?>