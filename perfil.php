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

	$ride_get = mysql_query("SELECT * FROM caronas WHERE user_id = '$profile_id'") or die(mysql_error());
	$ride = mysql_fetch_assoc($ride_get);

	$ride_start = $ride['start'];
	$ride_r1 = $ride['ref1'];
	$ride_r2 = $ride['ref2'];
	$ride_p1 = $ride['point1'];
	$ride_p2 = $ride['point2'];

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
		
		<?php if ($ride == true): ?>

			<div class="go-title-area center">
				<h3 class="go-title x1">Caminho de <?php echo "$profile_name"; ?></h3>
			</div>

			<section class="ride-box go-flex center">
				<div class="ride-box__item full">
					<item class="item-inner go-box-1">
						<div class="item-title">
							Ponto Inicial
						</div>
						<p><?php echo "$ride_start"; ?></p>
					</item>
				</div>

				<div class="ride-box__item full">
					<iframe id="map" width="100%" height="450" frameborder="0" style="border:0"
					src="
					https://www.google.com/maps/embed/v1/directions
					?origin=<?php echo "$ride_start"; ?>&destination=place_id:ChIJB_-4JC1YzpQRDUKxAt58ThQ&key=AIzaSyDqiduRnLbrr_mkJ01XUhCv9tBbAGpeoWc
					" allowfullscreen></iframe>
				</div>

				<div class="ride-box__item full">
					<div onclick="toggle(ref)" class="ride-toggle">
						Ver Pontos de Referência
					</div>
				</div>

				<div id="ref" class="go-flex">
					<div id="ref1" class="ride-box__item">
						<item class="item-inner go-box-1">
							<div class="item-title">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								Ponto de Referência 1
							</div>
							<p><?php echo "$ride_r1"; ?></p>
						</item>
					</div>

					<div class="ride-box__item">
						<item class="item-inner go-box-1">
							<div class="item-title">
								Ponto de Referência 2
							</div>
							<p><?php echo "$ride_r2"; ?></p>
						</item>
					</div>

					<div class="ride-box__item">
						<item class="item-inner go-box-1">
							<div class="item-title">
								Ponto no Caminho 1
							</div>
							<p><?php echo "$ride_p1"; ?></p>
						</item>
					</div>

					<div class="ride-box__item">
						<item class="item-inner go-box-1">
							<div class="item-title">
								Ponto no Caminho 2
							</div>
							<p><?php echo "$ride_p2"; ?></p>
						</item>
					</div>
				</div>
			</section>

		<?php endif; ?>
		<?php if($sales_count >= 1): ?>
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
<?php endif; ?>
</div>


<?php endif; ?>
<?php endif; ?>

<?php require_once("footer.php") ?>