<?php
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['cou_id'])) {
header('Location: index.php');
}

$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="normalized_database";


if(isset($_POST['next']))
{
$countryName = mysql_real_escape_string($_POST['countryName']);	

$connect = mysql_connect($db_host,$db_user,$db_pass) or die("Could not Connect");
mysql_select_db("normalized_database",$connect) or die("Database not found");;

$country_id=mysql_query("SELECT country_id FROM country WHERE countryName='$countryName'");

$row = mysql_fetch_array ($country_id) ;

$_SESSION['cou_id']=$row['country_id'];
header('Location: signup_2_state.php');
 
}

?>
