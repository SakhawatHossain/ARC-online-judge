<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arcoj";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the data is coming from POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from POST request
    $user_id = $_POST['user_id'];
    $image = $_POST['photo'];
    $name = $_POST['name'];
    $university = $_POST['university'];
    $email = $_POST['email'];
    $rating = $_POST['rating'];

    // Log the received data for debugging
    error_log("Received POST data:\n user_id=$user_id,\n image=$image,\n name=$name,\n university=$university,\n email=$email,\n rating=$rating");

    // Prepare SQL query
    $sql = "UPDATE user SET picture = ?, handle = ?, university = ?, email = ?, rating = ? WHERE user_id = ?";
    error_log("SQL Query: $sql");
    error_log("Values: picture=$image,\n handle=$name,\n university=$university,\n email=$email,\n rating=$rating,\n user_id=$user_id");

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssdi", $image, $name, $university, $email, $rating, $user_id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            $error_message = $stmt->error;
            error_log("Failed to execute query: " . $error_message);
            echo json_encode(['success' => false, 'error' => "Failed to execute query: " . $error_message]);
        }

        $stmt->close();
    } else {
        $error_message = $conn->error;
        error_log("Failed to prepare statement: " . $error_message);
        echo json_encode(['success' => false, 'error' => "Failed to prepare statement: " . $error_message]);
    }

    $conn->close();
} else {
    error_log("Invalid request method");
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}

error_log("Request received: " . json_encode($_POST));

?>
