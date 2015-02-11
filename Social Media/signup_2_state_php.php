<?php
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (!isset($_SESSION['cou_id'])) {
header('Location: index.php');
}
?>


<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="normalized_database";


if(isset($_POST['next']))
{
$stateName = mysql_real_escape_string($_POST['stateName']);	

$connect = mysql_connect($db_host,$db_user,$db_pass) or die("Could not Connect");
mysql_select_db("normalized_database",$connect) or die("Database not found");;

$state_id=mysql_query("SELECT state_id FROM state WHERE stateName='$stateName'");

$row = mysql_fetch_array ($state_id);
  
$_SESSION['s_id']=$row['state_id'] ;
header('Location: signup_3.php');

}


?>
