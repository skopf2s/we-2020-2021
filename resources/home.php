<?php
if(basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"])) {
  header("Location: ../home");
}

require("content.php");

function getContent($args = array()) {
	global $index;

	$string = "";
	
	$limit = isset($args['limit']) && is_numeric($args['limit']) ? $args['limit'] : 15;
	$page = isset($args['page']) && is_numeric($args['page']) ? $args['page'] : 1;
	
	$string .= '<div class="flex-wrapper">';
	for($i = ($page-1)*$limit; (isset($index[$i]) && $i < $page*$limit); $i++) {
		$string .= '<div class="flexbox"><div class="flexheader"><b>'.$index[$i]["header"].'</b></div><div class="flexcontent">'.$index[$i]["content"].'</div></div>';
	}
	$string .= "</div>";
	
	$string .= '<div class="prevnext">';
	for($i = 1; $i < (count($index)/$limit)+1; $i++) {
		if(isset($args['limit']) && is_numeric($args['limit'])) {
			$string .= '<a href="home?page='.$i.'&limit='.$args['limit'].'">'.$i.'</a>';
		} else {
			$string .= '<a href="home?page='.$i.'">'.$i.'</a>';
		}
	}
	$string .= '</div>';
	
	return $string;
}

function getHeader($args) {
	return array("title"=>"Hauptseite");
}
?>