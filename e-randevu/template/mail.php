<?php

$adi=$_POST['txtTckn'];

include 'conn.php';


include 'PHPMailerAutoload.php'; 



			
			$sql = "select * from user where user_TC='".$adi."'";
			$kontrol = mysql_query($sql);
			$kayitsayisi = mysql_num_rows($kontrol);
			if ($kayitsayisi == "0")
			 {

				 header ("Location: index.php?hata=1");
			 }
			 else
			 {
			 	$sql=mysql_query("select * from user  where user_TC='".$adi."'");
                  $row=mysql_fetch_array($sql);
											 $email= $row['user_Mail']; 
											 $sifre= $row['user_Password'];

						$mail = new PHPMailer(); 
						$mail->IsSMTP(); 
						$mail->SMTPAuth = true; 
						$mail->Host = 'smtp.gmail.com'; 
						$mail->Port = 587; 
						$mail->SMTPSecure = 'tls'; 
						$mail->Username = 'ogunkaramahmut1@gmail.com'; 
						$mail->Password = 'yagamisan1'; 
						$mail->SetFrom($mail->Username, 'E-Randevu'); 
						$mail->AddAddress($email); 
						$mail->CharSet = 'UTF-8'; 
						$mail->Subject = 'E-Randevu Şifre Servisi'; 
						$content = 'E-Randevu sistemine kayıtlı '.$adi.' kullancısının şifresi:'.$sifre; 
						$mail->MsgHTML($content); 
						if($mail->Send()) 
						{ 
						   	header ("Location: sifreSifirla.php?hata=1"); 
						} 
						else
						 { 
						   
						    echo $mail->ErrorInfo; 
						} 
			 }
										
											 


							

?>