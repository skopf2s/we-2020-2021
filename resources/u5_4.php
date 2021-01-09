<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u5_4");
}

function getContent($args) {
	return '<h1>Aufgabe 5.4 – Proxy</h1>
	<p><b>Erweitern Sie Ihre Vorrang-Klasse um Logging, indem Sie ein <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Proxy">Proxy</a> einfügen. Lassen Sie sich vom Logger bei jedem Schritt ausgeben, wie viele der Vorrangrelationen noch übrig bleiben. Verwenden Sie so weit wie möglich High-Level-Methoden wie <a href="https://developer.mozilla.org/de/docs/Web/JavaScript/Reference/Global_Objects/Object/keys">Object.keys</a> und High-Level-Datenstrukturen wie <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Map">Map</a> und <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Set">Set</a> und deren Methoden, anstatt mühsam von Hand zu iterieren und zu zählen.</b></b>
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
	
	* gen(arg) {
		while(arg.getSize() > 0) {
			for(let i of arg.predecessors) {
				if(i[1] === 0) {
					arg.deleteFromPredecessors(i[0]);
					yield i[0];
				}
			}
		}
	}
}

const studentenLeben = new Vorrang([ ["schlafen", "studieren"], ["essen", "studieren"], ["studieren", "prüfen"] ]);

const testInArray = ["schlafen", "studieren", "essen", "prüfen"];
var testArraySequence = ["schlafen", "essen", "studieren", "prüfen"];

const generatorProxy = new Proxy(studentenLeben.gen, {
	apply(target, thisArg, argumentList) {
		console.log(studentenLeben.getSize());
		return target(studentenLeben);
	}
});

while(true) {
	out = generatorProxy().next();
	if(out["done"] !== false) {
		break;
	}
	console.assert(testInArray.includes(out["value"]));
	console.assert(testArraySequence[0] === out["value"]);
	testArraySequence.splice(0, 1);
}</pre>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 5.4");
}
?>