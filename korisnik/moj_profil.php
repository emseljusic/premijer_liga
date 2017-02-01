<?php
	session_start();
	include "../db_konekcija.php";
	$id_kor=$_SESSION['id'];
	$query = "SELECT * from korisnik WHERE  id_korisnik='$id_kor'";
	$is_query_run = mysql_query($query);
	$row = mysql_fetch_assoc($is_query_run);
	$ime1=$row['naziv_korisnik'];
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
<table  class="table table-striped" style=" background-color: white; width:25%; border-radius:20px">
<tbody>
<tr><td>Tip korisnika:
<?php 	

	if ($tip=="1") 
			{ echo ("admin"),'<br>','Zdravo ',$ime;}
		else if($tip=="0")
		{echo ' Obični korisnik <br> Zdravo: ', $ime1;}
			?></td></tr>
<tr><td>Vaš email je: <?php echo $email ?> </td></tr>
<tr><td>Vaša lozinka je: <?php echo $pass ?> </td></tr>
<tr><td>Vaš omiljeni klub je:
<?php
	$sql="select * from klub where id_klub='$klub_id' "; 
	$query=mysql_query($sql);
	while($row=mysql_fetch_array($query))
	{ 
		echo $row['naziv']; 
		
} ?> </td></tr>
<tr><td><a href="urediProfil.php?id=<?php echo $id_kor; ?>"> Uredi korisnički račun </a></td></tr>
</tbody>
</table>
</body>
</html>