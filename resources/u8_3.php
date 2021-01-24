<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u8_3");
}

function getContent($args) {
	return '<h1>Aufgabe 8.3 – WWW-Navigator</h1>
	<p><b>Schreiben Sie einen Navigator für die Fachbegriffe des WWW zu den Oberthemen HTML, CSS und JavaScript. Im Hauptmenü sollen diese 3 Oberthemen zur Auswahl stehen. Im Untermenü soll eine zugehörige Liste von Fachbegriffen zum jeweiligen ausgewählten Oberthema stehen. In der Mitte soll eine Dokumentation zum ausgewählten Fachbegriff erscheinen <s>mit Hyperlinks zu den anderen Fachbegriffen. Wird auf einen solchen Hyperlink geklickt, so sollen sich auch die beiden Menüs anpassen. Mit dem Back-Button des Browsers soll ein Zurücksprung möglich sein</s>.</b></p>
	<p><span>Der notwendige Code dafür sieht so aus:</span>
	<pre>&lt;!DOCTYPE HTML>
&lt;html>
&lt;head>
&lt;meta charset="UTF-8"/>
&lt;title>WWW Navi&lt;/title>
&lt;/head>
&lt;body onload="load()">
&lt;div id="frame">
&lt;div id="header">
&lt;h1>WWW-Navigator&lt;/h1>
&lt;div id="navigator">&lt;/div>
&lt;/div>
&lt;div id="dropdown">&lt;/div>
&lt;div id="content">&lt;/div>
&lt;div id="sources">
&lt;div>&lt;h2>Quellen:&lt;/h2>&lt;/div>
&lt;/div>
&lt;div id="footer">
&lt;h1>Footer:&lt;/h1>
&lt;a href="/sitemap">Sitemap&lt;/a>
&lt;a href="/home">Home&lt;/a>
&lt;a href="/news">News&lt;/a>
&lt;a href="/contact">Contact&lt;/a>
&lt;a href="/about">About&lt;/a>
&lt;/div>
&lt;script>
var content = "";

function load() {
	loadNavigator();
	loadDropdown();
	loadContent();
}

async function loadContent() {
	await loadFile();
	
	let urlParams = new URLSearchParams(window.location.search);
	let urlCategory = urlParams.has("category") ? urlParams.get("category") : "html";
	let urlTerm = urlParams.has("term") ? urlParams.get("term") : Object.keys(content[urlCategory])[3];
	
	if(urlParams.has("term")) {
		document.getElementById("content").innerHTML = content[urlCategory][urlParams.get("term")].content;
		
		let list = document.createElement("ul");
		
		content[urlCategory][urlParams.get("term")].references.forEach((reference) => {
			let child = document.createElement("li");
			child.innerHTML = \'&lt;a href="\'+reference+\'">\'+reference+\'&lt;/a>\';
			
			list.appendChild(child);
		});
		
		document.getElementById("sources").appendChild(list);
	} else {
		document.getElementById("content").innerHTML = content[urlCategory].content;
		
		let list = document.createElement("ul");
		
		content[urlCategory].references.forEach((reference) => {
			let child = document.createElement("li");
			child.innerHTML = \'&lt;a href="\'+reference+\'">\'+reference+\'&lt;/a>\';
			
			list.appendChild(child);
		});
		
		document.getElementById("sources").appendChild(list);
	}
}

async function loadDropdown() {
	await loadFile();
	
	let list = document.createElement("ul");
	let urlParams = new URLSearchParams(window.location.search);
	let urlCategory = urlParams.has("category") ? urlParams.get("category") : "html";
	let urlTerm = urlParams.has("term") ? urlParams.get("term") : null;
	
	for(const term of Object.keys(content[urlCategory])) {
		if(content[urlCategory][term].name !== undefined) {
			let child = document.createElement("li");
			child.innerHTML = \'&lt;a href="/u8_3.html?category=\'+urlCategory+\'&term=\'+term+\'">\'+content[urlCategory][term].name+\'&lt;/a>\';
			
			if(term === urlTerm) {
				child.classList.add("active");
			}
			
			list.appendChild(child);
		}
	}
	
	document.getElementById("dropdown").appendChild(list);
}

async function loadFile() {
	if(typeof content !== \'object\') {
		var headers = new Headers();
		headers.append(\'pragma\', \'no-cache\');
		headers.append(\'cache-control\', \'no-cache\');
		headers.append(\'mode\', \'cors\');
		headers.append(\'Content-Type\', \'text/json; charset=UTF-8\');
		content = JSON.parse(await fetch("u8_3.json", {method: \'GET\', headers: headers}).then(content => content.text()));
	}
}

async function loadNavigator() {
	await loadFile();
	
	let list = document.createElement("ul");
	let urlParams = new URLSearchParams(window.location.search);
	let urlCategory = urlParams.has("category") ? urlParams.get("category") : "html";
	let urlTerm = urlParams.has("term") ? urlParams.get("term") : Object.keys(content[urlCategory])[3];
	
	for(const category of Object.keys(content)) {
		let child = document.createElement("li");
		child.innerHTML = \'&lt;a href="/u8_3.html?category=\'+category+\'">\'+content[category].name+\'&lt;/a>\';
		
		if(category === urlCategory) {
			child.classList.add("active");
		}
		
		list.appendChild(child);
	}
	
	document.getElementById("navigator").appendChild(list);
}
&lt;/script>
&lt;style>
#frame {
	display: grid;
}

#frame div:first-child {
	border-top-left-radius: 20px;
	border-top-right-radius: 20px;
}

#frame div:nth-child(5) {
	border-bottom-left-radius: 20px;
	border-bottom-right-radius: 20px;
}

#header {
	background: #C24F4F;
}

#header h1 {
	text-align: center;
	color: #FFFFFF;
}

#navigator li {
	display: inline;
	margin-right: 20px;
	padding: 5px 20px 5px 20px;
	background: #6A70A0;
	border-width: 5px;
	border-style: solid;
	border-color: #EEEEEE #9A9A9A #9A9A9A #EEEEEE;
	border-radius: 20px;
}

#dropdown li {
	margin-top: 10px;
	margin-right: 20px;
	padding: 5px 20px 5px 20px;
	background: #6A70A0;
	border-width: 5px;
	border-style: solid;
	border-color: #EEEEEE #9A9A9A #9A9A9A #EEEEEE;
	border-radius: 20px;
}

#dropdown ul {
	list-style: none;
}

.active {
	background: #E1DCDA !important;
}

#dropdown, #sources {
	background: #C28283;
}

#content {
	background: #95D2F3;
	padding: 10px;
}

#sources h2 {
	margin: 10px;
}

#footer, #footer a {
	background: #000000;
	color: #FFFFFF;
	text-align: center;
}

#footer a {
	margin: 10px;
}

#footer h1 {
	display: inline;
}

@media only screen and (min-width: 721px) {
	#frame {
		grid-template-rows: auto auto auto;
		grid-template-columns: 20% 50% 30%;
	}
	
	#frame div:first-child, #frame div:nth-child(5) {
		grid-column-end: span 3;
	}
}

@media only screen and (max-width: 720px) {
	#frame {
		grid-template-rows: auto auto;
		grid-template-columns: 30% 70%;
	}
	
	#frame div:first-child, #frame div:nth-child(4), #frame div:nth-child(5) {
		grid-column-end: span 3;
	}
}
&lt;/style>
&lt;/body>
&lt;/html></pre>
	</p>
	<p><span>Das Ergebnis sieht dann etwa so aus:</span>
	<iframe src="resources/u8_3/u8_3.html" title="Aufgabe 8.3"></iframe>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 8.3");
}
?>