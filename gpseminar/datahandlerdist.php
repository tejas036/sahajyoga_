<?php

include_once 'dbConnection.php';

if(!empty($_POST["state_id"])) 
{
$query =mysqli_query($conn,"SELECT di.* 
FROM state st
inner join district di on st.StCode=di.StCode
where StateName = '" . $_POST["state_id"] . "'");
?>
<option value="">Select district</option>
<?php
while($row=mysqli_fetch_array($query))  
{
?>
<option value="<?php echo $row["DistrictName"]; ?>"><?php echo $row["DistrictName"]; ?></option>
<?php
}
}

?>