<div class="go-title-area center">
	<h3 class="go-title x1">
		Dashboard
	</h3>
</div>

<div class="dashboard go-flex center">
	<div class="dashboard__item" onclick="location.href='minhas-vendas.php'">
		<div class="item-inner go-box-1 hover-1">
			<div class="item-icon">
				<i class="fa fa-dollar" aria-hidden="true"></i>
			</div>

			<div class="item-title">
				Suas Vendas
			</div>

			<div class="item-subtitle hide">
				Sub-Titulo
			</div>

			<div class="item-content">
				<?php if ($sales_count == 0) {
					echo "Você não possui nenhum item à venda";
				} elseif ($sales_count == 1) {
					echo "Você possui <span class=\"count\">$sales_count</span> item à venda";
				} else echo "Você possui <span class=\"count\">$sales_count</span> itens à venda";
				?>
			</div>

			<div class="item-options hide">
				<button class="go-button small">Botão</button>
			</div>
		</div>
	</div>

	<div class="dashboard__item" onclick="location.href='minhas-caronas.php'">
		<div class="item-inner go-box-1 hover-1">
			<div class="item-icon">
				<i class="fa fa-car" aria-hidden="true"></i>
			</div>

			<div class="item-title">
				Caronas
			</div>

			<div class="item-subtitle hide">
				Sub-Titulo
			</div>

			<div class="item-content">
				Você ainda não cadastrou um intinerário
			</div>

			<div class="item-options hide">
				<button class="go-button small">Botão</button>
			</div>
		</div>
	</div>

	<div class="dashboard__item" onclick="location.href='minhas-mensagens.php'">
		<div class="item-inner go-box-1 hover-1">
			<div class="item-icon">
				<i class="fa fa-envelope-open-o" aria-hidden="true"></i>
			</div>

			<div class="item-title">
				Mensagens
			</div>

			<div class="item-subtitle hide">
				Sub-Titulo
			</div>

			<div class="item-content">
				<?php if ($messages_count == 0) {
					echo "Você não possui nenhum nova mensagem";
				} elseif ($messages_count == 1) {
					echo "Você possui <span class=\"count\">$messages_count</span> nova mensagem";
				} else echo "Você possui <span class=\"count\">$messages_count</span> novas mensagens";
				?>
			</div>

			<div class="item-options hide">
				<button class="go-button small">Botão</button>
			</div>
		</div>
	</div>
</div>