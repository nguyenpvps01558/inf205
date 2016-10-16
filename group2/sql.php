<?php
//$con=mysql_connect('localhost','root','');
$con=mysql_connect('localhost','kenhdaihoc.com','group2') or die('canot connect to sever');
mysql_select_db('kenhdaihoc.com',$con) or die('canot select database');
?>