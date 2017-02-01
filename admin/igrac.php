<?php
	session_start();
	include "../db_konekcija.php";
	$id_igrac = $_GET['id'];
	$q1 = "SELECT * from igraci WHERE  id_igrac='$id_igrac'";
	$is_q1_run = mysql_query($q1);
	$row = mysql_fetch_assoc($is_q1_run);
	$ime=$row['ime_igrac'];
	$prezime=$row['prezime_igrac'];
	$pozicija=$row['pozicija'];
	$broj=$row['broj'];
	$drz=$row['drzavljanstvo'];
	$klub_id=$row['klub_id'];
?>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
<title>
Igrač
</title>
<style>
.img2{
	border-radius: 8px;
	height: 135px;
    width: 180px;
}
</style>
<body>
<?php include("header.php"); ?>
	
<table  class="table" style=" background-color: white; width:40%;border-radius:20px">

	<tr><td><b>Ime: </b><?php echo $ime; ?> <?php echo $prezime; ?></td>
	<td style="width:30%"><b>Pozicija: </b><?php echo $pozicija; ?></td>
	</tr>
	<tr><td><b>Broj dresa: </b><?php echo $broj; ?></td>
	<td rowspan="4">
	
		<?php
		if($pozicija=="golman")
		{	?>
				<img src="../slike/golman.png" class="img2" align="center">
	<?php
		}
		
		elseif ($pozicija=="štoper")
		{  ?>
				<img src="../slike/stoper.png" class="img2" align="center">
	<?php	
		}
		
		elseif ($pozicija=="bek")
		{
	?>
				<img src="../slike/bek.png" class="img2" align="center">
	<?php
		}
	
		elseif ($pozicija=="napadač")
		{
	?>
				<img src="../slike/napadac.png" class="img2" align="center">
	<?php
		}
	
		elseif ($pozicija=="vezni")
		{
	?>
				<img src="../slike/vezni.png" class="img2" align="center">
	<?php
		}
	
		elseif ($pozicija=="krilo")
		{
	?>
				<img src="../slike/krilo.png" class="img2" align="center">
	<?php
		}
	?>
	
	</td>
	</tr>
	<?php
		$query="select count(*) as DG from dogadaj where igrac_id='$id_igrac' and tip='gol'";
		$qrun=mysql_query($query);
		$row1=mysql_fetch_array($qrun)
		?>
	<tr><td><b>Broj datih golova: </b><?php echo $row1["DG"]; ?></td></tr>
	<?php
		$query23="select count(*) as zk from dogadaj where igrac_id='$id_igrac' and tip='Žuti karton'";
		$qrun23=mysql_query($query23);
		$row23=mysql_fetch_array($qrun23)
		?>
	<tr><td><b>Broj žutih kartona: </b><?php echo $row23['zk']; ?></td></tr>
	<?php
		$query32="select count(*) as ck from dogadaj where igrac_id='$id_igrac' and tip='Crveni karton'";
		$qrun32=mysql_query($query32);
		$row32=mysql_fetch_array($qrun32)
		?>
	<tr><td><b>Broj crvenih kartona: </b><?php echo $row32['ck']; ?></td></tr>
	<tr><td><b>Državljanstvo: </b><?php echo $drz; ?></td></tr>
	<?php
				$sql2="select * from klub where id_klub='$klub_id'";
				$query2=mysql_query($sql2);
				while($row1=mysql_fetch_array($query2)){
				?>
	<tr><td><b>Klub: </b><a href="klub.php?id=<?php echo $row1['id_klub']?>"><?php echo $row1['naziv']; ?></a><td></tr>
				<?php } ?>
	<tr><td><b>Događaji igrača: </b></td></tr>
	<tr>
	<?php
				$sql3="select d.*,u.*,k.naziv,k1.naziv as naziv1 from dogadaj d 
				join utakmica u on d.utakmica_id=u.id_utakmica 
				join klub k on u.domacin_id=k.id_klub
				join klub k1 on u.gost_id=k1.id_klub
				where d.igrac_id='$id_igrac'";
				$query3=mysql_query($sql3);
				while($row2=mysql_fetch_array($query3)){
	?>	
	<?php 
	if($row2['tip']=='gol') 
		{ ?>
		<td colspan="2">Gol u <?php echo $row2['kolo']?> kolu, 
		<?php echo $row2['datum'] ?> na utakmici <?php echo $row2['naziv'] ?>-<?php echo $row2['naziv1']?></td>
		<?php
		}
			
	elseif($row2['tip']=='zuti') 
		{ ?>
		<td colspan="2">Žuti karton u <?php echo $row2['kolo']?> kolu, 
		<?php echo $row2['datum'] ?> na utakmici <?php echo $row2['naziv'] ?>-<?php echo $row2['naziv1']?></td>
		<?php
		}
		
	elseif($row2['tip']=='crveni') 
		{ ?>
		<td colspan="2">Crveni karton u <?php echo $row2['kolo']?> kolu, 
		<?php echo $row2['datum'] ?> na utakmici <?php echo $row2['naziv'] ?>-<?php echo $row2['naziv1']?></td>	
		<?php 
		}
		?>
		</tr>
		<?php
	} ?>
	<tr><td>
	<a href="editIgrac.php?id=<?php echo $id_igrac; ?>">Uredi igrača</a></td>
	<td><a  href="obrisi_igraca.php?id=<?php echo $id_igrac; ?>">Obriši igrača</span></a></td>
	</td></tr>
	</table>
</body>
</html>