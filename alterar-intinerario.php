<?php include ("header.php"); ?>
<div class="rx_wrapper">
  <?php if (isset($_SESSION['uid'])):


//INICIA A CONSULTA AO ITEM NO BANCO DE DADOS
  $listar = mysql_query("SELECT * FROM caronas WHERE user_id = '$user_id'") or die(mysql_error());
  $item = mysql_fetch_assoc($listar);

  $start = $item['start'];

  $ref1 = $item['ref1'];
  $ref2 = $item['ref2'];

  $point1 = $item['point1'];
  $point2 = $item['point2'];

  ?>

  <div class="go-title-area center">
    <h3 class="go-title x1">Alterar Caminho</h3>
  </div>

  <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="alterar">
    <div class="form-group">
      <label for="exampleInputEmail1">Ponto de Partida</label>
      <input required class="form-control" type="text" name="start" id="autocomplete" value="<?php echo "$start"; ?>">
    </div>
    <br><br>
    <div class="form-group">
      <label for="exampleInputEmail1">Ponto de Referência 1</label>
      <small id="fileHelp" class="form-text text-muted">Ponto de referencia próximo ao endereço de partida</small>
      <input required class="form-control" type="text" name="ref1" id="autocomplete2" value="<?php echo "$ref1"; ?>">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Ponto de Referência 2</label>
      <small id="fileHelp" class="form-text text-muted">Ponto de referencia próximo ao endereço de partida</small>
      <input required class="form-control" type="text" name="ref2" id="autocomplete3" value="<?php echo "$ref2"; ?>">
    </div>
    <br><br>
    <div class="form-group">
      <label for="exampleInputEmail1">Ponto no caminho 1</label>
      <small id="fileHelp" class="form-text text-muted">Ponto de referencia por onde você passa durante o caminho</small>
      <input required class="form-control" type="text" name="point1" id="autocomplete4" value="<?php echo "$point1"; ?>">
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Ponto no caminho 2</label>
      <small id="fileHelp" class="form-text text-muted">Ponto de referencia por onde você passa durante o caminho</small>
      <input required class="form-control" type="text" name="point2" id="autocomplete5" value="<?php echo "$point2"; ?>">
    </div>

    <div class="go-title-area center">
      <input type="hidden" name="user_id" value="<?php echo "$user_id"; ?>">
      <input class="go-button small" type="submit" name="alterar" value="Alterar Caminho">
    </div>
  </form>
  <?php
  if (isset($_POST['alterar'])) {

    $user_id = $_POST['user_id'];
    $start = $_POST['start'];

    $ref1 = $_POST['ref1'];
    $ref2 = $_POST['ref2'];

    $point1 = $_POST['point1'];
    $point2 = $_POST['point2'];


    $status = 1;

    $sql = mysql_query("UPDATE caronas SET start = '$start', ref1 = '$ref1', ref2 = '$ref2', point1 = '$point1', point2 = '$point2' WHERE user_id = '$user_id'");
    if(!$sql)
      die ("The error is: " . mysqli_error($connection));
    else
      echo "<script>location.href = 'caronas.php';</script>";
  }
  endif;
  ?>
</div>

<?php require_once("footer.php") ?>
