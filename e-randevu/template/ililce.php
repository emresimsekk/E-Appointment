<?php
include("conn.php");
if(isset($_GET['il'])){
	
	$il=(int)$_GET['il'];
	
	if($il>0){
		$dk=mysql_query("SELECT * FROM ilce WHERE il_id='".$il."' order by slug");
		$list='{"0":"Seçiniz",';
		while($ilr=mysql_fetch_array($dk)){
			$list.='"'.$ilr['id'].'":"'.$ilr['ilce_adi'].'",';
		}
		$list=substr($list,0,-1);
		$list.="}";
		
		echo $list;
	}
}
else if(isset($_GET['ilce']))
{
	$ilce=(int)$_GET['ilce'];
	
	if($ilce>0)
	{
		$dk=mysql_query("SELECT * FROM hastane WHERE ilceID='".$ilce."'");
		$list='{"0":"Seçiniz",';
		while($ilr=mysql_fetch_array($dk)){
			$list.='"'.$ilr['id'].'":"'.$ilr['hastaneAdi'].'",';
		}
		$list=substr($list,0,-1);
		$list.="}";
		
		echo $list;
	}
}
else if(isset($_GET['semt']))
{
	$semt=(int)$_GET['semt'];
	
	if($semt>0)
	{
		$dk=mysql_query("SELECT * FROM polikinlik WHERE hastaneID='".$semt."'");
		$list='{"0":"Seçiniz",';
		while($ilr=mysql_fetch_array($dk))
		{
			$list.='"'.$ilr['id'].'":"'.$ilr['polikinlikAdi'].'",';
		}
		$list=substr($list,0,-1);
		$list.="}";
		
		echo $list;
	}
}
else if(isset($_GET['poli']))
{
	$poli=(int)$_GET['poli'];
	
	if($poli>0)
	{
		$dk=mysql_query("SELECT * FROM doktor WHERE polikinlikID='".$poli."'");
		$list='{"0":"Seçiniz",';
		while($ilr=mysql_fetch_array($dk))
		{
			$list.='"'.$ilr['id'].'":"'.$ilr['doktorAdi'].'",';
		}
		$list=substr($list,0,-1);
		$list.="}";
		
		echo $list;
	}
}
else if(isset($_POST['btnListe']))
{
	$il=(int)$_POST['il'];
	$ilce=(int)$_POST['ilce'];
	$semt=(int)$_POST['semt'];
	$poli=(int)$_POST['poli'];
	$deger=$_POST['doktor'];

	header ("Location:search.php?deger=".$deger."&il=".$il."&ilce=".$ilce."&hastane=".$semt."&poli=".$poli);
	
}
else if(isset($_POST['btnTemizle']))
{
	

	header ("Location:search.php");
	
}

?>