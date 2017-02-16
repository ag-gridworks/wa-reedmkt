<?php include ("header.php"); ?>

<?php if (isset($_SESSION['uid'])): ?>

	<?php 
	$profile_id = $user_id;

	$profile_get = mysql_query("SELECT * FROM user WHERE id = '$profile_id'") or die(mysql_error());
	$profile = mysql_fetch_assoc($profile_get);

	$profile_name = $profile['username'];
	$profile_email = $profile['email'];
	$profile_floor = $profile['profile_floor'];
	$profile_phone = $profile['profile_phone'];
	$profile_sector = $profile['profile_sector'];

	$profile_cover = $profile['profile_cover'];
	?>

	<style>input {text-align: center;}</style>

	<div class="rx_wrapper">
		
		<div class="go-title-area center">
			<h3 class="go-title x1">Alterar Perfil</h3>
		</div>

		<div class="upload-box">
		<div class="box-inner go-box-1">
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="foto">
			<div class="upload-area">
				<label for="exampleInputFile">Imagem de Perfil</label>
				<input type="hidden" value="<?php echo $user_id ?>" name="user_id">
				<input style="margin: 0 auto; margin-bottom: 10px; margin-top: 10px" type="file" name="foto" aria-describedby="fileHelp">
				<button type="submit" class="go-button small" name="alterar_imagem">Alterar Imagem</button>
			</div>
			</form>
			</div>
			</div>
		
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" name="cadastro">
			<section class="default-services go-flex center">
				<div class="default-services__item">
					<div class="item-inner go-box-1 hover-1">
						<div class="item-icon">
							<i class="fa fa-envelope-open-o" aria-hidden="true"></i>
						</div>

						<div class="item-title">
							E-Mail
						</div>

						<div class="item-content">
							<input class="form-control" type="email" name="email" value="<?php echo $profile_email ?>">
						</div>
					</div>
				</div>

				<div class="default-services__item">
					<div class="item-inner go-box-1 hover-1">
						<div class="item-icon">
							<i class="fa fa-building-o" aria-hidden="true"></i>
						</div>

						<div class="item-title">
							Andar
						</div>

						<div class="item-content">
							<input class="form-control" type="number" name="floor" value="<?php echo $profile_floor ?>">
						</div>
					</div>
				</div>

				<div class="default-services__item">
					<div class="item-inner go-box-1 hover-1">
						<div class="item-icon">
							<i class="fa fa-phone" aria-hidden="true"></i>
						</div>

						<div class="item-title">
							Ramal
						</div>

						<div class="item-content">
							<input class="form-control" type="number" name="phone" value="<?php echo $profile_phone ?>">
						</div>
					</div>
				</div>

				<div class="default-services__item">
					<div class="item-inner go-box-1 hover-1">
						<div class="item-icon">
							<i class="fa fa-address-card-o" aria-hidden="true"></i>
						</div>

						<div class="item-title">
							Setor
						</div>

						<div class="item-content">
							<input class="form-control" type="text" name="sector" value="<?php echo $profile_sector ?>">
						</div>
					</div>
				</div>
			</section>
			
			<div class="go-title-area center">
				
				<input type="hidden" value="<?php echo $user_id ?>" name="user_id">
				<button type="submit" class="go-button small" name="alterar_perfil">Alterar Perfil</button>
			</div>
		</form>

		<?php 
		$profile_get = mysql_query("SELECT * FROM user WHERE id = '$user_id'") or die(mysql_error());
		$profile = mysql_fetch_assoc($profile_get);
		$profile_cover = $profile['profile_cover']; ?>

		<?php

		if (isset($_POST['alterar_perfil'])) {
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$sector = $_POST['sector'];
			$floor = $_POST['floor'];
			$user_id = $_POST['user_id'];

			$sql = mysql_query("UPDATE user SET email = '$email', profile_phone = '$phone', profile_sector = '$sector', profile_floor = '$floor'  WHERE id = '$user_id'");

			if(!$sql)
					die ("The error is: " . mysqli_error($connection));
				else
					echo "<script>location.href = '$profile_url';</script>";
			}

		if (isset($_POST['alterar_imagem'])) {

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

				$sql = mysql_query("UPDATE user SET profile_image = '$nome_imagem' WHERE id = '$user_id'");
				
				if(!$sql)
					die ("The error is: " . mysqli_error($connection));
				else
					echo "<script>location.href = '$profile_url';</script>";
			}
		}

		endif;
		?>
		<div style="margin-bottom: 80px"></div>
	</div>

	<?php require_once("footer.php") ?>