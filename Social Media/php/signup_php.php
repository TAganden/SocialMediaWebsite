<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="dbms_project";


if(isset($_POST['submit']))
{
$firstName = mysql_real_escape_string($_POST['firstName']);	
$lastName = mysql_real_escape_string($_POST['lastName']);
$email = mysql_real_escape_string($_POST['email']);	
$address = mysql_real_escape_string($_POST['address']);	
$city = mysql_real_escape_string($_POST['city']);
$zipcode = $_POST['zipcode'];	
$userName = mysql_real_escape_string($_POST['userName']);	
$password = mysql_real_escape_string($_POST['password']);	
$rpassword = mysql_real_escape_string($_POST['rpassword']);	


if($firstName && $lastName && $email && $address && $city && $zipcode && $userName && $password && $rpassword)

{
   if($password==$rpassword)
   {
	   
	   $connect = mysql_connect($db_host,$db_user,$db_pass) or die("Could not Connect");
	   mysql_select_db("dbms_project",$connect) or die("Database not found");;
	   $query=mysql_query("INSERT INTO users(firstName,lastName,email,address,city,zipcode,userName,password,rpassword) VALUES('$firstName','$lastName','$email','$address','$city','$zipcode','$userName','$password','$rpassword')");
	echo "Successfully Registered";   
   }
   
   else
   {
	echo "Passwords must match";   
   }
	
}

else
{
	echo "All fields are required";	
	
}
	
}

?>