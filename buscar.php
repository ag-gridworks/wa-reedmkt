<?php

include ("header.php");

include("menu-categoria.php"); ?>

<div class="clear"></div>

<div class="rx_wrapper">


<?php 
if(isset($_GET['keywords'])): ?>
<?php $query = $_GET['keywords'];
$query = htmlspecialchars($query); 
$query = mysql_real_escape_string($query);
$raw_results = mysql_query("SELECT * FROM vendas WHERE (`name` LIKE '%".$query."%') OR (`description` LIKE '%".$query."%')")
or die(mysql_error()); ?>

<div class="go-title-area center">
		<h3 class="go-title x1">
			Resultados para: <?php echo "$query"; ?>
		</h3>
	</div>
<section class="default-services go-flex center">
<?php if(mysql_num_rows($raw_results) > 0): ?>
<?php while($results = mysql_fetch_array($raw_results)):?>

<?php echo "abc" ?>
     
<?php endwhile; ?>
</section>

<?php else: echo "<center><h4>Sem Resultados</h4></center>";

endif;
endif;
?>
