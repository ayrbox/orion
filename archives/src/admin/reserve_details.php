<?php 
  require_once("session.php"); 
  require_once("../dbaccess.php");
  $db = new dbaccess();
?>

<?php include "../header.php"; ?>

<h1 class="main-header">Blood Reserve Details</h1>


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



    $sql_query = "SELECT a.id, a.name, a.symbol, b.is_available, b.note
      FROM blood_types a left join 
      (select * from reserve_blood_types where reserve_id=" . $_GET["id"] . ") b 
      on b.blood_type_id = a.id;";
    
    $data = $db->query($sql_query);
  }
?>
<a href="reserves.php"><< Back</a>
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
<table width="100%" border="1">
  <tr>
    <th>Blood</th>
    <th>Available</th>
    <th>Note</th>
    <td></td>
  <tr>
  <?php foreach($data as $row) {?>
    <tr>
      <td>
        <?php echo $row["name"]; ?>
        (<?php echo $row["symbol"]; ?>)
      </td>
      <td>
        <?php echo ($row["is_available"] > 0)?"Yes":"No"; ?>
      </td>
      <td>
        <?php echo $row["note"]; ?>
      </td>
      <td>
        <a href="change_availability.php?reserve_id=<?php echo $_GET["id"]; ?>&blood_type_id=<?php echo $row["id"] ; ?>">
          Change
        </a>
      </td>
    </tr>
  <?php } ?>
</table>







<?php include "../footer.php";  ?>