
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


 <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript">
	$(function(){
		$("#sonuc").hide();
		$("input[name=ara]").keyup(function(){
			var value = $(this).val();
			var konu = "value="+value;
			$.ajax({
				type:"POST",
				url:"ajax.php",
				data: konu,
				success: function(sonuc){
					$("#sonuc").show().html(sonuc);
				}

			})
		})

	}



	)
</script>






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
			<div >
			<div id="ara"> <input type="text" name="ara"></div>
			 	<div id="sonuc"><span>Sonuc</span></div>

			 	
			 
			 	</div><br>

			

	<br>
			<div class="content">
			<div class="col-2">
				<br>
					<div style="padding-left:155px;color:black"><p>RANDEVU AL</p></div>
			<br>
						<form action="ililce.php" method="POST">
				
                <div class="il">
		                <select  class="soflow"  id="il" name="il">
		                				<option  value="0">Şehir Seçiniz</option>
		                    	<?php
										$sql=mysql_query("SELECT id,il_adi FROM il ORDER BY id ASC");
										while($row=mysql_fetch_array($sql)){
								?>	
										<option value="<?=$row['id']?>"><?=$row['il_adi']?></option>
		                        <?php
										}
								?>
		                </select>
				</div>
				<br>
                <div class="ilce">
                       <select class="soflow"   name="ilce" id="ilce"> <option >İlçe Seçiniz</option></select>
				</div>
				<br>
                <div class="semt">
        			<select class="soflow"  name="semt"  id="semt"><option value="0">Hastane Seçiniz</option></select>
                </div>
                <br>
                  <div class="polikinlik">
        			<select class="soflow"  name="poli"  id="poli"><option value="0">Polikinlik Seçiniz</option></select>
                  </div><br>
                   <div class="Doktor">
        			<select class="soflow"  name="doktor"  id="doktor"><option value="0">Doktor Seçiniz</option></select>
                  </div>
                  <br>
                <br><br>
                <div>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btnLogin" name="btnTemizle" type="submit" value="Temizle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btnLogin" name="btnListe" type="submit" value="Listele">
				</div>
					
				
			</form>




			</div>




				<div class="col-2">
					
					<form action="randevuKayit.php" method="GET">
				 <div class="doktorSaat">

				 <?php
				 	@$il=$_GET['il'];
				 	@$lce=$_GET['ilce'];
				 	@$hastane=$_GET['hastane'];
				 	@$polikinlik=$_GET['poli'];
				 	@$doktor=$_GET['deger'];

				 		$sql=mysql_query("SELECT * from  saatler where doktorID='".$doktor."'");

										while($row=mysql_fetch_array($sql))
										{
										echo '<input type="radio" name="aa" value="'.$row['saatAdi'].'" >';	
											
											 echo $row['saatAdi'];   
										}


				 	?>
				 







					
				
                  </div>
                  <div class="doktorBilgi">
                  		<br><br><br><br><br>
                  		<div class="bilgi">

                  					<?php 

                  					if (empty($il)) 
                  					{
                  						
                  						}
											 else
											 {
		
                  					
                  			$sql=mysql_query("select DISTINCT doktorAdi from doktor inner join saatler on doktor.id=saatler.doktorID where doktor.id=".$doktor);
                  							$row=mysql_fetch_array($sql);
											 echo $row['doktorAdi'];  

                  					   ?>
                  				
                  		</div>

                  			<div class="bilgi">
                  				<?php 
                  					$sql1=mysql_query("select DISTINCT polikinlik.polikinlikAdi from doktor inner join polikinlik on doktor.polikinlikID=polikinlik.id  where doktor.id=".$doktor);
                  						 $row1=mysql_fetch_array($sql1);
											 echo $row1['polikinlikAdi']; 
                  				?>
									
                  			</div >
                  			<div class="bilgi">
                  				<?php 

                  						$sql3=mysql_query("select DISTINCT hastane.hastaneAdi from doktor inner join polikinlik on doktor.polikinlikID=polikinlik.id inner join hastane on polikinlik.hastaneID=hastane.id where doktor.id=".$doktor);
                  						 $row2=mysql_fetch_array($sql3);
											 echo $row2['hastaneAdi']; 


											 $_SESSION["doktorAdi"]=$row['doktorAdi'];
											 $_SESSION["poliAdi"]=$row1['polikinlikAdi'];
											 $_SESSION["hastaneAdi"]=$row2['hastaneAdi'];

												echo '<input type="hidden"  name="dAdi"  value="'.$row['doktorAdi'].' ">';
											 	echo '<input type="hidden" name="pAdi" value="'.$row1['polikinlikAdi'].' ">';
											 	echo '<input type="hidden" name="hAdi" value="'.$row2['hastaneAdi'].' ">';

											 }

											 	


                  				?>

                  			</div>
                  			<br><br><br><br><br><br><br><br><br>

                  			

                  </div>


                <div id="test" style="padding-left:105px">
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                		<?php 
                			 @$hata=$_GET['hata']; 
                				 if ($hata=="1") 
							 {
			 					echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Randevu Oluşturuldu.<br><br>";
			 					}

                		?>	

     													<input class="btnLogin" name="btnTemizle" type="submit" value="Randevu Al">
    	        </div>
                 


				</div>

			</div>

				</form>

			</div>

			<div class="bosluk">&nbsp;</div>
			<br><br>


</div>	
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			<div class="foother">HATİCE TAŞ - EMRE ŞİMŞEK - OGÜN KARAMAHMUT - ALPER DEMİRBAŞ - ZEHRA ÇİNKILIÇ</div>
<script src="selectchained.js" type="text/javascript"></script>
<script>
	$("#ilce").remoteChained("#il", "ililce.php");
	$("#semt").remoteChained("#ilce", "ililce.php");
	$("#poli").remoteChained("#semt", "ililce.php");
	$("#doktor").remoteChained("#poli", "ililce.php");

</script>

	</body>
	</html>

					