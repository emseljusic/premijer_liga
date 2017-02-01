<?php
	session_start();
	include "../db_konekcija.php";
?>

<html>
<head>
	<meta charset="utf-8">
	<title>Korisnici</title>
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
	<h4>Svi korisnici:</h4>
		<table  class="table table-striped" style=" background-color: white; width:83%; border-radius:20px">
			<thead>
			<th><center>ID</center></th>
			<th>Naziv korisnika</th>
			<th>Lozinka</th>
			<th>Email</th>
			<th>Omiljeni klub</th>
			<th>Tip korisika</th>
			<th><center>Obriši</center></th>
			<th><center>Ažuriraj</center></th>
			</thead>
			<tbody>
			<?php
			$query = 'select k.*,t.naziv from korisnik k join klub t on t.id_klub=k.klub_id';
			$is_query_run = mysql_query($query);
			while ($row=mysql_fetch_assoc($is_query_run))
			{
				$tip_kor = "Admin";
				if($row['tip_korisnika']!=1) {
					$tip_kor = "Obični korisnik";
				}
			?>
				<tr>
				<td><center><?php echo $row['id_korisnik']; ?></center></td>
				<td><?php echo $row['naziv_korisnik']; ?></td>
				<td><?php echo $row['pass_korisnik']; ?></td>
				<td><?php echo $row['email_korisnik']; ?></td>
				<td><?php echo $row['naziv']; ?></td>
				<td><?php echo $tip_kor; ?></td>
				<td><center><a  href="obrisiKorisnika.php?id=<?php echo $row['id_korisnik']; ?>" >Obriši</a></center></td>
				<td><center><a  href="azurirajKorisnika.php?id=<?php echo $row['id_korisnik']; ?>" >Ažuriraj</a></center></td>
				</tr>
			<?php }?>
		</tbody>
	</table>
</body>
</html>