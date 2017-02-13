<?php

function connect(){
	mysql_connect("localhost", "vitor", "admin");
	mysql_select_db("reedx");
}

function protect($string){
	return mysql_real_escape_string(strip_tags(addslashes($string)));
}
