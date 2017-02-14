<?php if(isset($_SESSION['uid'])): ?>
	<header class="go-navbar">
		<ul class="topnav" id="myTopnav">
			<li><a class="brand" href="index.php">Reed<b>Market</b></a></li>
			<!-- <li><a href="#news">item1</a></li>
			<li><a href="#contact">item2</a></li>
			<li><a href="#about">item3</a></li> -->
			<li class="nav-button"><a class="button red" href="signout.php"><i class="fa fa-power-off" aria-hidden="true"></i></a></li>
			<li class="nav-button"><a class="button" href="anunciar.php">Anunciar</a></li>
			<li class="nav-button"><a class="button" href="vendas.php">Produtos a venda</a></li>
			<li class="nav-button">
			</li>

				<li class="icon">
					<a href="javascript:void(0);" onclick="myFunction()"><i class="fa fa-navicon" aria-hidden="true"></i></a>
				</li>
			</ul>
		</header>

		<div class="clear"></div>

	<?php else: ?>
	<?php endif; ?>


