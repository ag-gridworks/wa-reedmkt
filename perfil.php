<?php include ("header.php"); ?>
<?php if (isset($_SESSION['uid'])): ?>
	<?php
	if(isset($_GET['ver'])):

	$profile_id = $_GET['profile_id'];

	$profile_get = mysql_query("SELECT * FROM user WHERE id = '$profile_id'") or die(mysql_error());
	$profile = mysql_fetch_assoc($profile_get);

	$profile_name = $profile['username'];
	$profile_email = $profile['email'];
	$profile_floor = $profile['profile_floor'];
	$profile_phone = $profile['profile_phone'];
	$profile_sector = $profile['profile_sector'];

	$profile_cover = $profile['profile_cover'];
	$profile_image = $profile['profile_image'];

	// echo strlen($profile_cover);
	?>
	<?php if (strlen($profile_cover) == 0) {
		$get_profile_cover = "background: url('images/default.jpg')";
	} else
		$get_profile_cover = "background: url('fotos/<?php echo $profile_cover; ?>') no-repeat center center;
		background-size: cover;"
		?>
	<section style="<?php echo "$get_profile_cover"; ?>" class="go-hero">
		<div class="hero-content">
			<div class="profile-image">
				<img src="fotos/<?php echo "$profile_image"; ?>" alt="">
			</div>

			<div class="profile-username">
				<?php echo "$profile_name"; ?>
			</div>

			<?php if($user_id == $profile_id): ?>
				<a style="margin-top: 15px" class="go-button small call" href="alterar-perfil.php">Editar Perfil</a>
			<?php endif; ?>
				
		</div>
	</section>

	<div class="rx_wrapper">
	<div class="go-title-area center">
			<h3 class="go-title x1">Informações</h3>
		</div>
		<section class="default-services go-flex center">
			<div class="default-services__item">
				<div class="item-inner go-box-1 hover-1">
					<div class="item-icon">
					<i class="fa fa-envelope-open-o" aria-hidden="true"></i>
					</div>
					
					<div class="item-title">
						E-Mail
					</div>

					<div class="item-content">
						<?php echo $profile_email ?>
					</div>
				</div>
			</div>

			<div class="default-services__item">
				<div class="item-inner go-box-1 hover-1">
					<div class="item-icon">
					<i class="fa fa-building-o" aria-hidden="true"></i>
					</div>
					
					<div class="item-title">
						Andar
					</div>

					<div class="item-content">
						<?php echo $profile_floor ?>
					</div>
				</div>
			</div>

			<div class="default-services__item">
				<div class="item-inner go-box-1 hover-1">
					<div class="item-icon">
					<i class="fa fa-phone" aria-hidden="true"></i>
					</div>
					
					<div class="item-title">
						Ramal
					</div>

					<div class="item-content">
						<?php echo $profile_phone ?>
					</div>
				</div>
			</div>

			<div class="default-services__item">
				<div class="item-inner go-box-1 hover-1">
					<div class="item-icon">
					<i class="fa fa-address-card-o" aria-hidden="true"></i>
					</div>
					
					<div class="item-title">
						Setor
					</div>

					<div class="item-content">
						<?php echo $profile_sector ?>
					</div>
				</div>
			</div>
		</section>

		<div class="go-title-area center">
			<h3 class="go-title x1">Vendas de <?php echo "$profile_name"; ?></h3>
		</div>


		<section class="default-services go-flex center">
	<?php
	$query = "SELECT * FROM vendas WHERE user_id = '$profile_id'";
	if ($result = $mysqli->query($query)): ?>
	<?php while($obj = $result->fetch_object()): ?>

		<div class="default-services__item">
		<form style="height: 100%" method="GET" action="produto.php">
			<div class="item-inner go-box-7 hover-1">
				<div class="item-thumb">
					<img src="fotos/<?php echo "$obj->image"; ?>" alt="">
				</div>

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


					<input type="hidden" value="<?php echo $obj->id ?>" name="product_id">
					<input type="hidden" value="<?php echo $obj->user_id ?>" name="profile_id">
					<input class="go-button small" style="margin-top: 20px" type="submit" value="Ver Produto" name="ver">

					<!-- <div class="item-content">
						<?php $a = getExcerpt($obj->description); ?>
						<?php echo "$a"; ?>
					</div> -->


				</div>
			</div>
			</form>
		</div>

	<?php endwhile; ?>
<?php endif; ?>
</section>
	</div>


<?php endif; ?>
<?php endif; ?>

<?php require_once("footer.php") ?>