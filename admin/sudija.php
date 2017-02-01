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
			<td><a href="urediSudija.php?id=<?php echo $row['id_arbitar']; ?>"><?php echo $row['ime_arbitar']?></a></td>
			<td><a href="urediSudija.php?id=<?php echo $row['id_arbitar']; ?>"><?php echo $row['prezime_arbitar']?></a></td>
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
	<hr>
	<form method="post">
	<legend> Dodaj novog sudiju: </legend>
	Ime: <input type="text" name="ime_arbitar"> <br>
	Prezime: <input type="text" name="prezime_arbitar"> <br>
	<input type="submit" name="btn" value="Spremi">
	<input type="reset" value="Ponisti">
	</form>
	<?php
		
		if(isset($_POST['btn'])) {
			$ime_arbitar=$_POST["ime_arbitar"];
			$prezime_arbitar=$_POST["prezime_arbitar"];
			$sql2="insert into arbitar values(0,'$ime_arbitar','$prezime_arbitar')";
			$query=mysql_query($sql2);
			
			if($query)
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