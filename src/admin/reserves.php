<?php 
  require_once("session.php");
  require_once("../dbaccess.php");
  include "../header.php";
?>
<h1 class="main-header">Reserves</h1>
<?php include "./menu.php"; ?>


<?php 
  $db = new dbaccess();

  $reserves = $db->get_data("reserves", "");
  ?>

  <a href="reserve.php">Add<a>


  <br><br>


  <table border=1>
  <tr>
    <th>Name</th>
    <th>Address</th>
    <th>Contact</th>
    <th>Email</th>
    <th></th>    
  </tr>
  <?php foreach($reserves as $reserve) {?>
    <tr>
      <td><?php echo $reserve["name"]; ?></td>
      <td><?php echo $reserve["address"]; ?></td>
      <td><?php echo $reserve["contact_no"]; ?></td>
      <td><?php echo $reserve["email"]; ?></td>
      <td>
        <a href="reserve.php?id=<?php echo $reserve["id"]; ?>">
          Edit
        </a>
        <br>
        <a href="reserve_details.php?id=<?php echo $reserve["id"]; ?>">
          View Details
        </a>
      </td>
    </tr>
  <?php } ?>
  </table>










<?php include "../footer.php"; ?>