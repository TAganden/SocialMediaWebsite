<?php
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['cou_id'])) {
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
  <form method="post" name="form1" action="signup_1_country_php.php">

<tr valign="baseline">
		<td nowrap align="right">Country:</td>
	    
	<?php

	$db_host="localhost";
	$db_user="root";
	$db_pass="";
	$db_name="normalized_database";


	$connect = mysql_connect($db_host,$db_user,$db_pass) or  die("Could not Connect");
  mysql_select_db("normalized_database",$connect) or die("Database not found");


	$query= "SELECT countryName FROM country";
	$result = mysql_query($query);
	
echo "<td><select name='countryName'>";
	while ($row=mysql_fetch_array($result) )
	 {
   	  echo "<option value=".htmlspecialchars($row["countryName"])." >".htmlspecialchars($row["countryName"])."</option>";
	 }
		echo "</select></td>";
	?>
           </tr>
     
      
<tr valign="baseline">
             <td nowrap align="right">&nbsp;</td>
             <td><input type="submit" name="next" value="Next"></td>
           </tr>


  </form>
 </div>
 </div>		
</body>
</html> 
