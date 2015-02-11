<?php
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (!isset($_SESSION['s_id'])) {
header('Location: index.php');
}
?>

<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="normalized_database";


if(isset($_POST['submit']))
{
$firstName = mysql_real_escape_string($_POST['firstName']);	
$lastName = mysql_real_escape_string($_POST['lastName']);
$email = mysql_real_escape_string($_POST['email']);	
$userName = mysql_real_escape_string($_POST['userName']);	
$password = mysql_real_escape_string($_POST['password']);	
$rpassword = mysql_real_escape_string($_POST['rpassword']);	
$about = mysql_real_escape_string($_POST['about']);
$addressName = mysql_real_escape_string($_POST['addressName']);

if($firstName && $lastName && $email && $userName && $password && $rpassword && $addressName )
{	
  $connect = mysql_connect($db_host,$db_user,$db_pass) or die("Could not Connect");
  mysql_select_db("normalized_database",$connect) or die("Database not found");;

  $sql="SELECT * FROM users WHERE userName='$userName' ";
  $result=mysql_query($sql);
  $count=mysql_num_rows($result); 

if($count<1){
  
  if(($password==$rpassword))
   {
        $connect = mysql_connect($db_host,$db_user,$db_pass) or die("Could not Connect");
	mysql_select_db("normalized_database",$connect) or die("Database not found");;	   	  
	
	$result=mysql_query("INSERT INTO address(state_id,addressName) VALUES ('".$_SESSION['s_id']."','$addressName')");

        $address_id=mysql_query("SELECT address_id FROM address WHERE state_id='".$_SESSION['s_id']."' AND addressName='$addressName'");
        $row=mysql_fetch_assoc($address_id);
	
        $qry=mysql_query("INSERT INTO users (userName,firstName,lastName,email,password,about,location_id) VALUES  
        ('$userName','$firstName','$lastName','$email','$password','$about','".$row['address_id']."')")   or die("cannot enter"); 	  
       
           $_SESSION['userName']=$userName;
           header("location:first_page.php");
   

}else{echo "Passwords must match"; }

}else{echo "UserName already exists ...!!";}	


}else
{echo "All fields are required";	}
	


}

?>
