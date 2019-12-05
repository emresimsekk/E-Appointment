<?php

		$Register=$_POST['btnRegister'];
		$Login=$_POST['btnGiris'];
		


		if ($Register=="Üye Ol")
		{
			header ("Location: kayit.php");
		}
		else if ($Login=="Giriş Yap")
		{
		
			
		

			$kullaniciadi = $_POST['txtTckn'];
			$sifre = $_POST['txtSifre'];


			include("conn.php");
			$sql = "select * from user where user_TC='$kullaniciadi' and user_Password='$sifre' and onay='1' ";
			$kontrol = mysql_query($sql);
			$kayitsayisi = mysql_num_rows($kontrol);
			if ($kayitsayisi == "0")
			 {

				 header ("Location: index.php?hata=1");
			 }
 			else 
 			{
 				session_start();
				$kontrol_ok = mysql_fetch_array($kontrol);
				$_SESSION["tckn"] =$kullaniciadi;
				
				setcookie ("kullanici", "$kontrol_ok[txtTckn]");
				header ("Location: search.php");
			}
		}
		


		

	
		
	
?>







