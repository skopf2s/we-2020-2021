<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u9_1");
}

function getContent($args) {
	return '<h1>Aufgabe 9.1 – Komponente in Vue.js</h1>
	<p><b>Schreiben Sie eine <a href="https://vuejs.org/v2/guide/components.html">Vue.js Single File Component</a> mit einem Text-Eingabefeld und 3 Ausgabefeldern, in denen man während des Tippens sehen kann, (a) wie viele Buchstaben (b) wie viele Leerzeichen und (c) wie viele Worte man in das Text-Eingabefeld bereits eingegeben hat.</b></p>
	<p><b>Betten Sie Ihre Komponente in eine Webseite zweimal ein und testen Sie, ob beide Komponenten unabhängig voneinander sind.</b></p>
	<p><span>Der Code der Komponente dafür sieht etwa so aus:</span>
	<pre>import Vue from \'https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.esm.browser.js\';

Vue.component(\'word-counter\', {
	data: function () {
		return {
			input: \'\',
			letters: 0,
			spaces: 0,
			words: 0
		};
	},
	watch: {
		input: function() {
			this.letters = this.input.replace(/\s+/g, \'\').length;
			this.spaces = (this.input.match(/\s/g) || []).length;
			this.words = this.input.trim() == "" ? 0 : this.input.trim().split(/\s/g).length;
		}
	},
	template: \'&lt;div>&lt;textarea v-model="input">&lt;/textarea>&lt;span> Buchstaben: {{ letters }}&lt;/span>&lt;span> Leerzeichen: {{ spaces }}&lt;/span>&lt;span> Wörter: {{ words }}&lt;/span>&lt;/div>\'
});

new Vue({el: \'#word-counter\'});</pre>

	<span>Der Code der Webseite dafür sieht dann etwa so aus:</span>
	<pre>&lt;!DOCTYPE html>
&lt;html>
&lt;head>
&lt;meta charset="UTF-8"/>
&lt;script type="module" src="vue.js">&lt;/script>
&lt;/head>
&lt;body>
&lt;div id="word-counter">
  &lt;word-counter>&lt;/word-counter>
  &lt;word-counter>&lt;/word-counter>
&lt;/div>
&lt;/body>
&lt;/html></pre>
	</p>
	<p><span>Das Ergebnis sieht dann etwa so aus:</span>
	<iframe src="resources/u9_1.html" title="Aufgabe 9.1"></iframe>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 9.1");
}
?>