<?php

	

	if (empty($_GET['aa']))
	{
		
	}
	else
	{

		$doktorAdi=$_GET['dAdi'];
		$pAdi=$_GET['pAdi'];
		$hAdi=$_GET['hAdi'];
				$deger=$_GET['aa'];
				
				include("conn.php");
			$tckn=$_SESSION ["tckn"];
	
		$sql = "insert into randevu (tckn,saat,dAdi,hAdi,pAdi) values ('$tckn','$deger','$doktorAdi','$hAdi','$pAdi')";
		$kayit = mysql_query($sql);
		
		   	header ("Location:rGecmis.php"); 
	
		

	}
?>