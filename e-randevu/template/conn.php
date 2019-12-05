<?php
@session_start();
@$baglan=mysql_connect("localhost","root","");
if(!$baglan){
die('Bağlantı Hatası:' . mysql_error());
}
$vt_sec=mysql_select_db("e-randevu",$baglan);
if(!$vt_sec){
die("Veritabanı Hatası:".mysql_error());
} 
@mysql_query("SET NAMES 'utf8'");
@mysql_query("SET CHARACTER SET 'utf8'");
@mysql_query("SET character_set_connection = 'utf8_turkish_ci'");
?>