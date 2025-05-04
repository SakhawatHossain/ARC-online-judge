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
    $title = $_POST['title'];
    $description = $_POST['description'];
    $input = $_POST['input'];
    $output = $_POST['output'];
    $example = $_POST['example'];
    $test_input = $_POST['test_input'];
    $test_output = $_POST['test_output'];
    $difficulty = $_POST['difficulty'];
    $editorial = $_POST['editorial'];

    // Log the received data for debugging
    error_log("Received POST data:\n title=$title,\n description=$description,\n input=$input,\n output=$output,\n example=$example,\n test_input=$test_input,\n test_output=$test_output,\n difficulty=$difficulty,\n editorial=$editorial");

    // Prepare SQL query
    $sql = "INSERT INTO problems (title, description, input, output, example, test_input, test_output, difficulty, editorial) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    error_log("SQL Query: $sql");
    error_log("Values: title=$title, description=$description, input=$input, output=$output, example=$example, test_input=$test_input, test_output=$test_output, difficulty=$difficulty, editorial=$editorial");

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssssssss", $title, $description, $input, $output, $example, $test_input, $test_output, $difficulty, $editorial);

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
