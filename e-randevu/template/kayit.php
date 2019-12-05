<html>
<head>
<title>E-Randevu</title>
  <link rel="stylesheet" type="text/css" href="../template/css/register.css" />
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>

<body>

	<div class="form">

		<form method="POST" action="register.php" class="loginForm">
		<div class="header"><p>E-RANDEVU KAYIT </p></div>
		<br>
			<div class="userName"><div class="txtbox"><input name="txtTckn" class="txtBox" type="text" placeHolder="TC Kimlik Numarası" value="<?php  echo @$_GET['tckn'] ?>" ></div></div><br><br>
			<div class="userName"><div class="txtbox"><input name="txtAd" class="txtBox" type="text" placeHolder="Ad" value="<?php  echo @$_GET['ad'] ?>"   ></div></div><br><br>
			<div class="userName"><div class="txtbox"><input name="txtSoyad" class="txtBox" type="text" placeHolder="Soyad" value="<?php  echo @$_GET['soyad'] ?>"  ></div></div><br><br>
			<div class="userName"><div class="txtbox"><input name="txtTel" class="txtBox" type="text" placeHolder="Telefon Numarası"  value="<?php  echo @$_GET['tel'] ?>" ></div></div><br><br>
			<div class="userName"><div class="txtbox"><input name="txtMail" class="txtBox" type="text" placeHolder="Mail Adresi" value="<?php  echo @$_GET['mail'] ?>"  ></div></div><br><br>
			<div class="password"><div class="txtbox"><input name="txtSifre" class="txtBox"  type="password"  placeHolder="Şifre" maxlength="16"  ></div></div>
			<div class="a"><p style="color:red;padding-left:82px;font-size:14px"> <b> 
			<?php
			 @$hata=$_GET['hata']; 
			 if ($hata=="1") 
			 {
			 	echo "TC Kimlik Numarası 11 Haneden Oluşmaktadır";
			 }
			 else if ($hata=="2") 
			 {
			 	echo " Ad 3 Haneden Az Değer Girilemez.";
			 }
			  else if ($hata=="3") 
			 {
			 	echo "Soyad 2 Haneden Az Değer Girilemez.";
			 }
			  else if ($hata=="4") 
			 {
			 	echo "Telefon Numarası 11 Haneden Oluşmaktadır";
			 }
			  else if ($hata=="5") 
			 {
			 	echo "Mail Adresinizi Doğru Yazınız";
			 }
			  else if ($hata=="6") 
			 {
			 	echo "Şifreniz 6-12 Olmalı";
			 }
			 else if ($hata=="7") 
			 {
			 	echo "Kayıt Başarısız emresimsek801@gmail.com adresinden iletişime geçin";
			 }
			 else if ($hata=="8") 
			 {
			 	echo "Başarılı Üye. Onay Mailine Gidin.";
			 }
			 else if ($hata=="9") 
			 {
			 	echo "Aynı Kayıttan Bulunuyor.";
			 }
			  else if ($hata=="10") 
			 {
			 	echo "Aynı Mail Bulunuyor.";
			 }


			 

			?></b></p> </div>
			

					<br><br>
						
			<div class="operation"><input class="btnLogin" name="btnGiris" type="submit" value="Giriş Yap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btnLogin" name="btnRegister" type="submit" value="Üye Ol"></div></div>
		</form>

	</div>




</body>


</html>