<?php
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "dbms_project";

$bd = mysql_connect($mysql_host, $mysql_user, $mysql_password) or die("Could not connect database");

mysql_select_db($mysql_database, $bd) or die("Could not select database");

$userName = mysql_real_escape_string($_POST['userName']);
$password = mysql_real_escape_string($_POST['password']);
if($userName == '') {
		$errmsg_arr[] = 'Username missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}

$qry="SELECT * FROM users WHERE userName='$userName' AND password='$password'";
	$result=mysql_query($qry);	
	
if($result) {
		if(mysql_num_rows($result) > 0) {
			echo "Login Successful";
		exit();}
		else
		{
			echo "Login failed";
			exit();
		}
}
else
{
	echo "Login failed";
	}
	
 

?>
