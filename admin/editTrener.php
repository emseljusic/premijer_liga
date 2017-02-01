<?php
	session_start();
	include "../db_konekcija.php";
	$id_trener = $_GET['id'];
	$query = "SELECT * from trener WHERE  id_trener='$id_trener'";
	$is_query_run = mysql_query($query);
	$row = mysql_fetch_assoc($is_query_run);
	$ime=$row['trener_ime'];
	$prezime=$row['trener_prezime'];
	$klub_id=$row['klub_id'];
	
?>
<html>
<head>
Uredjivanje trenera
</head>
<body>
<?php include("header.php"); ?>
<form method="post">
Ime:<input type="text" name="ime" value="<?php echo $ime; ?>"><br>
Prezime:<input type="text" name="prezime" value="<?php echo $prezime; ?>"><br>
Klub:
<select name="klub_id">
		<?php
			$sql2="select * from klub"; 
			$query2=mysql_query($sql2);
			while($row=mysql_fetch_array($query2))
			{ ?>
				<option value="<?php echo $row["id_klub"]; ?>"
				<?php if($row['id_klub']==$klub_id) 
						{?> selected <?php } ?> >
				<?php echo $row["naziv"]; ?>
				</option>
	<?php 	} ?>

</select>
<input type="submit" name="btn" value="Spremi" />
<input type="reset" value="Poništi" />
</form>
<?php
	if(isset($_POST['btn'])){
		$novi_ime=$_POST["ime"];
		$novi_prezime=$_POST["prezime"];
		$novi_klub_id=$_POST["klub_id"];
		$q="update trener set trener_ime='$novi_ime', trener_prezime='$novi_prezime',
		klub_id='$novi_klub_id' where id_trener='$id_trener'";
		$q2=mysql_query($q);
		if($q2)
		{
?>			Uspješan unos!
<?php
		}
		else
		{
?>			Neuspješan unos!
<?php
		}
	}
?>
<br><br>
<a href="klub.php?id=<?php echo $klub_id; ?>">
			nazad na klub</a>
</body>
</html>