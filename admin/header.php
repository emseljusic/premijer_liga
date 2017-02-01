<?php
	include "../db_konekcija.php";
	$query = "SELECT * from korisnik";
	$is_query_run = mysql_query($query);
	$row = mysql_fetch_assoc($is_query_run);
	$id_korisnik=$row['id_korisnik'];
?>
<html>
<head>
<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
body{
	width:100%;margin:auto;min-width:600px;max-width:2000px;
	background-image: url("../slike/poznova.jpg");
	background-position: 0px 120px;
	background-size: 100%;
	background-repeat: no-repeat;
}
.img1{
	width:100%;margin:auto;min-width:600px;max-width:2000px;
}
</style>
</head>
<body >
<div> <img src="../slike/baner.jpg" class="img1">
</div>
<div class="navbar navbar-default navbar-inverse navbar-static-top" align="center" style="background-color: #0044cc;" >
      <div class="container">
        <div class="collapse navbar-collapse">

			<ul class="nav navbar-nav navbar-left" >
				<li>
					<a href="home.php" style="color:white">Početna</a>
				</li>
				<li>
					<a href="tabela.php" style="color:white">Tabela</a>
				</li>
				
				
				<li class="dropdown"> 
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white; background-color:#0044cc;">Utakmice <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li>
							<a href="odigraneUtakmice.php " style="color:white; background-color:#0044cc;">Odigrane utakmice</a>
						</li>
						
						<li>
							<a href="dodajUtakmicu.php" style="color:white; background-color:#0044cc;">Dodaj utakmice</a>
						</li>
						
						<li>
							<a href="raspored.php" style="color:white; background-color:#0044cc;">Raspored</a>
						</li>
						
					</ul>
				</li>
				<li>
					<a href="sudija.php" style="color:white">Sudije</a>
				</li>
				<li>
					<a href="statistika.php" style="color:white">Statistika</a>
				</li>
				<li>
					<a href="moj_profil.php?id=<?php echo $id_korisnik; ?>" style="color:white">Moj profil</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="../logout.php" style="color:white;"><span class="glyphicon glyphicon-off"></span> Odjavi se</a>
				</li>
			</ul>
		</div>
		</div>
		</div>
		<script type="text/javascript" src="../js/jquery-2.2.0.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
	</body>	
</html>