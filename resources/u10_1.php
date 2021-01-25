<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u10_1");
}

function getContent($args) {
	return '<h1>Aufgabe 10.1 – Registrierung mit PHP</h1>
	<p><b>Erstellen Sie mit PHP 5 auf www2.inf.h-brs.de ein Registrierungsformular. Speichern Sie die eingegebenen Daten persistent in einer Datei auf www2.inf.h-brs.de. Schreiben Sie Ihre PHP-Scripte so, dass es zu keinen Nebenläufigkeitsartefakten kommen kann, egal wie viele Nutzer sich gleichzeitig registrieren.</b></p>
	<p><span>Der Code dafür sieht etwa so aus:</span>
	<pre>&lt;div id="form">
&lt;form method="POST">
&lt;input type="text" name="name" placeholder="Benutzername" autocomplete="off" value="&lt;?php if(isset($_POST[\'name\'])) echo $_POST[\'name\'] ?>" />&lt;br />
&lt;input type="password" name="password" placeholder="Passwort" />&lt;br />
&lt;input type="password" name="password_verify" placeholder="Passwort bestätigen" />&lt;br />
&lt;input type="submit" value="Registrieren">
&lt;/form>
&lt;div>
&lt;?php
if(isset($_POST[\'name\']) && isset($_POST[\'password\']) && isset($_POST[\'password_verify\'])) {
	ini_set(\'display_errors\', 0);
	
	function register() {
		if($_POST[\'password\'] !== $_POST[\'password_verify\']) {
			echo "Die angegebenen Passwörter sind nicht identisch.";
			return;
		}
		
		$filename = "./data.json";
		
		if(file_exists($filename)) {
			$content = json_decode(file_get_contents($filename));
		} else {
			$content = new stdClass();
		}
		
		$user = $_POST[\'name\'];
		
		if(isset($content->userdata->$user)) {
			echo \'Unter diesem Namen existiert bereits ein Benutzerkonto. Jetzt &lt;a href="?action=login">anmelden&lt;/a>.\';
			return;
		}
		
		$content->userdata->$user = password_hash($_POST[\'password\'], PASSWORD_DEFAULT);
		
		$check = file_put_contents($filename, json_encode($content), LOCK_EX);
		
		if($check === false) {
			echo "Bitte erneut versuchen.";
		} else {
			echo "Registrierung erfolgreich.";
		}
	}
	
	register();
} else {
	echo \'Bereits registriert? Jetzt &lt;a href="?action=login">anmelden&lt;/a>\';
}
?>
&lt;/div>
&lt;/div></pre>

	<p><span>Das Ergebnis sieht dann etwa so aus:</span>
	<iframe src="resources/u10_1_solution.php" title="Aufgabe 10.1"></iframe>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 10.1");
}
?>