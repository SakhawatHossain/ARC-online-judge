<?php
// Include your database connection
require_once 'db_connection.php';

// Ensure the request is a POST request and contains the user_id
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    // Sanitize and assign POST value to a variable
    $user_id = $_POST['user_id'];

    // Prepare the SQL query to delete the user by user_id
    $sql = "DELETE FROM user WHERE user_id = ?";
    if ($stmt = $conn->prepare($sql)) {
        // Bind the user_id to the SQL query
        $stmt->bind_param("i", $user_id);

        // Execute the statement and check for errors
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);  // Respond with success if the deletion is successful
        } else {
            echo json_encode(['success' => false, 'error' => $stmt->error]);  // Respond with an error message if failed
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Failed to prepare statement: ' . $conn->error]);
    }

    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method or missing user_id']);
}
?>
