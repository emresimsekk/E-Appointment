<html>
<head>
<title>E-Randevu</title>
  <link rel="stylesheet" type="text/css" href="../template/css/login.css" />
</head>

<body>

	<div class="form">

		<form method="POST" action="mail.php" class="loginForm">
		<div class="header"><p>E-RANDEVU</p></div>
		<br>
			<div class="userName"><div class="txtbox"><input name="txtTckn" class="txtBox" type="text" placeHolder="TC Kimlik Numarası"   ></div></div><br><br>
			
			

					
						<div class="a"><p style="color:red;padding-left:82px;font-size:14px"> <b>
						 <?php
						 @$hata=$_GET['hata']; 
			 if ($hata=="1") 
			 {
			 	echo "Şifreniz Mail Adresinize Gönderildi";
			 }
						  	?>
						  		
						  	</b></p> </div>
						<br><br>
		
			<div class="operation">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input class="btnLogin" name="btnGiris" type="submit" value="Şifre Sıfırla"></div></div>
		</form>

	</div>




</body>


</html>
