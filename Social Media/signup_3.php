<?php
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (!isset($_SESSION['s_id'])) {
header('Location: index.php');
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
       <form method="post" name="form1" action="signup_3_php.php">
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
             <td nowrap align="right">address:</td>
             <td><input type="text" name="addressName" value="" size="32"></td>
           </tr>
		<tr valign="baseline">
             <td nowrap align="right">password:</td>
             <td><input type="password" name="password" value="" size="32"></td>
           </tr>
	   <tr valign="baseline">
             <td nowrap align="right">Rpassword:</td>
             <td><input type="password" name="rpassword" value="" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">&nbsp;</td>
             <td><input type="submit" name="submit" value="submit"></td>
           </tr>
         </table>
       </form>
     </div>
   </div>		
</body>
</html> 
