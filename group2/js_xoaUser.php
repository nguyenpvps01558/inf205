<?php
   include'sql.php';
   mysql_query('delete from mua where c_id="'.$_GET['c_id'].'"');   
   if(mysql_query('delete from custom where c_id="'.$_GET['c_id'].'"'))
   echo'ok'; 
?>