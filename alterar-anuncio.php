<?php include ("header.php"); ?>
<?php if (isset($_SESSION['uid'])): ?>
<?php if(isset($_POST['alterar'])):

//VAR
  $product_id = $_POST['product_id'];

//INICIA A CONSULTA AO ITEM NO BANCO DE DADOS
  $listar = mysql_query("SELECT * FROM vendas WHERE id = '$product_id'") or die(mysql_error());
  $item = mysql_fetch_assoc($listar);

//VARIAVEIS DO ITEM EM CONSULTA

  $name = $item['name'];
  $value = $item['value'];
  $description = $item['description'];

  endif; ?>

 <div class="rx_wrapper">

<div class="go-title-area center">
  <h3 class="go-title x1">Alterar Venda</h3>
</div>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="alterar-venda">
  <div class="form-group">
    <label for="exampleInputEmail1">Nome do Produto</label>
    <input class="form-control" type="text" name="name" value="<?php echo"$name" ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Valor Produto</label>
     <small id="fileHelp" class="form-text text-muted">Em reais, preencher somente números</small>
    <input type="number" step="0.01" class="form-control" name="value"  value="<?php echo"$value" ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Descrição</label>
        <textarea input="text" name="description" class="form-control" rows="3"><?php echo "$description"; ?></textarea>
  </div>
  
<div class="go-title-area center">
  <input type="hidden" value="<?php echo $product_id ?>" name="product_id">
  <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
  <button type="submit" class="go-button" name="alterar1">Alterar</button>
</div>
</form>



<?php

if (isset($_POST['alterar1'])) {

  $name = $_POST['name'];
  $value = $_POST['value'];
  $description = $_POST['description'];
  $product_id = $_POST['product_id'];
  $user_id = $_POST['user_id'];  

       $sql = mysql_query("UPDATE vendas SET name = '$name', value = '$value', description = '$description' WHERE id = '$product_id'");

       if(!$sql)
          die ("The error is: " . mysqli_error($connection));
        else
          echo "<script>location.href = 'index.php';</script>";
  }


endif;
?>
</div>

<?php require_once("footer.php") ?>
