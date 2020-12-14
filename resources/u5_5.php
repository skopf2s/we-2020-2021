<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: home");
}

function getContent($args) {
	return '<h1>Aufgabe 5.5 – DeepCopy</h1>
	<p><b>Schreiben Sie eine rekursive Funktion <code>deepCopy( struct )</code> als ES6-Ausdruck, so dass beliebig geschachtelte Arrays und Objekte <code>struct</code> tiefenkopiert werden können. Verwenden Sie zu diesem Zweck den <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Operators/Conditional_Operator">konditionalen ternären Operator</a>, <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/map">Array.map()</a>, <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/fromEntries">Object.fromEntries()</a> und <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Object/entries">Object.entries()</a>. Verwenden Sie dabei nur Arrow Functions und Ausdrücke, keine Anweisungen, keine Blöcke. Verwenden Sie nicht die JSON-Methoden.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function deepCopy(struct) {
	return (typeof struct === "object" && !(struct instanceof Array)) ? Object.fromEntries(Object.keys(struct).map(x => {return (typeof struct[x] === "object" || (struct[x] instanceof Array)) ? [x, deepCopy(struct[x])] : [x, struct[x]];})) : (struct instanceof Array) ? struct.map(x => (typeof x === "object" || x instanceof Array) ? deepCopy(x) : x) : struct;
}

console.assert(typeof deepCopy({a: [[]], b: [], c: "a", d: {}}) === "object");
console.assert(deepCopy([[], [], "a", {b: []}]) instanceof Array);</pre>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 5.5");
}
?>