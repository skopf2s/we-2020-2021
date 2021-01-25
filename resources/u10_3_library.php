<?php
$filename = "./u10_3.json";

function loadContent() {
	global $filename;
	
	if(saveContent() === -1) {
		return;
	}
	
	$navigator = isset($_GET['navigator']) ? $_GET['navigator'] : "html";
	
	$content = json_decode(file_get_contents($filename));
	
	$contentString = "";
	
	if(isset($_GET['action']) && $_GET['action'] === "edit" && isset($_SESSION['username'])) {
		if(isset($_GET['category'])) {
			$contentString = '<form method="POST" action="?navigator='.$navigator.'&category='.$_GET['category'].'"><textarea name="content">';
		} else {
			$contentString = '<form method="POST" action="?navigator='.$navigator.'"><textarea name="content">';
		}
	}
	
	if(isset($_GET['category'])) {
		$category = $_GET['category'];
		$contentString .= $content->$navigator->$category->content;
		$_SESSION['content'] = $content->$navigator->$category->content;
	} else {
		$contentString .= $content->$navigator->content;
		$_SESSION['content'] = $content->$navigator->content;
	}
	
	if(isset($_GET['action']) && $_GET['action'] === "edit" && isset($_SESSION['username'])) {
		$contentString .= '</textarea><br /><input type="submit" value="Änderungen speichern" /></form>';
	} else if(isset($_SESSION['username'])) {
		if(isset($_GET['category'])) {
			$contentString .= '<a href="?navigator='.$navigator.'&category='.$_GET['category'].'&action=edit" class="edit">Bearbeiten</a>';
		} else {
			$contentString .= '<a href="?navigator='.$navigator.'&action=edit" class="edit">Bearbeiten</a>';
		}
	}
	
	echo $contentString;
}

function loadDropdown() {
	global $filename;
	
	$navigator = isset($_GET['navigator']) ? $_GET['navigator'] : "html";
	
	$content = json_decode(file_get_contents($filename));
	
	$dropdownString = "<ul>";
	
	foreach($content->$navigator as $dropdown => $dropdownContent) {
		if(!is_array($dropdownContent) && is_object($dropdownContent)) {
			$dropdownString .= '<li><a href="?navigator='.$navigator.'&category='.$dropdown.'">'.$dropdownContent->name.'</a></li>';
		}
	}
	
	echo $dropdownString;
}

function loadNavigator() {
	global $filename;
	
	$content = json_decode(file_get_contents($filename));
	
	$navigatorString = "<ul>";
	
	foreach($content as $navigator => $navigatorContent) {
		$navigatorString .= '<li><a href="?navigator='.$navigator.'">'.$content->$navigator->name.'</a></li>';
	}
	
	if(isset($_SESSION['username'])) {
		$navigatorString .= '<li><a href="?action=logout">Abmelden</a></li>';
		$navigatorString .= '<li>'.$_SESSION['username'].'</li>';
	} else {
		$navigatorString .= '<li><a href="?action=register">Registrieren</a></li>';
		$navigatorString .= '<li><a href="?action=login">Anmelden</a></li>';
	}
	
	$navigatorString .= "</ul>";
	
	echo $navigatorString;
}

function loadReferences() {
	global $filename;
	
	$content = json_decode(file_get_contents($filename));
	
	$navigator = isset($_GET['navigator']) ? $_GET['navigator'] : "html";
	
	if(isset($_GET['category'])) {
		$category = $_GET['category'];
		
		$referencesString = "<ul>";
		foreach($content->$navigator->$category->references as $reference) {
			$referencesString .= '<li><a href="'.$reference.'">'.$reference.'</a>';
		}
		$referencesString .= "</ul>";
	} else {
		$referencesString = "<ul>";
		foreach($content->$navigator->references as $reference) {
			$referencesString .= '<li><a href="'.$reference.'">'.$reference.'</a>';
		}
		$referencesString .= "</ul>";
	}
	echo $referencesString;
}

function logout() {
	session_destroy();
	header("Refresh: 0, url=u10_3_solution.php");
}

function saveContent() {
	global $filename;
	
	$navigator = isset($_GET['navigator']) ? $_GET['navigator'] : "html";
	
	// only save when there is something to save
	if(isset($_POST['content'])) {
		$content = json_decode(file_get_contents($filename));
		
		if(isset($_GET['category'])) {
			// check if the version in the file is the same as one before user started editing
			// (prevent lost update)
			if(trim($content->$navigator->$category->content) === trim($_SESSION['content'])) {
				// don't write to file if version is identical
				if(trim($content->$navigator->$category->content) !== trim($_POST['content'])) {
					$content->$navigator->$category->content = trim($_POST['content']);
					
					file_put_contents($filename, json_encode($content), LOCK_EX);
				}
			} else {
				echo '<span class="alert">Die Seite wurde gerade von jemand anderem bearbeitet und deine Änderung konnte nicht gespeichert werden. Dein Text:</span>
				<textarea>'.$_POST['content'].'</textarea>
				<span class="alert">Der Aktuelle Inhalt dieser Seite ist:</span>
				<textarea>'.trim($content->$navigator->$category->content).'</textarea>';
				return -1;
			}
		} else {
			// check if the version in the file is the same as one before user started editing
			// (prevent lost update)
			if(trim($content->$navigator->content) === trim($_SESSION['content'])) {
				// don't write to file if version is identical
				if(trim($content->$navigator->content) !== trim($_POST['content'])) {
					$content->$navigator->content = trim($_POST['content']);
					
					file_put_contents($filename, json_encode($content), LOCK_EX);
				}
			} else {
				echo '<span class="alert">Die Seite wurde gerade von jemand anderem bearbeitet und deine Änderung konnte nicht gespeichert werden. Dein Text:</span>
				<textarea>'.$_POST['content'].'</textarea>
				<span class="alert">Der Aktuelle Inhalt dieser Seite ist:</span>
				<textarea>'.trim($content->$navigator->content).'</textarea>';
				return -1;
			}
		}
		
		unset($_POST['content']);
	}
}
?>