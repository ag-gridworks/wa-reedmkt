<?php include ("header.php"); ?>
<?php if (isset($_SESSION['uid'])): ?>
<?php if(isset($_POST['ofertar'])):

//VAR
  $product_id = $_POST['product_id'];
  $seller_id = $_POST['seller_id'];

  $url = $_SERVER['HTTP_REFERER'];


//INICIA A CONSULTA AO ITEM NO BANCO DE DADOS
  $listar = mysql_query("SELECT * FROM vendas WHERE id = '$product_id'") or die(mysql_error());
  $item = mysql_fetch_assoc($listar);

  $listar_vendedor = mysql_query("SELECT * FROM user WHERE id = '$seller_id'") or die(mysql_error());
  $vendedor = mysql_fetch_assoc($listar_vendedor);

  $vendedor_name = $vendedor['username'];

//VARIAVEIS DO ITEM EM CONSULTA

  $name = $item['name'];
  $value = $item['value'];
  $description = $item['description'];
  endif; ?>

 <div class="rx_wrapper">

<div class="go-title-area center">
  <h3 class="go-title x1">Ofertando em: <?php echo"$name" ?></h3>
  <p style="margin-top: 20px; font-weight: bold;">Vendedor: <?php echo "$vendedor_name"; ?></p>
</div>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="alterar-venda">
  
  <div class="form-group">
    <label for="exampleInputPassword1">Valor da sua oferta</label>
     <small id="fileHelp" class="form-text text-muted">Em reais, preencher somente números</small>
    <input type="number" step="0.01" class="form-control" name="lance_value"  value="<?php echo"$value" ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Mensagem</label>
        <textarea input="text" name="lance_message" class="form-control" rows="3"></textarea>
  </div>
  
<div class="go-title-area center">
  <input type="hidden" value="<?php echo $product_id ?>" name="product_id">
  <input type="hidden" value="<?php echo $seller_id ?>" name="seller_id">
  <input type="hidden" value="<?php echo $user_id ?>" name="buyer_id">
  <button type="submit" class="go-button" name="alterar1">Ofertar</button>
</div>
</form>



<?php

if (isset($_POST['alterar1'])) {

  $seller_id = $_POST['seller_id'];
  $buyer_id = $_POST['buyer_id'];
  $product_id = $_POST['product_id'];
  $lance_value = $_POST['lance_value'];
  $lance_message = $_POST['lance_message']; 

      
         $sql = mysql_query("INSERT INTO lances (seller_id,buyer_id,product_id,message,value,tdate) VALUES ('$seller_id','$buyer_id','$product_id','$lance_message','$lance_value',NOW())");

      if(!$sql)
          die ("The error is: " . mysqli_error($connection));
        else
          echo "<script>location.href = 'vendas.php';</script>";

  }

endif;
?>
</div>
<?php require_once("footer.php") ?>