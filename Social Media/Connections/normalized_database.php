<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_normalized_database = "localhost";
$database_normalized_database = "normalized_database";
$username_normalized_database = "root";
$password_normalized_database = "";
$normalized_database = mysql_pconnect($hostname_normalized_database, $username_normalized_database, $password_normalized_database) or trigger_error(mysql_error(),E_USER_ERROR); 
?>