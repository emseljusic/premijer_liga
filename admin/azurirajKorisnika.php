<?php
	session_start();
	include "../db_konekcija.php";
	$id_kor = $_GET['id'];
	$query = "SELECT * from korisnik WHERE  id_korisnik='$id_kor'";
	$is_query_run = mysql_query($query);
	$row = mysql_fetch_assoc($is_query_run);
	$naziv=$row['naziv_korisnik'];
	$pass=$row['pass_korisnik'];
	$email=$row['email_korisnik'];
	$klub_id=$row['klub_id'];
	$tip=$row['tip_korisnika'];
	

	
?>
<html>
<head>
<title>Ažuriranje korisnika</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<style>
	body {
	width:100%;margin:auto;min-width:600px;max-width:2000px;
	
	}
	</style>
</head>
<body>
<?php include("header.php");  ?>
<table  class="table table-striped" style=" background-color: white; width:60%; border-radius:20px">
	<tr><td>ID korisnika:</td>
	<td><?php echo $id_kor; ?></td></tr>
	<tr><td>naziv:</td>
	<td><?php echo $naziv; ?></td></tr>
	<tr><td>email:</td>
	<td><?php echo $email; ?></td></tr>
</table>
<form method="post">
	<p>Promijeni tip korisnika:</p> 
	<select name="promKor">
	
	<option value="1"
	<?php if ($tip==1)
	{ ?> selected <?php }
	?>>
	Admin</option>
	<option value="0"
	<?php if ($tip==0)
	{ ?> selected <?php }
	?>>
	Obični korisnik</option>
	</select>
	&nbsp;&nbsp;
	<input type="submit" name="btn" value="Promijeni" />
</form>
<p><a href="moj_profil.php">Nazad</a></p>
<?php
	if(isset($_POST['btn'])){
		$novi_tip=$_POST["promKor"];
		$q="update korisnik set tip_korisnika='$novi_tip' where id_korisnik='$id_kor'";
		$q2=mysql_query($q);
		if($q2)
		{
?>			<strong>Uspješan unos!</strong>
<?php
		}
		else
		{
?>			<strong>Neuspješan unos!</strong>
<?php
		}
	}
?>

</body>
</html>