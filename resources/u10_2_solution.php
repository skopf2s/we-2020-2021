<link rel="stylesheet" href="u10_3.css" />
<div id="form">
<form method="POST">
<input type="text" name="name" placeholder="Benutzername" autocomplete="off" value="<?php if(isset($_POST['name'])) echo $_POST['name'] ?>" /><br />
<input type="password" name="password" placeholder="Passwort" /><br />
<input type="submit" value="Einloggen" />
</form>
<div>
<?php
if(isset($_POST['name']) && isset($_POST['password'])) {
	ini_set('display_errors', 0);
	
	function login() {
		if(isset($_SESSION['lock_expires']) && $_SESSION['lock_expires'] > time()) {
			echo "Du hast zu häufig versucht, dich einzuloggen. Bite versuche es nach ".date("H:i", $_SESSION['lock_expires'])." Uhr erneut.";
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
		
		$user = $_POST['name'];
		
		if(password_verify($_POST['password'], $content->userdata->$user)) {
			$_SESSION['username'] = $_POST['name'];
			$_SESSION['tries'] = 0;
			$_SESSION['lock_expires'] = 0;
			echo "Login erfolgreich. Du wirst in Kürze weitergeleitet.";
			header("Refresh: 2, url=u10_3_solutions.php");
		} else {
			$_SESSION['tries']++;
			if($_SESSION['tries'] >= 3) {
				$_SESSION['lock_expires'] = time()+300;
			}
			echo "Benutzername oder Passwort falsch. Bitte versuche es erneut.";
		}
	}
	
	login();
} else {
	if(isset($_SESSION['lock_expires']) && $_SESSION['lock_expires'] > time()) {
		echo "Du hast zu häufig versucht, dich einzuloggen. Bite versuche es nach ".date("H:i", $_SESSION['lock_expires'])." Uhr erneut.";
	} else {
		echo 'Neu hier? Jetzt <a href="?action=register">Benutzerkonto erstellen</a>';
	}
}
?>
</div>
</div>