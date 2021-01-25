<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../u10_2");
}

function getContent($args) {
	return '<h1>Aufgabe 10.2 – Login mit PHP</h1>
	<p><b>Schreiben Sie eine sichere PHP-Lösung für Login, das die persistierten Registrierungsdaten aus der letzten Aufgabe nutzt.</b></p>
	<p><span>Der Code dafür sieht etwa so aus:</span>
	<pre>&lt;div id="form">
&lt;form method="POST">
&lt;input type="text" name="name" placeholder="Benutzername" autocomplete="off" value="&lt;?php if(isset($_POST[\'name\'])) echo $_POST[\'name\'] ?>" />&lt;br />
&lt;input type="password" name="password" placeholder="Passwort" />&lt;br />
&lt;input type="submit" value="Einloggen" />
&lt;/form>
&lt;div>
&lt;?php
if(isset($_POST[\'name\']) && isset($_POST[\'password\'])) {
	ini_set(\'display_errors\', 0);
	
	function login() {
		if(isset($_SESSION[\'lock_expires\']) && $_SESSION[\'lock_expires\'] > time()) {
			echo "Du hast zu häufig versucht, dich einzuloggen. Bite versuche es nach ".date("H:i", $_SESSION[\'lock_expires\'])." Uhr erneut.";
			return;
		}
		
		$filename = "./data.json";
		
		if(file_exists($filename)) {
			$file = fopen($filename, "r");
			$content = json_decode(fread($file, filesize($filename)));
		} else {
			echo "Keine Benutzerkonten vorhanden.";
			return;
		}
		
		$user = $_POST[\'name\'];
		
		if(password_verify($_POST[\'password\'], $content->userdata->$user)) {
			$_SESSION[\'username\'] = $_POST[\'name\'];
			$_SESSION[\'tries\'] = 0;
			$_SESSION[\'lock_expires\'] = 0;
			echo "Login erfolgreich. Du wirst in Kürze weitergeleitet.";
			header("Refresh: 2, url=u10_3.php");
		} else {
			$_SESSION[\'tries\']++;
			if($_SESSION[\'tries\'] >= 3) {
				$_SESSION[\'lock_expires\'] = time()+300;
			}
			echo "Benutzername oder Passwort falsch. Bitte versuche es erneut.";
		}
	}
	
	login();
} else {
	if(isset($_SESSION[\'lock_expires\']) && $_SESSION[\'lock_expires\'] > time()) {
		echo "Du hast zu häufig versucht, dich einzuloggen. Bite versuche es nach ".date("H:i", $_SESSION[\'lock_expires\'])." Uhr erneut.";
	} else {
		echo \'Neu hier? Jetzt &lt;a href="?action=register">Benutzerkonto erstellen&lt;/a>\';
	}
}
?>
&lt;/div>
&lt;/div></pre>

	<p><span>Das Ergebnis sieht dann etwa so aus:</span>
	<iframe src="resources/u10_2_solution.php" title="Aufgabe 10.2"></iframe>
	</p>';
}

function getHeader($args) {
	return array("title"=>"Aufgabe 10.2");
}
?>