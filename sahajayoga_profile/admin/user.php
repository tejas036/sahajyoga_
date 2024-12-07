<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../Login/index.php");
}

include_once 'header.php';

?>

<!-- FontAwesome for icons -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

<!-- button: column-visibility  -->



<link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.1/css/buttons.dataTables.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.colVis.min.js"></script>
<!-- -------------------------------------------------------------------------------------------------------------------------- -->



<style>
    .custom-alert {
        position: fixed;
        /* Fixed position for right corner */
        top: 20px;
        /* Distance from the top */
        right: 20px;
        /* Distance from the right */
        z-index: 1050;
        /* Ensure it appears above other content */
        width: 300px;
        /* Custom width */
        /* Add other styles as needed */
    }

    .toggle-btn {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .toggle-btn input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        border-radius: 50%;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #28a745;
    }

    input:checked+.slider:before {
        transform: translateX(26px);
    }

    .icon-on,
    .icon-off {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        color: white;
        pointer-events: none;
    }

    .icon-on {
        left: 10px;
        display: none;
    }

    .icon-off {
        right: 10px;
        display: block;
    }

    input:checked+.slider .icon-on {
        display: block;
    }

    input:checked+.slider .icon-off {
        display: none;
    }

    a.more {
        color: white;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }
</style>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Information</h6>
            <input type="button" onclick="tableToExcel('testTable', 'W3C Example Table')" class="btn btn-primary float-right" value="Export to Excel">
        </div>
        <?php
        include_once '../dbConnection.php';
        $ToDate = "";
        $FromDate = "";
        $mobile = "";
        $email = "";
        $product = "";
        $queryCondition = "";
        $status = 'Success';
        $total = 0;
        if (!empty($_POST["search"])) {

            $ToDate = $_POST["post_to"];
            $mobile = $_POST["mobile"];
            $email = $_POST["email"];
            $status = $_POST["status"];
            $product = $_POST["product"];



            if (!empty($_POST["post_at"])) {
                $FromDate = $_POST["post_at"];
            } else {
                $FromDate = date('Y-m-d');
            }

            $andParts = array();

            if (!empty($ToDate) && !empty($FromDate))
                $andParts[] = "Transaction_start_time BETWEEN '" . $FromDate . "' AND '" . $ToDate . "'  ";

            if (!empty($email))
                $andParts[] = "Email = '$email'";

            if (!empty($status))
                $andParts[] = "Status = '$status'";

            if (!empty($mobile))
                $andParts[] = "Mobile = $mobile";

            if (!empty($product))
                $andParts[] = "Towards = '$product'";

            if (!empty($andParts))
                $queryCondition .= " WHERE " . implode(" AND ", $andParts);
            $sql = "SELECT * from transactions " . $queryCondition . " ORDER BY id desc";
            //$queryCondition .= " WHERE Towards ='" . $product. "' AND Status ='" . $status. "' AND  Email ='" . $email. "' AND   Mobile ='" . $mobile. "' AND  Transaction_start_time BETWEEN '".$ToDate."' AND '" . $FromDate . "'  ";
        } else {
            $status = "Success";
            $sql = "SELECT * from transactions WHERE Status = 'Success' ORDER BY id desc";
        }
        $result = $conn->query($sql);
        ?>
        <div class="card-body">





            <div class="table-responsive">

                <table class="table table-bordered" width="100%" cellspacing="0" id="testTable" style="color:black;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name</th>
                            <th>Mobile <a href="../admin/"></a></th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Aadhar No.</th>
                            <th>PAN No.</th>
                            <th>Adhar</th>
                            <th>Pan</th>
                            <th>status</th>
                            <th>Description</th>
                            <!-- <th>Download</th> -->
                        </tr>
                    </thead>
                    <!--		<tfoot>
			  <tr>
				<th>Sr. No.</th>
				<th>Transaction Start Date</th>
				<th>Name</th>
				<th>Mobile</th>
				<th>Email</th>
				<th>Address</th>
				<th>Aadhar</th>
				<th>PAN</th>
				<th>Transaction Id</th>
				<th>Amount</th>
				<th>Status</th>
				<th>Purpose</th>
				<th>Receipt Number</th>
				<th>Payment Mode</th>
				<th>Transaction End Date</th>
				<th>Is Sync With PG</th>
				<th>Download</th>
				
			  </tr>
			</tfoot> -->
                    <tbody>
                        <?php
                        include '../dbConnection.php';
                        $query = "SELECT * FROM `sahajyoga_user_registration`";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            $i = 1;
                            while ($row = $result->fetch_assoc()) {

                                echo "<tr>";
                                echo '<td> ' . $i . '</td>';

                                echo "<td><a href='user_details.php?id=" . urlencode($row['id']) . "' target='_blank' style='color: grey;'>" . htmlspecialchars($row["full_name"]) . "</a></td>";

                                echo "<td>" . htmlspecialchars($row["mobile"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["address"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["aadhaar_number"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["pan_number"]) . "</td>";
                                echo "<td><a href='image.php?id=" . $row['id'] . "&type=aadhaar' target='_blank'><img src='image.php?id=" . $row['id'] . "&type=aadhaar' alt='Aadhaar Photo' style='width:100px; height:100px; object-fit: contain;' /></a></td>";
                                echo "<td><a href='image.php?id=" . $row['id'] . "&type=pan' target='_blank'><img src='image.php?id=" . $row['id'] . "&type=pan' alt='PAN Photo' style='width:100px; height:100px; object-fit: contain;' /></a></td>";

                                $toggleState = $row['approval'] == 1 ? 'checked' : ''; // Assume 'status' field indicates the toggle state

                                echo "<td>";
                                echo "<label class='toggle-btn'>";
                                echo "<input type='checkbox' class='approval-toggle' data-id='" . $row['id'] . "' " . $toggleState . ">";
                                echo "<span class='slider'>";
                                echo "<span class='icon-on'><i class='fa fa-check'></i></span>";
                                echo "<span class='icon-off'><i class='fa fa-times'></i></span>";
                                echo "</span>";
                                echo "</label>";
                                echo "</td>";

                                // Feedback input and send button
                                echo "<td >";
                                echo "<input type='text' class='form-control feedback-input' placeholder='Enter feedback' />";
                                echo "<button class='btn btn-primary send-feedback mt-1 pl-3 ' data-id='" . $row['id'] . "'>Send</button>";
                                echo "</td>";


                                // echo "<td><a href='" . htmlspecialchars($row["Download_URL"]) . "' download>Download</a></td>";
                                echo "</tr>";
                                $i++;
                            }
                        } else {
                            echo "<tr><td colspan='10'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <!-- <tr style="background-color:gray" >
				<th colspan='10' style="color:white" >Total</th>
				<th style="color:white" ><?php echo $totalamount; ?></th>
				<th colspan='7'></th>
			  </tr> -->
                    </tfoot>
                </table>

            </div>
        </div>
    </div>
</div>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>








<script>
    $(document).ready(function() {
        var table = $('#testTable').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            paging: false,
            searching: false,

            buttons: [

            ],

            columnDefs: [{
                    targets: [7, 8, 9, 10], // specify the indices of columns you want to hide initially
                    className: 'none' // use the 'none' class to hide columns for responsive display
                },
                {
                    targets: [0, 1, 2, 3, 4, 5, 6], // specify the indices of columns you want to show initially
                    responsivePriority: 1 // assign higher priority to visible columns
                }
            ],

            responsive: {
                details: {
                    type: 'inline', // Use 'inline' type to show hidden columns when a row is clicked
                    target: 'tr'
                }
            }
        });
    });
    $(document).ready(function() {
        console.log('Document ready'); // Check if the document is ready

        $(document).on('change', '.approval-toggle', function() {
            console.log('Checkbox changed'); // Check if the change event is fired

            var userId = $(this).data('id'); // Get the user ID
            var newStatus = $(this).is(':checked') ? 1 : 0; // Determine the new status

            console.log("User ID:", userId);
            console.log("New Status:", newStatus);

            $.ajax({
                url: '../admin/update_approval.php', // PHP script to handle the update
                type: 'POST',
                data: {
                    id: userId,
                    approval: newStatus
                },
                success: function(response) {
                    console.log("Success Response:", response); // Handle success response
                },
                error: function(xhr, status, error) {
                    console.error("XHR Response Text:", xhr.responseText); // Handle error response
                    console.error("Status:", status); // Additional status information
                    console.error("Error:", error); // Additional error information
                }
            });
        });
    });

    $(document).ready(function() {

        $(document).on('click', '.send-feedback', function() {
            var userId = $(this).data('id');
            var feedback = $(this).siblings('.feedback-input').val();
            console.log(userId)

            if (feedback.trim() === '') {
                alert('Please enter feedback before sending.');
                return;
            }

            $.ajax({
                url: 'submit_feedback.php', // Replace with your server-side script to handle feedback submission
                type: 'POST',
                data: {
                    id: userId,
                    feedback: feedback
                },
                success: function(response) {
                    showAlert('success', 'Feedback sent successfully!');
                },
                error: function() {
                    alert('There was an error sending feedback.');
                    showAlert('danger', 'There was an error sending feedback.');
                }
            });
        });

        // Function to display Bootstrap alert
        function showAlert(type, message) {
            var alertHtml = '<div class="alert alert-' + type + ' alert-dismissible fade show custom-alert" role="alert">' +
                message +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '</div>';

            $('body').append(alertHtml); // Append the alert to the body
            setTimeout(function() {
                $('.custom-alert').alert('close'); // Automatically close alert after 5 seconds
            }, 5000); // Adjust the timeout as needed
        }
    });
</script>
<!-- /.container-fluid -->
<?php
include_once 'footer.php';
?>