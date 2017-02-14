<?php
require_once("header.php");
?>
<?php if(isset($_SESSION['uid'])): ?>

	<?php $profile_get = mysql_query("SELECT * FROM user WHERE id = '$user_id'") or die(mysql_error());
	$profile = mysql_fetch_assoc($profile_get);
	$profile_cover = $profile['profile_cover'];
	?>

	<section style="background: url('fotos/<?php echo "$profile_cover"; ?>') no-repeat center center;
		background-size: cover;" class="go-hero">
		<div class="hero-content">
			<div class="profile-image">
				<img src="images/posts/card090.jpg" alt="">
			</div>

			<div class="profile-username">
				<?php echo "$username"; ?>
			</div>

			<form method="get" action="perfil.php">
					<input type="hidden" value="<?php echo $user_id ?>" name="profile_id">
					<input style="margin: 18px" class="go-button small call" type="submit" value="Ver Perfil" name="ver">
				</form>
		</div>
	</section>

	<div class="rx_wrapper">
	
	<div class="go-title-area center">
	<h3 class="go-title x1">
		Seus anúncios
	</h3>
	</div>

	<?php include("suas-vendas.php") ?>

<?php else: ?>
	<div style="padding: 60px" class="rx_wrapper center">
		<a href="signin.php" class="go-button">Entrar</a>
		<a href="signup.php" class="go-button">Registrar</a>
	</div>
<?php endif; ?>
