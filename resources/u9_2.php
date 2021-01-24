<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u9_2");
}

function getContent($args) {
	return '<h1>Aufgabe 9.2 – Komponente in Vue.js</h1>
	<p><b>Schreiben Sie eine möglichst flexible <a href="https://vuejs.org/v2/guide/components.html">Vue.js Single File Component</a> für Menüs und wenden Sie diese in derselben Webseite zweimal an, einmal horizontal, das andere Mal vertikal.</b></p>
	<p><span>Der Code der Komponente dafür sieht etwa so aus:</span>
	<pre>import Vue from \'https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.esm.browser.js\';

Vue.component(\'menu-list\', {
	data: function () {
		return {
			objects: {
				html: {name: "HTML"},
				css: {name: "CSS"},
				javascript: {name: "JavaScript"}
			}
		};
	},
	props: ["flow"],
	template: \'&lt;table>&lt;tbody v-if="flow == \'vertical\'">&lt;tr v-for="object in objects">&lt;td>{{ object.name }}&lt;/td>&lt;/tr>&lt;/tbody>&lt;tbody v-else>&lt;tr>&lt;td v-for="object in objects">{{ object.name }}&lt;/td>&lt;/tr>&lt;/tbody>&lt;/table>\'
});

new Vue({el: \'#menu\'});</pre>

	<span>Der Code der Webseite dafür sieht dann etwa so aus:</span>
	<pre>&lt;!DOCTYPE html>
&lt;html>
&lt;head>
&lt;meta charset="UTF-8"/>
&lt;script type="module" src="u9_2.js">&lt;/script>
&lt;/head>
&lt;body>
&lt;div id="menu">
  &lt;menu-list flow="horizontal">&lt;/menu-list>
  &lt;menu-list flow="vertical">&lt;/menu-list>
&lt;/div>
&lt;/body>
&lt;/html></pre>
	</p>
	<p><span>Das Ergebnis sieht dann etwa so aus:</span>
	<iframe src="resources/u9_2.html" title="Aufgabe 9.2"></iframe>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 9.2");
}
?>