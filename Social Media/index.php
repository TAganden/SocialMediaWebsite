<?php
// Inialize session
session_start();

// Check, if user is already login, then jump to secured page
if (isset($_SESSION['userName'])) {
header('Location: first_page.php');
}
?>




<!DOCTYPE html>
<html>

<head>
<title>Blogspace-Home</title>
<link href="css/styles.css" media="screen" type="text/css" rel="stylesheet">
</head>

<body>
<div id="wrapper">
     <a href="index.php"><div id="w-logo">
     <div id="logo">
       <span id="b">b</span>
       <span id="logspace">logspace</span>
     </div>
     </div></a>
 
     <div id="w-wnote">
     <div id="wnote">
       <p>HELLO !</p>
       <p>gET   CONNECTED   TO   THE</p>
       <p>WHOLE    new   world   of   blogging</p>
       <p>and   follow   or   get   followed   by </p>  
       <p>the   legends   in   making</p>
     </div>
     </div>
 
   <div id="signin-signup">
    <section class="login">
	<div class="titulo">Login/Signup</div>
	<form action="login_verification_php.php" method="post">
    	<input type="text" required name="userName" placeholder="User Name" data-icon="U">
        <input type="password" required name="password" placeholder="Password" data-icon="x">
        <div class="olvido">
        	<div class="col"><a href="signup_1_country.php" title="Ver Carásteres">Register</a></div>
        </div>
        
          <div class="text_button"> <input type="submit" name="submit" value="submit"></div>
        
          
</form>
</section>
</div>

    
</div>
</body>

</html>




