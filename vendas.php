<?php include ("header.php"); ?>
<?php if (isset($_SESSION['uid'])): ?>

<div class="rx_wrapper">
	<div class="go-title-area center">
		<h3 class="go-title x1">
			Últimos Produtos Anunciados
		</h3>
	</div>

	<!-- <form method="GET" action="buscar.php">
  <div class="buscar container">
    <div class="buscar__inner content">
      <div class="input-group">
        <input type="text" class="form-control" name="keywords" placeholder="Faça uma busca...">
        <span class="input-group-btn">
          <input type="submit" name="buscar" value="buscar">
        </span>
      </div>
    </div>
</div>
</form> -->

	<section class="default-services go-flex center">
	<?php
	$query = "SELECT * FROM vendas";
	if ($result = $mysqli->query($query)): ?>
	<?php while($obj = $result->fetch_object()): ?>

		<?php $profile_id = $obj->user_id; ?>
		
		<?php
		$profile_get = mysql_query("SELECT * FROM user WHERE id = '$profile_id'") or die(mysql_error());
		$profile = mysql_fetch_assoc($profile_get);
		$profile_username = $profile['username'];

		?>

		<div class="default-services__item">
		<form method="GET" action="produto.php">
			<div class="item-inner go-box-7 hover-1">
				<div class="item-thumb">
					<img src="fotos/<?php echo "$obj->image"; ?>" alt="">
				</div>
				
				<!-- <?php echo "$obj->id"; ?> -->
				<input type="hidden" value="<?php echo $obj->id ?>" name="product_id">
				<input type="hidden" value="<?php echo $obj->user_id ?>" name="profile_id">
				<input class="go-button small" style="margin-top: 20px" type="submit" value="Ver Produto" name="ver">

				<div class="item-inner">

					<div class="item-title">
						<?php echo "$obj->name"; ?>
					</div>

					<!-- <div class="item-options">
						<form method="POST" action="alterar-produto.php">
							<input type="hidden" value="<?php echo $obj->id ?>" name="product_id">
							<input class="go-button small " type="submit" value="Alterar" name="alterar">
						</form>

						<form method="POST" action="process.php">
							<input type="hidden" value="vendas" name="database">
							<input type="hidden" value="<?php echo $obj->id ?>" name="product_id">
							<input type="submit" class="go-button small  red" value="Deletar" name="deletar">
						</form>
					</div> -->

					<div class="item-subtitle">
						R$<?php echo "$obj->value"; ?>
					</div>

					<div class="item-content">
						<?php echo "$obj->description"; ?>
					</div>
					
					<div class="item-content">
						<?php echo "Vendedor: $profile_username"; ?>
					</div>
				</div>
			</div>
			</form>
		</div>

	<?php endwhile; ?>
<?php endif; ?>
</section>
</div>

<?php endif; ?>