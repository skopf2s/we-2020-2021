<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u5_1");
}

function getContent($args) {
	return '<h1>Aufgabe 5.1 – Klasse für Vorrangrelationen</h1>
	<p><b>Schreiben Sie eine ES6-Klasse <code>Vorrang</code> für Vorrangrelationen, z.B. <code>new Vorrang([ ["schlafen", "studieren"], ["essen", "studieren"], ["studieren", "prüfen"] ])</code>. Wählen Sie eine Implementierung, die universell gültig, also nicht nur für dieses Beispiel gilt. (Überlegen Sie sich, über welche Properties und Methoden eine solche Klasse verfügen sollte und wie TopSort hier hinein spielt. Topologische Iterierbarkeit und topologischer Generator sind jedoch Gegenstand der nächsten Übungen weiter unten auf diesem Übungsblatt und sollten für diese Aufgaben aufgespart werden.)</b></p>
	<p><b>Verwenden Sie die neuen Sprach-Konzepte aus der Vorlesung so weit wie möglich.</b></b>
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
}</pre>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 5.1");
}
?>