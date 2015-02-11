<?php
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['userName'])) {
header('Location: index.php');
}


$mysql_host = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "normalized_database";

$bd = mysql_connect($mysql_host, $mysql_user, $mysql_password) or die("Could not connect database");

mysql_select_db($mysql_database, $bd) or die("Could not select database");

$userName = mysql_real_escape_string($_POST['userName']);
$password = mysql_real_escape_string($_POST['password']);
if($userId == '') {
		$errmsg_arr[] = 'UserId missing';
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
			$_SESSION['userName']=$userName;
                        header('Location: first_page.php');
                         
		}
		else
		{
			header('Location: index.php');
                        echo "Login failed";
			exit();
		}
}
else
{
header('Location: index.php');	
echo "Login failed";
	}
	
 

?>
