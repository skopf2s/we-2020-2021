<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u10_3");
}

function getContent($args) {
	return '<h1>Aufgabe 10.3 – WWW-Navigator zum Content-Editor ausbauen</h1>
	<p><b>Bauen Sie Ihren WWW-Navigator zum Content-Editor aus, mit dem Sie weitere Inhalte hinzu fügen können, die persistent auf dem Server mittels PHP gespeichert werden. Schreiben Sie Ihre PHP-Scripte so, dass es zu keinen Nebenläufigkeitsartefakten kommen kann, egal wie viele Nutzer gleichzeitig editieren und speichern.</b></p>
	<p><b>Speichern Sie die Inhalte Ihres WWW-Navigators auf dem Server www2.inf.h-brs.de. Erweitern Sie Ihren WWW-Navigator um eine Edit-Funktionalität, so dass Inhalte editiert und ergänzt werden können. Vermeiden Sie die <a href="https://de.wikipedia.org/wiki/Verlorenes_Update">Lost Update</a>-Anomalie.</b></p>
	<p><b>Schützen Sie Ihre Inhalte mit einem Login.</b></p>
	<p><span>Der Code dafür ist in mehrere Dateien unterteilt, wobei auch die Ergebnisse von <a href="u10_1">Aufgabe 1</a> und <a href="u10_2">Aufgabe 2</a> benötigt wird. Der Code könnte dann etwa so aussehen:</span></p>
	
	<p>
	<b>u10_3_solution.php</b>
	<pre>&lt;?php
session_start();
include("u10_3_library.php");
ini_set(\'display_errors\', 0);
?>
&lt;!DOCTYPE HTML>
&lt;html>
&lt;head>
&lt;meta charset="UTF-8"/>
&lt;title>WWW Navi&lt;/title>
&lt;link rel="stylesheet" href="u10_3.css" />
&lt;/head>
&lt;body>
&lt;div id="frame">
&lt;div id="header">
&lt;h1>WWW-Navigator&lt;/h1>
&lt;div id="navigator">&lt;?php loadNavigator() ?>&lt;/div>
&lt;/div>
&lt;div id="dropdown">&lt;?php loadDropdown() ?>&lt;/div>
&lt;div id="content">
&lt;?php
if(isset($_GET[\'action\']) && $_GET[\'action\'] === "register") {
	include("u10_1_solution.php");
} else if(isset($_GET[\'action\']) && $_GET[\'action\'] === "login") {
	include("u10_2_solution.php");
} else if(isset($_GET[\'action\']) && $_GET[\'action\'] == "logout") {
	logout();
} else {
	loadContent();
}
?>
&lt;/div>
&lt;div id="sources">
&lt;div>&lt;?php if(empty($_GET[\'action\']) || ($_GET[\'action\'] !== "register" && $_GET[\'action\'] !== "login")) {?>&lt;h2>Quellen:&lt;/h2>&lt;?php } ?>&lt;/div>
&lt;?php if(empty($_GET[\'action\']) || ($_GET[\'action\'] !== "register" && $_GET[\'action\'] !== "login")) { loadReferences(); } ?>
&lt;/div>
&lt;div id="footer">
&lt;h1>Footer:&lt;/h1>
&lt;a href="/sitemap">Sitemap&lt;/a>
&lt;a href="/home">Home&lt;/a>
&lt;a href="/news">News&lt;/a>
&lt;a href="/contact">Contact&lt;/a>
&lt;a href="/about">About&lt;/a>
&lt;/div>
&lt;/div>
&lt;/body>
&lt;/html></pre>

	<b>u10_3_library.php</b>
	<pre>&lt;?php
$filename = "./u10_3.json";

function loadContent() {
	global $filename;
	
	if(saveContent() === -1) {
		return;
	}
	
	$navigator = isset($_GET[\'navigator\']) ? $_GET[\'navigator\'] : "html";
	
	$content = json_decode(file_get_contents($filename));
	
	$contentString = "";
	
	if(isset($_GET[\'action\']) && $_GET[\'action\'] === "edit" && isset($_SESSION[\'username\'])) {
		if(isset($_GET[\'category\'])) {
			$contentString = \'&lt;form method="POST" action="?navigator=\'.$navigator.\'&category=\'.$_GET[\'category\'].\'">&lt;textarea name="content">\';
		} else {
			$contentString = \'&lt;form method="POST" action="?navigator=\'.$navigator.\'">&lt;textarea name="content">\';
		}
	}
	
	if(isset($_GET[\'category\'])) {
		$category = $_GET[\'category\'];
		$contentString .= $content->$navigator->$category->content;
		$_SESSION[\'content\'] = $content->$navigator->$category->content;
	} else {
		$contentString .= $content->$navigator->content;
		$_SESSION[\'content\'] = $content->$navigator->content;
	}
	
	if(isset($_GET[\'action\']) && $_GET[\'action\'] === "edit" && isset($_SESSION[\'username\'])) {
		$contentString .= \'&lt;/textarea>&lt;br />&lt;input type="submit" value="Änderungen speichern" />&lt;/form>\';
	} else if(isset($_SESSION[\'username\'])) {
		if(isset($_GET[\'category\'])) {
			$contentString .= \'&lt;a href="?navigator=\'.$navigator.\'&category=\'.$_GET[\'category\'].\'&action=edit" class="edit">Bearbeiten&lt;/a>\';
		} else {
			$contentString .= \'&lt;a href="?navigator=\'.$navigator.\'&action=edit" class="edit">Bearbeiten&lt;/a>\';
		}
	}
	
	echo $contentString;
}

function loadDropdown() {
	global $filename;
	
	$navigator = isset($_GET[\'navigator\']) ? $_GET[\'navigator\'] : "html";
	
	$content = json_decode(file_get_contents($filename));
	
	$dropdownString = "&lt;ul>";
	
	foreach($content->$navigator as $dropdown => $dropdownContent) {
		if(!is_array($dropdownContent) && is_object($dropdownContent)) {
			$dropdownString .= \'&lt;li>&lt;a href="?navigator=\'.$navigator.\'&category=\'.$dropdown.\'">\'.$dropdownContent->name.\'&lt;/a>&lt;/li>\';
		}
	}
	
	echo $dropdownString;
}

function loadNavigator() {
	global $filename;
	
	$content = json_decode(file_get_contents($filename));
	
	$navigatorString = "&lt;ul>";
	
	foreach($content as $navigator => $navigatorContent) {
		$navigatorString .= \'&lt;li>&lt;a href="?navigator=\'.$navigator.\'">\'.$content->$navigator->name.\'&lt;/a>&lt;/li>\';
	}
	
	if(isset($_SESSION[\'username\'])) {
		$navigatorString .= \'&lt;li>&lt;a href="?action=logout">Abmelden&lt;/a>&lt;/li>\';
		$navigatorString .= \'&lt;li>\'.$_SESSION[\'username\'].\'&lt;/li>\';
	} else {
		$navigatorString .= \'&lt;li>&lt;a href="?action=register">Registrieren&lt;/a>&lt;/li>\';
		$navigatorString .= \'&lt;li>&lt;a href="?action=login">Anmelden&lt;/a>&lt;/li>\';
	}
	
	$navigatorString .= "&lt;/ul>";
	
	echo $navigatorString;
}

function loadReferences() {
	global $filename;
	
	$content = json_decode(file_get_contents($filename));
	
	$navigator = isset($_GET[\'navigator\']) ? $_GET[\'navigator\'] : "html";
	
	if(isset($_GET[\'category\'])) {
		$category = $_GET[\'category\'];
		
		$referencesString = "&lt;ul>";
		foreach($content->$navigator->$category->references as $reference) {
			$referencesString .= \'&lt;li>&lt;a href="\'.$reference.\'">\'.$reference.\'&lt;/a>\';
		}
		$referencesString .= "&lt;/ul>";
	} else {
		$referencesString = "&lt;ul>";
		foreach($content->$navigator->references as $reference) {
			$referencesString .= \'&lt;li>&lt;a href="\'.$reference.\'">\'.$reference.\'&lt;/a>\';
		}
		$referencesString .= "&lt;/ul>";
	}
	echo $referencesString;
}

function logout() {
	session_destroy();
	header("Refresh: 0, url=u10_3.php");
}

function saveContent() {
	global $filename;
	
	$navigator = isset($_GET[\'navigator\']) ? $_GET[\'navigator\'] : "html";
	
	// only save when there is something to save
	if(isset($_POST[\'content\'])) {
		$content = json_decode(file_get_contents($filename));
		
		if(isset($_GET[\'category\'])) {
			// check if the version in the file is the same as one before user started editing
			// (prevent lost update)
			if(trim($content->$navigator->$category->content) === trim($_SESSION[\'content\'])) {
				// don\'t write to file if version is identical
				if(trim($content->$navigator->$category->content) !== trim($_POST[\'content\'])) {
					$content->$navigator->$category->content = trim($_POST[\'content\']);
					
					file_put_contents($filename, json_encode($content), LOCK_EX);
				}
			} else {
				echo \'&lt;span class="alert">Die Seite wurde gerade von jemand anderem bearbeitet und deine Änderung konnte nicht gespeichert werden. Dein Text:&lt;/span>
				&lt;textarea>\'.$_POST[\'content\'].\'&lt;/textarea>
				&lt;span class="alert">Der Aktuelle Inhalt dieser Seite ist:&lt;/span>
				&lt;textarea>\'.trim($content->$navigator->$category->content).\'&lt;/textarea>\';
				return -1;
			}
		} else {
			// check if the version in the file is the same as one before user started editing
			// (prevent lost update)
			if(trim($content->$navigator->content) === trim($_SESSION[\'content\'])) {
				// don\'t write to file if version is identical
				if(trim($content->$navigator->content) !== trim($_POST[\'content\'])) {
					$content->$navigator->content = trim($_POST[\'content\']);
					
					file_put_contents($filename, json_encode($content), LOCK_EX);
				}
			} else {
				echo \'&lt;span class="alert">Die Seite wurde gerade von jemand anderem bearbeitet und deine Änderung konnte nicht gespeichert werden. Dein Text:&lt;/span>
				&lt;textarea>\'.$_POST[\'content\'].\'&lt;/textarea>
				&lt;span class="alert">Der Aktuelle Inhalt dieser Seite ist:&lt;/span>
				&lt;textarea>\'.trim($content->$navigator->content).\'&lt;/textarea>\';
				return -1;
			}
		}
		
		unset($_POST[\'content\']);
	}
}
?></pre>
	
	<b>u10_3.json</b>
	<pre>{
	"html": {
		"name": "HTML",
		"content": "HTML (Hypertext Markup Language) ist der Code, welcher benötigt wird, um den Webinhalt zu strukturieren und ihm eine Bedeutung und einen Zweck zu geben. Zum Beispiel könnte Ihr Inhalt Absätze und Grafiken, aber auch Bilder und &lt;a href=\"u10_3.php?navigator=html&category=table\">Tabellen&lt;/a> enthalten. Wie der Titel dieses Artikels verspricht, soll Ihnen hier ein grundsätzliches Verständnis vermittelt werden, wie HTML eingesetzt wird.",
		"references": [
			"https://developer.mozilla.org/de/docs/Learn/Getting_started_with_the_web/HTML_basics"
		],
		"headings": {
			"name": "Überschriften",
			"content": "Die Überschriftenelemente bestehen aus sechs verschiedenen Leveln. &lt;h1> ist die Überschrift mit der höchsten Gewichtung und &lt;h6> mit der kleinsten. Ein Überschriften-Element beschreibt das Thema des Bereiches, welcher der Überschrift folgt. Überschriften können auch verwendet werden, um ein Inhaltsverzeichnis für ein Dokument automatisch zu erstellen.",
			"references": [
				"https://developer.mozilla.org/de/docs/Web/HTML/Element/h1-h6"
			]
		},
		"paragraph": {
			"name": "Paragraphen",
			"content": "Das &lt;p>-Element erzeugt einen Absatz, den zusammenhängenden Abschnitt eines längeren Textes. In &lt;a href=\"u10_3.php?navigator=html\">HTML&lt;/a> kann &lt;p> jedoch für jedwede Art von zu gruppierendem, zusammenhängendem Inhalt genutzt werden, zum Beispiel Bilder oder Formularfelder.",
			"references": [
				"https://developer.mozilla.org/de/docs/Web/HTML/Element/p"
			]
		},
		"span": {
			"name": "span",
			"content": "Das span-Element (engl span für überspannen) ist ein Element, das Text und andere Inline-Elemente enthalten kann, selbst aber keine semantische Bedeutung hat und nichts bewirkt. Es ist dazu gedacht, um mit Hilfe von &lt;a href=\"u10_3.php?navigator=css\">CSS&lt;/a> formatiert zu werden.",
			"references": [
				"https://wiki.selfhtml.org/wiki/HTML/Textauszeichnung/span"
			]
		},
		"div": {
			"name": "div",
			"content": "Das div-Element ist dazu gedacht, mehrere Elemente wie Text, Grafiken, &lt;a href=\"u10_3.php?navigator=html&category=table\">Tabellen&lt;/a> usw., in einen gemeinsamen Bereich einzuschließen. Dieses allgemeine Element bewirkt nichts weiter als dass es in einer neuen Zeile des Fließtextes beginnt. Ansonsten hat es keine Eigenschaften. Es ist dazu gedacht, Bereiche zu erzeugen, die mit Hilfe von &lt;a href=\"u10_3.php?navigator=css\">CSS&lt;/a> formatiert werden können. div bedeutet division, etwa Abteilung oder Bereich.",
			"references": [
				"https://wiki.selfhtml.org/wiki/HTML/Textstrukturierung/div"
			]
		},
		"table": {
			"name": "Tabellen",
			"content": "Eine Tabelle ist eine geordnete Zusammenstellung von Texten oder Daten. Die darzustellenden Inhalte werden dabei in Zeilen (waagerecht) und Spalten (senkrecht) gegliedert, die grafisch aneinander ausgerichtet werden.",
			"references": [
				"https://wiki.selfhtml.org/wiki/HTML/Tabellen/Aufbau_einer_Tabelle"
			]
		}
	},
	"css": {
		"name": "CSS",
		"content": "CSS (engl.: Cascading Style Sheets = gestufte Gestaltungsbögen) ist die Sprache, die Sie benutzen, um Ihre Webseite zu gestalten. CSS Grundlagen führt Sie durch die Grundlagen dieser Stylesheet-Sprache. Wir beantworten damit solche Fragen wie: »Wie kann ich die &lt;a href=\"u10_3.php?navigator=css&category=colors\">Farbe&lt;/a> meines Textes ändern? Wie kann ich diesen Inhalt genau an einer bestimmten Stelle anzeigen lassen? Wie kann ich meine Webseite mit Hintergrundbildern und -farben versehen?«",
		"references": [
			"https://developer.mozilla.org/de/docs/Learn/Getting_started_with_the_web/CSS_basics"
		],
		"selectors": {
			"name": "Selektoren",
			"content": "Selektoren definieren, auf welche Elemente eine Reihe von &lt;a href=\"u10_3.php?navigator=css\">CSS&lt;/a> Regeln angewendet wird.",
			"references": [
				"https://developer.mozilla.org/de/docs/Web/CSS/CSS_Selectors"
			]
		},
		"colors": {
			"name": "Farben",
			"content": "Der &lt;a href=\"u10_3.php?navigator=css\">CSS&lt;/a> Datentyp Color beschreibt eine Farbe im sRGB Farbraum. Eine Farbe kann auf eine von drei Arten beschrieben werden: Schlüsselworte, rgb und rgba, hsl und hsla. ...",
			"references": [
				"https://developer.mozilla.org/de/docs/Web/CSS/Farben"
			]
		},
		"borders": {
			"name": "Rahmen",
			"content": "Die border Eigenschaft legt den kompletten Rahmen eines Elementes fest und ist eine Kurzform für border-color, border-style und border-width. Die Werte der drei Eigenschaften können in beliebiger Reihenfolge angegeben werden. Unterschiedliche Einstellungen für den oberen, unteren, linken und rechten Rahmen können nur unter den Kurzformen border-bottom, border-top, border-left und border-right festgelegt werden.",
			"references": [
				"https://developer.mozilla.org/de/docs/Web/CSS/border"
			]
		},
		"margin": {
			"name": "Außenabstand",
			"content": "Außenrand oder -abstand (margin) ist ein erzwungener Leerraum zwischen dem aktuellen Element und seinem Eltern- bzw. seinen Nachbarelementen.",
			"references": [
				"https://wiki.selfhtml.org/wiki/CSS/Tutorials/Abstand/margin"
			]
		},
		"padding": {
			"name": "Innenabstand",
			"content": "Innenabstand (padding, englisch: Polsterung) ist ein erzwungener Leerraum zwischen dem Inhalt eines Elements und seinem eigenen Elementrand, also z. B. zwischen dem Text eines Elements und dem Rand dieses Elements.",
			"references": [
				"https://wiki.selfhtml.org/wiki/CSS/Tutorials/Abstand/padding"
			]
		}
	},
	"javascript": {
		"name": "JavaScript",
		"content": "JavaScript (JS) ist eine leichtgewichtige, interpretierte oder JIT-übersetzte Sprache mit First-Class-Funktion. Bekannt ist sie hauptsächlich als Skriptsprache für Webseiten geworden, jedoch wird sie auch in vielen Umgebungen außerhalb des Browsers wie zum Beispiel Node.js, Apache CouchDB und Adobe Acrobat eingesetzt. JavaScript ist eine prototypbasierte Sprache, die mehreren Paradigmen folgt, dynamisch ist und sowohl objektorientierte, imperative als auch deklarative Programmierung (z. B. funktionales Programmieren) ermöglicht.",
		"references": [
			"https://developer.mozilla.org/de/docs/Web/JavaScript"
		],
		"function": {
			"name": "Funktionen",
			"content": "Funktionen sind ein Grundbaustein in &lt;a href=\"u10_3.php?navigator=javascript\">JavaScript&lt;/a>. Eine Funktion ist eine Prozedur - eine Reihe von Anweisungen, um eine Aufgabe auszuführen oder eine Wert auszurechnen. Um Funktionen zu verwenden, müssen diese im Scope (Gültigkeitsbereich) deklariert werden, in dem sie ausgeführt werden soll.",
			"references": [
				"https://developer.mozilla.org/de/docs/Web/JavaScript/Guide/Funktionen"
			]
		},
		"object": {
			"name": "Objekte",
			"content": "Ein Objekt ist eine Sammlung von zusammenhängenden Daten und/oder Funktionalitäten. Diese bestehen üblicherweise aus verschiedenen Variablen und &lt;a href=\"u10_3.php?navigator=javascript&category=function\">Funktionen&lt;/a>, die Eigenschaften und Methoden genannt werden, wenn sie sich innerhalb von Objekten befinden.",
			"references": [
				"https://developer.mozilla.org/de/docs/Learn/JavaScript/Objects/Basics"
			]
		},
		"array": {
			"name": "Arrays",
			"content": "Das &lt;a href=\"u10_3.php?navigator=javascript\">JavaScript&lt;/a>-Array ist ein globales &lt;a href=\"u10_3.php?navigator=javascript&category=object\">Objekt&lt;/a> und Konstruktor für das Erstellen von Arrays, welche listenähnliche Objekte sind.",
			"references": [
				"https://developer.mozilla.org/de/docs/Web/JavaScript/Reference/Global_Objects/Array"
			]
		},
		"fetch": {
			"name": "fetch",
			"content": "Die Fetch API bietet eine Schnittstelle zum Abrufen von Ressourcen (auch über das Netzwerk). Wer schon einmal mit XMLHttpRequest gearbeitet hat wird Ähnlichkeiten erkennen. Die neue API bietet jedoch einen ganzen Satz leistungsfähigerer und flexiblerer &lt;a href=\"u10_3.php?navigator=javascript&category=function\">Funktionen&lt;/a>.",
			"references": [
				"https://developer.mozilla.org/de/docs/Web/API/Fetch_API"
			]
		},
		"promise": {
			"name": "promise",
			"content": "Das Promise &lt;a href=\"u10_3.php?navigator=javascript&category=object\">Objekt&lt;/a> stellt eine Repräsentation einer eventuellen Ausführung (oder eines Fehlschlags) einer asynchronen Operation und den daraus resultierenden Ergebnissen dar. Um mehr darüber zu erfahren wie promises funktionieren und wie diese verwendet werden sollte zuerst Promises benutzen gelesen werden.",
			"references": [
				"https://developer.mozilla.org/de/docs/Web/JavaScript/Reference/Global_Objects/Promise"
			]
		},
		"callback": {
			"name": "callback",
			"content": "Eine Rückruffunktion (engl. callback function) ist eine &lt;a href=\"u10_3.php?navigator=javascript&category=function\">Funktion&lt;/a>, die einer anderen Funktion als Parameter übergeben und von dieser erst später unter definierten Bedingungen mit definierten Argumenten aufgerufen wird. Diese Anleitung behandelt den Umgang mit Callback-Funktionen, wie sie in verschiedenen Kontexten in &lt;a href=\"u10_3.php?navigator=javascript\">JavaScript&lt;/a> Verwendung finden, z. B. bei den &lt;a href=\"u10_3.php?navigator=javascript&category=array\">Array&lt;/a>-Methoden map und forEach.",
			"references": [
				"https://wiki.selfhtml.org/wiki/JavaScript/Tutorials/Umgang_mit_Callback-Funktionen"
			]
		}
	}
}</pre>

	<b>u10_3.css</b>
	<pre>#frame {
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
	display: inline-block;
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

#navigator li:nth-child(4), #navigator li:nth-child(5) {
	float: right;
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
	position: relative;
	background: #95D2F3;
	padding: 10px;
}

#content .edit {
	position: absolute;
	bottom: 5px;
	right: 5px;
}

#content textarea {
	width: 100%;
	height: 200px;
}

#form {
	text-align: center;
}

#form input {
	padding: 2px;
	margin: 3px;
	border-radius: 5px;
}

.alert {
	display: block;
	background: #F9C557;
	margin-bottom: 5px;
	margin-top: 5px;
	border-radius: 5px;
	padding: 3px;
}

#sources h2 {
	margin: 10px;
}

#sources {
	word-break: break-all;
	padding: 5px;
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
}</pre>

	<p><span>Das Ergebnis sieht dann etwa so aus:</span>
	<iframe src="resources/u10_3_solution.php" title="Aufgabe 10.3"></iframe>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 10.3");
}
?>