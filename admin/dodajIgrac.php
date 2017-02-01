<?php
	session_start();
	include "../db_konekcija.php";
?>
<html>
<body>
<?php include("header.php"); ?>

<form method="post">
	<input type="text" name="ime" placeholder="ime igraca"><br>
	<input type="text" name="prezime" placeholder="prezime igraca"><br>
	<select name="pozicija" selected disabled>
		<option value="golman">golman</option>
		<option value="bek">bek</option>
		<option value="štoper">štoper</option>
		<option value="vezni">vezni</option>
		<option value="krilo">krilo</option>
		<option value="napadač">napadač</option>
	<br>
</form>
</body>
</html>