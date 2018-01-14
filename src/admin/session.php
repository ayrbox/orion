<?php

session_start();


if(!isset($_SESSION["userlogin"])) {
  $_SESSION["message"] = "Access Permission denied";
  header("Location:index.php");
}