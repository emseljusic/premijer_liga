<?php
	session_start();
	include "../db_konekcija.php";
	$poz=0;
	$poz2=0;
	$bt1=$_POST['bt1'];
	$bt2=$_POST['bt2'];
	$bt3=$_POST['bt3'];
?>

<html>
<head>
<title>Tablica</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<style>
	body {
	width:100%;margin:auto;min-width:600px;max-width:2000px;
	
	}
	</style>

</head>
<body>
<?php include("header.php"); ?>

<center>
<form class="btn-group" method="POST">
<input class="btn btn-primary" type="submit" name="bt1" value="Ukupno">
<input class="btn btn-primary" type="submit" name="bt2" value="Domaća">
<input class="btn btn-primary" type="submit" name="bt3" value="Gostujuća">
</form>
</center>




<?php
if(isset($_POST["bt2"]))
{
	?> 
	<div align="center">
	<h4 align="center">Domaća tabela</h4>
<table  class="table table-striped" style=" background-color: white; width:60%; border-radius:20px">
<col width="5%">
  <col width="22%">

  <thead>

    <th><center>Poz</center></th>
    <th>Klub</th> 
	<th><center>OU</center></th>
    <th><center>P</center></th>
	<th><center>N</center></th>
	<th><center>I</center></th>
	<th><center>DG</center></th>
	<th><center>PG</center></th>
	<th><center>GR</center></th>
	<th><center>Bodovi</center></th>
  </thead>
  <tbody>

    <?php
		$q2='SELECT k.naziv,id_klub, 
COUNT(*) as OU,
COUNT(CASE WHEN u.gol_dom>u.gol_gost then 1 end) as P, 
COUNT(CASE WHEN u.gol_dom=u.gol_gost then 1 end) as N, 
COUNT(CASE WHEN u.gol_dom<u.gol_gost then 1 end) as I,
SUM(u.gol_dom) as DG, SUM(u.gol_gost) as PG, SUM(u.gol_dom - u.gol_gost) as GR,
SUM(CASE WHEN u.gol_dom>u.gol_gost THEN 3 WHEN u.gol_dom=u.gol_gost THEN 1 ELSE 0 END) as B
FROM klub k JOIN utakmica u ON k.id_klub=u.domacin_id WHERE odigrana=1 GROUP BY k.naziv ORDER by 
		B DESC, GR DESC, u.gol_dom desc';
		$is_query_run2 = mysql_query($q2);
		mysql_set_charset('utf8_general_ci');
		while ($row=mysql_fetch_assoc($is_query_run2))
		{
			$id_klub=$row['id_klub'];
	?>
	<tr style="height:40">

		<td><center><?php echo $poz=$poz+1; ?></center></td>
		<td><a href="klub.php?id=<?php echo $id_klub; ?>"><?php echo $row['naziv']; ?></a></td>
		<td><center><?php echo $row['OU']; ?></center></td>
		<td><center><?php echo $row['P']; ?></center></td>
		<td><center><?php echo $row['N']; ?></center></td>
		<td><center><?php echo $row['I']; ?></center></td>
		<td><center><?php echo $row['DG']; ?></center></td>
		<td><center><?php echo $row['PG']; ?></center></td>
		<td><center><?php echo $row['GR']; ?></center></td>
		<td><center><?php echo $row['B']; ?></center></td>
		
	<?php } ?>
	
	
	
	</tr>
  </tbody>
</table>
</div>

<?php } else if(isset($_POST["bt3"]))
	{
	?> 
	<div align="center">
	<h4 align="center">Gostujuća tabela</h4>
<table  class="table table-striped" style=" background-color: white; width:60%; border-radius:20px">
<col width="5%">
  <col width="22%">

  <thead>

    <th><center>Poz</center></th>
    <th>Klub</th> 
	<th><center>OU</center></th>
    <th><center>P</center></th>
	<th><center>N</center></th>
	<th><center>I</center></th>
	<th><center>DG</center></th>
	<th><center>PG</center></th>
	<th><center>GR</center></th>
	<th><center>Bodovi</center></th>
  </thead>
  <tbody>

    <?php
		$q3='SELECT k.naziv,id_klub, 
COUNT(*) as OU,
COUNT(CASE WHEN u.gol_dom>u.gol_gost then 1 end) as I, 
COUNT(CASE WHEN u.gol_dom=u.gol_gost then 1 end) as N, 
COUNT(CASE WHEN u.gol_dom<u.gol_gost then 1 end) as P,
SUM(u.gol_dom) as PG, SUM(u.gol_gost) as DG, SUM(u.gol_gost - u.gol_dom) as GR,
SUM(CASE WHEN u.gol_gost>u.gol_dom THEN 3 WHEN u.gol_dom=u.gol_gost THEN 1 ELSE 0 END) as B
FROM klub k JOIN utakmica u ON k.id_klub=u.gost_id WHERE odigrana=1 GROUP BY k.naziv ORDER by 
		B DESC, GR DESC, u.gol_dom desc';
		$is_query_run3 = mysql_query($q3);
		mysql_set_charset('utf8_general_ci');
		while ($row=mysql_fetch_assoc($is_query_run3))
		{
			$id_klub=$row['id_klub'];
	?>
	<tr style="height:40">

		<td><center><?php echo $poz=$poz+1; ?></center></td>
		<td><a href="klub.php?id=<?php echo $row['id_klub']; ?>"><?php echo $row['naziv']; ?></a></td>
		<td><center><?php echo $row['OU']; ?></center></td>
		<td><center><?php echo $row['P']; ?></center></td>
		<td><center><?php echo $row['N']; ?></center></td>
		<td><center><?php echo $row['I']; ?></center></td>
		<td><center><?php echo $row['DG']; ?></center></td>
		<td><center><?php echo $row['PG']; ?></center></td>
		<td><center><?php echo $row['GR']; ?></center></td>
		<td><center><?php echo $row['B']; ?></center></td>
		
	<?php } ?>
	
	
	
	</tr>
  </tbody>
</table>
</div>

<?php } else
{
	?>
<div align="center">
<h4 align="center">Tabela</h4>
<table  class="table table-striped" style=" background-color: white; width:60%; border-radius:20px">
<col width="5%">
  <col width="22%">

  <thead>

    <th><center>Poz</center></th>
    <th>Klub</th> 
	<th><center>OU</center></th>
    <th><center>P</center></th>
	<th><center>N</center></th>
	<th><center>I</center></th>
	<th><center>DG</center></th>
	<th><center>PG</center></th>
	<th><center>GR</center></th>
	<th><center>Bodovi</center></th>
  </thead>
  <tbody>

    <?php
		$query='SELECT k.naziv as naziv, id_klub, 
		COUNT(*) AS OU,SUM(P) AS P,SUM(N) AS N,SUM(I) AS I, SUM(DG) 
		as DG,SUM(PG) AS PG,SUM(GR) AS GR,SUM(B) AS B
		FROM( SELECT domacin_id as tim_id,
		CASE WHEN gol_dom>gol_gost THEN 1 ELSE 0 END as P,
		CASE WHEN gol_dom=gol_gost THEN 1 ELSE 0 END as N,
		CASE WHEN gol_dom<gol_gost THEN 1 ELSE 0 END as I,
		gol_dom as DG,
		gol_gost as PG,
		(gol_dom-gol_gost) as GR,
		CASE WHEN gol_dom>gol_gost THEN 3
 		WHEN gol_dom=gol_gost THEN 1 ELSE 0 END as B 
		FROM utakmica where odigrana=1 UNION ALL
		SELECT gost_id as tim_id,
		CASE WHEN gol_dom<gol_gost THEN 1 ELSE 0 END as P,
		CASE WHEN gol_dom=gol_gost THEN 1 ELSE 0 END as N,
		CASE WHEN gol_dom>gol_gost THEN 1 ELSE 0 END as I,
		gol_gost as DG,
		gol_dom as PG,
		(gol_gost-gol_dom) as GR,
		CASE WHEN gol_dom<gol_gost THEN 3
 		WHEN gol_dom=gol_gost THEN 1 ELSE 0 END as B 
		FROM utakmica where odigrana=1) 
		as tot JOIN klub k on k.id_klub=tot.tim_id GROUP by tim_id ORDER by 
		B DESC, GR DESC, DG desc';
		$is_query_run = mysql_query($query);
		mysql_set_charset('utf8_general_ci');
		while ($row=mysql_fetch_assoc($is_query_run))
		{
			$id_klub=$row['id_klub'];
	?>
	<tr style="height:40">

		<td><center><?php echo $poz=$poz+1; ?></center></td>
		<td><a href="klub.php?id=<?php echo $id_klub; ?>"><?php echo $row['naziv']; ?></a></td>
		<td><center><?php echo $row['OU']; ?></center></td>
		<td><center><?php echo $row['P']; ?></center></td>
		<td><center><?php echo $row['N']; ?></center></td>
		<td><center><?php echo $row['I']; ?></center></td>
		<td><center><?php echo $row['DG']; ?></center></td>
		<td><center><?php echo $row['PG']; ?></center></td>
		<td><center><?php echo $row['GR']; ?></center></td>
		<td><center><?php echo $row['B']; ?></center></td>
		
	<?php } ?>
	
	
	
	</tr>
  </tbody>
</table>
</div>
<?php } ?>
</body>
</html>