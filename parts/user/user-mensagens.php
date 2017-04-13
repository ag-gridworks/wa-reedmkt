<div class="product-style center">
	<div class="table-responsive"> 
		<table class="table table-striped table-bordered sortable" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Usuário</th>
					<th>Produto</th>
					<th width="160px">Data</th>
					<th width="100px">Valor do Lance</th>
					<th>Mensagem</th>
					<th width="160px">Ações</th>
				</tr>
			</thead>
			<?php 
			$query = "SELECT * FROM lances WHERE seller_id = $user_id ORDER BY id DESC";
			if ($result = $mysqli->query($query)): ?>
			<?php while($obj = $result->fetch_object()): ?>
				<?php
				$buyer_id = $obj->buyer_id;
				$product_id = $obj->product_id;
				$message_id = $obj->id;
				$message_status = $obj->status;
				?>
				<?php $profile_get = mysql_query("SELECT * FROM user WHERE id = '$buyer_id'") or die(mysql_error());
				$profile = mysql_fetch_assoc($profile_get);
				$profile_username = $profile['username'];
				$profile_image = $profile['profile_image'];
				$user_url = userUrl($buyer_id);
				?>

				<?php $product_get = mysql_query("SELECT * FROM vendas WHERE id = '$product_id'") or die(mysql_error());
				$product = mysql_fetch_assoc($product_get);
				$product_name = $product['name'];
				?>
				<tr>
					<td><img class="profile_image" src="<?php echo "fotos/$profile_image"; ?>" alt=""><br><?php echo "$profile_username" ?></td>
					<td><?php echo "$product_name" ?></td>
					<td><?php echo $obj->tdate ?></td>
					<td>R$ <?php echo $obj->value ?></td>
					<td><?php echo $obj->message ?></td>
					<td>
						<button
						id="messageStatus<?php echo "$message_id"; ?>"
						class="go-button small full <?php if($message_status == 0)echo "blue"; else echo "green"; ?>"
						onclick="markRead(<?php echo "$message_id" ?>)"
						>
						<?php if($message_status == 0)echo "Marcar como Lido"; else echo "Lido"; ?>
						</button>

						<a class="go-button small purple full" href="<?php echo "$user_url"; ?>">Ver Perfil</a>
					</td>
				</tr>
			<?php endwhile; ?>
		<?php endif; ?>
	</table>
</div>
</div>
<div style="margin-bottom: 60px">
</div>