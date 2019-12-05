<?php
include 'conn.php';
			$kod = $_GET['kod'];
			$mail = $_GET['mail'];
			
			$sql = "select * from user where dogrulama=".$kod." and user_Mail='".$mail."'";
			
			$kontrol = mysql_query($sql);

			$kayitsayisi = mysql_num_rows($kontrol);
			if ($kayitsayisi == "0")
			 {

				 echo "Böyle Kullanıcı Yok Bro";
			 }
			 else
			 {
			 		$sql = "UPDATE user SET onay='1' WHERE dogrulama=".$kod;
					@$kayit = @mysql_query($sql);

					if (empty($kayit))
					{
						echo "Onaylanmadı";
					}
					else
					{

						echo "Onaylandı";
					}

			 }



		

?>