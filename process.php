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

if (isset($_POST['status'])):

    $message_id = $_POST['message_id'];

    $sql = mysql_query("UPDATE lances SET status = 1 WHERE id = '$message_id'") or die(mysql_error());

    if(!$sql)
          die ("The error is: " . mysqli_error($connection));
        else
          echo "<script>location.href = 'minhas-mensagens.php';</script>";

endif;


if (isset($_POST['desabilitar'])):

    $sql = mysql_query("DELETE FROM caronas WHERE user_id = '$user_id' ");
     if(!$sql)
          die ("The error is: " . mysqli_error($connection));
        else
          echo "<script>location.href = 'caronas.php';</script>";
endif;