<?php include ("header.php"); ?>

<?php if (isset($_SESSION['uid'])): ?>

	<div class="rx_wrapper">
		
		<div class="go-title-area center">
			<h3 class="go-title x1">Cadastrar Intinerário</h3>
		</div>

		<form action="" method="post" name="theform" id="theform">
    <label>Pickup Location</label>
    <input type="text" name="PickupLocation" onfocus="geolocate()" placeholder="Enter your pickup location" id="autocomplete" autocomplete="off" />

    <label>Dropoff Location</label>
    <input type="text" name="DropoffLocation" onfocus="geolocate()" placeholder="Enter your dropoff location" id="autocomplete2" autocomplete="off" />
</form>



		<?php

		if (isset($_POST['cadastrar'])) {

			$name = $_POST['name'];
			$description = $_POST['description'];
			$value = $_POST['value'];
			$category = $_POST['category'];
			$foto = $_FILES['foto'];
			$user_id = $_POST['user_id'];

				$sql = mysql_query("INSERT INTO vendas (user_id,name,image,description,value,category) VALUES ('$user_id','$name','$nome_imagem','$description','$value','$category')");
				if(!$sql)
					die ("The error is: " . mysqli_error($connection));
				else
					echo "<script>location.href = 'anuncios.php';</script>";
		}
	

	endif;
	?>
	<div style="margin-bottom: 80px"></div>
</div>

<?php require_once("footer.php") ?>