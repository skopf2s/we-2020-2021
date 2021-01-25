<link rel="stylesheet" href="u10_3.css" />
<div id="form">
<form method="POST">
<input type="text" name="name" placeholder="Benutzername" autocomplete="off" value="<?php if(isset($_POST['name'])) echo $_POST['name'] ?>" /><br />
<input type="password" name="password" placeholder="Passwort" /><br />
<input type="password" name="password_verify" placeholder="Passwort bestätigen" /><br />
<input type="submit" value="Registrieren">
</form>
<div>
<?php
if(isset($_POST['name']) && isset($_POST['password']) && isset($_POST['password_verify'])) {
	ini_set('display_errors', 0);
	
	function register() {
		if($_POST['password'] !== $_POST['password_verify']) {
			echo "Die angegebenen Passwörter sind nicht identisch.";
			return;
		}
		
		$filename = "./data.json";
		
		if(file_exists($filename)) {
			$content = json_decode(file_get_contents($filename));
		} else {
			$content = new stdClass();
		}
		
		$user = $_POST['name'];
		
		if(isset($content->userdata->$user)) {
			echo 'Unter diesem Namen existiert bereits ein Benutzerkonto. Jetzt <a href="?action=login">anmelden</a>.';
			return;
		}
		
		$content->userdata->$user = password_hash($_POST['password'], PASSWORD_DEFAULT);
		
		$check = file_put_contents($filename, json_encode($content), LOCK_EX);
		
		if($check === false) {
			echo "Bitte erneut versuchen.";
		} else {
			echo "Registrierung erfolgreich.";
		}
	}
	
	register();
} else {
	echo 'Bereits registriert? Jetzt <a href="?action=login">anmelden</a>';
}
?>
</div>
</div>