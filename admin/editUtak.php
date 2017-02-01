<?php
	session_start();
	include "../db_konekcija.php";
	$id_utakmica = $_GET['id'];
	$query9 = "SELECT * from utakmica WHERE  id_utakmica='$id_utakmica'";
	$is_query_run9 = mysql_query($query9);
	$row = mysql_fetch_assoc($is_query_run9);
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
Ažuriranje utakmica
</title>
</head>
<body>
<?php include("header.php"); ?>

<div class="container" style="float:center">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default" style="margin-top:40px;">
			    <div class="panel-heading">
					<h3 class="panel-title">Unos utakmice</h3>
				</div>
				<div class="panel-body">

					<form method="post" role="form">
					
					<div class="form-inline">
						<div class="form-group">
							<label for="datum" style="width:100px">Datum:</label>
							<div class="input-group" style="width:300px">
							<span class="input-group-addon" id="start-date" style="width:10%"><span class="glyphicon glyphicon-calendar"></span></span>
							<input type="date" name="datum" class="form-control" value="<?php echo $datum; ?>">
							
							</div>
						</div>
					
						<div class="form-group">
							<label for="kolo" style="width:100px">Kolo:</label>
							<div class="input-group" style="width:300px">
							<span class="input-group-addon" id="start-date" style="width:10%"><span class="glyphicon glyphicon-th-list"></span></span>
							<input type="number" name="kolo" placeholder="Kolo" class="form-control" value="<?php echo $kolo; ?>">
							
							</div>
						</div>
					
						<div class="form-group">
							<label for="dom" style="width:100px">Domaćin:</label>
							<div class="input-group" style="width:300px">
							<span class="input-group-addon" id="start-date" style="width:10%"><span class="glyphicon glyphicon-home"></span></span>
							<select name="dom" class="form-control">
								<option selected disabled>Domacin</option>
								<?php
									$sql2="select * from klub"; 
									$query2=mysql_query($sql2);
									while($row=mysql_fetch_array($query2))
									{ ?>
									<option value="<?php echo $row["id_klub"]; ?>"
									<?php if($row['id_klub']==$domacin_id) 
									{?> selected <?php } ?> >
									<?php echo $row["naziv"]; ?></option>
								<?php } ?> 
								</select>
							
							</div>
						</div>
						
						<div class="form-group" style="width:20%">
							<div class="input-group">
							<input type="number" name="gol_dom" class="form-control" placeholder="Golovi domacina" value="<?php echo $gol_dom; ?>">
							<span class="input-group-addon" id="start-date"><span class="glyphicon glyphicon-record"></span></span>
							</div>
						</div>						

						<div class="form-group">
							<label for="gost" style="width:100px">Gost:</label>
							<div class="input-group" style="width:300px">
							<span class="input-group-addon" id="start-date" style="width:10%"><span class="glyphicon glyphicon-road"></span></span>
							<select name="gost" class="form-control">
								<option selected disabled>Gost</option>
								<?php
									$sql3="select * from klub"; 
									$query3=mysql_query($sql3);
									while($row=mysql_fetch_array($query3))
									{ ?>
									<option value="<?php echo $row["id_klub"]; ?>"
									<?php if($row['id_klub']==$gost_id) 
									{?> selected <?php } ?> >
									<?php echo $row["naziv"]; ?></option>
									<?php }
								?>
							</select>
							
							</div>
						</div>
						
						<div class="form-group" style="width:20%">
							<div class="input-group">
							<input type="number" name="gol_gost" class="form-control" value="<?php echo $gol_gost; ?>">
							<span class="input-group-addon" id="start-date"><span class="glyphicon glyphicon-record"></span></span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="sudija" style="width:100px">Sudija:</label>
							<div class="input-group">
							<select name="sudija" class="form-control">
								<?php
									$sql4="select * from arbitar"; 
									$query4=mysql_query($sql4);
									while($row=mysql_fetch_array($query4))
									{ ?>
									<option value="<?php echo $row["id_arbitar"]; ?>"
									<?php if($row['id_arbitar']==$arbitar_id) 
									{?> selected <?php } ?> >
									<?php echo $row["prezime_arbitar"] ; ?></option>
								<?php } ?> 
								</select>
							<span class="input-group-addon" id="start-date"><span class="glyphicon glyphicon-flag"></span></span>
							</div>
						</div>
						
						<div class="form-group">
							<label for="odigrana">Odigrana:</label>
							<div class="input-group">
							<label class="radio-inline"><input type="radio" name="odigrana" value="1">Da</label>
							<label class="radio-inline"><input type="radio" name="odigrana" value="0">Ne</label>
							</div>
						</div>
					</div>	
						<input type="submit" name="btn" class="btn btn-primary btn-md" value="Spremi" />
						<input type="reset" class="btn btn-default btn-md" value="Poništi" />
					
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
		
		if(isset($_POST['btn'])) {
			$novi_datum=$_POST["datum"];
			$novi_kolo=$_POST["kolo"];
			$novi_dom=$_POST["dom"];
			$novi_gol_dom=$_POST["gol_dom"];
			$novi_gol_gost=$_POST["gol_gost"];
			$novi_gost=$_POST["gost"];
			$novi_sudija=$_POST["sudija"];
			$novi_odigrana=$_POST["odigrana"];
			
			$sql5="update utakmica set odigrana='$novi_odigrana',datum='$novi_datum',kolo='$novi_kolo',gol_dom='$novi_gol_dom',
			gol_gost='$novi_gol_gost',domacin_id='$novi_dom',gost_id='$novi_gost',arbitar_id='$novi_sudija' where id_utakmica='$id_utakmica'";
			$query5=mysql_query($sql5);
			
			if($query5)
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
		<br>
		
<div align="center">
		<a href="raspored.php">Nazad na raspored</a>


<table>

	<tbody>
		<tr>
			<?php
			$query="select d.*,i.ime_igrac as ime, i.prezime_igrac as prezime from
			dogadaj d join igraci i on igrac_id=id_igrac where utakmica_id='$id_utakmica'";
			$query2=mysql_query($query);
			while($row=mysql_fetch_assoc($query2)){
				$id_dogadaj = $row['id_dogadaj'];
			?>
			
			<td><a href="editDogadaj.php?id=<?php echo $row['id_dogadaj']; ?>">
			<?php echo $row['id_dogadaj'] ; ?></a></td>
			<td><?php echo $row['tip']?></td>
			<td><?php echo $row['ime']?></td>
			<td><?php echo $row['prezime']?></td>
		</tr>		
		<?php }
			?>
	</tbody>
</table>
<p>Dodavanje događaja</p>
<form method="post">
	<select name="tip">
		<option selected disabled>Tip</option>
		<option value="gol">Gol</option>
		<option value="žuti karton">Žuti karton</option>
		<option value="crveni karton">Crveni karton</option>
	</select>
	<select name="igrac">
		<option selected disabled>Igrač</option>
		<?php
			$qi="select i.*, k.naziv as naziv from igraci i, klub k where (i.klub_id=$domacin_id OR i.klub_id=$gost_id) 
			and i.klub_id=k.id_klub order by naziv, prezime_igrac, ime_igrac"; 
			$qi2=mysql_query($qi);
			while($row=mysql_fetch_array($qi2))
			{ 
		?>
			<option value="<?php echo $row["id_igrac"]; ?>">
			<?php echo $row["prezime_igrac"] ; ?>
			<?php echo  $row['ime_igrac']; ?>
			(<?php echo $row['naziv']; ?>)</option>
		<?php } ?>
	</select>
	<input type="submit" name="btn2" value="Spremi" />
	<input type="reset" value="Poništi" />
</form>
<?php
		
		if(isset($_POST['btn2'])) {
			$tip=$_POST["tip"];
			$igrac_id=$_POST["igrac"];
			
			
			$sql6="insert into dogadaj values(0,'$id_utakmica','$tip','$igrac_id')";
			$query6=mysql_query($sql6);
			
			if($query6)
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
</div>
</body>
</html>