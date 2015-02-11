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
	
	$composeto_userName=mysql_real_escape_string($_GET['userName']);
	
	$bd = mysql_connect($mysql_host, $mysql_user, $mysql_password) or die("Could not connect database");
	mysql_select_db($mysql_database, $bd) or die("Could not select database");

if(isset($_POST['submit']))
{

$content=mysql_real_escape_string($_POST['content']);

$qry=mysql_query("INSERT INTO messages(userName,friend_userName,content) VALUES ('".$_SESSION['userName']."','$composeto_userName','$content') ");
$qry2=mysql_query("INSERT INTO messages(userName,friend_userName,content) VALUES ('$composeto_userName','".$_SESSION['userName']."','$content') ");
 

	header('Location: inbox.php');
}


$qry3=mysql_query("SELECT firstName FROM users WHERE userName='".$_SESSION['userName']."' ");
$result3=mysql_fetch_assoc($qry3);

$qry4=mysql_query("SELECT firstName FROM users WHERE userName='$composeto_userName' ");
$result4=mysql_fetch_assoc($qry4);





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
          <form action="searchresult_php_php.php" method="post">
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
         <li><a href="inbox.php"><img src="message-already-read-icon.png" alt="image" height="40px" width="40px"></a></li>
         <li><a href="wall.php"><img src="Blue-Wall-icon.png" alt="image" height="40px" width="40px"></a></li>
         <li><a href="friendlist.php"><img src="people-icon.png" alt="image" height="40px" width="40px"></a></li>
         <li><a href="logout_php.php"><img src="logout.png" alt="image" height="30px" width="30px"></a></li>
        </ul>
     </div>
 
     
   <div id="content">
     <h3>To: <?php echo $result4['firstName']; ?> </h3>
       <form method="post" name="form1" action="">
         <textarea rows="10" cols="30" name="content"><?php echo $result3['firstName'] ; ?> ::
         </textarea>

                <input type="submit" name="submit">
   </div>


     <div id="fotter">
         <p>fotter</p>     
     </div>
</div>
</body>
</html>    
       
       
              
       