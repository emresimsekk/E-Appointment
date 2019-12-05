<?php 
require_once "conn.php";
$value = $_POST["value"];
if (!$value) {
	echo"hiçbir şey aramadın";
	
}
else
{
	$ara =mysql_query("SELECT * from doktor WHERE doktorAdi LIKE '$value%' ");

	$s=mysql_num_rows($ara);

	if($s>0){

		while  ($islem = mysql_fetch_array($ara)) {
			echo $islem['doktorAdi'] .'<br>';

		}
	}
	else{
		echo "doktor yok";
	}
}

?>
 