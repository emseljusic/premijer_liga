<?php
	session_start();
	include "../db_konekcija.php";
	$id_kor=$_SESSION['id'];
	$query = "SELECT * from korisnik WHERE  id_korisnik='$id_kor'";
	$is_query_run = mysql_query($query);
	$row = mysql_fetch_assoc($is_query_run);
	$ime=$row['naziv_korisnik'];
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

tip korisnika:

<?php 	if ($row['tip_korisnika']==1) 
			{ echo ("admin");}
		else if($row['tip_korisnika']==0)
		{echo ("korisnik: ") + $row['naziv_korisnik'];}
			?>
</body>
</html>