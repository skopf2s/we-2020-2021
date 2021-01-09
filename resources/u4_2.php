<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u4_2");
}

function getContent($args) {
	return '<h1>Aufgabe 4.2 – Objekte</h1>
	<p><b>Schreiben Sie die Prototypen Person und Auto in JavaScript, so dass jede Person weiß, welche Autos sie besitzt. Schreiben Sie eine Funktion <code>conflict()</code>, die feststellt, ob ein Auto von mehr als einer Person besessen wird.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>var Auto = {
	setOwner: function(owner) {
		this.owners.push(owner);
	},
	toString: function() {
		return this.name+" hat mehr als einen Besitzer";
	}
}

var Person = {
	setAutos: function(autos) {
		this.autos = autos;
		for(auto in autos) {
			autos[auto].setOwner(this.name);
		}
	},
	addAuto: function(auto) {
		this.autos.push(auto);
		auto.setOwner(this);
	},
	getAutos: function() {
		return this.autos;
	}
};

function conflict(autos) {
	for(a in autos) {
		if(autos[a].owners.length > 1) {
			console.log(autos[a].toString());
		}
	}
}

var mercedes = {__proto__: Auto, name: "Mercedes", owners: []};
var audi = {__proto__: Auto, name: "Audi", owners: []};
var ford = {__proto__: Auto, name: "Ford", owners: []};

var max = {
	__proto__: Person,
	name: "Max"
};
max.setAutos([mercedes, audi]);

var moritz = {
	__proto__: Person,
	name: "Moritz"
};
moritz.setAutos([audi, ford]);

conflict([mercedes, audi, ford]);</pre>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 4.2");
}
?>