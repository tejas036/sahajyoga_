<?php

// Check if a session is already active
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['username'])) {
    header("Location: ../Login/index.php");
}

include_once 'header.php';

// require_once('../function.php');

include '../dbConnection.php';


//echo $id;
$Date =  date("Y-m-d");
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT email, mobile FROM `sahajyoga_user_registration` WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $email = htmlspecialchars($row['email']);
        $phone = htmlspecialchars($row['mobile']);
    } else {
        echo "<p>No user found with this ID.</p>";
    }

    $stmt->close();
} else {
    echo "<p>Invalid ID.</p>";
}

$conn->close();

// $email = 'umeshjaiswal34@gmail.com';
// $phone = '7767834643';
?>



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <!-- <link rel="stylesheet" href="assets/demo.css">
	<link rel="stylesheet" href="assets/form-basic.css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <script src="assets/dynamicAction.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

    <!-- ----------------------------------------------------------------------------------- -->
    <!-- collapse  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css" integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">



</head>
<style>
 .collapsible {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 98%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: relative;
    margin-right: 20px;
}

.collapsible i {
    font-size: 20px;
    transition: transform 0.3s ease;
}
.icon{
    position: absolute;
    right: 20px;
}

.collapsible.active i {
    transform: rotate(45deg); /* Rotate icon when active */
}

.collapsible:hover {
    background-color: #ccc;
}

.content {
    padding: 0 18px;
    display: none;
    overflow: hidden;
    background-color: #f1f1f1;
}


