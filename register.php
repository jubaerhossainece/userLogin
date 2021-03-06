<?php 
    ob_start();
    include('includes/header.php');
    Session::checkRegistration();
?>
<?php $user = new User();
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
    $userRegi = $user->userRegistration($_POST);
} ?>

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
<div class="panel panel-default">
     <div class="panel-heading">
                   <h2>User Registration</h2>
     </div>
     
    <div class="panel-body">
       <div style="max-width:600px; margin:0 auto">
       
       <?php
           if(isset($userRegi)){
               echo $userRegi;
           }
           ?>
       
        <form action="" method="POST">
          <div class="form-group">
              <label for = "name">Your Name</label>
              <input type="text" id="name" name="name" class="form-control"/>
          </div>
          
          <div class="form-group">
              <label for = "username">User Name</label>
              <input type="text" id="username" name="username" class="form-control"/>
          </div>
           <div class="form-group">
               <label for="email">Email Address</label>
                <input id="email" type="text" name="email" class="form-control"/>
           </div>
           
           <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" class="form-control"/>
            </div>
            <button type="submit" name="register" class="btn btn-success">Sign Up</button>
        </form>      
      </div>               
     </div>      
</div>
<?php
include('includes/footer.php');
ob_end_flush();
?>
