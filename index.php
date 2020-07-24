<?php 
      ob_start();
      include('includes/header.php');
      Session::checkSession();
      $user = new User();
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

<?php 
    $loginmsg = Session::get("loginmsg");
    if(isset($loginmsg)){
    echo $loginmsg;
}

Session::set("loginmsg", NULL);

?>

<div class="panel panel-default">
<div class="index-heading">
   <h2>User List</h2><h2><span class="pull-right"><p>Welcome!<strong>
   <?php
       $name = Session::get("username");
       if(isset($name)){
           echo $name;
       }
    ?>
       </strong>
       </p></span></h2>
</div>
<div class="panel-body">
  <table class="table table-bordered">
     <tr>
        <th width = "5%">Serial</th>
        <th width = "20%">Name</th>
        <th width = "30%">Username</th>
        <th width = "30%">Email Address</th>
        <th width = "15%">Action</th>

      </tr>
      <?php 
      $user = new User();
      $i = 0;
      $userdata = $user->getUserData();
      if($userdata){
          foreach($userdata as $data){
              $i++;
      ?>
      <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $data['name']; ?></td>
          <td><?php echo $data['username']; ?></td>
          <td><?php echo $data['email']; ?></td>
          <td><a class="btn btn-success" href="profile.php?id=<?php echo $data['id']; ?>">view</a></td>
      
      </tr>  
      <?php }
      }else{
      ?>    
      <tr><td colspan="5"><h2>No, User Data Found</h2> </td> </tr>                
      
      <?php 
      }
      
      ?>
  </table>

</div>
</div>
<?php
include('includes/footer.php');
ob_end_flush();
?>