<?php

// Inialize session
session_start();

// Check, if userid session is NOT set then this page will jump to login page
if (!isset($_SESSION['userName'])) {
header('Location: index.php');
}
?>

<?php 
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "normalized_database";

$bd = mysql_connect($mysql_host, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");

$colname_Recordset1 = mysql_real_escape_string($_GET['userName']);

$qry=mysql_query("SELECT firstName,userName,about FROM users WHERE userName IN (SELECT friend_userName FROM friends  WHERE userName='$colname_Recordset1') ");
$result=mysql_fetch_assoc($qry);


?>

<!DOCTYPE html>
<html>

<head>
<title>Blogspace-Home</title>
<link href="css/first-page-styles.css" media="screen" type="text/css" rel="stylesheet">
</head>

<body>
   
     <div id="header">
        <a href="index.php"><div id="logo">
         <span id="b">b</span>
         <span id="logspace">logspace</span>
        </div></a>
                
        <div id="search">
          <form action="searchresult_php_html.php" method="post">
            <input class="round" type="text" name="firstName" placeholder="First Name">   
            <input class="round" type="text" name="stateName" placeholder="State">
            <input type="submit" name="submit" value="Search">
          </form>
        </div>   
     </div>

<div id="wrapper">           
     <div id="navigation">
        <ul>
         <li><a href="photos.php"><img src="folder-blue-pictures-icon.png" alt="image" height="40px" width="40px"></a></li>
         <li><a href="friendlist.php"><img src="people-icon.png" alt="image" height="40px" width="40px"></a></li>
         <li><a href="logout_php.php"><img src="logout.png" alt="image" height="30px" width="30px"></a></li>
        </ul>
     </div>
 
     
   <div id="content">
      
       <?php do { ?>
       <div id="search_description">
         <h2><a href="friendwall2.php?userName=<?php echo $result['userName'] ?>"><?php echo $result['firstName']; ?></a></h2>
         <h4><?php echo $result['about']; ?></h4>
         <p>----------------------------------</p>
       </div>
         <?php } while ($result= mysql_fetch_assoc($qry)); ?>
  </div>


     <div id="fotter">
         <p>fotter</p>     
     </div>
</div>
</body>
</html>    
       
       
              
       