
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
  <div class="sidebar">
    <div class="sidebar-header">
      <div>Logged in as <span><?php
       $name = Session::get("username");
       if(isset($name)){
           echo $name;
       }
    ?></span></div>
    </div>
    <div class="sidebar-content">
      <ul>
      <li>
        <a href="editProfile.php">Edit Profile</a>
        <a href="profile.php?id=<?php echo $userid ?>">View Profile</a>
        <a href="changepassword.php">Change Password</a>
        <a href="">Log Out</a>
      </li>
    </ul>
    </div>
    
  </div>

  <div class="main-content">
   <div class="panel-header">
      <div>Profile of <span><?php echo $userdata->name; ?></span></div>
    </div>     
    <div class="panel-body">
       <div style="max-width:600px; margin:0 auto">
       
       
       
        <form action="" method="POST">
          
          <div class="form-group">
              <label for = "name">Your Name</label>
              <input type="text" id="name" name="name" class="form-control" value = "<?php echo $userdata->name; ?>" />
          </div>
          
          <div class="form-group">
              <label for = "username">User Name</label>
              <input type="text" id="username" name="username" class="form-control" value="<?php echo $userdata->username; ?>" />
          </div>
           
          <div class="form-group">
               <label for="email">Email Address</label>
                <input id="email" type="text" name="email" class="form-control" value="<?php echo $userdata->email; ?>" />
           </div>
           <?php
            
               $sessionId = Session::get("id");
               if($userid == $sessionId){
            
            ?>

           
            <button type="submit" name="update" class="btn btn-success">Update</button>
            <a class="btn btn-info" href="changepassword.php?id=<?php echo $userid; ?>" >Change Password</a>
            <?php } ?>
        </form>   
                  <?php } ?>
              
      </div>               
     </div>      
  </div>
</div>
<?php
include('includes/footer.php');
?>
