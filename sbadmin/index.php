<?php 
include_once("includes/init.php");
if(empty($database->logged_user)){
  header("Location:dist/login.php");
}elseif(isset($database->logged_user)){
    header("Location:dist/index.php");
}
?>
