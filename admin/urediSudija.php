<?php
session_start();
include "../db_konekcija.php";
$id_arbitar = $_GET['id'];
$q1 = "SELECT * from arbitar WHERE  id_arbitar='$id_arbitar'";
$is_q1_run = mysql_query($q1);
$row = mysql_fetch_assoc($is_q1_run);
$ime=$row['ime_arbitar'];
$prezime=$row['prezime_arbitar'];
?>
<html>
<title>
Uređivanje sudija
</title>
<body>
<?php include("header.php"); ?>
<form method="post">
Ime:<input type="text" name="ime" value="<?php echo $ime; ?>"><br>
Prezime:<input type="text" name="prezime" value="<?php echo $prezime; ?>"><br>
<input type="submit" name="btn" value="Spremi" />
<input type="reset" value="Poništi" />
</form>
<?php
	if(isset($_POST['btn'])){
		$novi_ime=$_POST["ime"];
		$novi_prezime=$_POST["prezime"];
		$qsudija="update arbitar set ime_arbitar='$novi_ime', prezime_arbitar='$novi_prezime'
		where id_arbitar='$id_arbitar'";
		$q2sudija=mysql_query($qsudija);
		if($q2sudija)
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
<hr>
<table class="table table-striped" style="background-color: white; width:50%" >
<?php 
	$sql1="select u.*, k.naziv as naziv, k1.naziv as naziv1 from utakmica u
	join klub k on u.domacin_id=k.id_klub
	join klub k1 on u.gost_id=k1.id_klub where u.arbitar_id='$id_arbitar' and u.odigrana='1' order by u.datum";
	$query1=mysql_query($sql1);
	while($row1=mysql_fetch_array($query1)){
?>
		
		<tr>
		<td><?php echo $row1['datum']?></td>
		<td><?php echo $row1['kolo']?></td> 
		<td><?php echo $row1['naziv']?></td> 
		<td><a href="editUtak.php?id=<?php echo $row1['id_utakmica']; ?>"><?php echo $row1['gol_dom'] ?>-<?php echo $row1['gol_gost']?> </a><td>
		<td><?php echo $row1['naziv1']?> </td></tr>
	<?php } ?>
</table>
</body>
</html>