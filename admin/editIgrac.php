<?php
	session_start();
	include "../db_konekcija.php";
	$id_igrac = $_GET['id'];
	$query = "SELECT * from igraci WHERE  id_igrac='$id_igrac'";
	$is_query_run = mysql_query($query);
	$row = mysql_fetch_assoc($is_query_run);
	$ime=$row['ime_igrac'];
	$prezime=$row['prezime_igrac'];
	$pozicija=$row['pozicija'];
	$broj=$row['broj'];
	$drz=$row['drzavljanstvo'];
	$klub_id=$row['klub_id'];
	
?>
<html>
<head>
Uredjivanje igraca
</head>
<body>
<?php include("header.php"); ?>
<form method="post">
Ime:<input type="text" name="ime" value="<?php echo $ime; ?>"><br>
Prezime:<input type="text" name="prezime" value="<?php echo $prezime; ?>"><br>
Pozicija:<select name="pozicija">
		<option selected><?php echo $pozicija?></option>
		<option value="golman">golman</option>
		<option value="bek">bek</option>
		<option value="štoper">štoper</option>
		<option value="vezni">vezni</option>
		<option value="krilo">krilo</option>
		<option value="napadač">napadač</option>
	</select><br>
Broj:<input type="number" name="broj" value="<?php echo $broj; ?>"><br>
Državljanstvo:<input type="text" name="drz" value="<?php echo $drz; ?>"><br>
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
			<?php echo $row["naziv"]; ?></option>
		<?php } ?>

<input type="submit" name="btn" value="Spremi" />
<input type="reset" value="Poništi" />
</form>
<?php
	if(isset($_POST['btn'])){
		$novi_ime=$_POST["ime"];
		$novi_prezime=$_POST["prezime"];
		$novi_pozicija=$_POST["pozicija"];
		$novi_broj=$_POST["broj"];
		$novi_drz=$_POST["drz"];
		$novi_klub_id=$_POST["klub_id"];
		$qigrac="update igraci set ime_igrac='$novi_ime', prezime_igrac='$novi_prezime',
		pozicija='$novi_pozicija', broj='$novi_broj',drzavljanstvo='$novi_drz',
		klub_id='$novi_klub_id' where id_igrac='$id_igrac'";
		$q2igrac=mysql_query($qigrac);
		if($q2igrac)
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