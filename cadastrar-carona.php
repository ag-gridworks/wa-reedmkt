<?php include ("header.php"); ?>

<?php if (isset($_SESSION['uid'])): ?>

	<div class="rx_wrapper">
		
		<div class="go-title-area center">
			<h3 class="go-title x1">Cadastrar Intinerário</h3>
		</div>

		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro">
			<div class="form-group">
				<label for="exampleInputEmail1">Ponto de Partida</label>
				<input required class="form-control" type="text" name="start_point" id="autocomplete">
			</div>
			<br><br>
			<div class="form-group">
				<label for="exampleInputEmail1">Ponto de Referência 1</label>
				<small id="fileHelp" class="form-text text-muted">Ponto de referencia próximo ao endereço de partida</small>
				<input required class="form-control" type="text" name="ref1" id="autocomplete2">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Ponto de Referência 2</label>
				<small id="fileHelp" class="form-text text-muted">Ponto de referencia próximo ao endereço de partida</small>
				<input required class="form-control" type="text" name="ref2" id="autocomplete3">
			</div>
			<br><br>
			<div class="form-group">
				<label for="exampleInputEmail1">Ponto no caminho 1</label>
				<small id="fileHelp" class="form-text text-muted">Ponto de referencia por onde você passa durante o caminho</small>
				<input required class="form-control" type="text" name="point1" id="autocomplete4">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Ponto no caminho 2</label>
				<small id="fileHelp" class="form-text text-muted">Ponto de referencia por onde você passa durante o caminho</small>
				<input required class="form-control" type="text" name="point2" id="autocomplete5">
			</div>

			<div class="go-title-area center">
			<input type="hidden" name="user_id" value="<?php echo "$user_id"; ?>">
			<input class="go-button small" type="submit" name="cadastrar" value="Cadastrar Caminho">
			</div>
		</form>
		<?php
		if (isset($_POST['cadastrar'])) {

			$user_id = $_POST['user_id'];
			$start_point = $_POST['start_point'];

			$ref1 = $_POST['ref1'];
			$ref2 = $_POST['ref2'];

			$point1 = $_POST['point1'];
			$point2 = $_POST['point2'];


			$status = 1;

			$sql = mysql_query("INSERT INTO caronas (user_id,start,status,ref1,ref2,point1,point2) VALUES ('$user_id','$start_point','$status','$ref1','$ref2','$point1','$point2')");
			if(!$sql)
				die ("The error is: " . mysqli_error($connection));
			else
				echo "<script>location.href = 'caronas.php';</script>";
		}
		endif;
		?>
		<div style="margin-bottom: 80px"></div>
	</div>
	<?php require_once("footer.php") ?>