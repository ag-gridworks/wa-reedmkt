<?php include ("header.php"); ?>
<?php if (isset($_SESSION['uid'])): ?>
	<?php
	if(isset($_GET['ver'])):

	//VARIAVEIS INICIAIS
		$profile_id = $_GET['profile_id'];
	$product_id = $_GET['product_id'];
	//BUSCA PERFIL
	$profile_get = mysql_query("SELECT * FROM user WHERE id = '$profile_id'") or die(mysql_error());
	$profile = mysql_fetch_assoc($profile_get);

	$profile_name = $profile['username'];
	$profile_email = $profile['email'];

	//BUSCA PRODUTO
	$product_get = mysql_query("SELECT * FROM vendas WHERE id = '$product_id'") or die(mysql_error());
	$product = mysql_fetch_assoc($product_get);
	
	$product_image = $product['image'];
	$product_name = $product['name'];
	$product_value = $product['value'];
	$product_description = $product['description'];

	?>


	<div class="rx_wrapper">
		<div class="go-title-area center">
			<h3 class="go-title x1">
				<?php echo "$product_name" ?>
			</h3>
		</div>

		<div class="product-box">
			<div class="product-image">
				<img src="fotos/<?php echo "$product_image"; ?>" alt="">
			</div>

			<div class="product-info">
				<div class="product-seller">
					<?php echo "<i class=\"fa fa-user-circle\" aria-hidden=\"true\"></i> Vendedor: $profile_name"; ?>
				</div>
				<div class="product-value">
					<?php echo "R$ $product_value"; ?>
				</div>
				<button class="go-button small purple">Fazer Oferta</button>
						<form method="get" action="perfil.php">
			<input type="hidden" value="<?php echo $profile_id ?>" name="profile_id">
				<input class="go-button small" type="submit" value="Ver Perfil" name="ver">
			</form>

				<div class="product-description">
					<h3> > Descrição</h3>

					<?php echo "$product_description"; ?>
				</div>
			</div>
		</div>

		<div class="clear"></div>
		<div style="margin-top: 60px" class="go-title-area center">
			<h3 class="go-title x1">
				Histórico de Lances
			</h3>
		</div>
	</div>


<?php endif; ?>
<?php endif; ?>