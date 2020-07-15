<?php
        include('includes/header.php');
        include('library/user.php');
        Session::checkSession();
        $user = new User();
?>

<?php 
        $loginmsg = Session::get("loginmsg");
        if(isset($loginmsg)){
        echo $loginmsg;
}

Session::set("loginmsg", NULL);

?>


<div class="panel panel-default">
<div class="panel-heading">
   <h2>User List<span class="pull-right"><p>Welcome!<strong>
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
?>