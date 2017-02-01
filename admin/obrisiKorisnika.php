<?php 
	$id = $_GET['id'];
	include "../db_konekcija.php";
	$query = "DELETE FROM korisnik WHERE id_korisnik = '$id'";
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
		<h4><strong>Uspješno ste obrisali korisnika.</strong></h4>
		<br/>
		<p><a href="listaKorisnika.php">Nazad</a></p>
		</body>
		</html>
		<?php
	}
 ?>