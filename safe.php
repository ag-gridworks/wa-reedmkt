<?php

$user_get = mysql_query("SELECT * FROM `user` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
$user = mysql_fetch_assoc($user_get);

$user_id = $user['id'];
$username = $user['username'];

$mysqli = new mysqli("localhost", "vitor", "admin", "reedx");