<?php
	session_start();
	include "../db_konekcija.php"
?>
<html>
<?php include("header.php"); ?>
<body>
<table>
<thead>
	<th>ID</th>
	<th>id_u</th>
	<th>tip</th>
	<th>ime igraca</th>
	<th>prezime</th>
</thead>
	<tbody>
		<tr>
			<?php
			$query="select d.*,i.ime_igrac as ime, i.prezime_igrac as prezime from dogadaj d join igraci i on igrac_id=id_igrac";
			$query2=mysql_query($query);
			while($row=mysql_fetch_assoc($query2)){
				$id_dogadaj = $row['id_dogadaj'];
			?>
			
			<td><a href="editDogadaj.php?id=<?php echo $row['id_dogadaj']; ?>">
			<?php echo $row['id_dogadaj'] ; ?></a></td>
			<td><?php echo $row['utakmica_id']; ?></td>
			<td><?php echo $row['tip']?></td>
			<td><?php echo $row['ime']?></td>
			<td><?php echo $row['prezime']?></td>
		</tr>		
		<?php }
			?>
	</tbody>
</table>
</body>
<html>