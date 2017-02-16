<?php
function connect(){
	mysql_connect("localhost", "root", "");
	mysql_select_db("reedx");
}
function protect($string){
	return mysql_real_escape_string(strip_tags(addslashes($string)));
}

/**
 * Get excerpt from string
 * 
 * @param String $str String to get an excerpt from
 * @param Integer $startPos Position int string to start excerpt from
 * @param Integer $maxLength Maximum length the excerpt may be
 * @return String excerpt
 */
function getExcerpt($str, $startPos=0, $maxLength=100) {
	if(strlen($str) > $maxLength) {
		$excerpt   = substr($str, $startPos, $maxLength-3);
		$lastSpace = strrpos($excerpt, ' ');
		$excerpt   = substr($excerpt, 0, $lastSpace);
		$excerpt  .= '...';
	} else {
		$excerpt = $str;
	}
	
	return $excerpt;
}

function userUrl ($id) {
	$profile_url = "perfil.php?profile_id=$id&ver=Ver+Perfil";
	return $profile_url;
}

?>