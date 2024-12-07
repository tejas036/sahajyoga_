<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    include 'dbConnection.php';

    // Prepare data
    $prefix = $_POST['prefix'] ?? '';

    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $firstName = trim($firstName);
    $lastName = trim($lastName);

    $fullName = $firstName . ' ' . $lastName;

    $first_name = $_POST['first_name'] ?? '';
    $middleName = $_POST['middleName'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $residentialStatus = $_POST['residentialStatus'] ?? '';
    $citizenship = $_POST['citizenship'] ?? '';
    $maritalStatus = $_POST['maritalStatus'] ?? '';

    $panNumber = $_POST['panNumber'] ?? '';
    $aadhaarNumber = $_POST['aadhaarNumber'] ?? '';

    $passportExpiry = !empty($_POST['passportExpiry']) ? date('Y-m-d', strtotime($_POST['passportExpiry'])) : null;

    $centerName = $_POST['centerName'] ?? '';

    $building_name = $_POST['buliding_name'] ?? '';
    $road_name = $_POST['road_name'] ?? '';
    $city = $_POST['city'] ?? '';
    $dist = $_POST['dist'] ?? '';
    // die();

    // Handling file uploads
    $userPhoto = isset($_FILES['userPhoto']) && $_FILES['userPhoto']['error'] == UPLOAD_ERR_OK ? file_get_contents($_FILES['userPhoto']['tmp_name']) : null;
    $panPhoto = isset($_FILES['panPhoto']) && $_FILES['panPhoto']['error'] == UPLOAD_ERR_OK ? file_get_contents($_FILES['panPhoto']['tmp_name']) : null;
    $aadhaarPhoto = isset($_FILES['aadhaarPhoto']) && $_FILES['aadhaarPhoto']['error'] == UPLOAD_ERR_OK ? file_get_contents($_FILES['aadhaarPhoto']['tmp_name']) : null;
    $passportPhoto = isset($_FILES['passportPhoto']) && $_FILES['passportPhoto']['error'] == UPLOAD_ERR_OK ? file_get_contents($_FILES['passportPhoto']['tmp_name']) : null;

    // SQL query to insert data
    $sql = "INSERT INTO sahajyoga_user_registration 
    (user_photo, prefix, full_name, first_name, middle_name, last_name, email, mobile, dob, residential_status, citizenship, marital_status, pan_number, pan_photo, aadhaar_number, aadhaar_photo, passport_expiry,passport_photo,center_name, building_name,lane_name,city,district ) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,? ,? ,? ,?)";


    // Prepare statement
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind parameters
        // 'b' for binary data (userPhoto, panPhoto, aadhaarPhoto)
        // 's' for strings
        mysqli_stmt_bind_param(
            $stmt,
            'sssssssssssssssssssssss',
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
            $aadhaarNumber,
            $aadhaarPhoto,
            $passportExpiry,
            $passportPhoto,
            $centerName,
            $building_name,
            $road_name,
            $city,
            $dist,
        );

        // Execute statement
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data Added successfully!',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'index.php';
                    }
                });
            });
            </script>";
            // header('Location: login.php'); // Redirect to login.php on successful registration
            // exit();
        } else {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error Adding data: " . $stmt->error . "'
                });
            });
            </script>";
            echo "Error: " . mysqli_error($conn);
        }

        // Close statement
        mysqli_stmt_close($stmt);
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
        echo "Prepare failed: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sahaja Yoga Registration Page</title>

    <!-- <link rel="stylesheet" href="assets/demo.css">
    <link rel="stylesheet" href="assets/form-basic.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="assets/dynamicAction.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">  


     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">-->


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap 4.5 CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <!-- FontAwesome for icons (Bootstrap Icons can be used instead if required) -->
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Material Icons and Google Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/demo.css">
    <link rel="stylesheet" href="assets/form-basic.css">

    <!-- jQuery (required for Bootstrap 4.5 JS) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap 4.5 JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Additional JS Files -->
    <script src="assets/dynamicAction.js"></script>
    <header>
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
            <!-- <div class="col text-right">
                    <i class="bi bi-person-circle" style="font-size: 40px; cursor: pointer; color: #212529;"></i>
                </div> -->
        </div>
    </header>
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

    .gradient-text {
        background: linear-gradient(90deg, rgba(131, 58, 180, 1) 0%, rgba(253, 29, 29, 1) 50%, rgba(252, 176, 69, 1) 100%);
        -webkit-background-clip: text;
        /* For Safari and Chrome */
        background-clip: text;
        /* For other browsers */
        color: transparent;
        /* Hide the default text color */
        /* font-size: 24px; Adjust font size as needed */

    }
