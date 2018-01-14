<?php 
  require_once("session.php"); 
  require_once("../dbaccess.php");
  $db = new dbaccess();



  $reserve_id = $_GET["reserve_id"];
  $blood_type_id = $_GET["blood_type_id"];



  if(isset($_REQUEST["update"])) {    
    
    
    
    
    $is_available = array (      
      "reserve_id" => $reserve_id,
      "blood_type_id" => $blood_type_id,
      "is_available" => $_REQUEST["is_available"],
      "note" => $_REQUEST["note"],
    );


    if(!isset($_GET["id"])) {

      $where = "reserve_id = ".$reserve_id." and".
        " blood_type_id = ".$blood_type_id;
      $db->delete("reserve_blood_types", $where);

      $db->insert("reserve_blood_types", $is_available);
    } 

    $_SESSION["message"] = "Reserve information saved.";
    header("Location:reserve_details.php?id=$reserve_id");
  }

?>

<?php include "../header.php"; ?>

<h1 class="main-header">Blood Reserve Details</h1>


<?php include "./menu.php"; ?>

<?php
  $where = "id = '".$reserve_id."'";
  $reserve = $db->get_single("reserves", $where);

  $blood_type = $db->get_single("blood_types", "id = '".$blood_type_id."'");

  $where = "reserve_id = '$reserve_id' and blood_type_id = '$blood_type_id'";
  $data = $db->get_single("reserve_blood_types", $where);
    
?>
<a href="reserve_details.php?id=<?php echo $reserve_id ?>"><< Back</a>
<br><br>
<table>  
  <tr>
    <td><strong>Name</strong></td>
    <td>
      <?php echo $reserve["name"]; ?>
    </td>
  </tr>
  <tr>
    <td><strong>Address</strong></td>
    <td>
      <?php echo $reserve["address"];?>
    </td>
  </tr>
  <tr>
    <td><strong>Contact No.</strong></td>
    <td>
      <?php echo $reserve["contact_no"]; ?>
    </td>
  </tr>
  <tr>
    <td><strong>Email</strong></td>
    <td>
      <?php echo $reserve["email"]; ?>
    </td>
  </tr>
</table>
<hr>
<form method="POST">
<table>
  <tr>
    <td><strong>Blood</strong></td>
    <td>
      <?php echo $blood_type["name"]; ?>
      (<?php echo $blood_type["symbol"]; ?>)
    </td>    
  </tr>
  <tr>
    <td><strong>Available</strong></td>
    <td>
        <select name="is_available">
          <option value="0" <?php ($data["is_available"] > 0?"":"selected"); ?>>No</option>
          <option value="1" <?php ($data["is_available"] > 0?"selected":""); ?>>Yes</option>
        </select>
    </td>
  </tr>
  <tr>
    <td><strong>Note</strong></td>
    <td><textarea name="note" cols="30" rows="6"><?php echo $data["note"]; ?></textarea></td>
  <tr>  
  <tr>
    <td></td>
    <td>
      <input type="hidden" name="update" value="update_avaibility">
      <input type="submit" value="Update" />
    </td>
  </tr>
</table>
</form>






<?php include "../footer.php";  ?>