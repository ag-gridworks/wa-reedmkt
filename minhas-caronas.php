<?php include("header.php") ?>
<div class="rx_wrapper">
<div class="go-title-area center">
	<h2 class="go-title x1">
		Minhas Caronas
	</h2>
</div>

<?php if ($ride_status == null || 0): ?>

<div class="go-title-area center">
	Suas Caronas não estão habilitadas. <br><br>
	<a href="cadastrar-carona.php" class="go-button small">Habilitar Caronas</a>
</div>

<?php else: ?>
<?php echo "Caronas habilitadas" ?>
<?php endif; ?>

<div class="go-title-area center">
	<h4 class="go-title x1">
		Pessoas oferecendo carona
	</h4>
</div>

<?php include("footer.php") ?>