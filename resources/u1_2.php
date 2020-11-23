<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: home");
}

function getContent($args) {
	return '<h1>Aufgabe 1.2 – HTTP</h1>
	<p><b>Sie bekommen im Browser den HTTP Status Code 200. Was bedeutet das?</b></p>
	<p>Der HTTP Status Code 200 gibt an, dass die Anfrage erfolgreich bearbeitet wurde und ist standardmäßig cachebar.</p>
	
	<p><b>Sie bekommen im Browser den HTTP Status Code 301. Was hat das zu bedeuten?</b></p>
	<p>Der HTTP Status Code 301 gibt an, dass die aufgerufene Datei permanent verschoben wurde und eine Weiterleitung dorthin eingerichtet wurde. Ein moderner Browser wird dabei der Weiterleitung folgen und die angefragte Seite aufrufen, Suchmaschinen werden gespeicherte Links auf den Verweis der Weiterleitung anpassen.</p>
	
	<p><b>Sie bekommen im Browser den HTTP Status Code 400. Was hat das zu bedeuten? Was können Sie dagegen tun?</b></p>
	<p>Der HTTP Status Code 400 gibt an, dass die Anfrage nicht verarbeitet werden kann, weil ein clientseitiger Fehler vorliegt. Dabei kann es sich beispielsweise um einen syntaktischen Fehler in der Anfrage handeln. Tritt dieser Fehler auf, sollte der Client die Anfrage nicht unverändert erneut schicken, sondern die Anfrage überprüfen und den Fehler beheben.</p>
	
	<p><b>Sie bekommen im Browser den HTTP Status Code 403. Was hat das zu bedeuten? Was können Sie dagegen tun?</b></p>
	<p>Der HTTP Status Code 403 gibt an, dass die Anfrage zwar erfolgreich beim Server angekommen ist, dieser die Verarbeitung allerdings verweigert. Grund dafür ist eine fehlende Autorisierung, eine erneute Anmeldung wird im Gegensatz zum HTTP Status 401 bei 403 allerdings keine Änderung bewirken; eine Autorisierung ist also unmöglich.</p>
	
	<p><b>In einer Webanwendung benötigen Sie eine OPTIONS-Anfrage, die die Optionen des Servers vor dem eigentlichen Zugriff erfragen soll. Aus Performanzgründen soll die Abfrage jedoch cacheable sein. Wie könnten Sie dafür eine Lösung angehen?</b></p>
	<p>OPTIONS-Anfragen sind nicht von sich aus cacheable, ein Cache müsste also außerhalb von HTTP implementiert und verwaltet werden. Möglich wäre dies aufgrund der Idempotenz der Anfragemethode, das Ergebnis ist bei gleichen Anfragen stets identisch.</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 1.2");
}
?>
