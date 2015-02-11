<?php
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (!isset($_SESSION['userName'])) {
header('Location: index.php');
}

$mysql_host = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "normalized_database";

$bd = mysql_connect($mysql_host, $mysql_user, $mysql_password) or die("Could not connect database");

mysql_select_db($mysql_database, $bd) or die("Could not select database");

$firstName = mysql_real_escape_string($_POST['firstName']);
$stateName = mysql_real_escape_string($_POST['stateName']);


$result=mysql_query("SELECT userName,firstName,stateName,countryName,addressName,about FROM users,state,country,address WHERE
( (firstName LIKE '%$firstName%') AND (stateName LIKE '%$stateName%') AND (location_id=address_id) AND 
(address.state_id=state.state_id) AND (state.country_id=country.country_id) AND 
(userName NOT IN (SELECT friend_userName FROM friends WHERE userName='".$_SESSION['userName']."') )    )");
$row = mysql_fetch_assoc($result);

        
?>


<!DOCTYPE html>
<html>

<head>
<title>Blogspace-Home</title>
<link href="css/first-page-styles.css" media="screen" type="text/css" rel="stylesheet">
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
         <li><a href="inbox.php"><img src="message-already-read-icon.png" alt="image" height="40px" width="40px"></a></li>
         <li><a href="wall.php"><img src="Blue-Wall-icon.png" alt="image" height="40px" width="40px"></a></li>
         <li><a href="friendlist.php"><img src="people-icon.png" alt="image" height="40px" width="40px"></a></li>
         <li><a href="logout_php.php"><img src="logout.png" alt="image" height="30px" width="30px"></a></li>
        </ul>
     </div>

     <div id="content">
      
       <?php do { ?>
       <div id="search_description">
         <h2><a href="friendwall_request.php?userName=<?php echo $row['userName']; ?>"><?php echo $row['firstName']; ?></a></h2>
         <p>About: <?php echo $row['about']; ?></p>
       </div>
      
      
        <a href="friendwall.php?userName=<?php echo $row['userName']; ?>"><img src="add-contact-icon.png" width="40px" height="40px"></a>
       
         <?php } while ($row= mysql_fetch_assoc($result)); ?>
  </div>

<div id="fotter">
         <p>fotter</p>     
     </div>
</div>
</body>
</html>