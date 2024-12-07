<?php
include '../dbConnection.php'; // Include your database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $feedback = $_POST['feedback'];

    

    // Update the approval status in the database
    $query = "UPDATE sahajyoga_user_registration SET feedback = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $feedback, $id);

    if ($stmt->execute()) {
        echo  json_encode("Approval status updated successfully.");
    } else {
        echo json_encode( "Error updating approval status: " . $conn->error);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode( "Invalid request method.");
}
?>
