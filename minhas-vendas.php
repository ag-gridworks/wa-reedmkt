<?php include("header.php") ?>
<div class="rx_wrapper">
<div class="go-title-area center">
	<h2 class="go-title x1">
		Minhas Vendas
	</h2>
</div>
<?php if ($sales_count == 0): ?>

<div class="go-title-area center">
	Você não possui nenhum anuncio cadastrado. <br><br>
	<a href="cadastrar-anuncio.php" class="go-button small">Cadastrar Anuncio</a>
</div>

<?php else: ?>
<?php include("parts/user/user-vendas.php") ?>
<?php endif; ?>
<?php include("footer.php") ?>