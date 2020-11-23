<?php
require_once("resources/skin.php");

if(!empty($_GET['title'])) {
	if(file_exists("resources/".$_GET['title'].".php")) {
		require_once("resources/".$_GET['title'].".php");
		generateSkin(getContent($_GET), getHeader($_GET));
	} else {
		http_response_code(404);
		require_once("resources/throw404.php");
		generateSkin(getContent($_GET), getHeader($_GET));
	}
} else {
	header("Location: home");
}
?>