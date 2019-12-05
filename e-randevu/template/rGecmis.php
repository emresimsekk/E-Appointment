<html>

<head>
	<title>Randevu Geçmişi</title>
	 <link rel="stylesheet" type="text/css" href="../template/css/search.css">
</head>
<?php include("conn.php"); ?>
<body>
<?php
	if (empty($_SESSION['tckn']))
{
	header ("Location: index.php");
}
?>
 



			<br><br><br><br>
			<div style="padding-left: 230px"><?php date_default_timezone_set('Europe/Istanbul'); 	  echo date('d.m.Y H:i:s', 1375057836);;?> </div><br>
			<div>

			<div class="bosluk">&nbsp;</div>

			<div id="menu"><ul><li><a href="search.php"> Anasayfa</a></li><li><a href="rGecmis.php">Randevu Geçmişim</a></li><li>&nbsp;</li><li>&nbsp;</li><li></li></ul></div>
			<br><br><br><br>
		<div>
			<table border=1 style="border-collapse: collapse;	" width="1055px" cellpadding="10px">
					<tr><td>TC KİMLİK NUMARASI</td><td>SAAT</td><td>DOKTOR ADI</td><td>HASTANE ADI</td><td>POLİKNLİK ADI</td><td>&nbsp;</td><td>&nbsp;</td></tr>
				
				<?php

					$tckn=$_SESSION['tckn'];
					$sql=mysql_query("select * from randevu where tckn=".$tckn);

					while($sorgu = mysql_fetch_array($sql))
					 {
						$rID=$sorgu['randevu_id']; 
						$tckn=$sorgu['tckn']; 
						$saat=$sorgu['saat']; 
						$dAdi=$sorgu['dAdi']; 
						$hAdi=$sorgu['hAdi'];
						$pAdi=$sorgu['pAdi'];

           echo '<tr><td>'; echo $tckn; echo '</td>';

        	 echo '<td>';echo $saat; echo '</td>';
        	  echo '<td>'; echo $dAdi; echo '</td>';
        	   echo '<td>'; echo $hAdi; echo '</td>';
        	   echo '<td>'; echo $pAdi; echo '</td>	';
        	   	  
        	   	   echo '<td><a href="randevuSil.php?rID='.$rID.'">Sil</a></td>'; 
				echo '<td><a href="randevuGuncelle.php?rID='.$rID.'">Güncelle</a></td>'; 
        	   	    
           

						}
					


				?>
				 
			
					
				

				</table>




		<div>


</body>

		</html>

