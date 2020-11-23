<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: home");
}

function getContent($args) {
	return '<h1>Aufgabe 1.3 – HTML-Literatur lesen und Fragen beantworten</h1>
	<p><b>Was ist HTML?</b></p>
	<p>Bei HTML (Hypertext Markup Language) handelt es sich um eine Auszeichnungssprache zur semantischen Strukturierung von Texten und anderen Inhalten, die von einem Webbrowser dargestellt werden können. Die Entwicklung wird dabei durch das W3C sowie die WHATWG vorangetrieben.</p>
	
	<p><b>Wie kann man eine geschachtelte geordnete Liste der Schachtelungstiefe 3 erzeugen?</b></p>
	<p>Um eine geschachtelte geordnete Liste der Schachtelungstiefe 3 zu erzeugen werden einfach geordnete Listen in Listenpunkten von geordneten Listen erzeugt. Das könnte dann etwa so aussehen:
	<pre>
&lt;!DOCTYPE html>
&lt;html>
&lt;body>
&lt;ol>
	&lt;li>
	&lt;ol>
		&lt;li>
		&lt;ol>
			&lt;li>Listenpunkt&lt;/li>
			&lt;li>Listenpunkt&lt;/li>
			&lt;li>Listenpunkt&lt;/li>
		&lt;/ol>
		&lt;/li>
	&lt;/ol>
	&lt;/li>
&lt;/ol>
&lt;/body>
&lt;/html>
	</pre></p>
	
	<p><b>Wie ist eine HTML-Tabelle aufgebaut?</b></p>
	<p>Eine HTML-Tabelle wird außen von einem &lt;table>-Element umschlossen. In diesem können dann drei Gruppen von Elementen, &lt;thead>, &lt;tbody> und &lt;tfoot> in genau dieser Reihenfolge geben. Wenn vorhanden müssen diese dann jeweils mindestens ein &lt;tr>-Element enthalten, welches selber wiederum mindestens ein &lt;th>-Element im Fall von &lt;thead> bzw. ein &lt;td>-Element im Fall von &lt;tbody> sowie &lt;tfoot> enthalten muss. Außerdem gibt es noch das &lt;caption>-Element, mit dem es möglich ist, eine Beschriftung für die Tabelle hinzuzufügen sowie das &lt;colgroup>-Element, das zur Gruppierung und Formatierung von Spalten verwendet werden kann.</p>
	
	<p><b>Welche Konventionen sollte man bei Pfaden und Dateinamen beachten?</b></p>
	<p>Es wird empfohlen, bei der Benennung ausschließlich Buchstaben, Zahlen und Unterstriche zu verwenden. Außerdem wird empfohlen, ausschließlich kleinbuchstaben bei der Benennung zu verwenden, da diese die Wahrscheinlichkeit, dass man sich dabei verschreibt, verringern. Außerdem wird geraten, sinnvolle, leicht einprägsame und nicht zu lange Namen zu wählen.</p>
	
	<p><b>Wie baut man in HTML ein Menü?</b></p>
	<p>Menüs können in vielen Formen zur Anwendung kommen, am einfachsten einfach in Form einer ungeordneten Liste, die entsprechend stilisiert wird. Aber auch andere HTML-Elemente können zur Erstellung verwendet werden.</p>
	<p>Zusätzlich wurde das menu-Element entwickelt, mit dem es möglich ist, das context-menu des Browsers zu beeinflussen oder ein popup-menu zu erzeugen. Dieses wird allerdings nur von wenigen Browsern unterstützt und gilt als deprecated, eine zukünftige Implementation in weiteren Browsern ist momentan nicht vorgesehen.</p>
	
	<p><b>Welche Attribute sollte man bei Bildern wie verwenden?</b></p>
	<p>Zwei Attribute sind bei Bildern verpflichtend:
	<ul>
	<li>src - die Quelle des Bildes. Bei dieser muss es sich um eine gültige URL handeln, entweder relativ oder absolut. Empfohlen ist die Verwendung einer relativen URL, da so ein Umzug von Dateien keine Probleme verursacht</li>
	<li>alt - ein alternativ angezeigter Text, wenn das Bild nicht geladen werden kann</li>
	</ul>
	Darüber hinaus wird empfohlen, die Bildgrößen stets mit height und width anzugeben, damit sie sich auf jeden Fall in allen Browsern gleich verhalten.</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 1.3");
}
?>
