<?php
	session_start();
	include "../db_konekcija.php";
?>
<html>
<body>
<?php include("header.php"); ?>

<form method="post">
	<legend>Dodavanje igrača</legend>
	<input type="text" name="ime" placeholder="ime igraca"><br>
	<input type="text" name="prezime" placeholder="prezime igraca"><br>
	<select name="pozicija">
		<option selected disabled>pozicija</option>
		<option value="golman">golman</option>
		<option value="bek">bek</option>
		<option value="štoper">štoper</option>
		<option value="vezni">vezni</option>
		<option value="krilo">krilo</option>
		<option value="napadač">napadač</option>
	</select><br>
	<input type="number" name="broj" placeholder="broj dresa"><br>
	<input type="text" name="drz" placeholder="državljanstvo"><br>
	<select name="klub_id">
		<option selected disabled>klub</option>
		<?php
			$sql2="select * from klub";
			$query2=mysql_query($sql2);
			while($row=mysql_fetch_array($query2)){
			?>
			<option value="<?php echo $row["id_klub"] ?>"><?php echo $row["naziv"] ?></option>
			<?php }
		?>
	</select><br>
	<input type="submit" name="btn" value="Spremi">
	<input type="reset" value="Ponisti">
</form>

<?php
		
	if(isset($_POST['btn'])){
		$novi_ime=$_POST["ime"];
		$novi_prezime=$_POST["prezime"];
		$novi_pozicija=$_POST["pozicija"];
		$novi_broj=$_POST["broj"];
		$novi_drz=$_POST["drz"];
		$novi_klub_id=$_POST["klub_id"];
		
		$qii="insert into igraci values(0,'$novi_ime','$novi_prezime','$novi_pozicija',
		'$novi_broj','$novi_drz','$novi_klub_id')";
		$is_qii=mysql_query($qii);
		if($is_qii)
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