<?php
include '../dbConnection.php'; // Include your database connection
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $approval = $_POST['approval'];

    // Update the approval status in the database
    $query = "UPDATE sahajyoga_user_registration SET approval = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $approval, $id);

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
