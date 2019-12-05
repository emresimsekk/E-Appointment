<?php
 $rID=$_GET['rID'];

include("conn.php");
 if (empty($rID))
 {
 	
 }
 else
 {
   $sql=mysql_query("DELETE FROM randevu WHERE  randevu_id=".$rID);


  		header ("Location: rGecmis.php");
  

 }

?>