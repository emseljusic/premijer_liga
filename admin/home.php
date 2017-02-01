<?php
  include "../db_konekcija.php";
  session_start();
  $id_k=$_SESSION['klub_id'];
?>
<html>
<meta charset="utf-8">
<head>
	<title>Početna stranica</title>
</head>
<body>
<?php include("header.php"); ?>
Dobro došli <?php echo($_SESSION['naziv_korisnik']); ?>.<br>
<br/>
<p>
<?php 
 $sql="select naziv from klub where id_klub=$id_k";
 $query=mysql_query($sql);
 while($row=mysql_fetch_array($query))
 {
	echo $row['naziv']; 
 }
?>
&nbsp;uskoro ima sljedeće utakmice za igrati: </p>
<table  class="table table-striped" style=" background-color: white; width:60%; border-radius:20px">
<col width="20%">
	<thead>
		<th>Datum</th>
		<th><center>Kolo</center></th>
		<th><center>Domaćin</center></th>
		<th><center>Golovi</center></th>
		<th><center>Gost</center></th>
	</thead>
	<tbody>
		<tr>
			<?php 
				$br1=0;
				$sql1="SELECT u.*, k1.naziv as domacin, k2.naziv as gost FROM
					utakmica u, klub k1, klub k2 where u.domacin_id=k1.id_klub AND u.gost_id=k2.id_klub
					AND (u.domacin_id='$id_k' OR u.gost_id='$id_k') and u.odigrana='0' order by kolo asc";
				$query1 = mysql_query($sql1);
				while (($row1=mysql_fetch_assoc($query1)) && $br1<2) {
					?>
					<td><?php echo $row1['datum']?></td>
					<td><center><?php echo $row1['kolo']?></center></td>
					<td><center><?php echo $row1['domacin']?></center></td>
					<td><center>-</center></td>
					<td><center><?php echo $row1['gost']?></center></td>
					<?php $br1++; ?>
		</tr>	
			<?php	}
				
			?>
		
	</tbody>
</table>
<br/>
<p>Dva najbolja strijelca 
<?php 
 $sql="select naziv from klub where id_klub=$id_k";
 $query=mysql_query($sql);
 while($row=mysql_fetch_array($query))
 {
	echo $row['naziv']; 
 }
?> :</p>
<table  class="table table-striped" style=" background-color: white; width:60%; border-radius:20px">
<thead>
	<th>Ime</th>
	<th>Prezime</th>
	<th>Pozicija</th>
	<th>Broj dresa</th>
	<th>Golovi</th>
</thead>
	<tbody>
		<tr>
			<?php
				$br2=0;
				$sql2="select i.*, 
				(SELECT COUNT(d.tip) from dogadaj d where tip='gol' and d.igrac_id=i.id_igrac) as bg
				from igraci i left JOIN dogadaj d ON i.id_igrac=d.igrac_id where i.klub_id='$id_k' group by bg desc";
				$query2=mysql_query($sql2);
				while(($row2=mysql_fetch_assoc($query2)) && $br2<2){
			?>
			<td><?php echo $row2['ime_igrac']?></td>
			<td><?php echo $row2['prezime_igrac']?></td>
			<td><?php echo $row2['pozicija']?></td>
			<td><?php echo $row2['broj']?></td>
			<td><?php echo $row2['bg']?></td>
			<?php $br2++; ?>
		</tr>		
		<?php }
			?>
	</tbody>
</table>
</body>
</html>