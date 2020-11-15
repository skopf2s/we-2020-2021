<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: home");
}

function getContent($args) {
	return '<h1>Aufgabe 2.1 – CSS Selektoren und CSS Farben</h1>
	<p><b>Berechnen Sie die Spezifität folgender CSS-Selektoren</b></p>
	<ul>
	<li><pre>div div div:focus .inner       23</pre></li>
	<li><pre>h1 + div.main                  12</pre></li>
	<li><pre>div a:link[href*=\'h-brs\']      22</pre></li>
	<li><pre>nav > a:hover::before          13</pre></li>
	<li><pre>ul#primary-nav li.active      112</pre></li>
	</ul>
	
	<p><b>Rechnen Sie folgende RGB-Werte in HSL-Werte um</b></p>
	<ul>
	<li><pre>#ffffff => 100 % R = 1, 100 % G = 1, 100 % B = 1; max(1, 1, 1) = 1, min(1, 1, 1) = 1; H := 0 (max = min), S := 0 (min = 1), L := 1 ((max+min)/2 = (1+1)/2 = 1); hsl(0, 0, 1)</pre></li>
	<li><pre>#000 => 0 % R = 0, 0 % G = 0, 0 % B = 0; max(0, 0, 0) = 0, min(0, 0, 0) = 0; H := 0 (max = min), S := 0 (max = 0), L := 0 ((max+min)/2 = (0+0)/2 = 0); hsl(0, 0, 0)</pre></li>
	<li><pre>#ab0978 => #ab = 171 = (171/255*100) ~= 67.1 % R, #09 = 9 = (9/255*100) ~= 3.5 % G, #78 = 120 = (120/255*100) ~= 47.1 % B; max(0.671, 0.035, 0.475) = 0.671, min(0.671, 0.035, 0.475) = 0.035; H := 60*(0+((0.035-0.471)/(0.671-0.035))) ~= -41.1+360 ~= 318.9, S:= (0.671-0.035)/(1-|(0.671+0.035-1)|) ~= 0.9, L := (0.671+0.035)/2 ~= 0.35; hsl(318.9, 0.9, 0.35)</pre></li>
	<li><pre>rgb(127,255,33) = (127/255*100) ~= 49.8 % R, (255/255*100) = 100 % G, (33/255*100) ~= 12.9 % B; max(0.498, 1, 0.129) = 1, min(0.498, 1, 0.129) = 0.129; H := 60*(2+((0.129-0.0498)/(1-0.129))) ~= 125.5, S := (1-0.129)/(1-(|1+0.129-1|)) = 1, L := (1+0.129)/2 += 0.56; hsl(125.5, 1, 0.56)</pre></li>
	<li><pre>rgba(255,127,33,0.8) = 0.8*(255, 127, 33)+(1-0.8)*(0, 0, 0) = (204, 101.6, 26.4)+(0, 0, 0) = rgb(204, 101.6, 26.4) => (204/255*100) = 80 % R, (101.6/255*100) ~= 39.8 % G, (26.4/255*100) ~= 10.4 % B; max(0.8, 0.398, 0.104) = 0.8, min(0.8, 0.398, 0.104) = 0.104; H := 60*(0+((0.398-0.104)/(0.8-0.104))) ~= 25.3, S := (0.8-0.104)/(1-|(0.8+0.104-1)|) ~= 0.77; L := (0.8+0.104)/2 ~= 0.45; hsl(25.3, 0.77, 0.45) (auf schwarzem Hintergrund)</pre></li>
	</ul>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 2.1");
}
?>