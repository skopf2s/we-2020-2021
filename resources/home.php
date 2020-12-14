<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: home");
}

$homeContent = array(
	array("header"=>'<a href="u1_1">Aufgabe 1.1</a>', "content"=>'Fachliche Argumentation über Erfolgsprinzipien des WWW'),
	array("header"=>'<a href="u1_2">Aufgabe 1.2</a>', "content"=>'HTTP'),
	array("header"=>'<a href="u1_3">Aufgabe 1.3</a>', "content"=>'HTML-Literatur lesen und Fragen beantworten'),
	array("header"=>'<a href="u1_4">Aufgabe 1.4</a>', "content"=>'HTML Wireframe'),
	array("header"=>'<a href="u2_1">Aufgabe 2.1</a>', "content"=>'CSS Selektoren und CSS Farben'),
	array("header"=>'<a href="u2_2">Aufgabe 2.2 – Part 1</a>', "content"=>'CSS Positionierung'),
	array("header"=>'<a href="u2_3">Aufgabe 2.2 – Part 2</a>', "content"=>'CSS Positionierung'),
	array("header"=>'<a href="u2_4">Aufgabe 2.3</a>', "content"=>'Wireframe with HTML and CSS'),
	array("header"=>'<a href="u3_1">Aufgabe 3.1</a>', "content"=>'Responsiv mit Flexbox Desktop-First'),
	array("header"=>'<a href="u3_2">Aufgabe 3.2</a>', "content"=>'Responsiv mit Grid Mobile-First'),
	array("header"=>'<a href="u3_3">Aufgabe 3.3</a>', "content"=>'Responsiv mit Grid'),
	array("header"=>'<a href="u4_1">Aufgabe 4.1</a>', "content"=>'Funktionen'),
	array("header"=>'<a href="u4_2">Aufgabe 4.2</a>', "content"=>'Objekte'),
	array("header"=>'<a href="u4_3">Aufgabe 4.3</a>', "content"=>'Fibonacci'),
	array("header"=>'<a href="u4_4">Aufgabe 4.4</a>', "content"=>'Topsort'),
	array("header"=>'<a href="u5_1">Aufgabe 5.1</a>', "content"=>'Klasse für Vorrangrelationen'),
	array("header"=>'<a href="u5_2">Aufgabe 5.2</a>', "content"=>'Topologische Iterierbarkeit'),
	array("header"=>'<a href="u5_3">Aufgabe 5.3</a>', "content"=>'Topologischer Generator'),
	array("header"=>'<a href="u5_4">Aufgabe 5.4</a>', "content"=>'Proxy'),
	array("header"=>'<a href="u5_5">Aufgabe 5.5</a>', "content"=>'DeepCopy')
);

function getContent($args = array()) {
	global $homeContent;

	$string = "";
	if(isset($args['offset']) && is_numeric($args['offset'])) {
		$start = ($args['offset'] > 0) ? $args['offset'] : 0;
		$limit = isset($args['limit']) ? $args['limit'] : 20;
		if(count($homeContent) >= $start+$limit) {
			$end = $start+$limit;
		} else {
			$end = count($homeContent);
		}
	} else {
		$start = 0;
		$limit = isset($args['limit']) ? $args['limit'] : 20;
		if(count($homeContent) >= $start+$limit) {
			$end = $start+$limit;
		} else {
			$end = count($homeContent);
		}
	}
	
	$string .= '<div class="flex-wrapper">';
	for($i = $start; $i < $end; $i++) {
		$string .= '<div class="flexbox"><div class="flexheader"><b>'.$homeContent[$i]["header"].'</b></div><div class="flexcontent">'.$homeContent[$i]["content"].'</div></div>';
	}
	$string .= "</div>";
	
	$string .= generatePrevNext($start, $end, $limit);
	
	return $string;
}

function getHeader($args) {
	return array("title"=>"Hauptseite");
}

function generatePrevNext($start, $end, $limit) {
	global $homeContent;
	
	$string = "";
	
	$string .= '<div class="prevnext">';
	if($start == 0) {
		$string .= "Keine vorherigen Beiträge vorhanden";
	} else {
		if($start - $limit > 0) {
			$string .= '<a href="home?offset='.($start-$limit).'&limit='.$limit.'">&larr; Vorherige Seite</a>';
		} else {
			$string .= '<a href="home?offset=0&limit='.$limit.'">&larr; Vorherige Seite</a>';
		}
	}
	
	$string .= " • ";
	
	if($end == count($homeContent)) {
		$string .= "Keine weiteren Beiträge vorhanden";
	} else {
			$string .= '<a href="home?offset='.($start+$limit).'&limit='.$limit.'">Nächste Seite &rarr;</a>';
	}
	$string .= "</div>";
	
	return $string;
}
?>