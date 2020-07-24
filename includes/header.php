<?php 
        $filepath = realpath(dirname(__FILE__));
        include_once $filepath.'/../library/Session.php';
        include $filepath.'/../library/User.php';
        Session::init();
?>
<?php
  if(isset($_GET['action']) && $_GET['action']="logout"){
    Session::destroy();
}

?>

