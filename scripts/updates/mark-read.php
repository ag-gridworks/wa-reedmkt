<?php

$con = mysql_connect("localhost","root","");
if (!$con)
{
	die('Could not connect: ' . mysql_error());
}

mysql_select_db("reedx", $con);

$message_id = $_POST['message_id'];

$sql = mysql_query("UPDATE lances SET status = 1 WHERE id = '$message_id'") or die(mysql_error());

if ($sql) {
	return 1;
}