<?php
	session_start();
	include "../db_konekcija.php";
	$id_arbitar = $_GET['id'];
	$query = "SELECT * from arbitar WHERE  id_arbitar='$id_arbitar'";
	$is_query_run = mysql_query($query);
	$row = mysql_fetch_assoc($is_query_run);
	$ime_arbitar=$row['ime_arbitar'];
	$prezime_arbitar=$row['prezime_arbitar'];
?>
<html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
<title> Sudija </title>
</head>
<body>
<?php include("header.php"); ?>
<p><b>Sudac: </b><?php echo $ime_arbitar ?> <?php echo $prezime_arbitar ?></p>
<p><b>Utakmice koje je sudac sudio:</b></p>
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
		<td><a href="utakmica.php?id=<?php echo $row1['id_utakmica']; ?>"><?php echo $row1['gol_dom'] ?>-<?php echo $row1['gol_gost']?> </a><td>
		<td><?php echo $row1['naziv1']?> </td></tr>
	<?php } ?>
</table>

</body>
</html>