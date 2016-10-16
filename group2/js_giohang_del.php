<?php
session_start();
include'sql.php';
if(isset($_GET['p_id']))
mysql_query('delete from mua where c_id="'.$_SESSION['c_id'].'"&&p_id="'.$_GET['p_id'].'"');
?>