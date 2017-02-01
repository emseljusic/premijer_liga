<?php
	session_start();
	include "../db_konekcija.php";
	$id_dog = $_GET['id'];
	$query = "SELECT * from dogadaj WHERE  id_dogadaj='$id_dog'";
	$is_query_run = mysql_query($query);
	$row = mysql_fetch_assoc($is_query_run);
	$uid=$row['utakmica_id'];
	$tip=$row['tip'];
	$iid=$row['igrac_id'];
?>
<html>
<body>
<?php include("header.php");?>
Editovanje dogadjaja
<form method="post">
<table>
	<tr>
		<td>Tip:</td>
		<td><select name="tip">
		<option selected><?php echo $tip?></option>
		<option value="gol">gol</option>
		<option value="žuti karton">žuti karton</option>
		<option value="crveni karton">crveni karton</option></select></td>
	</tr>
	<tr>
	<td>Igrač:</td>
	<td>
	<select name="igrac">
		<option selected value="<?php echo $iid ?>">
		<?php
			$kveri="select i.*, k.naziv as naziv from igraci i, klub k, utakmica u where
			id_utakmica='$uid' and (k.id_klub=u.domacin_id or k.id_klub=u.gost_id)
			and i.klub_id=k.id_klub and id_igrac='$iid' "; 
			$kveri2=mysql_query($kveri);
			$row = mysql_fetch_assoc($kveri2);
			echo $row["prezime_igrac"],' ',$row["ime_igrac"],' (',$row['naziv'],')' ;
		?>
		</option>
		<?php
			$qi="select i.*, k.naziv as naziv from igraci i, klub k, utakmica u where
			id_utakmica='$uid' and (k.id_klub=u.domacin_id or k.id_klub=u.gost_id)
			and i.klub_id=k.id_klub order by naziv, prezime_igrac, ime_igrac"; 
			$qi2=mysql_query($qi);
			while($row=mysql_fetch_array($qi2))
			{ 
		?>
			<option value="<?php echo $row["id_igrac"]; ?>">
			<?php echo $row["prezime_igrac"] ; ?>
			<?php echo  $row['ime_igrac']; ?>
			(<?php echo $row['naziv']; ?>)</option>
		<?php } ?>
	</select>	
	</td>
	</tr>
</table>

<input type="submit" name="btn" value="Spremi" />
	<input type="reset" value="Poništi" />
</form>
	<?php
		
		if(isset($_POST['btn'])) {
			$novi_tip=$_POST["tip"];
			$novi_igrac=$_POST["igrac"];
			
			
			$sql5="update dogadaj set tip='$novi_tip', igrac_id='$novi_igrac' where id_dogadaj='$id_dog'";
			$query5=mysql_query($sql5);
			
			if($query5)
			{
	?>
				Uspješan unos!
			<?php
			}
		else
		{
			?>
			Neuspješan unos!
			<?php 
		}
		}
		?>
</body>
</html>