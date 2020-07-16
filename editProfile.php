
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


<?php
  
     $sessionId = Session::get("id");
     if($userid == $sessionId){
  
  ?>
<div class="content-box">
  <?php  include('includes/sidebar.php'); ?>

  <div class="panel panel-default">
   <div class="panel-heading">
      <div>Profile of <span><?php echo $userdata->name; ?></span></div>
    </div>     
    <div class="panel-body">
       <div style="max-width:600px; margin: 0 auto">
       
       
       
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

           
            <button type="submit" name="update" class="btn btn-success">Update Profile</button>
            
        </form>   
              
      </div>               
     </div>      
  </div>
</div>
  <?php } else{
    header('Location: editProfile.php?id='.$sessionId) ;
  } ?>


    <?php } ?>
<?php
include('includes/footer.php');
?>
