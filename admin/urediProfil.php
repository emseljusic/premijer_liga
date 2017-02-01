<?php
	session_start();
	include "../db_konekcija.php";
	$id_korisnik=$_GET['id'];
	$query="select * from korisnik where id_korisnik='$id_korisnik' ";
	$sql = mysql_query($query);
	$row = mysql_fetch_assoc($sql);
	$id_kor=$row['id_korisnik'];
	$naziv_korisnik = $row['naziv_korisnik'];
	$pass_korisnik = $row['pass_korisnik'];
	$email_korisnik = $row['email_korisnik'];
	$klub_id=$row['klub_id'];
	
?>
<html>
<title>
Uredi korisničke podatke 
</title>

<head>
<meta charset="utf-8">
<?php include("header.php"); ?>
</head>

<body>
<form method="post">	
	<br>Korisnički naziv: <input type="text" name="naziv_korisnik" class="form-control" required="" value="<?php echo $naziv_korisnik; ?>"></br>
	<br>Korisnička lozinka: <input type="password" name="pass_korisnik" class="form-control" required="" value="<?php echo $pass_korisnik; ?>"></br>					
	<br>Korisnički email:	<input type="text" name="email_korisnik" class="form-control" required="" value="<?php echo $email_korisnik; ?>"></br>
	<br>Omiljeni klub:
	<select name="klub_id" >			
	<?php
		$sql2="select * from klub";
		$query2=mysql_query($sql2);
		while($row=mysql_fetch_array($query2)){
		?>
		<option value="<?php echo $row["id_klub"] ?>"><?php echo $row["naziv"] ?></option>
		<?php
			}
		?>
		</select></br>
						
		<br><input type="submit" name="btn" class="btn btn-primary btn-md" value="Spremi" />
		   <input type="reset" class="btn btn-default btn-md" value="Poništi" /></br>			   
	</form>
	<?php
	if(isset($_POST["btn"])){

		$novi_username=$_POST["naziv_korisnik"];
		$novi_password=$_POST["pass_korisnik"];
		$novi_email=$_POST["email_korisnik"];
		$novi_klub_id=$_POST["klub_id"];
		$sql2 = "UPDATE korisnik SET naziv_korisnik='$novi_username', pass_korisnik='$novi_password', email_korisnik='$novi_email', klub_id='$novi_klub_id' WHERE id_korisnik='$id_kor'";
		$query2=mysql_query($sql2);

		if($query2) { ?>
			<strong>Uspješno ste ažurirali korisnika!</strong>
	     <?php	
		}
		else { ?>
			<strong>Neuspješan unos!</strong>
	     <?php	
		}
	}
	?>
	
</body>
</html>