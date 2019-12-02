<?php 
  require_once("session.php");

  include "../header.php";
?>

<h1 class="main-header">Blood Types</h1>


<?php include "./menu.php"; ?>


<?php

  require_once("../dbaccess.php");


  
  $db = new dbaccess();
  
  $types = $db->get_data("blood_types", ""); 
  ?>

  <a href="bloodtype.php">Add</a>
  <br/><br/>
  <table border="1">    
    <tr>
      <th>Name</th>
      <th>Symbol</th>
      <th></th>
    </tr>
  <?php foreach($types as $type) { ?>
      <tr>
        <td><?php echo $type["name"]; ?></td>
        <td><?php echo $type["symbol"] ?></td>
        <td>
          <a href="bloodtype.php?id=<?php echo $type["id"]; ?>">
            Edit
          </a>
        </td>
      </tr>
  <?php }?>
  </table>


<?php include "../footer.php";  ?>