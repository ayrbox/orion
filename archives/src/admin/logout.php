a<?php 
  session_start();
  $_SESSION["userlogin"] = null;
  
  $_SESSION["message"] = "Successfully logged out";

  header("Location:index.php");
?>