<?php
// Include database connection file
include 'dbConnection.php';

// Start session
session_start();

// Fetch user ID from session or other secure source
$userId = $_SESSION['email']; // Ensure you set this value securely

// Function to fetch user data
function fetchUserData($conn, $userId)
{
    $sql = "SELECT * FROM sahajyoga_user_registration WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
    return $user;
}

// Fetch initial user data
$user = fetchUserData($conn, $userId);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Prepare data from POST request
    $prefix = $_POST['prefix'] ?? '';
    $firstName = trim($_POST['firstName'] ?? '');
    $middleName = trim($_POST['middleName'] ?? '');
    $lastName = trim($_POST['lastName'] ?? '');
    $fullName = $firstName . ' ' . $lastName;
    $email = $_POST['email'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $residentialStatus = $_POST['residentialStatus'] ?? '';
    $citizenship = $_POST['citizenship'] ?? '';
    $maritalStatus = $_POST['maritalStatus'] ?? '';
    $address = $_POST['address'] ?? '';
    $panNumber = $_POST['panNumber'] ?? '';
    $passportExpiry = !empty($_POST['passportExpiry']) ? date('Y-m-d', strtotime($_POST['passportExpiry'])) : null; // Convert to proper format or NULL
    $aadhaarNumber = $_POST['aadhaarNumber'] ?? '';
    $centerName = $_POST['centerName'] ?? '';

    $building_name = $_POST['buliding_name'] ?? '';
    $road_name = $_POST['road_name'] ?? '';
    $city = $_POST['city'] ?? '';
    $dist = $_POST['dist'] ?? '';


    // Handle photo updates only if new files are uploaded
    $userPhoto = isset($_FILES['userPhoto']) && $_FILES['userPhoto']['error'] === UPLOAD_ERR_OK ? file_get_contents($_FILES['userPhoto']['tmp_name']) : $user['user_photo'];
    $panPhoto = isset($_FILES['panPhoto']) && $_FILES['panPhoto']['error'] === UPLOAD_ERR_OK ? file_get_contents($_FILES['panPhoto']['tmp_name']) : $user['pan_photo'];
    $aadhaarPhoto = isset($_FILES['aadhaarPhoto']) && $_FILES['aadhaarPhoto']['error'] === UPLOAD_ERR_OK ? file_get_contents($_FILES['aadhaarPhoto']['tmp_name']) : $user['aadhaar_photo'];
    $passportPhoto = isset($_FILES['passportPhoto']) && $_FILES['passportPhoto']['error'] == UPLOAD_ERR_OK ? file_get_contents($_FILES['passportPhoto']['tmp_name']) : $user['passport_photo'];;


    // die();
    // Check if data has actually changed
    if ($user['user_photo'] !==  $userPhoto || $user['prefix'] !== $prefix || $user['full_name'] !== $fullName || $user['first_name'] !== $firstName || $user['middle_name'] !== $middleName || $user['last_name'] !== $lastName || $user['email'] !== $email || $user['mobile'] !== $mobile || $user['dob'] !== $dob || $user['residential_status'] !== $residentialStatus || $user['citizenship'] !== $citizenship || $user['marital_status'] !== $maritalStatus || $user['address'] !== $address || $user['pan_number'] !== $panNumber || $user['pan_photo'] !== $panPhoto ||  $user['passport_photo'] !== $passportPhoto ||  $user['passport_expiry'] !== $passportExpiry || $user['aadhaar_number'] !== $aadhaarNumber || $user['aadhaar_photo'] !== $aadhaarPhoto || $user['center_name'] !== $centerName || $user['building_name'] !== $building_name || $user['road_name'] !== $road_name  || $user['dist'] !== $dist ||   $user['city'] !== $city) {

        // SQL query to update data
        $sql = "UPDATE sahajyoga_user_registration 
        SET user_photo = ?, prefix = ?, full_name = ?, first_name = ?, middle_name = ?, last_name = ?, email = ?, mobile = ?, dob = ?, residential_status = ?, citizenship = ?, marital_status = ?, pan_number = ?, pan_photo = ?, passport_photo = ?, passport_expiry = ?, aadhaar_number = ?, aadhaar_photo = ?, center_name = ?,building_name=?, lane_name=?, city = ? ,district=?
        WHERE email = ?";

        // Prepare and execute statement
        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters
            $stmt->bind_param(
                'ssssssssssssssssssssssss',
                $userPhoto,
                $prefix,
                $fullName,
                $firstName,
                $middleName,
                $lastName,
                $email,
                $mobile,
                $dob,
                $residentialStatus,
                $citizenship,
                $maritalStatus,
                $panNumber,
                $panPhoto,
                $passportPhoto,
                $passportExpiry,
                $aadhaarNumber,
                $aadhaarPhoto,
                $centerName,
                $building_name,
                $road_name,
                $city,
                $dist,
                $userId
            );

            // Execute statement
            if ($stmt->execute()) {
                // Fetch the updated data
                $user = fetchUserData($conn, $userId);
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data updated successfully!',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'profile.php';
                        }
                    });
                });
                </script>";
            } else {
                // Display error alert
                echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error updating data: " . $stmt->error . "'
                    });
                });
                </script>";
                echo "Error executing query: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        } else {
            echo "Prepare failed: " . $conn->error;
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Prepare failed: " . $conn->error . "'
                });
            });
            </script>";
        }
    } else {
        // Data has not changed, handle this case if needed
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'info',
                title: 'Info',
                text: 'No changes detected.',
                confirmButtonText: 'OK'
            });
        });
        </script>";
    }

    // Close the database connection
    $conn->close();
}
?>








