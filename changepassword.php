
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
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updatepass'])){
        $updatepass = $user->updatePassword($userid, $_POST);
    }
?>


<?php 
    if(isset($updatepass)){
      echo $updatepass;
    } 

?>


<?php
  
     $sessionId = Session::get("id");
     if($userid == $sessionId){
  
  ?>

<div class="content-box">
  <?php  include('includes/sidebar.php'); ?>


  <div class="panel panel-default">
   <div class="panel-heading">
      <div>Update Password</div>
    </div>     
    <div class="panel-body">
       <div style="max-width:600px; margin: 0 auto;">
       
       
       
        <form action="" method="POST">
           <div class="form-group">
              <label for="oldpass">Old Password</label>
              <input type="password" name="old_password" id="oldpass" class="form-control" style="width: 400px;">
           </div>          
           
           <div class="form-group">
              <label for="newpass">New Password</label>
              <input type="password" name="password" id="newpass" class="form-control" style="width: 400px;">
               
           </div>   
           
            <!-- <div class="form-group">
              <label for="repass">Confirm Password</label>
              <input type="password" name="password" id="repass" class="form-control" style="width: 400px;">
               <span class="pull-right" id="divCheckPassword"  style="font-size:15px; padding-top:5px"><i class="fa fa-check-circle" style="font-size:20px;color:green; float:left"></i>
               </span>
            </div> -->
            <button type="submit" id="updatepass" name="updatepass" class="btn btn-success">Update Password</button>
            
        </form>
              
      </div>               
     </div>      
  </div>
</div>

<?php } else{
    header('Location: changepassword.php?id='.$sessionId) ;
  } ?>

<?php
include('includes/footer.php');
?>
<script type="text/javascript" src="js/confirm_password.js"></script>