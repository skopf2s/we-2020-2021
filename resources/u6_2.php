<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u6_2");
}

function getContent($args) {
	return '<h1>Aufgabe 6.2 – Textanalyse mit filter-map-reduce</h1>
	<p><b>Schreiben Sie in JavaScript eine Textanalyse. Ermitteln Sie die häufigsten Begriffe im Text <a href="https://kaul.inf.h-brs.de/we/assets/html/plagiatsresolution.html">Plagiatsresolution</a>. Filtern Sie dabei alle <a href="https://de.wikipedia.org/wiki/Stoppwort">Stoppworte</a> und HTML-Tags. Reduzieren Sie das Ergebnis auf die 3 häufigsten Begriffe.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>var stopper = ["ab", "aber", "alle", "allem", "allen", "aller", "allerdings", "als", "also", "am", "an", "andere", "anderem", "anderen", "anderer", "andernfalls", "anders", "andersherum", "anfangs", "anhand", "anschließend", "ansonsten", "anstatt", "auch", "auf", "aufgrund", "aus", "außerdem", "befindet", "bei", "beide", "beim", "beispielsweise", "bereits", "besonders", "besteht", "bestimmte", "bestimmten", "bestimmter", "bevor", "bietet", "bis", "bleiben", "bringen", "bringt", "bsp", "bzw", "d.h", "da", "dabei", "dafür", "daher", "damit", "danach", "dann", "dar", "daran", "darauf", "daraus", "darf", "darstellt", "darüber", "das", "dass", "davon", "dazu", "dem", "demzufolge", "den", "denen", "denn", "der", "deren", "des", "dessen", "desto", "die", "dies", "diese", "diesem", "diesen", "dieser", "dieses", "doch", "dort", "durch", "ebenfalls", "eher", "eigenen", "eigentlich", "ein", "eine", "einem", "einen", "einer", "eines", "einigen", "einiges", "einmal", "einzelnen", "entscheidend", "entweder", "er", "erstmals", "es", "etc", "etwas", "euch", "folgende", "folgendem", "folgenden", "folgender", "folgendes", "folgt", "für", "ganz", "gegen", "gehen", "gemacht", "genannte", "genannten", "gerade", "gerne", "gibt", "gilt", "gleich", "gleichen", "gleichzeitig", "habe", "haben", "hält", "hat", "hatte", "hätte", "hauptsächlich", "her", "heutigen", "hier", "hierbei", "hierfür", "hin", "hingegen", "hinzu", "hoch", "ihn", "ihr", "ihre", "ihren", "ihrer", "im", "immer", "immerhin", "in", "indem", "insgesamt", "ist", "ja", "je", "jede", "jedem", "jeder", "jedes", "jedoch", "jetzt", "jeweilige", "jeweiligen", "jeweils", "kam", "kann", "keine", "kommen", "kommt", "können", "konnte", "könnte", "konnten", "lassen", "lässt", "lautet", "lediglich", "leider", "letztendlich", "letztere", "letzteres", "liegt", "machen", "macht", "mal", "man", "mehr", "mehrere", "meine", "meinem", "meisten", "mich", "mit", "mithilfe", "mittels", "möchte", "möglich", "möglichst", "momentan", "muss", "müssen", "musste", "nach", "nachdem", "nächsten", "nahezu", "nämlich", "natürlich", "neue", "neuen", "nicht", "nichts", "noch", "nun", "nur", "ob", "obwohl", "oder", "oftmals", "ohne", "per", "sämtliche", "scheint", "schon", "sehr", "sein", "seine", "seinem", "seinen", "sich", "sicherlich", "sie", "siehe", "sind", "so", "sobald", "sofern", "solche", "solchen", "soll", "sollen", "sollte", "sollten", "somit", "sondern", "sorgt", "sowie", "sowohl", "später", "sprich", "statt", "trotz", "über", "überhaupt", "um", "und", "uns", "unter", "usw", "viel", "viele", "vielen", "völlig", "vom", "von", "vor", "vorerst", "vorher", "während", "war", "wäre", "waren", "warum", "was", "weil", "weitere", "weiteren", "weiterer", "weiteres", "weiterhin", "welche", "welchen", "welcher", "welches", "wenn", "wer", "werden", "wesentlich", "wichtige", "wichtigsten", "wie", "wieder", "wiederum", "will", "wir", "wird", "wirklich", "wo", "wobei", "worden", "wurde", "wurden", "z.b", "ziemlich", "zu", "zuerst", "zum", "zur", "zusätzlich", "zuvor", "zwar", "zwecks"]; // stoppwords from https://www.pc-erfahrung.de/nebenrubriken/sonstiges/webdesignwebentwicklung/stoppwortliste.html

var xmlHttp = new XMLHttpRequest();
xmlHttp.open("GET", "https://kaul.inf.h-brs.de/we/assets/html/plagiatsresolution.html", false);
xmlHttp.send();

var content = xmlHttp.responseText.replaceAll(/<([^>]*)>/g, "").replaceAll(/\s+/g, " ").replaceAll(/([^a-zA-ZöäüÖÄÜß ])/g, "").trim(); //clean up
var filtered = content.split(" ").filter(x => !stopper.includes(x.toLowerCase()) && x !== ""); // split and filter out stoppwords

// count occurance of each word
var counter = {};
filtered.map(x => {
	if(counter[x] === undefined) {
		counter[x] = 1;
	} else {
		counter[x]++;
	}
});

// Track top three words with most occurances
first = {count: 0, name: ""};
second = {count: 0, name: ""};
third = {count: 0, name: ""};
for(const [key, value] of Object.entries(counter)) {
	if(value > first.count) {
		first.count = value;
		first.name = key;
	} else if(value > second.count) {
		second.count = value;
		second.name = key;
	} else if(value > third.count) {
		third.count = value;
		third.name = key;
	}
}

console.log(first, second, third);

console.assert(first.name === "akademischen");
console.assert(second.name === "Ethos");
console.assert(third.name === "Hochschule");</pre>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 6.2");
}
?>