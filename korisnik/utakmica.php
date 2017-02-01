<?php
	session_start();
	include "../db_konekcija.php";
	$id_utakmica = $_GET['id'];
	$query = "SELECT * from utakmica WHERE  id_utakmica='$id_utakmica'";
	$is_query_run = mysql_query($query);
	$row = mysql_fetch_assoc($is_query_run);
	$odigrana = $row['odigrana'];
	$datum = $row['datum'];
	$kolo = $row['kolo'];
	$gol_dom = $row['gol_dom'];
	$gol_gost = $row['gol_gost'];
	$domacin_id = $row['domacin_id'];
	$gost_id = $row['gost_id'];
	$arbitar_id = $row['arbitar_id'];
	
?>
<html>
<head>
<title>
Utakmica
</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include("header.php"); ?>
<table  class="table table-striped" style=" background-color: white; width:60%; border-radius:20px">
	<thead>
		<th>Datum</th>
		<th>Kolo</th>
		<th>Domaćin</th>
		<th>Rez</th>
		<th>Gost</th>
		<th>Sudija</th>
	</thead>
	<tbody>
	<tr>
	<td><?php echo $datum?></td>
	<td><center><?php echo $kolo?></center></td>
	<td>
		<?php
			$sql2="select naziv from klub where id_klub=$domacin_id"; 
			$query2=mysql_query($sql2);
			while($row2=mysql_fetch_array($query2))
			{ ?>
			<?php echo $row2["naziv"]?>
		<?php } ?> 
		
	</td>
	<td><center><?php
		if($odigrana=='0')
			echo '-';
		else
			echo $gol_dom; echo'-'; echo $gol_gost;
	?> </center></td>
	<td>
		<?php
			$sql3="select naziv from klub where id_klub=$gost_id"; 
			$query3=mysql_query($sql3);
			while($row3=mysql_fetch_array($query3))
			{ ?>
			<center><?php echo $row3["naziv"]?></center>
		<?php } ?> 
	</td>
	<td>
		<?php
			$sql4="select prezime_arbitar from arbitar where id_arbitar=$arbitar_id"; 
			$query4=mysql_query($sql4);
			while($row4=mysql_fetch_array($query4))
			{ ?>
			<?php echo $row4["prezime_arbitar"]?>
		<?php } ?> 
	</td>
	</tr>
	</tbody>
</table>

<p>Događaji na utakmici:</p>
<table  class="table table-striped" style=" background-color: white; width:60%; border-radius:20px">
<thead>
	<th>Tip</th>
	<th>Ime</th>
	<th>Prezime</th>
	<th>Klub</th>
</thead>
	<tbody>
		<tr>
			<?php
			$query="select d.*,i.ime_igrac as ime, i.prezime_igrac as prezime,k.naziv as naziv 
			from dogadaj d join igraci i on igrac_id=id_igrac 
			join klub k on i.klub_id=k.id_klub where utakmica_id='$id_utakmica'";
			$query2=mysql_query($query);
			while($row=mysql_fetch_assoc($query2)){
			?>
			<td><?php echo $row['tip']?></td>
			<td><?php echo $row['ime']?></td>
			<td><?php echo $row['prezime']?></td>
			<td><?php echo $row['naziv']?></td>
		</tr>		
		<?php }
			?>
	</tbody>

</body>
</html>