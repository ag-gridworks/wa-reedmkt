<?php include("header.php") ?>
<div class="rx_wrapper">
<div class="go-title-area center">
	<h2 class="go-title x1">
		Minhas Mensagens
	</h2>
</div>
<?php if ($all_messages_count == 0): ?>

<div class="go-title-area center">
	Você não possui nenhuma mensagem.
</div>

<?php else: ?>
<?php include("parts/user/user-mensagens.php") ?>
<?php endif; ?>
<?php include("footer.php") ?>