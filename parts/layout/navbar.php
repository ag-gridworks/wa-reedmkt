<?php if(isset($_SESSION['uid'])): ?>
	<header class="go-navbar">
		<ul class="topnav" id="myTopnav">
			<li><a class="brand" href="index.php">Reed<b>HUB</b></a></li>
			<!-- <li><a href="#news">item1</a></li>
			<li><a href="#contact">item2</a></li>
			<li><a href="#about">item3</a></li> -->
			
			<li class="nav-button"><a class="button red" href="signout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a></li>
			<li class="nav-button"><a class="button" href="<?php echo "$profile_url"; ?>">Perfil</a></li>
			<li class="nav-button"><a class="button" href="cadastrar-anuncio.php">Anunciar</a></li>
			<li class="nav-button"><a class="button" href="caronas.php">Caronas</a></li>
			<li class="nav-button"><a class="button" href="anuncios.php">À venda</a></li>
			<li class="nav-button"><a class="button" href="index.php">Inicio</a></li>
			<li class="nav-button">
			</li>

				<li class="icon">
					<a href="javascript:void(0);" onclick="myFunction()"><i class="fa fa-navicon" aria-hidden="true"></i></a>
				</li>
			</ul>
		</header>
		<div class="clear"></div>
		<div style="padding-bottom: 56px;"></div>
	<?php else: ?>
	<?php endif; ?>