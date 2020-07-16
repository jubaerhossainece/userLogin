<?php 
        $filepath = realpath(dirname(__FILE__));
        include_once $filepath.'/../library/Session.php';
        Session::init();
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Login Register System PHP</title>
        <link rel = "stylesheet" href="includes/bootstrap.min.css"/>
        <link rel = "stylesheet" href="css/app.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="includes/jquery.min.js"></script>
        <srcipt src = "includes/bootstrap.min.js"></srcipt>
      </head>
      
      <?php
    if(isset($_GET['action']) && $_GET['action']="logout"){
        Session::destroy();
    }
    
    ?>
    
    <body>
        <div class="container">
           <nav class="navbar navbar-default">
               <div class="container-fluid">
                   <div class="navbar-header">
                       <a class="navbar-brand" href="index.php">Login Register System Using OOP and PDO class</a>
                   </div>
                   <ul class="nav navbar-nav pull-right">
                      
                      <?php 
                       $id = Session::get("id");
                       $userlogin = Session::get("login");
                       if($userlogin == true){
                       ?>
                       <li><a href="index.php">Home</a></li>
                       <li><a href = "profile.php?id=<?php echo $id; ?>">Profile</a></li>
                       <li><a href="?action=logout">Logout</a></li>
                       <?php }else{ ?>
                       
                       <li><a href="login.php">Login</a></li>
                       <li><a href="register.php">Register</a></li>
                       <?php } ?>
                       
                   </ul>
               </div>
           </nav>