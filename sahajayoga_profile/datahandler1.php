<?php

include_once 'dbConnection.php';

if (isset($_POST["get_state"])) {

  $query = mysqli_query($conn, "SELECT * FROM state");
?>
  <option value="">Select State</option>
  <?php
  while ($row = mysqli_fetch_array($query)) {
  ?>
    <option value="<?php echo $row['StateName']; ?>"><?php echo $row['StateName']; ?></option>
  <?php
  }
}
if (isset($_POST["get_country"])) {

  $query = mysqli_query($conn, "SELECT * FROM countries");
  ?>
  <option value="">Select Country</option>
  <?php
  while ($row = mysqli_fetch_array($query)) {
  ?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
<?php
  }
}

?>