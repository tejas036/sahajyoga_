<?php

require_once('../function.php');
if(!isset($_SESSION['username'])){       
  header("Location: ../Login/index.php");
  echo $_SESSION['usermail']."Session";
}

include_once 'header.php';

include_once '../dbConnection.php';

?>



<?php
include_once 'footer.php';
?>