</style>
<body>
    <div style="background : white; margin: 10px 30px; padding-bottom:20px; ">
        &nbsp &nbsp <h3> &nbsp Payer Details</h3>
        <div class="form-row" style="padding-left: 20px;">
            <div class="form-group col-md-4">
                <label for="inputEmail4">Email:-</label>
                <input type="text" class="form-control" readonly value="<?php echo $email; ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="inputPassword4">Mobile:-</label>
                <input type="text" class="form-control" readonly value="<?php echo $phone; ?>">
            </div>
        </div>
        &nbsp<h3 class=" d-flex  collapsible" style="margin: 10px;  justify-content: space-between;">
            <a href="javascript:void(0);" class="text-dark" data-toggle="collapse" data-target="#contributionTransaction" aria-expanded="false" aria-controls="contributionTransaction" style="text-decoration: none;">
            <i class="fa fa-plus icon" ></i>  &nbsp Contribution Transaction 
            </a>
           
        </h3>
        <div style="overflow:auto" id="contributionTransaction" class="collapse">
            <table class="table table-bordered table-hover" style="margin-left: 10px;width:98.5%">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Pan</th>
                        <th>Transaction Id</th>
                        <th>Amount</th>
                        <th>receipt Number</th>
                        <th>Payment mode</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <?php
                include '../dbConnection.php';
                $sql = "SELECT * from transactions WHERE  Email = '" . $email . "' AND Mobile = '" . $phone . "' AND  Status = 'Success' ";
                // $sql = "SELECT * FROM transactions WHERE Email = '$email' AND Mobile = '$phone'";
                // echo $sql;
                $result = $conn->query($sql);
                // print_r($result);
                if ($result->num_rows > 0) {
                    $i = 1;
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tbody>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row["Fname"] . " " . $row["Lname"]; ?></td>
                                <td><?php echo $row["Email"]; ?></td>
                                <td><?php echo $row["Mobile"]; ?></td>
                                <td><?php echo $row["Address"] . " " . $row["Pin"]; ?></td>
                                <td><?php echo $row["PAN"]; ?></td>
                                <td><?php echo $row["Transaction_id"]; ?></td>
                                <td><?php echo $row["Amount"]; ?></td>
                                <td><?php echo $row["receiptNumber"]; ?></td>
                                <td><?php echo $row["Payment_mode"]; ?></td>
                                <td><a href="reprint-badges.php?trans_id=<?php echo $row["Transaction_id"]; ?>&table_id=transactions">Download</td>
                            </tr>
                        </tbody>
                    <?php
                        $i++;
                    }
                } else {
                    ?>
                    <tbody>
                        <tr>
                            <td colspan="11" style="text-align: center;">No record found</td>
                        </tr>
                    </tbody>
                <?php
                }
                mysqli_close($conn);
                ?>
            </table>
        </div>



        &nbsp<h3 class="collapsible" style="margin: 10px; display: flex; justify-content: flex-start;">
            <a href="javascript:void(0);" class="text-dark" data-toggle="collapse" data-target="#gpSeminarTransaction" aria-expanded="false" aria-controls="gpSeminarTransaction" style="text-decoration: none;">
                <i class="fa fa-plus icon"></i> &nbsp Gp-Seminar Transaction
            </a>

        </h3>
        <div style="overflow:auto" id="gpSeminarTransaction" class="collapse">
            <table class="table table-bordered table-hover" style="margin-left: 10px;width:98.5%">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Pan</th>
                        <th>Transaction Id</th>
                        <th>Amount</th>
                        <th>receipt Number</th>
                        <th>Payment mode</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <?php
                include '../dbConnection.php';
                $sql = "SELECT * from event_registration WHERE  Email = '" . $email . "' AND Mobile = '" . $phone . "' AND  Status = 'Success' ";
                // $sql = "SELECT * FROM event_registration WHERE Email = '$email' AND Mobile = '$phone' AND who_im='gpseminar'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $i = 1;
                    while ($row = $result->fetch_assoc()) {
                        // echo var_dump($row);
                ?>
                        <tbody>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row["Fname"] . " " . $row["Lname"]; ?></td>
                                <td><?php echo $row["Email"]; ?></td>
                                <td><?php echo $row["Mobile"]; ?></td>
                                <td><?php echo $row["Address"] . " " . $row["Pin"]; ?></td>
                                <td><?php echo $row["PAN"]; ?></td>
                                <td><?php echo $row["Transaction_id"]; ?></td>
                                <td><?php echo $row["Amount"]; ?></td>
                                <td><?php echo $row["receiptNumber"]; ?></td>
                                <td><?php echo $row["Payment_mode"]; ?></td>
                                <td><a href="reprint-badges.php?trans_id=<?php echo $row["Transaction_id"]; ?>&table_id=event_registration">Download</td>
                            </tr>
                        </tbody>
                    <?php
                        $i++;
                    }
                } else {
                    ?>
                    <tbody>
                        <tr>
                            <td colspan="11" style="text-align: center;">No record found</td>
                        </tr>
                    </tbody>
                <?php
                }
                mysqli_close($conn);
                ?>
            </table>
        </div>



        &nbsp<h3 class="collapsible" style="margin: 10px; display: flex; justify-content: flex-start;">
            <a href="javascript:void(0);" class="text-dark" data-toggle="collapse" data-target="#nirmalaTransaction" aria-expanded="false" aria-controls="nirmalaTransaction" style="text-decoration: none;">
                <i class="fa fa-plus icon"></i> &nbsp Nirmala Transaction
            </a>


        </h3>
        <div style="overflow:auto" id="nirmalaTransaction" class="collapse">
            <table class="table table-bordered table-hover" style="margin-left: 10px;width:98.5%">
                <thead>
                    <tr>
                        <th>Sr</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Pan</th>
                        <th>Transaction Id</th>
                        <th>Amount</th>
                        <th>receipt Number</th>
                        <th>Payment mode</th>
                        <th>Download</th>
                    </tr>
                </thead>
                <?php
                include '../dbConnection.php';
                $sql = "SELECT * from event_registration_rahuri WHERE  Email = '" . $email . "' AND Mobile = '" . $phone . "' AND  Status = 'Success' ";
                // $sql = "SELECT * FROM event_registration WHERE Email = '$email' AND Mobile = '$phone'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $i = 1;
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <tbody>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row["Fname"] . " " . $row["Lname"]; ?></td>
                                <td><?php echo $row["Email"]; ?></td>
                                <td><?php echo $row["Mobile"]; ?></td>
                                <td><?php echo $row["Address"] . " " . $row["Pin"]; ?></td>
                                <td><?php echo $row["PAN"]; ?></td>
                                <td><?php echo $row["Transaction_id"]; ?></td>
                                <td><?php echo $row["Amount"]; ?></td>
                                <td><?php echo $row["receiptNumber"]; ?></td>
                                <td><?php echo $row["Payment_mode"]; ?></td>
                                <td><a href="reprint-badges.php?trans_id=<?php echo $row["Transaction_id"]; ?>&table_id=event_registration_rahuri">Download</td>
                            </tr>
                        </tbody>
                    <?php
                        $i++;
                    }
                } else {
                    ?>
                    <tbody>
                        <tr>
                            <td colspan="11" style="text-align: center;">No record found</td>
                        </tr>
                    </tbody>
                <?php
                }
                mysqli_close($conn);
                ?>
            </table>
        </div>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var collapsibles = document.querySelectorAll('[data-toggle="collapse"]');

        collapsibles.forEach(function(collapsible) {
            collapsible.addEventListener('click', function() {
                var icon = this.querySelector('i');
                var isExpanded = this.getAttribute('aria-expanded') === 'true';
                icon.className = isExpanded ? 'fa fa-plus' : 'fa-solid fa-minus';
            });
        });
    });
</script>





<?php
include_once 'footer.php';
?>