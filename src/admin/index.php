<?php 

  session_start();


  if(isset($_REQUEST["logincheck"])) {
    require_once("../dbaccess.php");
    $db = new dbaccess();

    $where = "email = '" . $_REQUEST['email'] . "'";
    $user = $db->get_single('users', $where);

    
    if($user != null && $user["password"] == $_REQUEST['password']) {    
      $_SESSION["userlogin"] = $user["name"];
      header("Location:dashboard.php");
    } else {
      $_SESSION["message"] = "Invalid email/password";
    }  

    
  }
?>



<?php include "../header.php"; ?>
  <h1 class="main-header">Orion Blood Bank - Admin</h1>
  <p>
    Please enter email and password to sigin into admin portal
  </p>

  <?php if(isset($_SESSION["message"])) {?>
    <p class="message">
      <?php 
        echo $_SESSION["message"]; 
        unset($_SESSION["message"]);
      ?>
    </p>
  <?php } ?>
  <div class="login-form">
    <form method="POST">
      <table>      
        <tr>
          <td>Email</td>
          <td>
            <input type="text" name="email">
          </td>
        </tr>
        <tr>
          <td>Password</td>
          <td>
            <input type="password" name="password"/>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <input type="hidden" name="logincheck" value="checklogin">
            <input type="submit" value="Signin"/>
          </td>
        </tr>

      </table>
    </form>


  </div>


<?php include "../footer.php"; ?>



