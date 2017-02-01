<?php
	session_start();
	include "../db_konekcija.php";
	

?>
<html>
<head>
<title>
Odigrane utakmice
</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
<style>
h3 {
	position: absolute;
	left: 150px;
	top: 150px;
}
</style>
</head>

<body>
	<?php include("header.php"); ?>
	<form method="post" align="center">
	<select name="izaberiKolo">
	<?php 
		$q1='SELECT DISTINCT(kolo) from utakmica where odigrana=1';
		$iq1=mysql_query($q1);
		while($row=mysql_fetch_assoc($iq1))
		{
			?>
			<option value="<?php echo $row['kolo']?>">Kolo <?php echo $row['kolo'] ?></option>
			<?php
		}
	?>
		
	</select>
	<input class="btn btn-primary" type="submit" name="btn" value="Prikaži">
	</form>
	<table class="table table-striped" style="background-color: white; width:50%; border-radius:20px" align="center">
		<thead>
			
			<th style="width:15%">Datum</th>
			<th style="width:25%">Domaćin</th>
			<th style="width:20%"><center>Rez</center></th>
			<th style="width:25%">Gost</th>
			<th style="width:15%">Sudija</th>
		</thead>
	</table>

	<?php
	if(isset($_POST['btn'])) {
		$izabranoKolo=$_POST["izaberiKolo"];
	$query = "SELECT u.*,k1.naziv as domacin,k2.naziv as gost, a.prezime_arbitar as sudija FROM utakmica u, klub k1,klub k2,
		arbitar a WHERE k1.id_klub=u.domacin_id AND k2.id_klub=u.gost_id AND a.id_arbitar=u.arbitar_id AND odigrana=1 and kolo='$izabranoKolo' order by id_utakmica" ;
	$is_query_run = mysql_query($query);
	?>
	<div align="center">
	<table class="table table-striped" style="background-color: white; width:50%; border-radius:20px" >
	<caption style="color:black">KOLO <?php echo $izabranoKolo?></caption>
	<tbody>
	<?php
	while ($row=mysql_fetch_assoc($is_query_run))
	{
	?>
	
	<tr>								
		<td style="width:15%"><?php echo $row['datum']; ?></td>
		<td style="width:25%"><?php echo $row['domacin'];?></td>
		<td style="widht=20%"><center><a href="utakmica.php?id=<?php echo $row['id_utakmica']; ?>"><?php echo $row['gol_dom']; ?>-<?php echo $row['gol_gost']; ?></a></center></td>
		<td style="width:25%"><?php echo $row['gost']; ?></td>
		<td style="width:15%"><?php echo $row['sudija'];?></td>
	</tr>
	
	
	<?php }  ?>
	</tbody>
	</table></div>
	<?php }
	else {
		$query = "SELECT u.*,k1.naziv as domacin,k2.naziv as gost, a.prezime_arbitar as sudija FROM utakmica u, klub k1,klub k2,
		arbitar a WHERE k1.id_klub=u.domacin_id AND k2.id_klub=u.gost_id AND a.id_arbitar=u.arbitar_id AND odigrana=1 and kolo='1' order by id_utakmica" ;
	$is_query_run = mysql_query($query);
	?>
	<div align="center">
	<table class="table table-striped" style="background-color: white; width:50%; border-radius:20px" >
	<caption style="color:black">KOLO 1</caption>
	<tbody>
	<?php
	while ($row=mysql_fetch_assoc($is_query_run))
	{
	?>
	
	<tr>								
		<td style="width:15%"><?php echo $row['datum']; ?></td>
		<td style="width:25%"><?php echo $row['domacin'];?></td>
		<td style="widht=20%"><center><a href="utakmica.php?id=<?php echo $row['id_utakmica']; ?>"><?php echo $row['gol_dom']; ?>-<?php echo $row['gol_gost']; ?></a></center></td>
		<td style="width:25%"><?php echo $row['gost']; ?></td>
		<td style="width:15%"><?php echo $row['sudija'];?></td>
	</tr>
	
	
	<?php }  ?>
	</tbody>
	</table></div>
	<?php }
	?>
	
</body>
</html>