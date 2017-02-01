<?php
	session_start();
	include "../db_konekcija.php";
	$id_klub = $_GET['id'];
	$query = "SELECT * from klub WHERE  id_klub='$id_klub'";
	$is_query_run = mysql_query($query);
	$row = mysql_fetch_assoc($is_query_run);
	$naziv = $row['naziv'];
	$god_osn = $row['god_osnivanja'];
	$grad = $row['grad'];

?>

<html>
<title>
Klub
</title>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<style>
		.p1{
			width:80%;
			
			color:black;
		}
	</style>
</head>

<body>
<?php include("header.php"); ?>
<center>
<form class="btn-group" method="POST">
<input class="btn btn-primary" type="submit" name="bt1" value="O timu">
<input class="btn btn-primary" type="submit" name="bt2" value="Igrači">
<input class="btn btn-primary" type="submit" name="bt3" value="Utakmice">
</form>
</center>

<?php
if(isset($_POST["bt2"]))
{
	?> 


<table  class="table table-striped" style=" background-color: white; width:60%; border-radius:20px">
<thead>
	<th>Ime</th>
	<th>Prezime</th>
	<th>Pozicija</th>
	<th>Broj dresa</th>
	<th>Golovi</th>
	<th>ŽK</th>
	<th>CK</th>
	<th><center>Drž</center></th>
</thead>
	<tbody>
		<tr>
			<?php
		
				$query="select i.*, 
(SELECT COUNT(d.tip) from dogadaj d where tip='gol' and d.igrac_id=i.id_igrac) as bg,
(SELECT count(d.tip) from dogadaj d where tip='zuti' and d.igrac_id=i.id_igrac) as zk,
(SELECT count(d.tip) from dogadaj d where tip='crveni' and d.igrac_id=i.id_igrac) as ck
				from igraci i left JOIN dogadaj d ON i.id_igrac=d.igrac_id where i.klub_id='$id_klub' group by i.id_igrac";
				$query2=mysql_query($query);
				while($row=mysql_fetch_assoc($query2)){
					
				
			?>
				
			<td><a href="igrac.php?id=<?php echo $row['id_igrac']; ?>"><?php echo $row['ime_igrac']?></a></td>
			<td><a href="igrac.php?id=<?php echo $row['id_igrac']; ?>"><?php echo $row['prezime_igrac']?></a></td>
			<td><center><?php echo $row['pozicija']?></center></td>
			<td><center><?php echo $row['broj']?></center></td>
			<td><center><?php echo $row['bg']?></center></td>
			<td><center><?php echo $row['zk']?></center></td>
			<td><center><?php echo $row['ck']?></center></td>
			<td><center><?php echo $row['drzavljanstvo']?></center></td>
		</tr>		
		<?php }
			?>
	</tbody>
</table>
</p>
<?php } else if(isset($_POST["bt3"]))
{
	

?>
<b><p>Utakmice:</b>
<table  class="table table-striped" style=" background-color: white; width:60%; border-radius:20px">
<col width="20%">
	<thead>
		<th>Datum</th>
		<th><center>Kolo</center></th>
		<th><center>Domaćin</center></th>
		<th><center>Golovi</center></th>
		<th><center>Gost</center></th>
		<th><center>Sudija</center></th>
	</thead>
	<tbody>
		<tr>
			<?php 
				$query3="SELECT u.*, k1.naziv as domacin, k2.naziv as gost, a.prezime_arbitar as sudija FROM
					utakmica u, klub k1, klub k2, arbitar a where u.domacin_id=k1.id_klub AND u.gost_id=k2.id_klub
					AND (u.domacin_id='$id_klub' OR u.gost_id='$id_klub') AND a.id_arbitar=u.arbitar_id order by kolo ";
				$is_query3_run = mysql_query($query3);
				while ($row=mysql_fetch_assoc($is_query3_run)) {
					?>
					<td><?php echo $row['datum']?></td>
					<td><center><?php echo $row['kolo']?></center></td>
					<td><center><?php echo $row['domacin']?></center></td>
					<?php 
					if ($row['odigrana']=='1')
					{ ?>
					<td><center><?php echo $row['gol_dom']; ?>-<?php echo $row['gol_gost']; ?></center></td>
					<?php } else { ?>
						<td><center>-</center></td>
					<?php } ?>
					<td><center><?php echo $row['gost']?></center></td>
					<td><center><?php echo $row['sudija']?></center></td>
		</tr>	
			<?php	}
				
			?>
		
	</tbody>
</table>

<?php } else {
	
?>
<table  class="table table-striped" style=" background-color: white; width:30%;">
<tbody>
<tr><td><b>Naziv: </b><?php echo $naziv; ?></td>
	<td rowspan="4" style="width:160px;"><img src="../slike/<?php echo $id_klub ?>.png" style="height:160px"></td>
</tr>
<tr><td><b>Godina osnivanja: </b><?php echo $god_osn; ?></td></tr>
<tr><td><b>Grad: </b><?php echo $grad; ?></td></tr>
<tr><td><b>Trener: </b><?php
 $sql1="select trener_ime, trener_prezime from trener where klub_id='$id_klub'";
 $query1=mysql_query($sql1);
 while($row1=mysql_fetch_assoc($query1)){
	 echo $row1['trener_ime'];
	 echo " ";
	 echo $row1['trener_prezime'];
 }
?></td></tr>
</tbody>
</table>
<section>
<?php
	switch($id_klub)
	{
		case 1:
		{	?>
			<b><p> Fudbalski klub Željezničar je profesionalni nogometni klub iz Sarajeva, Bosna i Hercegovina. 
			Takmiči se u Premijer ligi Bosne i Hercegovine.</p>
			<p>Osnovan je 19. septembra 1921. godine.</p> 
			
			<p>Željezničar je najpoznatiji i najtrofejniji nogometni klub iz Bosne i Hercegovine sa šest osvojenih trofeja
			nacionalnog prvenstava, pet titula nacionalnog kupa, kao i tri titule superkupa.</p> 
			
			<p>U sezoni 1971-72. osvaja prvu ligu Jugoslavije. 1981. godine igra finale kupa Jugoslavije. 
			Najveći uspjeh u evropskim takmičenjima ostvaruje u sezoni 1984-85., kada je igrao polufinale Kupa UEFA.</p>
			
			<p>Za klub je nastupalo nekoliko reprezentativaca Jugoslavije i Bosne i Hercegovine, a samo neki od njih su: 
			Ivica Osim, Mehmed Baždarević, Josip Katalinski, Edin Bahtić, Haris Škoro i Edin Džeko. </p>
			
			<p>Nadimak kluba je Plavi. Najveći rival Željezničara je Sarajevo. Domaće utakmice igra na stadionu Grbavica. </p></b>
			
			<?php
			break;
		}
		
		case 2:
		{	?>
			<b><p> Fudbalski klub Sarajevo je nogometni klub iz bosanskohercegovačkog glavnog grada Sarajeva i jedan je od najuspješnijih klubova u državi. </p>
			
			<p>Klub je osnovan 24. oktobra 1946. godine i najuspješniji je klub iz SR Bosne i Hercegovine u ligi bivše SFRJ, 
			osvojivši dvije titule prvaka u sezonama 1966–67. i 1984–85. U novijoj, poslijeratnoj historiji, 
			FK Sarajevo je jedan od najistaknutijih članova Premijer lige Bosne i Hercegovine uz osvojenih pet kupova Bosne i Hercegovine 
			(1997, 1998, 2002, 2005 i 2014.), 3 prvenstva BiH (1998/99, 2006/07, 2014/15) te su u 6 navrata bili viceprvaci.</p>
			
			<p>Jedan su od dva najpopularnija fudbalska kluba u državi, uz gradskog rivala FK Željezničar, s kojim dijele snažan rivalitet 
			koji se ogleda kroz nadaleko poznati sarajevski derbi. </p>
			
			<p>Od decembra 2013. godine, malezijski biznismen, investitor i predsjednik Berjaya Groupa, Vincent Tan, otkupio je dio upravljačkih prava FK Sarajeva. </p></b>
			<?php
			break;
		}
		
		case 3:
		{	?>
			<b><p> Hrvatski športski klub Zrinjski Mostar je nogometni klub iz Mostara, Bosna i Hercegovina. Osnovan je 1905. godine.</p> 
			
			<p>Takmiči se u Premijer ligi Bosne i Hercegovine. Još 1896. ugledni mostarski Hrvati zatražili su da se osnuje sportsko društvo hrvatske omladine
			pod nazivom "Hrvatski sokol”, što nije bilo dopušteno. Ipak, nešto manje od deset godina poslije, 1905. godine u prostorijama "Hrvoja",
			hrvatska omladina na čelu s profesorom Kuštrebom, osniva se đački sportski klub koji 1912. godine prerasta u 
			gimnazijski sportski klub "Zrinjski" Mostar.</p> 
			
			<p>Uspješan rad i rezultati kluba bilježe se do 1914. godine kada mu se zabranjuje rad. 
			Tek 1917. godine H.Š.K."Zrinjski" Mostar se stapa sa Hrvatskim radničkim omladinskim sportskim klubom,
			koji je postajao pri Hrvatskoj radničkoj zadruzi. Objedinjeni klub dobio je novo ime "Hercegovac". </p></b>
			<?php
			break;
		}
		
		case 4:
		{	?>
			<b><p> Fudbalski klub "Sloboda" Tuzla je nogometni klub iz Tuzle, Bosna i Hercegovina. Osnovan je 1919. godine. Takmiči se u Premijer ligi Bosne i Hercegovine. 
			U sezoni 2013/14. osvaja je prvo mjesto u Prvoj ligi FBiH, izborivši time plasman u Premijer ligu BiH. </p>
			
			<p>Najveći uspjesi do sada su: jesenjski prvak bivše SFRJ 1989. godine i plasman u Kup UEFA.</p>
			
			<p>Osamostaljivanjem države Bosne i Hercegovine, FK "Sloboda" Tuzla ima značajnu ulogu u prvenstvu gdje je ostvario visoke plasmane, 
			u takmičenju za kup BiH šest puta je bio finalist takmičenja, a u sezoni 2008/2009. je ponovio svoj najbolji poslijeratni uspjeh (1995/96), 
			osvojivši 3. mjesto u Premijer ligi.</p> 
			
			<p>Sloboda je u ovom periodu dva puta bila učesnik UEFA InterToto kupa gdje je oba puta došla do drugog kruga.
			Dva puta je igrala i finale kupa BiH i u oba finala bila poražena, i to 2008. od Zrinjskog, a 2009. od Slavije i to oba puta na penale. </p>
			
			<p>Sezona 2008/2009. je bila najuspješnija za klub u Premijer Ligi. Tada je Sloboda igrala finale kupa i osvojila treće mjesto na tabeli, 
			izborivši time  Evropu, ali joj je bila uskraćena licenca. Sloboda je tužila N/FSBiH i dobila tužbu, ali daljnji razvoj situacije ostaje nerazjašnjen. </b></p>
			<?php
			break;
		}
		
		case 5:
		{	?>
			<b><p> Nogometni klub Široki Brijeg je nogometni klub iz Širokog Brijega, Bosna i Hercegovina. Takmiči se u Premijer ligi Bosne i Hercegovine.
			Tradicionalne boje kluba su plava i bijela. Domaće utakmice igra na stadionu Pecara.</p>
			
			<p>Osnovan je 1948. godine. Najveći uspjesi kluba su osvajanje Premijer lige Bosne i Hercegovine u dva navrata, kao i osvajanje nacionalnog kupa. 
			Prvi nastup u evropskim tamičenjima ostvaruje u sezoni 2002-03. protiv Seneca u okviru Kupa UEFA. </p>
			
			<p>Tokom postojanja mijenjao je nekoliko imena: Borac, Boksit, Lištica, Mladost i Mladost-Dubint. </p>
			
			<p>Od osnivanja Široki igra u lokalnim takmičenjima bez većih uspjeha. Pravi uspjesi dolaze tek nakon završetka rata u Bosni i Hercegovini.
			U prvenstvu Herceg-Bosne, pod imenom Mladost i poslije sa sponzorskim imenom Mladost-Dubint Široki osvaja nekoliko titula prvaka.</p>
			
			<p>Nakon ulaska u Premijer ligu Bosne i Hercegovine, Široki ostavlja dobar utisak i već u drugoj sezoni postaje viceprvak i tako izlazi u Evropu. 
			Nakon četvrtog mjesta 2002-03. u slijedećoj sezoni po prvi put u svojoj historiji Široki postaje prvak Bosne i Hercegovine. 
			Navedeni uspjeh je ponovljen u sezoni 2005-06. </p></b>
			<?php
			break;
		}
		
		case 6:
		{	?>
			<b><p> Nogometni klub Čelik Zenica je nogometni klub iz Zenice, Bosna i Hercegovina. Osnovan je 1945. godine. 
			Takmiči se u Premijer ligi Bosne i Hercegovine. </p>
			
			<p>Za ime NK Čelik nije teško zaključiti odakle dolazi. 
			Zenica je najveći industrijski centar crne metalurgije u ovome dijelu Evrope. Klub i željezara su uvijek bili usko povezani, 
			te Čelik predstavlja jedan tipični radnički klub, kojeg je osnovala, vodila i poznatim napravila radnička klasa. 
			Službena boja NK Čelik je crno-crvena. Crvena boja predstavlja boju vatre, usijanog željeza, zastavu radničke klase, 
			ali i dominantnu boju zastava u vrijeme kada je osnovan NK Čelik. Crna predstavlja boju uglja, rudnika i crne industrije 
			po čemu je Zenica i dan danas poznata.</p> 
			
			<p>Grb NK Čelik se nije bitno mijenjao kroz historiju. Do 1992. godine na grbu se nalazio poprečni 
			presjek šine, zvijezda petokraka, te slika lopte koja se koristila u vrijeme osnivanja kluba. 
			Od 1992. godine mjesto petokrake i šine je zauzeo bosanski ljiljan, dok je lopta ostala nepromijenjena u prvih nekoliko sezona 
			Prve lige Republike BiH. Kasnije su uslijedile dodatne modifikacije grba. Klub trenutno koristi tzv. "deblju" verziju grba, 
			a koja po proporcijama i bojama ne slijedi historijski poznat i priznat grb NK Čelik, gdje čak ni zlatni ljiljan ne prati izgled ljiljana 
			koji se koristio na grbu i zastavi Republike BiH. Druge, nešto sretnije izvedbe grba, se javljaju u medijima.
			Niti jedna od navedenih verzija nije registrovana.</p> 
			
			<p>Dresovi NK Čelik su crno-crvene boje. Shema dresova nije stalna, 
			tako da od sezone 2009/10 dresovi su sa horizontalnim crno-crvenim prugama. Šorcevi su crne boje. Rezervni dresovi su bijele boje. 
			Trenutni dobavljač opreme je španska firma "Joma"
			</p></b>
			<?php
			break;
		}
		
		case 7:
		{	?>
			<b><p> FK Radnik je fudbalski klub iz Bijeljine, Bosna i Hercegovina. Takmiči se u Premijer ligi Bosne i Hercegovine.</p>
			
			<p>Osnovan je 14. juna 1945. Svoju prvu promociju u Premijer ligu je izborio u sezoni 2004-05, nakon osvajanja šampionske titule u Prvoj ligi Republike Srpske. 
			Prvu sezonu u najvišem rangu je završio na 13. mjestu, da bi naredne sezone ispao u niži rang. </p>
			
			<p>U sezoni 2011-12, osvaja svoju treću titulu u Prvoj ligi Republike Srpske, čime ponovo ostvaruje plasman u Premijer ligu. </p>
			
			<p>Najveći uspjeh kluba je osvajanje Kupa Bosne i Hercegovine. Ubrzo nakon nastanka Radnik Bijeljina ostvaruje prve uspjehe. 
			Već 1948. godine klub postaje šampion tuzlanske oblasti pobjedivši u finalu ekipu Slobode iz Tuzle.</p>
			
			<p>Uspjesi su se nastavili nizati. Samo godinu dana kasnije Radnik ostvaruje jedan od najvećih uspjeha u historiji kluba - ulazak u 1/16 finala 
			kupa Jugoslavije. 1957. godine klub se počinje takmičiti u okviru Novosadsko-srijemske zone.
			Radnik je u dva navrata nastupao u Drugoj ligi SFRJ. Jedan od ulazaka u taj rang takmičenja vezuje se za sezonu 1971-72 kada je 
			osvojio titulu šampiona Republičke lige BiH. Slijedilo je razigravanje za ulazak u Drugu ligu SFRJ u kojem ga je čekala Sloga iz Vukovara. 
			Sa dvije ubjedljive pobjede rezultatima 4-0 u Bijeljini i 8-0 u Vukovaru, Radnik se plasirao u Drugu ligu SFRJ.</p></b>
			<?php
			break;
		}
		
		case 8:
		{	?>
			<b><p> Fudbalski klub Olimpic Sarajevo je nogometni klub iz Sarajeva, Kanton Sarajevo, Bosna i Hercegovina. Trenutno se takmiči u Premijer ligi.</p>
			
			<p>Klub je osnovan 1993. godine. Bio je član Premijer lige u njenoj prvoj sezoni 2000-01. Osvajač je Prve lige Federacije Bosne i Hercegovine 
			u sezoni 2008-09.</p> 
			
			<p>Nadimak kluba je Vukovi. Tradicionalne boje su zelena i bijela. Domaće utakmice igra na stadionu Otoka. </p>
			
			<p>Ime Olimpic potiče iz činjenice da su XIV zimske olimpijske igre održane u Sarajevu, a navijači, odnosno igrači FK Olimpica, dobili su naziv Vukovi,
			aludirajući na simpatičnog Vučka, koji je ujedno bio i zaštitni znak XIV zimskih olimpijiskih igara. </p></b>
			<?php
			break;
		}
		
		case 9:
		{	?>
			<b><p> Nogometni klub Vitez je nogometni klub iz Viteza, Bosna i Hercegovina. Takmiči se u Premijer ligi Bosne i Hercegovine.
			Tradicionalne boje su plava i bijela. Domaće utakmice igra na Gradskom stadionu u Vitezu.</p>
			
			<p>Osnovan je 1947. godine kao NK Radnik, na osnovu inicijative grupe zaljubljenika u nogomet. 
			Klub je odmah uključen u takmičenje Sarajevske grupne lige, a igrali su na improviziranom terenu. 
			1954. godine usvaja sadašnji naziv. U dva navrata je nosio sponzorska imena: NK Vitez FIS (2004) i NK Ecos Vitez (2009). </p>
			
			<p>Najveći uspjeh u modernoj historiji kluba je osvajanje Prve lige Federacije Bosne i Hercegovine. 
			Prijašnji najbolji uspjeh je bio igranje u šesnaestini finala Kupa Jugoslavije protiv Rijeke.</p> 
			
			<p>U ovom klubu su ponikli mnogi ugledni i poznati nogometaši, a jedan od najpoznatijih je Anto Rajković, dugogodišnji član "Sarajeva", 
			reprezentativac Jugoslavije i uspješni član engleskog kluba Swansea Cityja. Pored Rajkovića, poznatiji nogometaši su: Nikola Grabovac, 
			Željko Biljuš, Frano Skopljak Cani (prvi nogometaš iz Viteza koji je igrao u Prvoj ligi Jugoslavije u Čeliku iz Zenice), Galib Mujčić, 
			Varupa Vejsil, Franjo Vuleta. </p></b>
			<?php
			break;
		}
		
		case 10:
		{	?>
			<b><p> Fudbalski klub Mladost Velika Obarska je nogometni klub iz Velike Obarske, Bosna i Hercegovina. Takmiči se u Premijer ligi Bosne i Hercegovine.</p>
			
			<p>Osnovan je 1948. godine kao DTV Partizan. Registrovan je 1956. godine. Iste godine počinje svoje prvo takmičenje u Semberiji, 
			gdje je bio član sve do sezone 1974-75. godine, kada se prvi put plasirao u viši rang u Podsaveznu ligu Brčko u kojoj se takmičio sve do njene reorganizacije krajem sedamdesetih godina, 
			kada je formirana Semberska liga. </p>
			
			<p>Najveći uspjeh kluba je plasman u Premijer ligu Bosne i Hercegovine. Tradicionalne boje su zelena i bijela.
			Domaće utakmice igra na Gradskom stadionu u Bijeljini.</p></b>
			<?php
			break;
		}
		
		case 11:
		{	?>
			<b><p> NK Metalleghe-BSI je nogometni klub iz Jajca, Bosna i Hercegovina. Takmiči se u Premijer ligi Bosne i Hercegovine, 
			nakon što je u sezoni 2015-16. izborio promociju iz Prve lige Federacije Bosne i Hercegovine.</p>
			
			<p>NK Metalleghe BSI je osnovan 6. augusta 2009.godine u želji da klub nastavi čuvati i njegovati stogodišnju tradiciju nogometa u gradu Jajcu. 
			Klub se na sportskoj sceni pojavio kada je u Jajcu sport spao na najnižu razinu od kad postoji. Osnivači kluba su bili: Nikola Bilić, 
			Matija Lučić, Nikola Jurinović, Josip Bošković, Jozo Lučić. Mjesec dana od osnivanja klub je već odigrao svoje prve službene utakmice
			u selekcijama pionira i kadeta (protiv NK Busovača), te seniora (protiv FK Kaćuni). Sve tri selekcije su se natjecale u kantonalnim ligama.</p>
			
			<p>Predan rad i uspjeh kluba prepoznala je u jesen 2011.godine tvrka B.S.I. d.o.o. Jajce u vlasništvu italijanske grupacije Metalleghe. 
			Od tog trenutka počinju zlatni dani klupske kratke, ali bogate historije. Klub i sponzor su prve dvije godine vrlo uspješno sarađivali, 
			prva ekipa je postala stabilni federalni drugoligaš, dok su u takmičenje uključene sve omladinske selekcije 
			(predpioniri, pioniri, kadeti i juniori).</p>
			
			<p>Pred početak sezone 2013./2014. vijest koja je oduševila sportsku i društvenu javnost u Jajcu, a i šire,
			bila je odluka B.S.I. d.o.o. da postane generalni sponzor kluba. Sezona 2013/2014 donijela je prvi veliki rezultat, 
			osvojeno je prvo mjesto u Drugoj ligi Zapad i klub je ostvario plasman u Prvu ligu FBiH. 
			Ovaj rezultat dodatno su uljepšali juniori koji su osvojili Kup NS SBK/KSB i tek u samoj završnici Kupa BiH ispali i to u dvomeču sa Sarajevom.</p>
			
			<p>Klub je po okončanju sezone i zvanično preimenovan u Metalleghe BSI. 
			Debitantsku sezonu 2014/2015 seniori su okončali na šestom mjestu a u Kupu BiH seniori su se plasirali u osminu finala.</p></b>
			<?php
			break;
		}
		
		case 12:
		{	?>
			<b><p> Fudbalski klub Krupa je profesionalni nogometni klub iz Krupe na Vrbasu, Bosna i Hercegovina. </p>
			<p>Od sezone 2016-17. se takmiči u Premijer ligi Bosne i Hercegovine.</p> 
			<p>Klub je osnovan 1983. godine.</p> 
			<p>2014. godine ostvaruje plasman u Drugu ligu Republike Srpske - grupa Zapad. Najveći uspjeh kluba je osvajanje Prve lige Republike Srpske. 
			Također je osvajao kup grada Banjaluke i područni kupa RS-a. </p></b>
			<?php
			break;
		}
	}
}
?>

</section>

</body>
</html>