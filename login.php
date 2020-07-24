<?php 
      ob_start();
      include('includes/header.php');
      Session::checkLogin();
?>
<?php 
    $user = new User();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
    $userloginmsg = $user->userLogin($_POST);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Register System PHP</title>
        <link rel = "stylesheet" href="includes/bootstrap.min.css"/>
        <link rel = "stylesheet" href="css/app.css"/>
<link rel = "stylesheet" href="css/login.css"/>
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
                   <h2>User Login</h2>
     </div>
     
    <div class="panel-body">
       <div style="max-width:600px; margin:0 auto">
        
<?php 
  if(isset($userloginmsg)){
    echo $userloginmsg;
  }
?> 
       
       
        <form action="" method="POST">
           <div class="form-group">
               <label for="email">Email Address</label>
                <input id="email" type="text" name="email" class="form-control email" required = "required"/>
               <i class="fa fa-envelope"></i>
           </div>
           
           <div class="form-group password">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" class="form-control" required = "required"/>
                <i class="fa fa-lock"></i>
            </div>
            <button type="submit" name="login" class="btn bttn-success">Login</button>
        </form>      
      </div>               
     </div>      
</div>
<?php
include('includes/footer.php');
ob_end_flush();
?>
