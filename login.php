<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
  </head>
  <body>
    <?php 
     include "db_konekcija.php";
      if($_POST['naziv_korisnik'] && $_POST['pass_korisnik'])
      {
        $naziv_korisnik = $_POST['naziv_korisnik'];
        $pass_korisnik = $_POST['pass_korisnik'];
        if($naziv_korisnik && $pass_korisnik)
        {
          $query = "SELECT * FROM korisnik WHERE naziv_korisnik = '$naziv_korisnik' AND pass_korisnik = '$pass_korisnik'";
          $query_run = mysql_query($query);
          $row = mysql_fetch_assoc($query_run);
          $id_kor = $row['id_korisnik'];
          $db_naziv_korisnik = $row['naziv_korisnik'];
          $db_pass_korisnik = $row['pass_korisnik'];
          if ($naziv_korisnik == $db_naziv_korisnik && $pass_korisnik == $db_pass_korisnik)
          {
            session_start();
            $_SESSION['id'] = $id_kor;
            $_SESSION['naziv_korisnik'] = $row['naziv_korisnik'];
            $_SESSION['email_korisnik'] = $row['email_korisnik'];
            $_SESSION['klub_id'] = $row['klub_id'];
			$_SESSION['tip_korisnika'] = $row['tip_korisnika'];
            if($_SESSION['tip_korisnika'] == 1) {
                 header("location: admin/home.php");
             }
            else {
                
                header("location: korisnik/home.php");
             }
          }
          else {
            echo '<script>alert("Korisnički podaci nisu validni!")</script>';
          }
        }
      }
     ?>
      <div class="container" style="padding-top:200px;padding-left:400px;">
      <div class="row">
          <div class="col-md-6">
            <div class="span4 offset4 well">
			<legend>Prijava korisnika</legend>
		<form method="POST" action="login.php" accept-charset="UTF-8">
			<input type="text" id="naziv_korisnik" class="form-control" name="naziv_korisnik" placeholder="Korisničko ime"> <br/>
            <input type="password" id="pass_korisnik" class="form-control" name="pass_korisnik" placeholder="Lozinka"> <br/>
            <button type="submit" name="submit" class="btn btn-info btn-block">Prijava</button><br><br>
			<a href="index.php">Nazad</a>
        </form>
		</div>
		</div>
		</div>
		</div>
  </body>
</html>