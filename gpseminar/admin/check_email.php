<?php
include('../dbConnection.php'); // Include your database connection file

if (isset($_POST['email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "SELECT * FROM sahajyoga_user_registration WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $fullName = $user['full_name'];
        $nameParts = explode(' ', $fullName);
        $firstName = $nameParts[0];
        $lastName = isset($nameParts[1]) ? $nameParts[1] : ''; // Hand
        // Return the user data in JSON format
        echo json_encode([
            'status' => 'success',
            'data' => [
                'fname' =>$user['first_name'],
                'lname' => $user['last_name'],
                'mobile' => $user['mobile'],
                'pan' => $user['pan_number'],
                'aadhaar' => $user['aadhaar_number'],
                'state'=>$user['city'],
                'country'=>$user['citizenship'],
                'district'=>$user['district'],


            ]
        ]);
    } else {
        echo json_encode(['status' => 'error']);
    }
}
