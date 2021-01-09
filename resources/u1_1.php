<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u1_1");
}

function getContent($args) {
	return '<h1>Aufgabe 1.1 – Fachliche Argumentation über Erfolgsprinzipien des WWW</h1>
	<p><b>Mit welchen fachlichen Argumenten wurde das WWW-Proposal von TBL abgelehnt?</b></p>
	<p>Der Vorschlag des WWW wurde als zu unsauber bezeichnet, da möglicherweise auftretende "broken links" nicht verhindert werden, obwohl diese als unerwünscht gelten. Bei der Vorstellung des Konzepts wären diese aber bereits technisch vermeidbar gewesen. Dadurch wirkt das Konzept veraltet, die Idee klingt wie ein Rückschritt, da die referenzieller Integrität nicht gewährleistet wird, mit technischen Mitteln aber bereits möglich gewesen wäre.</p>
	
	<p><b>Was sind die fachlichen Argumente, warum das WWW dennoch ein Erfolg wurde?</b></p>
	<p>Die Kritikpunkte, die bei der Vorstellung angemerkt wurden, könnten zwar gelöst werden, die möglichen Lösungsansätze kämen aber allesamt mit Kosten, die möglicherweise den heutigen Erfolg verhindert hätten. Vor allem durch das Ausbleiben der referenziellen Integrität ist eine Dezentralität möglich, die das WWW attraktiv und doch gleichzeitig einfach macht.</p>
	
	<p><b>Was wäre der Preis für die garantierte Verhinderung von “broken links”?</b></p>
	<p>Um "broken links" garantiert verhindern zu können, wäre ein zentrales System notwendig, das eben diese Links verwaltet, wie auch immer ein solches System genau aussehen würde. Mögliche Folgen wären dabei eine geringere Effizienz bei der Verwendung des WWW sowie enorme Kosten beim Betrieb, da diese Teil einer zentralen Verarbeitungseinrichtung sein müssten. Dadurch hätte das WWW vermutlich niemals die Reichweite gewonne, die es heute hat.</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 1.1");
}
?>