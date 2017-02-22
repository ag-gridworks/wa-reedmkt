<?php
require_once("header.php");
?>
<?php if(isset($_SESSION['uid'])): ?>

	<?php $profile_get = mysql_query("SELECT * FROM user WHERE id = '$user_id'") or die(mysql_error());
	$profile = mysql_fetch_assoc($profile_get);
	$profile_cover = $profile['profile_cover'];
	$profile_image = $profile['profile_image'];
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
				<?php echo "$username"; ?>
			</div>

			<form method="get" action="perfil.php">
				<input type="hidden" value="<?php echo $user_id ?>" name="profile_id">
				<input style="margin: 18px" class="go-button small call" type="submit" value="Ver Perfil" name="ver">
			</form>
		</div>
	</section>

	<div class="rx_wrapper">
	<?php include("parts/user/user-dashboard.php") ?>

<!-- Usuário Deslogado -->
	<?php else: ?>
		<div class="go-login-page">
			<div class="login-box">
				<div class="box-content">
				<a href="signin.php" class="go-button">Entrar</a>
				<a href="signup.php" class="go-button">Registrar</a>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php require_once("footer.php") ?>