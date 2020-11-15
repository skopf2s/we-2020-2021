<?php
require_once("skin.php");

if(!empty($_GET['title'])) {
	if(file_exists($_GET['title'].".php")) {
		require_once($_GET['title'].".php");
		generateSkin(getContent($_GET), getHeader($_GET));
	} else {
		http_response_code(404);
		require_once("throw404.php");
		generateSkin(getContent($_GET), getHeader($_GET));
	}
} else {
	header("Location: home");
}
?>