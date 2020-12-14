<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: home");
}

function getContent($args) {
	return '<h1>Aufgabe 4.3 – Fibonacci</h1>
	<p><b>Schreiben Sie im Browser die <a href="https://de.wikipedia.org/wiki/Fibonacci-Folge">Fibonacci-Funktion</a> in JavaScript und geben Sie die ersten 2000 Fibonacci-Zahlen 0,1,1,2,3,5,8,13,... auf der Konsole mit console.log() aus.</b></p>
	<p><b>Achten Sie auf Performanz: Berechnen Sie jeden Fibonacci-Wert nur einmal. Speichern Sie zu diesem Zweck jede bereits berechnete Fibonacci-Zahl in einer Tabelle.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>&lt;!DOCTYPE html>
&lt;html>
&lt;head>
&lt;script type="text/javascript">
function fibonacci(end) {
	for(var i = 0; i &lt; end; i++) {
		if(i === 0) {
			document.getElementById("tablebody").innerHTML = "&lt;tr>&lt;td>"+i+"&lt;/td>&lt;td id="+i+">0&lt;/td>&lt;/tr>";
		} else if(i === 1) {
			document.getElementById("tablebody").innerHTML = document.getElementById("tablebody").innerHTML+"&lt;tr>&lt;td>"+i+"&lt;/td>&lt;td id="+i+">1&lt;/td>&lt;/tr>";
		} else {
			prevprev = new Number(document.getElementById(i-2).innerHTML);
			prev = new Number(document.getElementById(i-1).innerHTML);
			next = new Number(prevprev+prev);
			document.getElementById("tablebody").innerHTML = document.getElementById("tablebody").innerHTML+"&lt;tr>&lt;td>"+i+"&lt;/td>&lt;td id="+i+">"+next+"&lt;/td>&lt;/tr>";
			//document.getElementById("tablebody").innerHTML = document.getElementById("tablebody").innerHTML+"&lt;tr>&lt;td>"+i+"&lt;/td>&lt;td id="+i+">"+(parseInt(document.getElementById(i-2).innerHTML) + parseInt(document.getElementById(i-1).innerHTML))+"&lt;/td>&lt;/tr>";
		}
	}
}
&lt;/script>
&lt;/head>
&lt;body onload="fibonacci(2000)">
&lt;table>
&lt;tbody id="tablebody">
&lt;/tbody>
&lt;/table>
&lt;/body>
&lt;/html></pre>
	</p>
	<p><span>Das Ergebnis könnte dann (verkürzt) etwa so aussehen:</span>
	<table>
<tbody id="tablebody">
</tbody>
</table>
	</p>
	
	<p><b>Was ist die größte Fibonacci-Zahl, die sich noch als Integer sicher speichern lässt (<a href="https://developer.mozilla.org/de/docs/Web/JavaScript/Reference/Global_Objects/Number/MAX_SAFE_INTEGER">Number.MAX_SAFE_INTEGER</a>)? Die wievielte Fibonacci-Zahl in der Fibonacci-Folge ist das?</b></p>
	
	<p>Die größte noch sicher als Integer speicherbare Fibonacci-Zahl ist die 102., ihr Wert beträgt 927372692193079200000.</p>
	
	<p><b>Was ist die größte Fibonacci-Zahl, die sich noch als Number speichern lässt (<a href="https://developer.mozilla.org/de/docs/Web/JavaScript/Reference/Global_Objects/Number/MAX_VALUE">Number.MAX_VALUE</a>)? Die wievielte Fibonacci-Zahl in der Fibonacci-Folge ist das (d.h. welche Stelle in der Fibonacci-Folge)?</b></p>
	
	<p>Die größte noch sicher als Number speicherbare Fibonacci-Zahl ist die 1476., ihr Wert beträgt 1.3069892237633987e+308.</p>
	
	<p><b>Wechseln Sie zu <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/BigInt">BigInt</a>, um alle 2000 Fibonacci-Zahlen korrekt anzuzeigen. Geben Sie hier HTML- und JavaScript-Code zusammen ein:</b></p>
	
	<p><span>Eine mögliche Lösung (reduziert auf den JavaScript-Code, da der HTML-Code unverändert bleibt) könnte etwa so aussehen:</span>
	<pre>function fibonacci(end) {
	for(var i = 0; i < end; i++) {
		if(i === 0) {
			document.getElementById("tablebody").innerHTML = "<tr><td>"+i+"</td><td id="+i+">0</td></tr>";
		} else if(i === 1) {
			document.getElementById("tablebody").innerHTML = document.getElementById("tablebody").innerHTML+"<tr><td>"+i+"</td><td id="+i+">1</td></tr>";
		} else {
			prevprev = BigInt(document.getElementById(i-2).innerHTML);
			prev = BigInt(document.getElementById(i-1).innerHTML);
			next = BigInt(prevprev+prev);
			document.getElementById("tablebody").innerHTML = document.getElementById("tablebody").innerHTML+"<tr><td>"+i+"</td><td id="+i+">"+next+"</td></tr>";
		}
	}
}</pre>
	</p>
	
	<script type="text/javascript">
function fibonacci(end) {
	for(var i = 0; i < end; i++) {
		if(i === 0) {
			document.getElementById("tablebody").innerHTML = "<tr><td>"+i+"</td><td id="+i+">0</td></tr>";
		} else if(i === 1) {
			document.getElementById("tablebody").innerHTML = document.getElementById("tablebody").innerHTML+"<tr><td>"+i+"</td><td id="+i+">1</td></tr>";
		} else {
			prevprev = new Number(document.getElementById(i-2).innerHTML);
			prev = new Number(document.getElementById(i-1).innerHTML);
			next = new Number(prevprev+prev);
			document.getElementById("tablebody").innerHTML = document.getElementById("tablebody").innerHTML+"<tr><td>"+i+"</td><td id="+i+">"+next+"</td></tr>";
			//document.getElementById("tablebody").innerHTML = document.getElementById("tablebody").innerHTML+"<tr><td>"+i+"</td><td id="+i+">"+(parseInt(document.getElementById(i-2).innerHTML) + parseInt(document.getElementById(i-1).innerHTML))+"</td></tr>";
		}
	}
}

fibonacci(10);
</script>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 4.3");
}
?>