<?php
include '../dbConnection.php';

// Get the image ID and type (aadhaar or pan) from the query parameter
$id = intval($_GET['id']);
$type = $_GET['type'];

// Set the appropriate column based on the type
$column = ($type === 'pan') ? 'pan_photo' : 'aadhaar_photo';

// Prepare the SQL query to fetch the BLOB data
$query = "SELECT $column FROM sahajyoga_user_registration WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($imageData);
$stmt->fetch();
$stmt->close();
$conn->close();

// Set the content type for the image
header("Content-Type: image/jpeg"); // Adjust the content type based on your image format

// Output the image data
echo $imageData;
?>