<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Page</title>
    <link rel="stylesheet" href="assets/demo.css">
    <link rel="stylesheet" href="assets/form-basic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="assets/dynamicAction.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- sweetaler library  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<style>
    header {
        box-sizing: border-box;
        text-align: center;
        width: 100%;
        padding: 25px 40px;
        background: linear-gradient(90deg,
                rgba(131, 58, 180, 1) 0%,
                rgba(253, 29, 29, 1) 50%,
                rgba(252, 176, 69, 1) 100%);
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 0 0 20px 20px;
    }
</style>

<body>
    <header>
        <!-- <div align="center">
            <img align="left" src="assets/logo3.png" height="70" width="70" />
            
            <a href="index.php">Logout</a>
            <a href="result.php"style="margin-right: 20px;">Dashboard</a>
      
        </div> -->
        <div class="row align-items-center">
            <!-- Left: Logo and Title -->
            <div class="col-pl-1   d-flex align-items-center">
                <img src="assets/logo3.png" height="70" width="70" alt="Logo" class="mr-2">
                <h4 class="mb-0 text-white" style="color: #212529;">Sahajayoga, Mumbai</h4>
            </div>

            <!-- Center: Search Bar -->
            <!-- <div class="col text-center">
                    <div class="input-group" style="max-width: 250px; margin: auto;">
                        <input type="text" id="search" class="form-control" placeholder="Search..." style="border-radius: 20px;">
                        <span class="input-group-text bg-transparent border-0">
                            <i class="bi bi-search"></i>
                        </span>
                    </div>
                </div> -->

            <!-- Right: Profile Icon -->
            <!-- <div class="col text-right"> -->
            <!-- <i class="bi bi-person-circle" style="font-size: 40px; cursor: pointer; color: #212529;"></i> -->
            <!-- <a href="index.php">Logout</a>
                    <a href="result.php"style="margin-right: 20px;">Dashboard</a>
                </div> -->

            <div class="col" style="display: flex; justify-content: end;">
                <a href="logOut.php" class="btn btn-sm text-white d-flex align-items-center justify-content-center" style="margin-right: 10px; border-radius: 10px; background-color: #008471; padding: 8px 15px;">
                    Logout
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right ml-1" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                </a>

                <a href="result.php" class="btn btn-sm text-white d-flex align-items-center justify-content-center" style="margin-right: 20px; border-radius: 10px; background-color: #008471; padding: 8px 15px;">
                    Dashboard
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                        <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                    </svg>
                </a>
            </div>
        </div>
    </header>
    <?php if ($user['approval'] == 0): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="float:right; width:400px; margin: 10px; text-align: center;">
            <span>Profile is not Approved Yet!</span>
            <?php if (!empty($user['feedback'])): ?>
                <div><?php echo htmlspecialchars($user['feedback']); ?></div>
            <?php endif; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php else: ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="float:right; width:400px; margin: 10px; text-align: center;">
            <span>User is Approved!</span>
            <?php if (!empty($user['feedback'])): ?>
                <div><?php echo htmlspecialchars($user['feedback']); ?></div>
            <?php endif; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <div class="container">
        <?php
        // Assuming your PHP code goes here
        // Example of how to trigger the SweetAlert2 in PHP:
        // echo "<script>
        //     Swal.fire({
        //         icon: 'success',
        //         title: 'Success!',
        //         text: 'Data updated successfully!',
        //         confirmButtonText: 'OK'
        //     });
        // </script>";
        // 
        ?>
        <h3 class="gradient-text my-5 " style="text-align: center;"> <strong>THE LIFE ETERNAL TRUST, MUMBAI</strong></h3>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default" style="border-radius: 20px 20px;   box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="card-header" style="background: linear-gradient(90deg,
					rgba(131, 58, 180, 1) 0%,
					rgba(253, 29, 29, 1) 50%,
					rgba(252, 176, 69, 1) 100%); border-radius: 20px 20px 0 0;">
                        <h3 class="text-center text-white">Profile Page</h3>
                    </div>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <?php if (!empty($user['user_photo'])): ?>
                                        <?php
                                        // Encode the BLOB data into base64
                                        $base64UserPhoto = base64_encode($user['user_photo']);
                                        ?>
                                        <!-- Display the existing user photo -->
                                        <div class="d-flex flex-column">
                                            <label for="userPhoto">User Photo</label>
                                            <img id="userPhotoPreview" src="data:image/jpeg;base64,<?= $base64UserPhoto ?>" alt="User Photo" height="100" width="100" class="mt-2" />
                                            <input type="file" name="userPhoto" id="userPhoto" accept="image/*" onchange="previewUserPhoto(this)" class="mt-2" />
                                        </div>

                                    <?php else: ?>

                                    <?php endif; ?>

                                    <!-- File input for changing the photo -->

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="prefix">Prefix</label>
                                    <select id="prefix" class="form-control" name="prefix" required>
                                        <option value="" disabled>Select your prefix</option>
                                        <option value="Shri" <?= $user['prefix'] == 'Shri' ? 'selected' : '' ?>>Shri</option>
                                        <option value="Smt" <?= $user['prefix'] == 'Smt' ? 'selected' : '' ?>>Smt</option>
                                        <option value="Kumari" <?= $user['prefix'] == 'Kumari' ? 'selected' : '' ?>>Kumari</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="firstName">First Name<span style="color: red;">*</span></label>
                                    <span>as per Adharcard or PanCard</span>
                                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="first Name" pattern="[A-Za-z]+" value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="middleName">Middle Name<span style="color: red;">*</span></label>
                                    <span>as per Adharcard or PanCard</span>
                                    <input type="text" class="form-control" name="middleName" id="middleName" placeholder="first Name" pattern="[A-Za-z]+" value="<?php echo htmlspecialchars($user['middle_name'])  ?>" required>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="lastName">Last Name<span style="color: red;">*</span></label>
                                    <span>as per Adharcard or PanCard</span>
                                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="last Name" pattern="[A-Za-z]+" value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
                                </div>



                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?= htmlspecialchars($user['email']) ?>" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mobile">Mobile</label>
                                    <input type="tel" class="form-control" id="mobile" name="mobile" pattern="[0-9]{10}" placeholder="Mobile" value="<?= htmlspecialchars($user['mobile']) ?>" required>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth" value="<?= htmlspecialchars($user['dob']) ?>" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="residentialStatus">Residential Status</label>
                                    <select name="residentialStatus" id="residentialStatus" class="form-control" aria-readonly="">
                                        <option value="">Select</option>
                                        <option value="residential">Residential</option>
                                        <option value="non_residential">Non-Residential</option>
                                    </select>
                                </div>

                                <!-- Residential Fields -->
                                <div id="residentialFields" style="display:none ;">
                                    <div class="row">
                                        <div class="form-group col-md-6 d-flex flex-column">
                                            <label for="aadhaarNumber">Aadhaar Number</label>
                                            <input type="text" class="form-control" name="aadhaarNumber" id="aadhaarNumber" placeholder="Aadhaar Number" value="<?= htmlspecialchars($user['aadhaar_number']) ?>">
                                        </div>
                                        <div class="form-group col-md-6 d-flex flex-column">
                                            <label for="aadhaarPhoto">Aadhaar Photo</label>
                                            <img id="aadhaarPhotoPreview" src="data:image/jpeg;base64,<?= base64_encode($user['aadhaar_photo']) ?>" alt="Aadhaar Photo" height="100" width="100" />
                                            <input type="file" class="mt-3" name="aadhaarPhoto" id="aadhaarPhoto" accept="image/*" onchange="previewImage(this, 'aadhaarPhotoPreview')" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="panNumber">PAN Number</label>
                                            <input type="text" class="form-control" name="panNumber" id="panNumber" placeholder="PAN Number" value="<?= htmlspecialchars($user['pan_number']) ?>">
                                        </div>
                                        <div class="form-group col-md-6 d-flex flex-column">
                                            <label for="panPhoto">PAN Photo</label>
                                            <img id="panPhotoPreview" src="data:image/jpeg;base64,<?= base64_encode($user['pan_photo']) ?>" alt="PAN Photo" height="100" width="100" />
                                            <input type="file" class="mt-3" name="panPhoto" id="panPhoto" accept="image/*" onchange="previewImage(this, 'panPhotoPreview')" />
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div id="nonResidentialFields" style="display:none ;">
                                <div class="row">
                                    <!-- <div class="form-group col-md-6">
                                    <label for="passportNumber">Passport Number</label>
                                    <input type="text" class="form-control" name="passportNumber" id="passportNumber" placeholder="Passport Number">
                                </div> -->
                                    <div class="form-group col-md-6">
                                        <label for="passportExpiry">Passport Expiry</label>
                                        <input type="date" class="form-control" name="passportExpiry" id="passportExpiry" value="<?php echo $user['passport_expiry']; ?>" />
                                    </div>
                                    <!-- <div class="form-group col-md-6">
                                        <label for="passportPhoto">Passport Photo</label>
                                        <img id="passportPhoto" src="data:image/jpeg;base64,<?= base64_encode($user['passport_photo']) ?>" alt="PAN Photo" height="100" width="100" />
                                        <input type="file" id="passportPhoto" name="passportPhoto" accept="image/*" />
                                    </div> -->
                                    <div class="form-group col-md-6 d-flex flex-column">
                                        <label for="passportPhoto">Passport Photo</label>
                                        <img id="passportPhotoPreview" src="data:image/jpeg;base64,<?= base64_encode($user['passport_photo']) ?>" alt="Passport " height="100" width="100" />
                                        <input type="file" class="mt-3" name="passportPhoto" id="passportPhoto" accept="image/*" onchange="previewImage(this, 'passportPhotoPreview')" />
                                    </div>
                                </div>
                            </div>







                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="citizenship">Citizenship</label>
                                    <select id="citizenship" class="form-control" name="citizenship" required>
                                        <option value="" disabled>Select your country</option>
                                       
                                        <!-- Add more countries as needed -->
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="buliding_name">Building Name/ Village Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="buliding_name" required id="buliding_name" placeholder=" building name" value="<?php echo $user['building_name'] ?>">
                                </div>



                                <div class="form-group col-md-6">
                                    <label for="road_name">Road /Lane :</label>
                                    <input type="text" class="form-control" name="road_name" required id="road_name" placeholder=" lane name" value="<?php echo $user['lane_name'] ?>">
                                </div>



                                <div class="form-group col-md-6">
                                    <label for="city">State</label>
                                    <select onChange="getdistrict(this.value, '<?php echo $user['district']; ?>');" name="city" id="city" class="form-control">
                                        <option value="">Select State</option>
                                        <?php
                                        include 'dbConnection.php';
                                        $query = mysqli_query($conn, "SELECT * FROM state");
                                        while ($row = mysqli_fetch_array($query)) {
                                            $selected = ($row['StCode'] == $user['city']) ? 'selected' : '';
                                            echo "<option value=\"{$row['StCode']}\" $selected>{$row['StateName']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="district">District</label>
                                    <select name="dist" id="dist" class="form-control">
                                        <option value="">Select District</option>
                                    </select>
                                </div>

                                <!-- <div class="form-group col-md-6">
                                    <label for="Taluka">Taluka </label>
                                    <input type="text" class="form-control" name="Taluka" required id="Taluka" placeholder="Enter a Taluka">
                                </div> -->


                                <div class="form-group col-md-6">
                                    <label for="maritalStatus">Marital Status</label>
                                    <select id="maritalStatus" class="form-control" name="maritalStatus" required>
                                        <option value="" disabled>Marital Status</option>
                                        <option value="Married" <?= $user['marital_status'] == 'Married' ? 'selected' : '' ?>>Married</option>
                                        <option value="Unmarried" <?= $user['marital_status'] == 'Unmarried' ? 'selected' : '' ?>>Unmarried</option>
                                        <option value="Divorce" <?= $user['marital_status'] == 'Divorce' ? 'selected' : '' ?>>Divorce</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="centerName">Center Name</label>
                                    <input type="text" class="form-control" name="centerName" id="centerName" placeholder="Center Name" value="<?= htmlspecialchars($user['center_name']) ?>" required>
                                </div>

                            </div>





                            <div class="form-row">
                            </div>

                            <div class="form-row mt-1">
                                <div class="form-group col-md-12 d-flex justify-content-center">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</body>

</html>

<Script>
    function previewUserPhoto(input) {
        var preview = document.getElementById('userPhotoPreview');
        var noPhotoText = document.getElementById('noPhotoText');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                if (noPhotoText) {
                    noPhotoText.style.display = 'none';
                }
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
            if (noPhotoText) {
                noPhotoText.style.display = 'block';
            }
        }
    }

    function previewImage(input, previewId) {
        var preview = document.getElementById(previewId);

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</Script>
<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     const citizenshipSelect = document.getElementById('citizenship');

    //     // Fetch and populate countries
    //     fetch('https://restcountries.com/v3.1/all')
    //         .then(response => response.json())
    //         .then(data => {
    //             const countries = data.sort((a, b) => a.name.common.localeCompare(b.name.common));
    //             countries.forEach(country => {
    //                 const option = document.createElement('option');
    //                 option.value = country.cca2; // Country code
    //                 option.textContent = country.name.common; // Country name
    //                 citizenshipSelect.appendChild(option);
    //             });
    //         })
    //         .catch(error => console.error('Error fetching country data:', error));

    //     // Handle country selection
    //     citizenshipSelect.addEventListener('change', function() {
    //         const selectedCountry = this.value;
    //         citySelect.innerHTML = '<option value="" disabled selected>Select your city</option>';
    //         citySelect.disabled = true;

    //         // Fetch cities from Geonames API
    //         fetch(`http://api.geonames.org/searchJSON?country=${selectedCountry}&maxRows=50&username=your_geonames_username`)
    //             .then(response => response.json())
    //             .then(data => {
    //                 if (data.geonames) {
    //                     data.geonames.forEach(city => {
    //                         const option = document.createElement('option');
    //                         option.value = city.name;
    //                         option.textContent = city.name;
    //                         citySelect.appendChild(option);
    //                     });
    //                     citySelect.disabled = false;
    //                 }
    //             })
    //             .catch(error => console.error('Error fetching city data:', error));
    //     });
    // });

    // JavaScript to automatically close the alert after 3 seconds
    setTimeout(function() {
        var alertElement = document.querySelector('.alert');
        if (alertElement) {
            alertElement.classList.remove('show');
            alertElement.classList.add('fade');
            setTimeout(function() {
                alertElement.remove();
            }, 150); // Timeout to match the fade-out transition
        }
    }, 3000);

    $(document).ready(function() {
        // Function to show or hide fields based on residential status
        function updateFields() {
            var status = $('#residentialStatus').val();
            var residentialFields = $('#residentialFields');
            var nonResidentialFields = $('#nonResidentialFields');

            if (status === 'residential') {
                residentialFields.show();
                $('#aadhaarNumber').attr('required', true);
                $('#aadhaarPhoto').attr('required', true);
                $('#panNumber').attr('required', true);
                $('#panPhoto').attr('required', true);


                nonResidentialFields.hide();
                $('#passportExpiry').removeAttr('required');
                $('#passportPhotoPreview').removeAttr('required');

            } else if (status === 'non_residential') {
                residentialFields.hide();
                $('#passportExpiry').attr('required', true);
                $('#passportPhotoPreview').attr('required', true);



                nonResidentialFields.show();
                $('#aadhaarNumber').removeAttr('required');
                $('#aadhaarPhoto').removeAttr('required');
                $('#panNumber').removeAttr('required');
                $('#panPhoto').removeAttr('required');

            } else {
                residentialFields.hide();
                nonResidentialFields.hide();
                $('#aadhaarNumber').removeAttr('required');
                $('#aadhaarPhoto').removeAttr('required');
                $('#panNumber').removeAttr('required');
                $('#panPhoto').removeAttr('required');
                $('#passportExpiry').removeAttr('required');
                $('#passportPhotoPreview').removeAttr('required');

            }
        }

        // Bind change event to dropdown
        $('#residentialStatus').change(function() {
            updateFields();
        });


        var defaultStatus = '<?= htmlspecialchars($user['residential_status']) ?>';
        $('#residentialStatus').val(defaultStatus);

        // Trigger the update to show the correct fields based on the default value
        updateFields();
    });




    function getdistrict(stateId, defaultDistrict = '') {
        $.ajax({
            type: "POST",
            url: "datahandler.php",
            data: {
                state_id: stateId,

            },
            success: function(data) {
                $("#dist").html(data);
                if (defaultDistrict) {
                    $("#dist").val(defaultDistrict);
                }
            }
        });
    }

    $(document).ready(function() {

        var selectedState = $('#city').val();
        if (selectedState) {
            getdistrict(selectedState, '<?php echo $user['district']; ?>');
        }
    });

    function countries() {
        let defaultCountryId=<?php echo $user['citizenship'] ?>;

        $.ajax({
            type: "POST",
            url: "datahandler1.php",
            data: {
                get_country: "true"

            },
            //data: {count:openpositioncount,propertroleassignid:propertroleassignid},
            success: function(data) {
                $("#citizenship").html(data);
                $("#citizenship").val(defaultCountryId);
            }

        });
    }
    $(document).ready(function() {
        // Function to load countries on page load
        countries();
    });
</script>
<?php include_once 'footer.php'; ?>