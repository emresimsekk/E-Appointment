<html>
<head>
<title>E-Randevu</title>
  <link rel="stylesheet" type="text/css" href="../template/css/login.css" />
</head>

<body>

	<div class="form">

		<form method="POST" action="login.php" class="loginForm">
		<div class="header"><p>E-RANDEVU</p></div>
		<br>
			<div class="userName"><div class="txtbox"><input name="txtTckn" class="txtBox" type="text" placeHolder="TC Kimlik Numarası"   ></div></div><br><br>
			<div class="password"><div class="txtbox"><input name="txtSifre" class="txtBox"  type="password"  placeHolder="Şifre" maxlength="16" ></div></div>
			<div class="forgot"><div class="Iforgot"><a href="sifreSifirla.php">Şifremi Unuttum</a></div></div><br><br>

					
						<div class="a"><p style="color:red;padding-left:82px;font-size:14px"> <b> <?php @$hata=$_GET['hata']; if (empty($hata)) {}else{echo "TC Kimlik Numarası veya Şifreniz Yalnış";}?></b></p> </div>
						<br><br>
		
			<div class="operation"><input class="btnLogin" name="btnGiris" type="submit" value="Giriş Yap">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btnLogin" name="btnRegister" type="submit" value="Üye Ol"></div></div>
		</form>

	</div>




</body>


</html>
