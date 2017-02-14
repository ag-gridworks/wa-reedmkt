<?php
include("header.php");
//////////////////////////////////////////////////////////////////////////////////////////////////////////
//DELETAR PRODUTOS DO BANCO DE DADOS
if (isset($_POST['deletar'])):

    $product_id = $_POST['product_id'];
    $database = $_POST['database'];

    $deletar = mysql_query("DELETE FROM $database WHERE id = $product_id") or die(mysql_error());
    $deletar = mysql_query("DELETE FROM lances WHERE product_id = $product_id") or die(mysql_error());


header('Location: ' . $_SERVER['HTTP_REFERER']);

endif;