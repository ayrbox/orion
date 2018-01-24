<?php

session_start();


if(!isset($_SESSION["userlogin"])) {r
  $_SESSION["message"] = "Access Permission denied";
  header("Location:index.php");
}