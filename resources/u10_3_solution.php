<?php
session_start();
include("u10_3_library.php");
ini_set('display_errors', 0);
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8"/>
<title>WWW Navi</title>
<link rel="stylesheet" href="u10_3.css" />
</head>
<body>
<div id="frame">
<div id="header">
<h1>WWW-Navigator</h1>
<div id="navigator"><?php loadNavigator() ?></div>
</div>
<div id="dropdown"><?php loadDropdown() ?></div>
<div id="content">
<?php
if(isset($_GET['action']) && $_GET['action'] === "register") {
	include("u10_1_solution.php");
} else if(isset($_GET['action']) && $_GET['action'] === "login") {
	include("u10_2_solution.php");
} else if(isset($_GET['action']) && $_GET['action'] == "logout") {
	logout();
} else {
	loadContent();
}
?>
</div>
<div id="sources">
<div><?php if(empty($_GET['action']) || ($_GET['action'] !== "register" && $_GET['action'] !== "login")) {?><h2>Quellen:</h2><?php } ?></div>
<?php if(empty($_GET['action']) || ($_GET['action'] !== "register" && $_GET['action'] !== "login")) { loadReferences(); } ?>
</div>
<div id="footer">
<h1>Footer:</h1>
<a href="/sitemap">Sitemap</a>
<a href="/home">Home</a>
<a href="/news">News</a>
<a href="/contact">Contact</a>
<a href="/about">About</a>
</div>
</div>
</body>
</html>