</style>

<body>

    <div class="container">
        <!-- <h3  class='my-5' style="text-align: center;">The Life Eternal Trust, Mumbai</h3> -->
        <h3 class="my-5" style="text-align: center;"> <strong>THE LIFE ETERNAL TRUST, MUMBAI</strong> </h3>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-default" style="border-radius: 20px 20px;   box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="card-header" style="background: linear-gradient(90deg,
					rgba(131, 58, 180, 1) 0%,
					rgba(253, 29, 29, 1) 50%,
					rgba(252, 176, 69, 1) 100%); border-radius: 20px 20px 0 0;">
                        <h3 class="text-center text-white">Registration Form</h3>
                    </div>
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="userPhoto">User Photo <small style="color: red;">*</small></label>
                                    <input type="file" id="userPhoto" name="userPhoto" accept="image/*" required />
                                </div>
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="prefix">Prefix <small style="color: red;">*</small></label>
                                    <select id="prefix" class="form-control" name="prefix">
                                        <option value="" disabled selected>Select your prefix</option>
                                        <option value="Shri">Shri</option>
                                        <option value="Smt">Smt</option>
                                        <option value="Kumari">Kumari</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="firstName">First Name <span style="color: red;">*</span></label>
                                    <span>as per Adharcard or PanCard</span>
                                    <input type="text" class="form-control" name="firstName" required id="firstName" placeholder="First Name">
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="middleName">Middle Name <span style="color: red;">*</span></label>
                                    <span>as per Adharcard or PanCard</span>
                                    <input type="text" class="form-control" name="middleName" required id="middleName" placeholder="Middle Name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="lastName">Last Name <span style="color: red;">*</span></label>
                                    <span>as per Adharcard or PanCard</span>
                                    <input type="text" class="form-control" name="lastName" required id="lastName" placeholder="Last Name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">Email <span style="color: red;">*</span></label>
                                    <input type="email" class="form-control" name="email" required id="email" placeholder="Email">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="mobile">Mobile <span style="color: red;">*</span></label>
                                    <input type="tel" class="form-control" id="mobile" required name="mobile" pattern="[0-9]{10}" placeholder="Mobile">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="dob">Date of Birth <small style="color: red;">*</small></label>
                                    <input type="date" class="form-control" name="dob" required id="dob" placeholder="Date of Birth">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="residentialStatus">Residential Status <small style="color: red;">*</small></label>
                                    <select name="residentialStatus" id="residentialStatus" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="residential">Residential</option>
                                        <option value="non_residential">Non-Residential</option>
                                    </select>
                                    <!-- <input type="text" class="form-control" name="residentialStatus" required id="residentialStatus" placeholder="Residential Status"> -->
                                </div>

                                <!-- Residential Fields -->
                                <div id="residentialFields" style="display: none;">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="aadhaarNumber">Aadhaar Number <small style="color: red;">*</small></label>
                                            <input type="text" class="form-control" name="aadhaarNumber" id="aadhaarNumber" placeholder="Aadhaar Number">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="aadhaarPhoto">Aadhaar Photo <small style="color: red;">*</small></label>
                                            <input type="file" id="aadhaarPhoto" name="aadhaarPhoto" accept="image/*" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="panNumber">PAN Number <small style="color: red;">*</small></label>
                                            <input type="text" class="form-control" name="panNumber" id="panNumber" placeholder="PAN Number">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="panPhoto">PAN Photo <small style="color: red;">*</small></label>
                                            <input type="file" id="panPhoto" name="panPhoto" accept="image/*" />
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div id="nonResidentialFields" style="display: none;">
                                <div class="row">
                                    <!-- <div class="form-group col-md-6">
                                        <label for="passportNumber">Passport Number</label>
                                        <input type="text" class="form-control" name="passportNumber" id="passportNumber" placeholder="Passport Number">
                                    </div> -->
                                    <div class="form-group col-md-6">
                                        <label for="passportExpiry">Passport Expiry <small style="color: red;">*</small></label>
                                        <input type="date" class="form-control" name="passportExpiry" id="passportExpiry" />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="passportPhoto">Passport Photo <small style="color: red;">*</small></label>
                                        <input type="file" id="passportPhoto" name="passportPhoto" accept="image/*" />
                                    </div>
                                </div>
                            </div>




                            <div class="form-row">




                            </div>



                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="citizenship">Citizenship <small style="color: red;">*</small></label>
                                    <select id="citizenship" class="form-control" name="citizenship"  required>
                                        <option value=""  disabled selected>Select your country</option>
                                        <!-- Options will be populated by JavaScript -->
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="buliding_name">Building Name/ Village Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" name="buliding_name" required id="buliding_name" placeholder=" building name">
                                </div>



                                <div class="form-group col-md-6">
                                    <label for="road_name">Road /Lane :<small style="color: red;">*</small></label>
                                    <input type="text" class="form-control" name="road_name" required id="road_name" placeholder=" lane name ">
                                </div>



                                <div class="form-group col-md-6">
                                    <label for="state">State <small style="color: red;">*</small></label>
                                    <!-- <input type="text" class="form-control" name="state" required id="state" placeholder=" apartment name" /> -->
                                    <select onChange="getdistrict(this.value);" name="city" id="city" class="form-control">

                                        <option value="">Select State</option>

                                        <?php
                                        include 'dbConnection.php';
                                        $query = mysqli_query($conn, "SELECT * FROM state");

                                        while ($row = mysqli_fetch_array($query)) { ?>

                                            <option value="<?php echo $row['StCode']; ?>"><?php echo $row['StateName']; ?></option>

                                        <?php

                                        }

                                        ?>

                                    </select>

                                </div>

                                <div class="form-group col-md-6">
                                    <label for="dist">District<small style="color: red;">*</small></label>
                                    <!-- <input type="text"  name="district" required id="district" placeholder=" Enter a district"> -->
                                    <select name="dist" id="dist" class="form-control" style=" max-width:100% !important;">

                                        <option value="">Select District</option>

                                    </select>
                                </div>

                                <!-- <div class="form-group col-md-6">
                                    <label for="Taluka">Taluka </label>
                                    <input type="text" class="form-control" name="Taluka" required id="Taluka" placeholder="Enter a Taluka">
                                </div> -->

                                <div class="form-group col-md-6">
                                    <label for="maritalStatus">Marital Status <small style="color: red;">*</small></label>
                                    <select id="maritalStatus" class="form-control" name="maritalStatus" required>
                                        <option value="" disabled selected>Marital Status</option>
                                        <option value="Married">Married</option>
                                        <option value="Unmarried">Unmarried</option>
                                        <option value="Divorce">Divorce</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="centerName">Center Name <small style="color: red;">*</small></label>
                                    <input type="text" class="form-control" name="centerName" required id="centerName" placeholder="Center Name">
                                </div>

                            </div>


                            <div class="form-row mt-1">
                                <div class="form-group col-md-12 d-flex justify-content-center">
                                    <input type="submit" name="submit" class="btn btn-primary d" value="Submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#firstName ,#middleName ,#lastName').on('keydown', function(e) {
                if (e.key === ' ') {
                    e.preventDefault();
                }
            })
        })

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

        $(document).ready(function() {
            // Function to toggle fields based on selected residential status
            $('#residentialStatus').on('change', function() {
                var selectedStatus = $(this).val();

                // Reset required attributes for all fields
                $('#aadhaarNumber, #aadhaarPhoto, #panNumber, #panPhoto, #passportExpiry, #passportPhoto').prop('required', false);

                if (selectedStatus === 'residential') {
                    $('#residentialFields').show();
                    $('#nonResidentialFields').hide();

                    // Make residential fields required
                    $('#aadhaarNumber, #aadhaarPhoto, #panNumber, #panPhoto').prop('required', true);
                } else if (selectedStatus === 'non_residential') {
                    $('#residentialFields').hide();
                    $('#nonResidentialFields').show();

                    // Make non-residential fields required
                    $('#passportExpiry, #passportPhoto').prop('required', true);
                } else {
                    $('#residentialFields, #nonResidentialFields').hide();
                }
            });

            // Trigger the change event on page load to set the correct visibility if a value is already selected
            $('#residentialStatus').trigger('change');
        });


        function getdistrict(val) {

            $.ajax({

                type: "POST",

                url: "datahandler.php",

                data: 'state_id=' + val,

                success: function(data) {

                    $("#dist").html(data);

                }

            });

        }

        function countries() {

            $.ajax({
                type: "POST",
                url: "datahandler1.php",
                data: {
                    get_country: "true"

                },
                //data: {count:openpositioncount,propertroleassignid:propertroleassignid},
                success: function(data) {
                    $("#citizenship").html(data);
                }

            });
        }
        $(document).ready(function() {
            // Function to load countries on page load
            countries();
        });


        // $(document).ready(function() {
        //     $('#firstName, #middleName, #lastName').on('input', function() {
        //         $(this).val($(this).val().toUpperCase());
        //     });
        // });
    </script>

    <?php include_once 'footer.php'; ?>
</body>

</html>