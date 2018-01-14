<?php 
  require_once("session.php");
  require_once("../dbaccess.php");
  include "../header.php";
?>
<h1 class="main-header">Donors List</h1>
<?php include "./menu.php"; ?>


<?php 
  $db = new dbaccess();

  $reserves = $db->get_data("donors", "");
  ?>

  <h2>List of donors</h2>

  <table border=1>
  <tr>
    <th>Name</th>
    <th>Address</th>
    <th>Email</th>
    <th>Contact/Phone</th>    
  </tr>
  <?php foreach($reserves as $reserve) {?>
    <tr>
      <td><?php echo $reserve["name"]; ?></td>
      <td><?php echo $reserve["address"]; ?></td>
      <td><?php echo $reserve["email"]; ?></td>
      <td><?php echo $reserve["phone"]; ?></td>      
    </tr>
  <?php } ?>
  </table>










<?php include "../footer.php"; ?>