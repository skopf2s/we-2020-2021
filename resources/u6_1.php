<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u6_1");
}

function getContent($args) {
	return '<h1>Aufgabe 6.1 – Funktionen in JavaScript</h1>
	<p><b>Schreiben Sie eine Funktion <code>identity_function()</code>, die ein Argument als Parameter entgegen nimmt und eine Funktion zurück gibt, die dieses Argument zurück gibt.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function identity_function(x) {
	return (function() {
		return x;
	});
}</pre>
	</p>
	
	<p><b>Schreiben Sie eine Addier-Funktion <code>addf()</code>, so dass <code>addf(x)(y)</code> genau <code>x + y</code> zurück gibt. (Es haben also zwei Funktionsaufrufe zu erfolgen. <code>addf(x)</code> liefert eine Funktion, die auf <code>y</code> angewandt wird.)</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function addf(x) {
	return (function(y) {
		return x + y;
	});
}
console.assert(addf(3)(4) === 7);</pre>
	</p>
	
	<p><b>Schreiben Sie eine Funktion <code>applyf()</code>, die aus einer binären Funktion wie <code>add(x,y)</code> eine Funktion <code>addf</code> berechnet, die mit zwei Aufrufen das gleiche Ergebnis liefert, z.B. <code>addf = applyf(add); addf(x)(y)</code> soll <code>add(x,y)</code> liefern. Entsprechend <code>applyf(mul)(5)(6)</code> soll <code>30</code> liefern, wenn <code>mul</code> die binäre Multiplikation ist.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function mul(x, y) {return x*y;}

function applyf(func) {
	return (function(x) {
		return (function(y) {
			return func(x, y);
		});
	});
}
console.assert(applyf(mul)(5)(6) === 30);</pre>
	</p>
	
	<p><b>Schreiben Sie eine Funktion <code>curry()</code> (von Currying), die eine binäre Funktion und ein Argument nimmt, um daraus eine Funktion zu erzeugen, die ein zweites Argument entgegen nimmt, z.B. <code>add3 = curry(add, 3); add3(4)</code> ergibt <code>7</code>. <code>curry(mul, 5)(6)</code> ergibt <code>30</code>.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function mul(x, y) {return x*y;}

function curry(func, x) {
	return (function(y) {
		return func(x, y);
	});
}
console.assert(curry(mul, 5)(6) === 30);</pre>
	</p>
	
	<p><b>Erzeugen Sie die <code>inc</code>-Funktion mit Hilfe einer der Funktionen <code>addf</code>, <code>applyf</code> und <code>curry</code> aus den letzten Aufgaben, ohne die Funktion <code>inc()</code> selbst zu implementieren. (<code>inc(x)</code> soll immer <code>x + 1</code> ergeben und lässt sich natürlich auch direkt implementieren. Das ist aber hier nicht die Aufgabe.) Vielleicht schaffen Sie es auch, drei Varianten der <code>inc()</code>-Implementierung zu schreiben?</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function inc(x) {
	return addf(x)(1);
}

function inc(x) {
	function add(x, y) {return x+y;}
	
	return applyf(add)(x)(1);
}

function inc(x) {
	function add(x, y) {return x+y;}
	
	return curry(add, x)(1);
}</pre>
	</p>
	
	<p><b>Schreiben Sie eine Funktion <code>methodize()</code>, die eine binäre Funktion (z.B. <code>add</code>, <code>mul</code>) in eine unäre Methode verwandelt. Nach <code>Number.prototype.add = methodize(add);</code> soll <code>(3).add(4)</code> genau <code>7</code> ergeben.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function add(x, y) {return x+y;}

function methodize(func) {
	return (function(x) {
		return func(this, x);
	});
}
Number.prototype.add = methodize(add);
console.assert((3).add(4) === 7);</pre>
	</p>
	
	<p><b>Schreiben Sie eine Funktion <code>demethodize()</code>, die eine unäre Methode (z.B. <code>add</code>, <code>mul</code>) in eine binäre Funktion umwandelt. <code>demethodize(Number.prototype.add)(5, 6)</code> soll <code>11</code> ergeben.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function add(x, y) {return x+y;}
Number.prototype.add = add;

function demethodize(func) {
	return (function(x, y) {
		return func(x, y);
	});
}
console.assert(demethodize(Number.prototype.add)(5, 6) === 11);</pre>
	</p>
	
	<p><b>Schreiben Sie eine Funktion <code>twice()</code>, die eine binäre Funktion in eine unäre Funktion umwandelt, die den einen Parameter zweimal weiter reicht. Z.B. <code>var double = twice(add); double(11)</code> soll <code>22</code> ergeben; <code>var square = twice(mul); square(11)</code> soll <code>mul(11,11) === 121</code> ergeben.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function add(x, y) {return x+y;}
function mul(x, y) {return x*y;}

function twice(func) {
	return (function(x) {
		return func(x, x);
	});
}
var double = twice(add);
console.assert(double(11) === 22);
var square = twice(mul);
console.assert(square(11) === 121);</pre>
	</p>
	
	<p><b>Schreiben Sie eine Funktion <code>composeu()</code>, die zwei unäre Funktionen in eine einzelne unäre Funktion transformiert, die beide nacheinander aufruft, z.B. soll <code>composeu(double, square)(3)</code> genau <code>36</code> ergeben.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function add(x, y) {return x+y;}
function mul(x, y) {return x*y;}

function twice(func) {
	return (function(x) {
		return func(x, x);
	});
}
var double = twice(add);
var square = twice(mul);


function composeu(func1, func2) {
	return (function(x) {
		return func2(func1(x));
	});
}

console.assert(composeu(double, square)(3) === 36);</pre>
	</p>
	
	<p><b>Schreiben Sie eine Funktion <code>composeb()</code>, die zwei binäre Funktionen in eine einzelne Funktion transformiert, die beide nacheinander aufruft, z.B. <code>composeb(add, mul)(2, 3, 5)</code> soll <code>25</code> ergeben.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function add(x, y) {return x+y;}
function mul(x, y) {return x*y;}

function composeb(func1, func2) {
	return (function(x, y, z) {
		return func2(z, func1(y, x));
	});
}

console.assert(composeb(add, mul)(2, 3, 5) === 25);</pre>
	</p>
	
	<p><b>Schreiben Sie eine Funktion <code>once()</code>, die einer anderen Funktion nur einmal erlaubt, aufgerufen zu werden, z.B. <code>add_once = once(add); add_once(3, 4)</code> soll beim ersten Mal <code>7</code> ergeben, beim zweiten Mal soll jedoch <code>add_once(3, 4)</code> einen Fehlerabbruch bewirken.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function add(x, y) {return x+y;}

function once(func) {
	let executed = false;
	return function(...x) {
		if(!executed) {
			executed = true;
			return func(...x);
		} else {
			return new Error("Multiple execution is not allowed");
		}
	}
}

add_once = once(add);
console.assert(add_once(3, 4) === 7);
console.assert(add_once(3, 4) instanceof Error);</pre>
	</p>
	
	<p><b>Schreiben Sie eine Fabrik-Funktion <code>counterf()</code>, die zwei Funktionen <code>inc()</code> und <code>dec()</code> berechnet, die einen Zähler hoch- und herunterzählen. Z.B. <code>counter = counterf(10);</code> Dann soll <code>counter.inc()</code> <code>11</code> und <code>counter.dec()</code> wieder <code>10</code> ergeben.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function counterf(i) {
	return {
		i: i,
		inc: () => { return ++i; },
		dec: () => { return --i; }
	};
}

counter = counterf(10);
console.assert(counter.inc() === 11);
console.assert(counter.dec() === 10);</pre>
	</p>
	
	<p><b>Schreiben Sie eine rücknehmbare Funktion <code>revocable()</code>, die als Parameter eine Funktion nimmt und diese bei Aufruf ausführt. Sobald die Funktion aber mit <code>revoke()</code> zurück genommen wurde, führt ein erneuter Aufruf zu einem Fehler.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function revocable(func) {
	return {
		revoked: false,
		invoke: (arg) => {
			if(!this.revoked) {
				func(arg);
			} else {
				return new Error("Can\'t invoke after being revoked");
			}
		},
		revoke: () => {
			this.revoked = true;
		}
	};
}

temp = revocable(alert);
temp.invoke(7);
temp.revoke();
console.assert(temp.invoke(8) instanceof Error);</pre>
	</p>
	
	<p><b>Implementieren Sie ein "Array Wrapper"-Objekt mit den Methoden <code>get</code>, <code>store</code> und <code>append</code>, so dass ein Angreifer keinen Zugriff auf das innere, private Array hat.</b></p>
	<p><span>Eine mögliche Lösung könnte etwa so aussehen:</span>
	<pre>function vector() {
	var vec = [];
	return {
		append: (x) => { vec.push(x); },
		store: (i, x) => {vec[i] = x; }, 
		get: (i) => { return vec[i]; }
	}
}

my_vector = vector();
my_vector.append(7);
my_vector.store(1, 8);
console.assert(my_vector.get(0) === 7);
console.assert(my_vector.get(1) === 8);</pre>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 6.1");
}
?>