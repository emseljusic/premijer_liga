<?php
	session_start();
	include "../db_konekcija.php"
?>
<html>
<title>Sudije</title>
<?php include("header.php"); ?>
<body>

<table  class="table table-striped" style="background-color:white; width:25%; float:left; border-style:solid; border-color:black;">
<thead>
	<th><center>Ime</center></th>
	<th><center>Prezime</center></th>
</thead>
	<tbody>
		
			<?php
			$query="select * from arbitar";
			$query2=mysql_query($query); $br=0;
			while($row=mysql_fetch_assoc($query2)){ 
			$br++;
			if ($br==12)
			{
				?>
					<table  class="table table-striped" style="background-color:white; width:25%; float:left; border-style:solid; border-color:black black black white;">
					<thead>
						<th><center>Ime</center></th>
						<th><center>Prezime</center></th>
					</thead>
						<tbody>
				<?php
			}
			?>
			<tr>
			<td><a href="sudijePojedinosti.php?id=<?php echo $row['id_arbitar']; ?>"><?php echo $row['ime_arbitar']?></a></td>
			<td><a href="sudijePojedinosti.php?id=<?php echo $row['id_arbitar']; ?>"><?php echo $row['prezime_arbitar']?></a></td>
		</tr>	
		<?php if($br==11)
			{
				?>
				</tbody>
				</table>
				<?php
			}		
		
		}
			?>
	</tbody>
</table>

</body>
</html>