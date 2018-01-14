<?php 
require_once("dbaccess.php");

$db = new dbaccess();

$blood_types = $db->get_data("blood_types", "");

if(isset($_REQUEST["search"])) {
  

  $blood_type_id = $_REQUEST["blood_type"];
  $location = $_REQUEST["location"];


  $sql_query = "select a.reserve_id, b.name, b.address, b.contact_no, b.email, a.note  
    from reserve_blood_types a
    inner join reserves b on b.id = a.reserve_id    
    where a.blood_type_id = $blood_type_id and b.address like '%$location%';";

  

  $results = $db->query($sql_query);
}


?>

<?php include "header.php"; ?>

<h1 class="main-header">Search</h1>
<form method="POST">
<table>
  <tr>
    <td><strong>Blood Type:</strong></td>
    <td>    
      <select name="blood_type">
      <?php foreach($blood_types as $blood_type) { ?>
        <option value="<?php echo $blood_type["id"]; ?>">
        <?php echo $blood_type["name"] . "(" . ")"; ?>
        </option>
      <?php }?>
      </select>
    </td>
  </tr>
  <tr>
    <td><strong>Location</strong></td>
    <td><input type="text" name="location"/></td>
  </tr>
  <tr>
    <td></td>
    <td>
      <input type="hidden" name="search" value="search">
      <input type="submit" value="Submit"/>
    </td>
  </tr>
</table>
</form>

<?php if(isset($results)) { ?>
<h2>Blood is available in following reserves: </h2>  
<table border="1">
  <tr>
    <th>Reserve name</th>
    <th>Address</th>
    <th>Contact No</th>
    <th>Email</th>
    <th>Note</th>
  </tr>
  <?php foreach($results as $result) {?>
    <tr>
      <td><?php echo $result["name"]; ?></td>
      <td><?php echo $result["address"]; ?></td>
      <td><?php echo $result["contact_no"]; ?></td>
      <td><?php echo $result["email"]; ?></td>
      <td><?php echo $result["note"]; ?></td>
    </tr>
  <?php } ?>
</table>

<?php } ?>


<?php include "footer.php"; ?>