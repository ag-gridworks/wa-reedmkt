<?php

$user_get = mysql_query("SELECT * FROM `user` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
$user = mysql_fetch_assoc($user_get);

$user_id = $user['id'];
$username = $user['username'];
$profile_url = "perfil.php?profile_id=$user_id&ver=Ver+Perfil";

$mysqli = new mysqli("localhost", "root", "", "reedx");

$get_sales_count = mysql_query("SELECT user_id FROM vendas WHERE user_id = '$user_id'");
$sales_count = mysql_num_rows($get_sales_count);

$get_messages_count = mysql_query("SELECT seller_id FROM lances WHERE seller_id = '$user_id' AND status = 0");
$messages_count = mysql_num_rows($get_messages_count);

$get_all_messages = mysql_query("SELECT seller_id FROM lances WHERE seller_id = '$user_id'");
$all_messages_count = mysql_num_rows($get_all_messages);