<?php
// Inialize session
session_start();

// Check, if userid session is NOT set then this page will jump to login page
if (!isset($_SESSION['userName'])) {
header('Location: index.php');
}

$mysql_host = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "normalized_database";

$bd = mysql_connect($mysql_host, $mysql_user, $mysql_password) or die("Could not connect database");

mysql_select_db($mysql_database, $bd) or die("Could not select database");

$colname_Recordset1 = mysql_real_escape_string($_GET['userName']);

$query_Recordset1 = "SELECT userName,firstName,stateName,countryName,addressName,about FROM users,state,country,address WHERE userName='$colname_Recordset1'";
$Recordset1 = mysql_query($query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
?>

<!DOCTYPE html>
<html>

<head>
<title>Blogspace-Home</title>
<link href="css/friendwall_request-styles.css" media="screen" type="text/css" rel="stylesheet">
</head>

<body>
<div id="wrapper">   
     <div id="header">
        <a href="index.php"><div id="logo">
         <span id="b">b</span>
         <span id="logspace">logspace</span>
        </div></a>
                
        <div id="search">
          <form action="searchresult_php_html.php" method="post">
            <input class="round" type="text" name="firstName" placeholder="First Name">   
            <input class="round" type="text" name="stateName" placeholder="State">
            <input type="submit" name="submit">
          </form>
        </div>   
     </div>
           
     <div id="navigation">
        <ul>
         <li class="n"><?php echo $row_Recordset1['firstName'] ;?></li>
         <li><a href="friendwall.php?userName=<?php echo $row_Recordset1['userName']; ?>"><img src="add-contact-icon.png" width="40px" height="40px"></a></li>
         <li class="lout"><a href="logout_php.php"><img src="logout.png" alt="image" height="30px" width="30px"></a></li>
        </ul>
     </div>

     <div id="content">
       
       <div id="search_description">
           <h2><?php echo $row_Recordset1['firstName']; ?></h2>        
           <p>About:<?php echo $row_Recordset1['about']; ?></p>     		
        </div>
         
     </div>

<div id="fotter">
         <p>fotter</p>     
     </div>
</div>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
