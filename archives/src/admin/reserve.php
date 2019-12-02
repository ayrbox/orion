<?php 
  require_once("session.php"); 
  require_once("../dbaccess.php");
  $db = new dbaccess();

  
  if(isset($_REQUEST["save"])) {    
    $reserve = array (      
      "name" => $_REQUEST["name"],
      "address" => $_REQUEST["address"],
      "contact_no" => $_REQUEST["contact_no"],
      "email" => $_REQUEST["email"],
    );


    if(!isset($_GET["id"])) {
      $db->insert("reserves", $reserve);
    } else {
      $where = "id=" . $_GET["id"];
      $db->update("reserves", $reserve, $where);      
    }

    $_SESSION["message"] = "Reserve information saved.";
    header("Location:reserves.php");
  }

?>






<?php include "../header.php"; ?>

<h1 class="main-header">Blood Types</h1>



<?php include "./menu.php"; ?>

<?php


  $reserve = array (
    "id" => "",
    "name" => "",
    "address" => "",
    "contact_no" => "",
    "email" => ""
  );

  if(isset($_GET["id"])) {        
    $where = "id = '".$_GET["id"]."'";
    $reserve = $db->get_single("reserves", $where);
  }   
?>


<form method="POST">
<table>
  <tr>
    <td>Id</td>
    <td>
      <?php echo $reserve["id"]; ?>
    </td>
  </tr>
  <tr>
    <td>Name</td>
    <td>
      <input type="text" name="name" value="<?php echo $reserve["name"]; ?>" />
    </td>
  </tr>
  <tr>
    <td>Address</td>
    <td>
      <textarea name="address"><?php echo $reserve["address"];?></textarea>
    </td>
  </tr>
  <tr>
    <td>Contact No.</td>
    <td>
      <input type="text" name="contact_no" value="<?php echo $reserve["contact_no"]; ?>" />
    </td>
  </tr>
  <tr>
    <td>Email</td>
    <td>
      <input type="email" name="email" value="<?php echo $reserve["email"]; ?>" />
    </td>
  </tr>
  <tr>
    <td></td>
    <td>
      <input type="hidden" name="save" value="yes">
      <input type="submit" value="Save">
    </td>
  </tr>
</table>
</form>




<?php include "../footer.php";  ?>