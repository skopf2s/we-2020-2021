<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u9_3");
}

function getContent($args) {
	return '<h1>Aufgabe 9.3 – Vue.js WWW-Navigator</h1>
	<p><b>Schreiben Sie Ihren WWW-Navigator als SPA in Vue.js <s>mit <a href="https://router.vuejs.org/guide/">Vue Router</a> und/oder mit <a href="https://vuex.vuejs.org/">Vuex</a> als State Manager</s>.</b></p>
	<p><b>Dokumentieren Sie Ihren Entscheidungsprozess: In welche Komponenten wollen Sie Ihre App zerlegen? Wie soll das State Management implementiert werden?</b></p>
	
	<p>Ziel der Trennung in Komponenten ist es, eine Menge von unterschiedlichen Tasks zu schaffen, die dann die eigentliche Webseite generieren. Meine Herangehensweise war dabei, einzelne Komponenten für untereinander unabhängige Tasks zu erstellen. Das Ergebnis davon ist eine Vue.js-App, die aus vier Komponenten besteht, die unterschiedliche Inhalte zum Rendering beitragen. Zusätzlich findet sich ein fünftes Modul, das den eigentlichen Inhalt der Seite bereitstellt. Die vier Komponenten sind dabei gegenseitig voneinander unabhängig und greifen lediglich auf die Daten des zusätzlichen Moduls zu. Jeweils eine Komponente ist für die Generierung des Menüs, des Untermenüs des Seiteninhalts und Quellenliste verantwortlich.</p>
	<p>Durch die Unabhängigkeit der Komponent untereinander gibt es aber auch keine Zustände, die zwischen den unterschiedlichen Komponenten gespeichert und geteilt werden müssen; auch das Laden des Seiteninhalts aus der Datei wird einmalig ausgeführt, alle weiteren Zugriffe erfolgen dann über die Variable, bis die Seite verlassen oder neugeladen wird. Welcher Seiteninhalt geladen wird hängt dabei ausschließlich von der URL ab, die es nicht nur erlaubt, gezielt einen bestimmten Themenbereich der Seite zu laden, sondern auch eine Navigation über die Vor- und Zurücktasten des Browsers erlauben.</p>
	
	<p><span>Der für die Funktion der Seite benötigte Quellcode ist dabei in mehrere Dateien unterteilt. Benötigt werden:</span></p>
	
	<p>
	<b>index.html</b>
	<pre>&lt;!DOCTYPE html>
&lt;html>
&lt;head>
&lt;meta charset="UTF-8"/>
&lt;link rel="stylesheet" href="common.css" type="text/css" />
&lt;script src="https://unpkg.com/vue/dist/vue.js">&lt;/script>
&lt;script src="https://unpkg.com/vue-router/dist/vue-router.js">&lt;/script>
&lt;script type="module" src="common.js">&lt;/script>
&lt;title>WWW Navi&lt;/title>
&lt;/head>
&lt;body>
&lt;div id="frame">
&lt;div id="header">
&lt;h1>WWW-Navigator&lt;/h1>
&lt;router-view name="navigator">&lt;/router-view>
&lt;/div>
&lt;router-view name="dropdown">&lt;/router-view>
&lt;router-view name="content">&lt;/router-view>
&lt;router-view name="sources">&lt;/router-view>
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
	
	<b>common.js</b>
	<pre>import {fileLoader as loadFile } from \'./fileLoader.js\';
import {navigatorLoader as loadNavigator} from \'./navigatorloader.js\';
import {dropdownLoader as loadDropdown} from \'./dropdownLoader.js\';
import {contentLoader as loadContent} from \'./contentLoader.js\';
import {sourceLoader as loadSources} from \'./sourceLoader.js\';

async function load() {
	let content = await loadFile();
	
	const router = new VueRouter({
		routes: [
			{
				path: \'/:navigator\',
				components: {
					navigator: loadNavigator(content),
					dropdown: loadDropdown(content),
					content: loadContent(content, true),
					sources: loadSources(content, true)
				}
			},
			{
				path: \'/:navigator/:dropdown\',
				components: {
					navigator: loadNavigator(content),
					dropdown: loadDropdown(content),
					content: loadContent(content, false),
					sources: loadSources(content, false)
				}
			},
			{
				path: \'*\',
				redirect: \'/html\'
			}
		]
	});
	
	const app = new Vue({router}).$mount(\'#frame\');
}

load();</pre>
	
	<b>fileLoader.js</b>
	<pre>export async function fileLoader() {
	var headers = new Headers();
	headers.append(\'pragma\', \'no-cache\');
	headers.append(\'cache-control\', \'no-cache\');
	headers.append(\'mode\', \'cors\');
	headers.append(\'Content-Type\', \'text/json; charset=UTF-8\');
	return JSON.parse(await fetch("content.json", {method: \'GET\', headers: headers}).then(content => content.text()));
}</pre>
	
	<b>navigatorLoader.js</b>
	<pre>export function navigatorLoader(content) {
	return {
		data: function() {
			return {navigator: content};
		},
		template: `&lt;div id="navigator">&lt;ul>&lt;li v-for="(navigatorItem, index) of navigator">&lt;router-link :to="\'/\' + index">{{ navigatorItem.name }}&lt;/router-link>&lt;/li>&lt;/ul>&lt;/div>`
	};
}</pre>
	
	<b>dropdownLoader.js</b>
	<pre>export function dropdownLoader(content) {
	return {
		data: function() {
			return {dropdown: content};
		},
		computed: {
			getNavigator() {
				return this.$route.params.navigator;
			},
			getDropdownItems() {
				let res = {};
				
				for(let index of Object.keys(this.dropdown[this.getNavigator])) {
					if(typeof this.dropdown[this.getNavigator][index] === \'object\' && Array.isArray(this.dropdown[this.getNavigator][index]) == false) {
						res[index] = this.dropdown[this.getNavigator][index];
					}
				}
				
				return res;
			}
		},
		template: `&lt;div id="dropdown">&lt;ul>&lt;li v-for="(dropdownItem, index) of getDropdownItems">&lt;router-link :to="\'/\' + getNavigator + \'/\' + index">{{ dropdownItem.name }}&lt;/router-link>&lt;/li>&lt;/ul>&lt;/div>`
	};
}</pre>
	
	<b>contentLoader.js</b>
	<pre>export function contentLoader(content, navigatorContent) {
	if(navigatorContent) {
		return {
			data: function() {
				return {text: content}
			},
			computed: {
				getNavigator() {
					return this.$route.params.navigator;
				}
			},
			template: `&lt;div id="content">{{ text[getNavigator].content }}&lt;/div>`
		}
	} else {
		return {
			data: function() {
				return {text: content}
			},
			computed: {
				getNavigator() {
					return this.$route.params.navigator;
				},
				getDropdown() {
					return this.$route.params.dropdown;
				}
			},
			template: `&lt;div id="content">{{ text[getNavigator][getDropdown].content }}&lt;/div>`
		}
	}
}</pre>
	
	<b>sourceLoader.js</b>
	<pre>export function sourceLoader(content, navigatorContent) {
	if(navigatorContent) {
		return {
			data: function() {
				return {text: content}
			},
			computed: {
				getNavigator() {
					return this.$route.params.navigator;
				},
				getSources() {
					return this.text[this.getNavigator].references;
				}
			},
			template: `&lt;div id="sources">&lt;h2>Quellen:&lt;/h2>&lt;ul>&lt;li v-for="source in getSources">&lt;a v-bind:href="source">{{ source }}&lt;/a>&lt;/li>&lt;/ul>&lt;/div>`
		}
	} else {
		return {
			data: function() {
				return {text: content}
			},
			computed: {
				getNavigator() {
					return this.$route.params.navigator;
				},
				getDropdown() {
					return this.$route.params.dropdown;
				},
				getSources() {
					return this.text[this.getNavigator][this.getDropdown].references;
				}
			},
			template: `&lt;div id="sources">&lt;h2>Quellen:&lt;/h2>&lt;ul>&lt;li v-for="source in getSources">&lt;a v-bind:href="source">{{ source }}&lt;/a>&lt;/li>&lt;/ul>&lt;/div>`
		}
	}
}</pre>
	
	<b>common.css</b>
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
}</pre>
	
	<b>content.json</b>
	<pre>{
	"html": {
		"name": "HTML",
		"content": "HTML (Hypertext Markup Language) ist der Code, welcher benötigt wird, um den Webinhalt zu strukturieren und ihm eine Bedeutung und einen Zweck zu geben. Zum Beispiel könnte Ihr Inhalt Absätze und Grafiken, aber auch Bilder und Tabellen enthalten. Wie der Titel dieses Artikels verspricht, soll Ihnen hier ein grundsätzliches Verständnis vermittelt werden, wie HTML eingesetzt wird.",
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
			"content": "Das &lt;p>-Element erzeugt einen Absatz, den zusammenhängenden Abschnitt eines längeren Textes. In HTML kann &lt;p> jedoch für jedwede Art von zu gruppierendem, zusammenhängendem Inhalt genutzt werden, zum Beispiel Bilder oder Formularfelder.",
			"references": [
				"https://developer.mozilla.org/de/docs/Web/HTML/Element/p"
			]
		},
		"span": {
			"name": "span",
			"content": "Das span-Element (engl span für überspannen) ist ein Element, das Text und andere Inline-Elemente enthalten kann, selbst aber keine semantische Bedeutung hat und nichts bewirkt. Es ist dazu gedacht, um mit Hilfe von CSS formatiert zu werden.",
			"references": [
				"https://wiki.selfhtml.org/wiki/HTML/Textauszeichnung/span"
			]
		},
		"div": {
			"name": "div",
			"content": "Das div-Element ist dazu gedacht, mehrere Elemente wie Text, Grafiken, Tabellen usw., in einen gemeinsamen Bereich einzuschließen. Dieses allgemeine Element bewirkt nichts weiter als dass es in einer neuen Zeile des Fließtextes beginnt. Ansonsten hat es keine Eigenschaften. Es ist dazu gedacht, Bereiche zu erzeugen, die mit Hilfe von CSS formatiert werden können. div bedeutet division, etwa Abteilung oder Bereich.",
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
		"content": "CSS (engl.: Cascading Style Sheets = gestufte Gestaltungsbögen) ist die Sprache, die Sie benutzen, um Ihre Webseite zu gestalten. CSS Grundlagen führt Sie durch die Grundlagen dieser Stylesheet-Sprache. Wir beantworten damit solche Fragen wie: »Wie kann ich die Farbe meines Textes ändern? Wie kann ich diesen Inhalt genau an einer bestimmten Stelle anzeigen lassen? Wie kann ich meine Webseite mit Hintergrundbildern und -farben versehen?«",
		"references": [
			"https://developer.mozilla.org/de/docs/Learn/Getting_started_with_the_web/CSS_basics"
		],
		"selectors": {
			"name": "Selektoren",
			"content": "Selektoren definieren, auf welche Elemente eine Reihe von CSS Regeln angewendet wird.",
			"references": [
				"https://developer.mozilla.org/de/docs/Web/CSS/CSS_Selectors"
			]
		},
		"colors": {
			"name": "Farben",
			"content": "Der CSS Datentyp Color beschreibt eine Farbe im sRGB Farbraum. Eine Farbe kann auf eine von drei Arten beschrieben werden: Schlüsselworte, rgb und rgba, hsl und hsla. ...",
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
			"content": "Funktionen sind ein Grundbaustein in JavaScript. Eine Funktion ist eine Prozedur - eine Reihe von Anweisungen, um eine Aufgabe auszuführen oder eine Wert auszurechnen. Um Funktionen zu verwenden, müssen diese im Scope (Gültigkeitsbereich) deklariert werden, in dem sie ausgeführt werden soll.",
			"references": [
				"https://developer.mozilla.org/de/docs/Web/JavaScript/Guide/Funktionen"
			]
		},
		"object": {
			"name": "Objekte",
			"content": "Ein Objekt ist eine Sammlung von zusammenhängenden Daten und/oder Funktionalitäten. Diese bestehen üblicherweise aus verschiedenen Variablen und Funktionen, die Eigenschaften und Methoden genannt werden, wenn sie sich innerhalb von Objekten befinden.",
			"references": [
				"https://developer.mozilla.org/de/docs/Learn/JavaScript/Objects/Basics"
			]
		},
		"array": {
			"name": "Arrays",
			"content": "Das JavaScript-Array ist ein globales Objekt und Konstruktor für das Erstellen von Arrays, welche listenähnliche Objekte sind.",
			"references": [
				"https://developer.mozilla.org/de/docs/Web/JavaScript/Reference/Global_Objects/Array"
			]
		},
		"fetch": {
			"name": "fetch",
			"content": "Die Fetch API bietet eine Schnittstelle zum Abrufen von Ressourcen (auch über das Netzwerk). Wer schon einmal mit XMLHttpRequest gearbeitet hat wird Ähnlichkeiten erkennen. Die neue API bietet jedoch einen ganzen Satz leistungsfähigerer und flexiblerer Funktionen.",
			"references": [
				"https://developer.mozilla.org/de/docs/Web/API/Fetch_API"
			]
		},
		"promise": {
			"name": "promise",
			"content": "Das Promise Objekt stellt eine Repräsentation einer eventuellen Ausführung (oder eines Fehlschlags) einer asynchronen Operation und den daraus resultierenden Ergebnissen dar. Um mehr darüber zu erfahren wie promises funktionieren und wie diese verwendet werden sollte zuerst Promises benutzen gelesen werden.",
			"references": [
				"https://developer.mozilla.org/de/docs/Web/JavaScript/Reference/Global_Objects/Promise"
			]
		},
		"callback": {
			"name": "callback",
			"content": "Eine Rückruffunktion (engl. callback function) ist eine Funktion, die einer anderen Funktion als Parameter übergeben und von dieser erst später unter definierten Bedingungen mit definierten Argumenten aufgerufen wird. Diese Anleitung behandelt den Umgang mit Callback-Funktionen, wie sie in verschiedenen Kontexten in JavaScript Verwendung finden, z. B. bei den Array-Methoden map und forEach.",
			"references": [
				"https://wiki.selfhtml.org/wiki/JavaScript/Tutorials/Umgang_mit_Callback-Funktionen"
			]
		}
	}
}</pre>
	
	<p><span>Das Ergebnis sieht dann etwa so aus:</span>
	<iframe src="resources/u9_3/index.html" title="Aufgabe 9.3"></iframe>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 9.3");
}
?>