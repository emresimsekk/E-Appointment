
<html>
<?php include("conn.php"); ?>
	<head>
	<title></title>
		
		
		
		
			<style type="text/css">
		input{width: 300px; border: 1px solid #ddd; padding: 5px 15px; font: 16px Arial }
		#sonuc{width:285px; display:none; background-color:#e9e9e9;margin-left: 228px;padding-top:10px;padding-bottom:10px;padding-left:15px;}
	</style>
		<script src="jquery-1.10.2.js" type="text/javascript"></script>

			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		    <link rel="stylesheet" type="text/css" href="../template/css/search.css">
 <?php header('Content-type: text/html; charset=utf-8'); ?>


 



	</head>

<body>

<?php
if (empty($_SESSION['tckn']))
{
	header ("Location: index.php");
}
 

?>

			<br><br><br><br>
			<div style="padding-left: 230px;font-size:12px"><?php date_default_timezone_set('Europe/Istanbul'); 	  echo date('d.m.Y H:i:s', 1375057836);;?> </div>
			<div>

			<div class="bosluk">&nbsp;</div>

			<div id="menu"><ul><li><a href="search.php">Anasayfa</a></li><li><a href="rGecmis.php">Randevu Geçmişim</a></li><li>&nbsp;</li><li>&nbsp;</li><li></li></ul></div>
			<br><br><br>
			

			

	<br>
			<div class="content">
			<div class="col-2">
				<br>
					<div style="padding-left:155px;color:black"><p>RANDEVU GUNCELLE</p></div>
			<br>

				<form method="POST" action="">
			<?php
				 	if (empty($_GET['rID']))
				 	{
				 		
				 	}
				 	else
				 	{
				 		$randevu_id=$_GET['rID'];

				 		$sql=mysql_query("select * from randevu where randevu_id=".$randevu_id);

										while($row=mysql_fetch_array($sql))
										{
											$saat=$row['saat'];
									

											$saatSorgu=mysql_query("select * from saatler where saatAdi='".$saat."'");

											while($rowSaat=mysql_fetch_array($saatSorgu))
											{
												
												$saatDoktor=$rowSaat['doktorID'];
												

												$doktorSaat=mysql_query("select * from saatler where doktorID=".$saatDoktor);

											while($rowDoktorSaat=mysql_fetch_array($doktorSaat))
											{
												
												echo '<input type="radio" name="aa" value="'.$rowDoktorSaat['saatAdi'].'" >';	
											
											 echo $rowDoktorSaat['saatAdi'];   
												 
											}

												 
											}
											 
										}

				 	}

				 		


				 	?>
				 	<br><br>	
				 	
						
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;<input class="btnLogin" name="btnTemizle" type="submit" value="Randevu Güncelle">

</form>
			</div>




				<div class="col-2">
					
			
				 <div class="doktorSaat">
<br><br>	<br><br>	<br><br>	<br><br>	<br><br>	
				 
				 			 		<?php 

                  				
		
                  					
                  			$sql=mysql_query("select DISTINCT doktorAdi from doktor inner join saatler on doktor.id=saatler.doktorID where doktor.id=".$saatDoktor);
                  							$row=mysql_fetch_array($sql);
											 echo $row['doktorAdi'];  

                  					   ?>
                  	<br><br>
                  				<?php 
                  					$sql1=mysql_query("select DISTINCT polikinlik.polikinlikAdi from doktor inner join polikinlik on doktor.polikinlikID=polikinlik.id  where doktor.id=".$saatDoktor);
                  						 $row1=mysql_fetch_array($sql1);
											 echo $row1['polikinlikAdi']; 
                  				?>
									
                  			<br><br>
                  				<?php 

                  						$sql3=mysql_query("select DISTINCT hastane.hastaneAdi from doktor inner join polikinlik on doktor.polikinlikID=polikinlik.id inner join hastane on polikinlik.hastaneID=hastane.id where doktor.id=".$saatDoktor);
                  						 $row2=mysql_fetch_array($sql3);
											 echo $row2['hastaneAdi']; 


											

											 

											 	


                  				?>



								<?php
									if (empty($_POST['aa']))
									{

									}
									else
									{
										$deger=$_POST['aa'];

									$sql = "update randevu set saat='".$deger."' where randevu_id=".$randevu_id;
									$kayit = mysql_query($sql);
									header ("Location: rGecmis.php");

									}								
		

								?>



					
				
                  </div>


              
                 


				</div>

			</div>

			

			</div>

			<div class="bosluk">&nbsp;</div>
			<br><br>


</div>	
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<div class="foother">EMRE ŞİMŞEK</div>


	</body>
	</html>

					