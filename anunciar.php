<?php include ("header.php"); ?>

<?php if (isset($_SESSION['uid'])): ?>

	<div class="rx_wrapper">
		
		<div class="go-title-area center">
		<h3 class="go-title x1">Cadastrar novo anúncio</h3>
		</div>

		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro">
			<div class="form-group">
				<label for="exampleInputEmail1">Nome</label>
				<input class="form-control" type="text" name="name">
			</div>

			<div class="form-group">
				<label for="exampleInputFile">Imagem do produto</label>
				<input type="file" class="form-control-file" name="foto" aria-describedby="fileHelp">
			</div>

			<div class="form-group">
				<label for="exampleInputPassword1">Valor do produto</label>
				<small id="fileHelp" class="form-text text-muted">Em reais, preencher somente números</small>
				<input type="number" step="0.01" class="form-control" name="value">
			</div>


			<div class="form-group">
				<label for="exampleTextarea">Descrição</label>
				<textarea input="text" name="description" class="form-control" rows="3"></textarea>
			</div>
			
			<div class="go-title-area center">
			<input type="hidden" value="<?php echo $user_id ?>" name="user_id">
			<button type="submit" class="go-button" name="cadastrar">Cadastrar Produto</button>
			</div>
		</form>



		<?php

		if (isset($_POST['cadastrar'])) {

			$name = $_POST['name'];
			$description = $_POST['description'];
			$value = $_POST['value'];
			$foto = $_FILES['foto'];
			$user_id = $_POST['user_id'];

			if (!empty($foto["name"])) {

				$largura = 22500;
				$altura = 27000;
				$tamanho = 60000000;

				if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
					$error[1] = "Isso não é uma imagem.";
				} 

				$dimensoes = getimagesize($foto["tmp_name"]);

				if($dimensoes[0] > $largura) {
					$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
				}

				if($dimensoes[1] > $altura) {
					$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
				}

				if($foto["size"] > $tamanho) {
					$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
				}


				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
				$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

				$caminho_imagem = "fotos/" . $nome_imagem;

				move_uploaded_file($foto["tmp_name"], $caminho_imagem);	



				 $sql = mysql_query("INSERT INTO vendas (user_id,name,image,description,value) VALUES ('$user_id','$name','$nome_imagem','$description','$value')");
				if ($sql){
					echo "cadastrado";
				} else {
					echo "error";
				}
			}
		}

			endif;
			?>
			<div style="margin-bottom: 80px"></div>
		</div>

