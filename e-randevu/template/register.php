<?php

		@$Register=$_POST['btnRegister'];
		@$Login=$_POST['btnGiris'];
		


		if ($Register=="Üye Ol")
		{
				

			$kullaniciadi = $_POST['txtTckn'];
			$ad= $_POST['txtAd'];
			$soyad = $_POST['txtSoyad'];
			$tel = $_POST['txtTel'];
			$Mail = $_POST['txtMail'];
			$sifre = $_POST['txtSifre'];

			if (strlen($kullaniciadi)==11) 
			{
				if (strlen($ad)>=3) 
				{
					if (strlen($soyad)>=2) 
					{
						if (strlen($tel)==11) 
						{
							if (filter_var($Mail, FILTER_VALIDATE_EMAIL))
							{
								if (strlen($tel)>=6) 
								{
										include("conn.php");
									$sql = "select * from user where user_TC='$kullaniciadi'";
									$kontrol = mysql_query($sql);
									$kayitsayisi = mysql_num_rows($kontrol);
									if ($kayitsayisi=="0")
									{
										$sql = "select * from user where user_Mail='$Mail'";
										$kontrol = mysql_query($sql);
										$kayitsayisi = mysql_num_rows($kontrol);

										if ($kayitsayisi=="0")
										{
												$dogrulama_kodu = rand(0,9999999999);
												$sql = "insert into user (user_TC,user_Name,user_Surname,user_Phone,user_Mail,user_Password,dogrulama) values ('$kullaniciadi','$ad','$soyad','$tel','$Mail','$sifre','$dogrulama_kodu')";
												@$kayit = @mysql_query($sql);
													

													include 'PHPMailerAutoload.php'; 
														$mail = new PHPMailer(); 
														$mail->IsSMTP(); 
														$mail->SMTPAuth = true; 
														$mail->Host = 'smtp.gmail.com'; 
														$mail->Port = 587; 
														$mail->SMTPSecure = 'tls'; 
														$mail->Username = 'ogunkaramahmut1@gmail.com'; 
														$mail->Password = 'yagamisan1'; 
														$mail->SetFrom($mail->Username, 'E-Randevu'); 
														$mail->AddAddress($Mail); 
														$mail->CharSet = 'UTF-8'; 
														$mail->Subject = 'E-Randevu Şifre Servisi'; 
														$content ='http://localhost/e-randevu/template/onay.php?kod='.$dogrulama_kodu.'&mail='.$Mail; 
														$mail->MsgHTML($content); 
														if($mail->Send()) 
														{ 
														   	header ("Location: sifreSifirla.php?hata=1"); 
														} 
														else
														 { 
														   
														    echo $mail->ErrorInfo; 
														} 
												

												if (empty($kayit))
												{
													header ("Location: kayit.php?hata=7");
										
												}
												else
												{
													header ("Location: kayit.php?hata=8");
												}

											

												

										}
										else
										{
											header ("Location: kayit.php?hata=10&tckn=$kullaniciadi&ad=$ad&soyad=$soyad&tel=$tel&mail=$mail");
										}
										
									}
									else
									{
										header ("Location: kayit.php?hata=9&tckn=$kullaniciadi&ad=$ad&soyad=$soyad&tel=$tel&mail=$mail");
									}

								}
								else
								{
								header ("Location: kayit.php?hata=6&tckn=$kullaniciadi&ad=$ad&soyad=$soyad&tel=$tel&mail=$mail");
								}
							}
							else
							{
							header ("Location: kayit.php?hata=5&tckn=$kullaniciadi&ad=$ad&soyad=$soyad&tel=$tel&mail=$mail");
							}

						}
						else
						{
							header ("Location: kayit.php?hata=4&tckn=$kullaniciadi&ad=$ad&soyad=$soyad&tel=$tel&mail=$mail");
						}
					}
					else
					{
					header ("Location: kayit.php?hata=3&tckn=$kullaniciadi&ad=$ad&soyad=$soyad&tel=$tel&mail=$mail");
					}

				}
				else
				{
				header ("Location: kayit.php?hata=2&tckn=$kullaniciadi&ad=$ad&soyad=$soyad&tel=$tel&mail=$mail");
				}
			}
			else
			{

				
				header ("Location: kayit.php?hata=1&tckn=$kullaniciadi&ad=$ad&soyad=$soyad&tel=$tel&mail=$mail");
			}



		

		}
		else if ($Login=="Giriş Yap")
		{
		header ("Location: index.php");
		}
?>