<?php 
  require_once("session.php"); 
  require_once("../dbaccess.php");
  $db = new dbaccess();

  
  if(isset($_REQUEST["save"])) {

    $type = array (      
      "name" => $_REQUEST["name"],
      "symbol" => $_REQUEST["symbol"]
    );


    if(!isset($_GET["id"])) {
      $db->insert("blood_types", $type);
    } else {
      $where = "id=" . $_GET["id"];
      $db->update("blood_types", $type, $where);      
    }

    $_SESSION["message"] = "Blood type saved";
    header("Location:bloodtypes.php");
  }

?>






<?php include "../header.php"; ?>

<h1 class="main-header">Blood Types</h1>



<?php include "./menu.php"; ?>

<?php


  $type = array (
    "id" => "",
    "name" => "",
    "symbol" => ""    
  );

  if(isset($_GET["id"])) {        
    $where = "id = '".$_GET["id"]."'";
    $type = $db->get_single("blood_types", $where);
  }   
?>


<form method="POST">
<table>
  <tr>
    <td>Id</td>
    <td>
      <?php echo $type["id"]; ?>
    </td>
  </tr>
  <tr>
    <td>Name</td>
    <td>
      <input type="text" name="name" value="<?php echo $type["name"]; ?>" />
    </td>
  </tr>
  <tr>
    <td>Symbol</td>
    <td>
      <input type="text" name="symbol" value="<?php echo $type["symbol"]; ?>">
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