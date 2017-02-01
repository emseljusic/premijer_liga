<?php
	session_start();
	include "db_konekcija.php";
	$naziv_korisnik=$_POST['naziv_korisnik'];
	$pass_korisnik=$_POST['pass_korisnik'];
	$email_korisnik=$_POST['email_korisnik'];
	$klub_id=$_POST['klub_id'];
	$reg=$_POST['reg'];
	if($_POST['reg'])
	{
		$sqlpr = "SELECT * FROM korisnik WHERE naziv_korisnik='$naziv_korisnik' or email_korisnik='$email_korisnik'";
		$query2 = mysql_query($sqlpr);
		$izlaz = mysql_num_rows($query2);
		if( (!isset($naziv_korisnik) || $naziv_korisnik == false) || (!isset($pass_korisnik) || $pass_korisnik == false) ){
		?>
			<strong>Niste unijeli podatke!</strong>
		<?php
		}
     
		else
        {
            if($izlaz != 0) { ?>
                <strong>Korisnik sa tim nazivom ili email-om već postoji!</strong>
           <?php
			
			}
			else
            {

            $sql3 = "INSERT INTO korisnik values(0, '$naziv_korisnik', '$pass_korisnik', '$email_korisnik', '$klub_id', 0)";
            $query3 = mysql_query($sql3);
			
			if($query3)	{ ?>
		    	<strong>Uspješna registracija!</strong> 
			<?php
			}
			
			else	{ ?>
			<strong>Neuspješna registracija!</strong>
<?php			}
            }
        }
    }
?>
<html>
<head>
	<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Registracija</title>

</head>

<body>

	<div class="container" style="padding-top:200px;padding-left:400px;">
      <div class="row">
          <div class="col-md-6">
            <div class="span4 offset4 well">

	
              <legend>Registracija</legend>
		<form method="post">
			Korisničko ime: <input type="text" class="form-control" name="naziv_korisnik" required /><br>
			Lozinka: <input type="password" class="form-control"  name="pass_korisnik" required /><br>
			Email: <input type="text" class="form-control"  name="email_korisnik" required /><br>	
			Omiljeni klub:
			<select name="klub_id" >			
			<?php
				$sql2="select * from klub";
				$query2=mysql_query($sql2);
				while($row=mysql_fetch_array($query2)){
				?>
			<option value="<?php echo $row["id_klub"] ?>"><?php echo $row["naziv"] ?></option>
			<?php
				}
			?>
			</select>
			<input type="submit" class="btn btn-primary" name="reg" value="Spremi"/>
			<a href="index.php">Nazad</a>
		</form>
		</div>
		</div>
		</div>
		</div>
</body>
</html>