<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="normalized_database";


if(isset($_POST['next']))
{
$firstName = mysql_real_escape_string($_POST['firstName']);	
$lastName = mysql_real_escape_string($_POST['lastName']);
$email = mysql_real_escape_string($_POST['email']);	
$userName = mysql_real_escape_string($_POST['userName']);	
$password = mysql_real_escape_string($_POST['password']);	
$rpassword = mysql_real_escape_string($_POST['rpassword']);	
$about = mysql_real_escape_string($_POST['about']);

if($firstName && $lastName && $email && $userName && $password && $rpassword)
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
	
	$query1=mysql_query("INSERT INTO users(firstName,lastName,email,userName,password,about) VALUES  
        ('$firstName','$lastName','$email','$userName','$password','$about')");       
        header("location:next_country.php");
   }
   else
   {
	echo "Passwords must match";   
   }
 }
 else{echo "UserName already exists ...!!";}	
}

else
{
	echo "All fields are required";	
	
}
	
}

?>



<!DOCTYPE html>
<html>

<head>
<title>Sign-Up</title>
<link href="css/signup-styles.css" media="screen" type="text/css" rel="stylesheet">
</head>

<body>
<div id="wrapper">
    <div id="header">
     <div id="logo">
       <span id="b">b</span>
       <span id="logspace">logspace</span>
     </div>
     </div>
     
     <div id="signup-form">
       <form method="post" name="form1" action="">
         <table align="center">
           <tr valign="baseline">
             <td nowrap align="right">FirstName:</td>
             <td><input type="text" name="firstName" value="" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">LastName:</td>
             <td><input type="text" name="lastName" value="" size="32"></td>
           </tr>           
           <tr valign="baseline">
             <td nowrap align="right">Email:</td>
             <td><input type="text" name="email" value="" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">UserName:</td>
             <td><input type="text" name="userName" value="" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">About:</td>
             <td><input type="text" name="about" value="" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">password:</td>
             <td><input type="text" name="password" value="" size="32"></td>
           </tr>
	   <tr valign="baseline">
             <td nowrap align="right">Rpassword:</td>
             <td><input type="text" name="rpassword" value="" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">&nbsp;</td>
             <td><input type="submit" name="next" value="Next"></td>
           </tr>
         </table>
       </form>
     </div>
   </div>		
</body>
</html> 
