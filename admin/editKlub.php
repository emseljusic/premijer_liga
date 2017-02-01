<?php
	session_start();
	include "../db_konekcija.php";
	$id_klub = $_GET['id'];
	$query = "SELECT * from klub WHERE  id_klub='$id_klub'";
	$is_query_run = mysql_query($query);
	$row = mysql_fetch_assoc($is_query_run);
	$naziv = $row['naziv'];
	$god = $row['god_osnivanja'];
	$grad = $row['grad'];
	
?>
<html>
<head>
Uredjivanje klubova
</head>
<body>
<?php include("header.php"); ?>
<form method="post">
<input type="text" name="naziv" value="<?php echo $naziv; ?>"><br>
<input type="number" name="god" value="<?php echo $god; ?>"><br>
<input type="text" name="grad" value="<?php echo $grad; ?>"><br>
<input type="submit" name="btn" value="Spremi" />
<input type="reset" value="Poništi" />
</form>
<?php
	if(isset($_POST['btn'])){
		$novi_naziv=$_POST["naziv"];
		$novi_god=$_POST["god"];
		$novi_grad=$_POST["grad"];
		$qklub="update klub set naziv='$novi_naziv', god_osnivanja='$novi_god', grad='$novi_grad' where id_klub='$id_klub'";
		$q2klub=mysql_query($qklub);
		if($q2klub)
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

</body>
</html>