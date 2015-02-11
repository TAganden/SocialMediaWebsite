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

$qry=mysql_query("SELECT * FROM users WHERE userName='".$_SESSION['userName']."'");
$result=mysql_fetch_assoc($qry);

if(isset($_POST['submit']))
  {
    $content = mysql_real_escape_string($_POST['content']);
    $qry2=mysql_query("INSERT INTO sharepost(userName,content) VALUES('".$_SESSION['userName']."','$content')");
    
  }

$abc=mysql_query("SELECT * FROM sharepost WHERE (userName IN (SELECT friend_userName FROM friends  WHERE userName='".$_SESSION['userName']."') OR userName='".$_SESSION['userName']."') ");
$xyz=mysql_fetch_assoc($abc);

if(isset($_POST['upload']))
{
$name=$_FILES['file']['name'];
$size=$_FILES['file']['size'];
$type=$_FILES['file']['type'];
$tmp_name=$_FILES['file']['tmp_name'];

$title=mysql_real_escape_string($_POST['title']);
$description=mysql_real_escape_string($_POST['description']);


if(isset($name)){
if(!empty($name)) {
$location='uploaded/';
if(move_uploaded_file($tmp_name,$location.$name));{$sql1= "INSERT INTO images(userName,title,description,imageName) VALUES('".$_SESSION['userName']."','$title','$description','$name')";}


if(!mysql_query($sql1)){
  die("error");
}
}
else
echo 'please select a file';
}
}
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
         <li><a href="inbox.php"><img src="message-already-read-icon.png" alt="image" height="40px" width="40px"></a></li>
         <li><a href="wall.php"><img src="Blue-Wall-icon.png" alt="image" height="40px" width="40px"></a></li>
         <li><a href="friendlist.php"><img src="people-icon.png" alt="image" height="40px" width="40px"></a></li>
         <li><a href="logout_php.php"><img src="logout.png" alt="image" height="30px" width="30px"></a></li>
        </ul>
     </div>
 
     <div id="content">
         <form action ="photos.php" method="POST" enctype="multipart/form-data">
<input type="file" name="file"><br>


<p>Title:</p>
            <input type="text" name="title"/>
            <br><br>
            <input type="hidden" name="size" value="350000">
            <p>Description:</p>
	     <textarea rows="5" cols="35" name="description">
	     </textarea>
             <input type="submit" name="upload" value="UPLOAD"> <br>
</form>

        </div>
         <?php
          $folder = 'uploaded/';
$filetype = '*.*';
$files = glob($folder.$filetype);
echo '<table>';
for ($i=0; $i<count($files); $i++) {
    echo '<tr><td>';
    //$sql2="SELECT name FROM images "
    echo '<img src="'.$files[$i].'" height="300" width="300" />';
    echo '<tr></td>';
    echo '<tr><td>';
    echo '</td></tr>';
}
echo '</table>';

           ?>

        <div class="col-lg-4">
    
     </div>

     <div id="fotter">
         <p>fotter</p>     
     </div>
</div>
</body>
</html>    
       
       
              
       











---------------------------------------------------------------           

