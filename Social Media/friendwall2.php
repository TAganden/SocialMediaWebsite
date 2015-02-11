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

$query_Recordset1 = "SELECT userName,firstName,lastName,stateName,countryName,addressName,about FROM users,state,country,address WHERE userName='$colname_Recordset1'";
$Recordset1 = mysql_query($query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

$query_Recordset2=mysql_query("SELECT firstName,lastName FROM users WHERE userName='".$_SESSION['userName']."'");
$row_Recordset2=mysql_fetch_assoc($query_Recordset2);


$abc=mysql_query("SELECT * FROM sharepost WHERE userName='$colname_Recordset1'");
$xyz=mysql_fetch_assoc($abc);
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
         <li><a href="photos.php"><img src="folder-blue-pictures-icon.png" alt="image" height="40px" width="40px"></a></li>
         <li><a href="friendlist_of_friend.php?userName=<?php echo $colname_Recordset1 ; ?>"><img src="people-icon.png" height="40px" width="40px"></a></li>
         <li class="lout"><a href="logout_php.php"><img src="logout.png" alt="image" height="30px" width="30px"></a></li>
        </ul>
     </div>

     <div id="content">
       
       <div id="search_description">
           <h2><?php echo $row_Recordset1['userName']; ?></h2>        
           <p>First Name:<?php echo $row_Recordset1['firstName']; ?></p>
           <p>Last Name:<?php echo $row_Recordset1['lastName']; ?></p>  
           <p>Address:<?php echo $row_Recordset1['addressName']; ?></p>  
           <p>Country:<?php echo $row_Recordset1['countryName']; ?></p> 
           <p>State:<?php echo $row_Recordset1['stateName']; ?></p>  
           <p>About:<?php echo $row_Recordset1['about']; ?></p>  
        </div>
         <p>----------------------------------</p>
         <center><h2>POSTS</h2></center>
        <?php do { ?>
          <h5><?php echo $xyz['content'] ; ?></h5>
        <?php }while($xyz=mysql_fetch_assoc($abc)); ?>

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
