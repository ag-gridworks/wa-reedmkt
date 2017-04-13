<?php include("header.php") ?>
<div class="rx_wrapper">
<div class="go-title-area center">
	<h2 class="go-title x1">
		Minhas Caronas
	</h2>
</div>
<?php if ($ride_status == null || 0): ?>

<div class="go-title-area center">
	Suas caronas não estão habilitadas. <br><br>
	<a href="cadastrar-carona.php" class="go-button small">Habilitar Caronas</a>
</div>
<?php else: ?>
<div class="go-title-area center">
	<p>Suas caronas estão habilitadas.</p>
	<form action="process.php" method="POST">
		<input type="submit" name="desabilitar" value="Desabilitar Caronas" class="go-button small red">
		<a href="alterar-intinerario.php" class="go-button small">Alterar Caminho</a>
	</form>
</div>
<?php endif; ?>

<div class="go-title-area center">
	<h4 class="go-title x1">
		Pessoas oferecendo carona
	</h4>
</div>

<section class="default-services go-flex center">
	<?php
	$query = "SELECT * FROM caronas";
	if ($result = $mysqli->query($query)): ?>
	<?php while($obj = $result->fetch_object()): ?>

		<?php
		$profile_id = $obj->user_id;
		?>
		
		<?php
		$profile_get = mysql_query("SELECT * FROM user WHERE id = '$profile_id'") or die(mysql_error());
		$profile = mysql_fetch_assoc($profile_get);
		$profile_username = $profile['username'];
		$profile_image = $profile['profile_image'];
		$profile_id = $profile['id'];
		?>

		<div class="default-services__item">
		<form style="height: 100%" method="GET" action="produto.php">
			<div class="item-inner go-box-1 hover-1">

				<div class="item-thumb">
					<img src="fotos/<?php echo "$profile_image"; ?>" alt="">
				</div>

					<div class="item-subtitle">
						<?php echo "$profile_username"; ?>
					</div>
					
					<div class="item-content">
						<i style="color: #e74c3c" class="fa fa-map-marker" aria-hidden="true"></i>
						<b>Ponto inicial</b>
						<p><?php echo "$obj->start"; ?></p>
					</div>
					<div class="item-options">
						<a href="<?php echo userUrl($profile_id) ?>" class="go-button small">Ver Perfil</a>
					</div>
			</div>
			</form>
		</div>

	<?php endwhile; ?>
<?php endif; ?>
</section>

<?php include("footer.php") ?>