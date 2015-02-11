<?php
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (!isset($_SESSION['cou_id'])) {
header('Location: index.php');
}
?>


<!DOCTYPE HTML>
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
	  <form method="post" name="form1" action="signup_2_state_php.php">
	
	<tr valign="baseline">
			<td nowrap align="right">State:</td>
		    
		<?php
	
		$db_host="localhost";
		$db_user="root";
		$db_pass="";
		$db_name="normalized_database";
	
	
		$connect = mysql_connect($db_host,$db_user,$db_pass) or  die("Could not Connect");
	        mysql_select_db("normalized_database",$connect) or die("Database not found");
		
		$r=mysql_query("SELECT stateName FROM state WHERE country_id='".$_SESSION['cou_id']."'");
	
		
	echo "<td><select name='stateName'>";
		while ($row=mysql_fetch_array($r) )
		 {
	   		
	echo "<option value=".htmlspecialchars($row["stateName"])." >".htmlspecialchars($row["stateName"])."</option>";
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