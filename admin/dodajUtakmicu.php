<?php
	session_start();
	include "../db_konekcija.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>
Dodavanje utakmica
</title>
</head>
<body>
<?php include("header.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default" style="margin-top:40px;">
			    <div class="panel-heading">
					<h3 class="panel-title">Unos utakmice</h3>
				</div>
				<div class="panel-body">

					<form method="post" role="form">
					
						<div class="form-group">
							<div class="input-group">
							<input type="date" name="datum" class="form-control">
							<span class="input-group-addon" id="start-date"><span class="glyphicon glyphicon-calendar"></span></span>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
							<input type="number" name="kolo" placeholder="Kolo" class="form-control">
							<span class="input-group-addon" id="start-date"><span class="glyphicon glyphicon-th-list"></span></span>
							</div>
						</div>
					
						<div class="form-group">
							<div class="input-group">
							<select name="dom" class="form-control">
								<option selected disabled>Domacin</option>
								<?php
									$sql2="select * from klub";
									$query2=mysql_query($sql2);
									while($row=mysql_fetch_array($query2)){
									?>
									<option value="<?php echo $row["id_klub"] ?>"><?php echo $row["naziv"] ?></option>
									<?php }
								?>
								</select>
							<span class="input-group-addon" id="start-date"><span class="glyphicon glyphicon-home"></span></span>
							</div>
						</div>

						<div class="form-group">
							<div class="input-group">
							<input type="number" name="dom_gol" class="form-control" placeholder="Golovi domacina">
							<span class="input-group-addon" id="start-date"><span class="glyphicon glyphicon-record"></span></span>
							</div>
						</div>						

						<div class="form-group">
							<div class="input-group">
							<select name="gost" class="form-control">
								<option selected disabled>Gost</option>
								<?php
									$sql2="select * from klub";
									$query2=mysql_query($sql2);
									while($row=mysql_fetch_array($query2)){
									?>
									<option value="<?php echo $row["id_klub"] ?>"><?php echo $row["naziv"] ?></option>
									<?php }
								?>
							</select>
							<span class="input-group-addon" id="start-date"><span class="glyphicon glyphicon-road"></span></span>
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
							<input type="number" name="gost_gol" placeholder="Golovi gosta" class="form-control">
							<span class="input-group-addon" id="start-date"><span class="glyphicon glyphicon-record"></span></span>
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
							<select name="sudija" class="form-control">
							<option selected disabled>Sudija</option>
								<?php
									$sql4="select * from arbitar"; 
									$query4=mysql_query($sql4);
									while($row=mysql_fetch_array($query4))
									{ ?>
									<option value="<?php echo $row["id_arbitar"]; ?>">
									<?php echo $row["prezime_arbitar"] ; ?></option>
								<?php } ?> 
								</select>
							<span class="input-group-addon" id="start-date"><span class="glyphicon glyphicon-flag"></span></span>
							</div>
						</div>
						
						<div class="form-group">
							<div class="input-group">
							<input type="number" name="odigrana" placeholder="Odigrana" class="form-control">
							<span class="input-group-addon" id="start-date"><span class="glyphicon glyphicon-ok"></span></span>
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
			$datum=$_POST["datum"];
			$kolo=$_POST["kolo"];
			$dom=$_POST["dom"];
			$dom_gol=$_POST["dom_gol"];
			$gost_gol=$_POST["gost_gol"];
			$gost=$_POST["gost"];
			$sudija=$_POST["sudija"];
			$odigrana=$_POST["odigrana"];
			
			$sql2="insert into utakmica values(0,'$odigrana','$datum','$kolo','$dom_gol','$gost_gol','$dom','$gost','$sudija')";
			$query=mysql_query($sql2);
			
			if($query)
			{
	?>
			<div class="container">
			 <div class="row">
		         <div class="col-md-6 col-md-offset-3">
		             <div class="alert alert-success">
		                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                <strong>Uspješan unos!</strong>
		              </div>
		         </div>
		      </div>
		      </div>
			<?php
			}
		else
		{
			?>
			<div class="container">
			 <div class="row">
		         <div class="col-md-6 col-md-offset-3">
		             <div class="alert alert-error">
		                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                <strong>Neuspješan unos!</strong>
		              </div>
		         </div>
		      </div>
		      </div>
			<?php 
		}
		}
		?>
</body>
</html>