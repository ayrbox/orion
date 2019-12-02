<?php
  require_once("dbaccess.php");

  if(isset($_REQUEST["save"])) {
    $db = new dbaccess();    
    $data = array(
      "name" => $_REQUEST["name"],
      "email" => $_REQUEST["email"],      
      "address" => $_REQUEST["address"],
      "phone" => $_REQUEST["phone"]
    );

    $db->insert("donors", $data);    
    $message = "Thank you for registering with us as donor.";
  }  
?>

<?php include "header.php"; ?>
  <h1 class="main-header">
    Register as Donor
  </h1>
  
  <?php if(isset($message)){
    echo "<h2>$message</h2>";
  }?>
  
  <div class="register-form">
    <p>
      Please submit in your details to register with us. 
      We will keep you informed about blood donation program 
      and send you news.
    </p>
    <form method="POST" action="register.php">
      <table>
        <tr>
          <td>Name:</td>
          <td>
            <input type="text" name="name">
          </td>
        </tr>

        <tr>
          <td>Email:</td>
          <td>
            <input type="email" name="email" />
          </td>          
        </tr>
        <tr>
          <td>Address:</td>
          <td>            
            <textarea name="address" rows="5" cols="25"></textarea>
          </td>
        </tr>
        <tr>
          <td>Phone:</td>
          <td>
            <input type="text" name="phone">
          </td>
        </tr>
        <tr>
          <td></td>
          <td>          
            <input type="hidden" name="save" value="register"/>
            <input type="submit" value="submit">
          </td>
        </tr>
      </table>
    </form>
  </div>
<?php include "footer.php"; ?>