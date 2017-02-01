<?php 
	$id = $_GET['id'];
	include "../db_konekcija.php";
	$query = "DELETE FROM igraci WHERE id_igrac = '$id'";
	$sql = mysql_query($query);
	if($sql) {
		?>
		<html>
		<head>
		<title>Brisanje</title>
		<meta charset="utf-8">
		</head>
		<body>
		<?php include ("header.php") ?>
		<br/><br/>
		<h4><strong>Uspješno ste obrisali igrača.</strong></h4>
		<br/>
		<p><a href="tabela.php">Nazad na tabelu.</a></p>
		</body>
		</html>
	<?php
	}
 ?>