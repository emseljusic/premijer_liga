<html>
<head>
<title>Statistika</title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include("header.php"); 
$poz=0;
?>
<center>
<form class="btn-group" method="POST">
<input class="btn btn-primary" type="submit" name="bt1" value="Lista strijelaca">
<input class="btn btn-primary" type="submit" name="bt2" value="Žuti kartoni">
<input class="btn btn-primary" type="submit" name="bt3" value="Crveni kartoni">
<input class="btn btn-primary" type="submit" name="bt4" value="Fair-Play tabela">
</form>
</center>
<?php
if(isset($_POST["bt2"]))
{
	?> 
	<div align="center">
	<h4 align="center">Žuti kartoni</h4>
<table  class="table table-striped" style="background-color:white; width:60%; border-radius:20px;">
	<thead>
		<th><center>RB</center></th>
		<th><center>Ime</center></th> 
		<th><center>Prezime</center></th>
		<th><center>Klub</center></th>
		<th><center>Broj kartona</center></th>
  </thead>
  <tbody>
  		<?php 
  			$query="select i.ime_igrac as ime,i.prezime_igrac as prezime,k.naziv as tim, 
		count(d.igrac_id) as broj_zutih from igraci i,dogadaj d, klub k where 
		i.id_igrac=d.igrac_id AND tip='žuti karton' and k.id_klub=i.klub_id group by d.igrac_id ORDER by broj_zutih DESC";
		$is_query_run = mysql_query($query);
		mysql_set_charset('utf8_general_ci');
				$pr1=100;
				$x1=0;
				while ($row=mysql_fetch_assoc($is_query_run))
				{
			?>
			<tr>
					<td><center><?php
					$x1=$x1+1;
					if ($row['broj_zutih']<$pr1)
					{
						$poz2=$x1;
					}
					else if($row['broj_zutih']==$pr1)
					{
						$poz2=$poz2;
					}
					$pr1=$row['broj_zutih'];
					echo $poz2;
			
					?></center></td>
					<td><center><?php echo $row['ime']; ?></center></td>
					<td><center><?php echo $row['prezime']; ?></center></td>
					<td><center><?php echo $row['tim']; ?></center></td>
					<td><center><?php echo $row['broj_zutih']; ?></center></td>
			</tr>
			<?php	} ?>


  </tbody>
</table>
</div>
<?php } 
else if(isset($_POST["bt3"]))
	{?>
<div align="center">
	<h4 align="center">Crveni kartoni</h4>
<table  class="table table-striped" style="background-color:white; width:60%; border-radius:20px;">
	<thead>
		<th><center>RB</center></th>
		<th><center>Ime</center></th> 
		<th><center>Prezime</center></th>
		<th><center>Klub</center></th>
		<th><center>Broj kartona</center></th>
  </thead>
  <tbody>
  		<?php 
  			$query2="select i.ime_igrac as ime,i.prezime_igrac as prezime,k.naziv as tim, 
		count(d.igrac_id) as broj_crvenih from igraci i,dogadaj d, klub k where 
		i.id_igrac=d.igrac_id AND tip='crveni karton' and k.id_klub=i.klub_id group by d.igrac_id ORDER by broj_crvenih DESC";
		$is_query_run2 = mysql_query($query2);
		mysql_set_charset('utf8_general_ci');
				$pr1=100;
				$x1=0;
				while ($row=mysql_fetch_assoc($is_query_run2))
				{
			?>
			<tr>
					<td><center><?php
					$x1=$x1+1;
					if ($row['broj_crvenih']<$pr1)
					{
						$poz2=$x1;
					}
					else if($row['broj_crvenih']==$pr1)
					{
						$poz2=$poz2;
					}
					$pr1=$row['broj_crvenih'];
					echo $poz2;
			
					?></center></td>
					<td><center><?php echo $row['ime']; ?></center></td>
					<td><center><?php echo $row['prezime']; ?></center></td>
					<td><center><?php echo $row['tim']; ?></center></td>
					<td><center><?php echo $row['broj_crvenih']; ?></center></td>
			</tr>
					
			<?php	} ?>


  </tbody>
</table>
</div>
	<?php } 
	else if(isset($_POST["bt4"])) 
	{ ?>
<div align="center">
	<h4 align="center">Fair-Play tabela</h4>
<table  class="table table-striped" style="background-color:white; width:60%; border-radius:20px;">
	<thead>
		<th><center>RB</center></th>
		<th><center>Klub</center></th> 
		<th><center>Žuti kartoni</center></th>
		<th><center>Crveni kartoni</center></th>
		<th><center>Bodovi</center></th>
  </thead>
  <tbody>
	<?php 
		$query3="SELECT k.naziv as naziv, SUM(CASE WHEN tip='žuti karton' THEN 1 ELSE 0 END) as Z, 
						 SUM(CASE WHEN tip='crveni karton' THEN 1 ELSE 0 END) as C, 
                      SUM(CASE WHEN tip='žuti karton' THEN 1 WHEN tip='crveni karton' THEN 2 ELSE 0 END) as B
					from dogadaj d, klub k, igraci i where d.igrac_id=i.id_igrac and i.klub_id=k.id_klub GROUP by k.id_klub ORDER by B DESC, C DESC";
		$is_query_run3 = mysql_query($query3);
		mysql_set_charset('utf8_general_ci');
	while ($row=mysql_fetch_assoc($is_query_run3)) 
	{
	?>
		<tr>
			<td><center><?php echo $poz=$poz+1; ?></center></td>
			<td><center><?php echo $row['naziv']; ?></center></td>
			<td><center><?php echo $row['Z']; ?></center></td>
			<td><center><?php echo $row['C']; ?></center></td>
			<td><center><?php echo $row['B']; ?></center></td>
		</tr>
<?php	}
?>

  </tbody>
</table>
</div>
	<?php }  else
	{
		?>
		<div align="center">
	<h4 align="center">Lista strijelaca</h4>
<table  class="table table-striped" style="background-color:white; width:60%; border-radius:20px;">
	<thead>
		<th><center>RB</center></th>
		<th><center>Ime</center></th> 
		<th><center>Prezime</center></th>
		<th><center>Klub</center></th>
		<th><center>Golovi</center></th>
  </thead>
  <tbody>
	<?php 
		$query4="select i.ime_igrac as ime,i.prezime_igrac as prezime,k.naziv as tim, 
		count(d.igrac_id) as broj_golova from igraci i,dogadaj d, klub k where 
		i.id_igrac=d.igrac_id AND tip='gol' and k.id_klub=i.klub_id group by d.igrac_id ORDER by broj_golova DESC";
		$is_query_run4 = mysql_query($query4);
		mysql_set_charset('utf8_general_ci');
		$pr=100;
		$x=0;
		$num=0;
		while (($row=mysql_fetch_assoc($is_query_run4)) && ($num<10))
		{
	?>
	<tr>
			<td><center><?php
			$x=$x+1;
			if ($row['broj_golova']<$pr)
			{
				$poz2=$x;
			}
			else if($row['broj_golova']==$pr)
			{
				$poz2=$poz2;
			}
			$pr=$row['broj_golova'];
			echo $poz2;
			
			?></center></td>
			<td><center><?php echo $row['ime']; ?></center></td>
			<td><center><?php echo $row['prezime']; ?></center></td>
			<td><center><?php echo $row['tim']; ?></center></td>
			<td><center><?php echo $row['broj_golova']; ?></center></td>
	<?php	$num++;
	} ?>
	</tr>
  </tbody>
</table>
</div>
		
<?php	}		?>
</body>
</html>