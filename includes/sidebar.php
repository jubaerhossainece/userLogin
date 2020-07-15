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

      <?php
            
               $sessionId = Session::get("id");
               if($userid == $sessionId){
            
        ?>
        <li><a href="editProfile.php?id=<?php echo $sessionId ?>" class="sidebar-link">Edit Profile</a></li>
        <li><a href="profile.php?id=<?php echo $userid ?>" class="sidebar-link">View Profile</a></li>
        <li><a href="changepassword.php?id=<?php echo $userid; ?>" class="sidebar-link">Change Password</a></li>
  
      <?php } ?>


        <li><a href="?action=logout" class="sidebar-link">Log Out</a></li>
    </ul>
    </div>
    
  </div>