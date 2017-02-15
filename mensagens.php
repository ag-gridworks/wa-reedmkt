<div class="product-style center">
	<div class="table-responsive"> 
		<table class="table table-striped table-bordered sortable" cellspacing="0" width="100%">
			<thead>
				<tr>
					<th>Usuário</th>
					<th>Produto</th>
					<th>Data</th>
					<th>Valor do Lance</th>
					<th>Mensagem</th>
				</tr>
			</thead>

			<?php 
			$query = "SELECT * FROM lances WHERE seller_id = $user_id";
			if ($result = $mysqli->query($query)): ?>
			<?php while($obj = $result->fetch_object()): ?>

				<?php
				$buyer_id = $obj->buyer_id ;
				$product_id = $obj->product_id;
				?>
				<?php $profile_get = mysql_query("SELECT * FROM user WHERE id = '$buyer_id'") or die(mysql_error());
				$profile = mysql_fetch_assoc($profile_get);
				$profile_username = $profile['username'];
				$profile_image = $profile['profile_image']; ?>

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

				</tr>

			<?php endwhile; ?>
		<?php endif; ?>
	</table>
</div>
</div>
<div style="margin-bottom: 60px">
</div>