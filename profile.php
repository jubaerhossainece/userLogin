
<link rel = "stylesheet" href="css/profile.css"/>
<?php
        include('library/User.php');
        include('includes/header.php');
        Session::checkSession();
?>

<?php 
    if(isset($_GET['id'])){
        $userid = (int)$_GET['id'];
    }

    $user = new User();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
        $userupdate = $user->UpdateUserData($userid, $_POST);
    }
?>




<?php 
   if(isset($userupdate)){
       echo $userupdate;
   }
   
?>

<?php
   $userdata = $user->getUserById($userid);
   if($userdata){       
?>


<div class="content-box">
  <?php  include('includes/sidebar.php'); ?>

  <div class="main-content">
   <div class="panel-header">
      <div>Profile of <span><?php echo $userdata->name; ?></span></div>
    </div>     
    <div class="panel-body">
          
          <div class="form-group">
              <label for = "name">Your Name</label>
              <br>
              <span><?php echo $userdata->name; ?></span>
              
          </div>
          
          <div class="form-group">
              <label for = "username">User Name</label>
              <br>
              <span><?php echo $userdata->username; ?></span>
              
          </div>
           
          <div class="form-group">
               <label for="email">Email Address</label>
               <br>
               <span>
               <?php echo $userdata->email; ?></span>
           </div>
             
                  <?php } ?>             
     </div>      
  </div>
</div>
<?php
include('includes/footer.php');
?>
