<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>

    <title>Sahaja Yoga User Verification Page</title>


    <?php include 'header.php'; ?>
</head>

<body style="max-height: 100%; ">

    <div class="container my-5">
        <div class="form-title-row my-4 mx-4">

            <h3 style="text-align: center;"><strong>THE LIFE ETERNAL TRUST, MUMBAI</strong></h3>

            <h2 style="text-align: center;">International Sahaja Yoga Seminar, Nirmala Nagari, Ganapatipule</h2>

            <h3 style="text-align: center;">December 22-25, 2024</h3>
            <!-- <hr> -->

            <!-- <h4>Online Contribution for Indians Only.</h4> -->

            <!-- <p style="font-size:12px">All * Fields are mandatory to fill.</p> -->

        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card card-default" style="border-radius: 20px 20px;   box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                    <div class="card-header" style=" background: linear-gradient(90deg,
                    rgba(131, 58, 180, 1) 0%,
                    rgba(253, 29, 29, 1) 50%,
                    rgba(252, 176, 69, 1) 100%);border-radius: 20px 20px 0 0;">
                        <h3 class="text-center" style="color: #fff;">Login</h3>
                    </div>
                    <form method="post" action="#">
                        <div class="card-body" style="padding: 50px;">
                            <div class="form-group ">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" name="email" required id="inputEmail4" placeholder="Enter your email">
                            </div>
                            <div class="form-group mt-4">
                                <label for="inputPassword4">Mobile</label>
                                <input type="tel" class="form-control" id="mobile" required name="mobile" pattern="[0-9]{10}" placeholder="Enter your mobile number">
                            </div>
                            <div class="form-group mt-4  mb-0 mt-4 d-flex justify-content-center align-items-center">
                                <div class="text-center mb-0 mt-4 d-flex justify-content-center align-items-center" style="height: 100%;">
                                    <input type="submit" name="submit" class="btn btn-primary btn-block" style="border-radius: 5px; " value="Submit">
                                </div>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-top" role="document" style="border-radius: 25px 25px ">
            <div class="modal-content" style="border-radius: 25px 25px ">
                <div class="modal-header bg-primary text-white" style="  background: linear-gradient(90deg,
                    rgba(131, 58, 180, 1) 0%,
                    rgba(253, 29, 29, 1) 50%,
                    rgba(252, 176, 69, 1) 100%); border-radius: 25px 25px 0 0">
                    <h5 class="modal-title" id="myModalLabel">Sahajayoga, Mumbai</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <!-- First Section -->
                    <div class="mb-4 d-flex flex-column justify-content-center align-items-center text-center" style="height: 200px;">
                        <p class="text-dark h6 mb-3">Hello User, Your profile is not available in Sahajayoga. Do you want to continue?</p>
                        <a href="eventform.php" class="btn btn-primary btn-sm shadow-sm" style="border-radius: 5px; padding: 10px 20px; ">Continue <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg></a>
                    </div>

                    <!-- Divider with "Or" text -->
                    <hr style="margin-left: 30px; margin-right: 30px;">
                    <h6 class="text-dark  h6">Or</h6>
                    <hr style="margin-left: 30px; margin-right: 30px;">

                    <!-- Second Section -->
                    <div class="mt-4 d-flex flex-column justify-content-center align-items-center text-center" style="height: 150px;">
                        <p class="text-dark h6">For Registration</p>
                        <a href="../sahajayoga_profile/registration.php" class="btn btn-success btn-sm shadow-sm" style="border-radius: 5px; padding: 10px 20px;  margin-top: 5px;">Click Here <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-index-thumb" viewBox="0 0 16 16">
                                <path d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 0 0 1 0V6.435l.106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 1 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.118a.5.5 0 0 1-.447-.276l-1.232-2.465-2.512-4.185a.517.517 0 0 1 .809-.631l2.41 2.41A.5.5 0 0 0 6 9.5V1.75A.75.75 0 0 1 6.75 1M8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v6.543L3.443 6.736A1.517 1.517 0 0 0 1.07 8.588l2.491 4.153 1.215 2.43A1.5 1.5 0 0 0 6.118 16h6.302a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5 5 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.6 2.6 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046zm2.094 2.025" />
                            </svg></a>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <?php
    error_reporting(0);
    include_once 'dbConnection1.php'; // Database connection file
    session_start();

    $email = '';
    $phone = '';

    // Check if email and mobile are set
    if (isset($_POST["email"]) && isset($_POST["mobile"])) {
        $email = $_POST["email"];
        $phone = $_POST["mobile"];
    }

    $otp = rand(111111, 999999); // Generate a random OTP

    // Check if form is submitted
    if (!empty($_POST["submit"])) {
        // Query to check if the email and mobile exist in the database
        $sql = "SELECT * from sahajyoga_user_registration WHERE email = '" . $email . "' AND mobile = '" . $phone . "'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Fetch user data
            while ($row = $result->fetch_assoc()) {

                // Prepare OTP message
                $otp = rand(100000, 999999); // Generate a random OTP
                $msg = "Your OTP is: $otp";
                $msg = wordwrap($msg, 70);

                // Store the OTP, email, and phone in the session
                $_SESSION["email"] = $email;
                $_SESSION["mobile"] = $phone;
                $_SESSION["otp"] = $otp;

                // 1. Send Email using cURL (Mailgun)
                $emailCurl = curl_init();
                $to = $email;
                $cc = "rahul@dexpertsystems.com";
                $subject = "Sahaja Yoga Donor Login OTP";
                $htmlContent = "
                <p>Hello,</p>
                <p>You have received the option to log in to the Sahaja Yoga dashboard.</p>
                <p>$msg</p>
                <p>Regards,<br>Support</p>
            ";

                curl_setopt_array($emailCurl, array(
                    CURLOPT_URL => 'https://api.mailgun.net/v3/app.payplatter.in/messages',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => array(
                        'from' => 'support@dexpertsystems.com',
                        'to' => $to,
                        'cc' => $cc,
                        'subject' => $subject,
                        'html' => $htmlContent // Use 'html' instead of 'text' for HTML content
                    ),
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Basic YXBpOmtleS00NzNlODlhODBiNWNiOGFjZGUzYTgxMGM5YTE4MDIyYQ==' // Mailgun API Key
                    ),
                ));

                $emailResponse = curl_exec($emailCurl);
                curl_close($emailCurl);

                // 2. Send SMS using cURL (bhashsms)
                $smsCurl = curl_init();
                $user = "anupamjeevan";
                $password = "654789";
                $senderId = "DESKTC";
                $sms_url = "https://bhashsms.com/api/sendmsg.php?user=anupamjeevan&pass=654789&sender=DESKTC&phone=" . $phone . "&text=" . urlencode("Your 4 digit OTP to validate login is " . $otp . " - DEXPERT SYSTEMS PRIVATE LIMITED") . "&priority=ndnd&stype=normal";
                curl_setopt_array($smsCurl, array(
                    CURLOPT_URL => $sms_url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                ));

                $smsResponse = curl_exec($smsCurl);
                curl_close($smsCurl);

                // Check if both email and SMS were sent successfully
                if ($emailResponse && $smsResponse) {
                    echo '<script type="text/javascript">';
                    echo 'alert("OTP has been sent to your Email-Id and Mobile Number.");';
                    echo 'window.location.href = "otp.php";';
                    echo '</script>';
                    // Store the OTP, email, and phone in the session
                    $_SESSION["email"] = $email;
                    $_SESSION["mobile"] = $phone;
                    $_SESSION["otp"] = $otp;
                } else {
                    echo '<script type="text/javascript">';
                    echo 'alert("Failed to send OTP via email or SMS. Please try again later.");';
                    echo '</script>';
                }
            }
        } else {
            // No record found, show modal
            echo "<script> 
            $('#myModal').modal('show');
        </script>";
        }
    }




    // Close the database connection
    mysqli_close($conn);
    ?>

</body>

</html>

<div style="margin-top: 170px;">
    <?php include_once 'footer.php'; ?>
</div>