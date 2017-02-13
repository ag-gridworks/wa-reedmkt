<?php
require_once("header.php");
?>
<?php if(isset($_SESSION['uid'])): ?>

	<section class="go-hero">
		<div class="hero-content">
			<div class="profile-image">
				<img src="images/posts/card090.jpg" alt="">
			</div>

			<div class="profile-username">
				<?php echo "$username"; ?>
			</div>

			<form method="get" action="perfil.php">
					<input type="hidden" value="<?php echo $user_id ?>" name="profile_id">
					<input style="margin: 18px" class="go-button small purple" type="submit" value="Ver Perfil" name="ver">
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
