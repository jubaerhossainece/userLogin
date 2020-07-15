<?php
        include('includes/header.php');
        include('library/User.php');
        Session::checkLogin();
?>
<?php 
        $user = new User();
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        $userlogin = $user->userLogin($_POST);
        }
?>


<div class="panel panel-default">
     <div class="panel-heading">
                   <h2>User Login</h2>
     </div>
     
    <div class="panel-body">
       <div style="max-width:600px; margin:0 auto">
       
       
       <?php
           if(isset($userlogin)){
               echo $userlogin;
           }
           ?>
       
       
        <form action="" method="POST">
           <div class="form-group">
               <label for="email">Email Address</label>
                <input id="email" type="text" name="email" class="form-control" required = "required"/>
           </div>
           
           <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" class="form-control" required = "required"/>
            </div>
            <button type="submit" name="login" class="btn btn-success">Login</button>
        </form>      
      </div>               
     </div>      
</div>
<?php
include('includes/footer.php');
?>