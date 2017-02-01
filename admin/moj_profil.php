<?php
	session_start();
	include "../db_konekcija.php";
	$id_kor=$_SESSION['id'];
	$query = "SELECT * from korisnik WHERE  id_korisnik='$id_kor'";
	$is_query_run = mysql_query($query);
	$row = mysql_fetch_assoc($is_query_run);
	$ime=$row['naziv_korisnik'];
	$pass=$row['pass_korisnik'];
	$email=$row['email_korisnik'];
	$tip=$row['tip_korisnika'];
	$klub_id=$row['klub_id'];

?>
<html>
<title>
Korisnička stranica
</title>
<body>
<?php include("header.php");?>
<table  class="table table-striped" style=" background-color: white; width:35%; border-radius:20px">
<tbody>
<tr><td>Tip korisnika:
<?php 	

	if ($tip=="1") 
			{ echo ("admin"),'<br>','Zdravo ',$ime;}
		else if($tip=="0")
		{echo ' Obični korisnik <br> Zdravo: ', $ime1;}
			?></td></tr>
<tr><td><a href="listaKorisnika.php">Lista svih korisnika</a></td></tr>
</body>
</html>