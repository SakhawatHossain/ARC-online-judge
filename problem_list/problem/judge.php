<?php
session_start();
require '../../db_connect/db_connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $problemId = htmlspecialchars($_POST['problem_id']);
    $code = $_POST['code'];

    // Change the current directory
    $currentDir = "C:\\xampp\\htdocs\\OJ\\problem_list\\problem";
    chdir($currentDir);

    // Save the code to a temporary file
    $cppFile = "main.cpp";
    file_put_contents($cppFile, $code);

    // Compile the code
    $exeFile = "a.exe";
    $compileCommand = "g++ \"$cppFile\" -o \"$exeFile\" 2>&1";
    $compileOutput = [];
    $compileReturnVar = 0;
    exec($compileCommand, $compileOutput, $compileReturnVar);

    if ($compileReturnVar !== 0) {
        echo "Compilation failed with return code $compileReturnVar.<br>";
        echo "Error Output:<br>" . nl2br(implode("\n", $compileOutput));
        exit;
    }

    // Database connection
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'arcoj';
    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    $query = "SELECT test_input, test_output FROM problem WHERE problem_id = $problemId";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $input = $row['test_input'];
        $expectedOutput = $row['test_output'];
    } else {
        echo "No data found in the problems table.<br>";
        exit;
    }

    // Run the executable with the test input
    $descriptorspec = [
        0 => ["pipe", "r"],
        1 => ["pipe", "w"],
        2 => ["pipe", "w"]
    ];

    $process = proc_open($exeFile, $descriptorspec, $pipes);
    if (is_resource($process)) {
        fwrite($pipes[0], $input);
        fclose($pipes[0]);

        $output = stream_get_contents($pipes[1]);
        fclose($pipes[1]);

        $errorOutput = stream_get_contents($pipes[2]);
        fclose($pipes[2]);

        proc_close($process);

        $user_id = $_SESSION['user_id'];
        if (trim($output) == trim($expectedOutput)) {
            echo "verdict: Accepted!";

            $sql = "INSERT INTO problem_status (problem_id, user_id, verdict) VALUES ('$problemId', '$user_id', 'Accepted')";
            if ($conn->query($sql) === TRUE) {
                $sql = "
                    UPDATE user u
                    JOIN problem_status ps ON u.user_id = ps.user_id
                    LEFT JOIN (
                        SELECT user_id, problem_id
                        FROM problem_status
                        WHERE verdict = 'Accepted'
                        AND user_id = $user_id
                        AND problem_id = $problemId
                        GROUP BY user_id, problem_id
                        HAVING COUNT(verdict) = 1
                    ) filtered_ps ON u.user_id = filtered_ps.user_id AND ps.problem_id = filtered_ps.problem_id
                    SET u.rating = u.rating + 10
                    WHERE filtered_ps.user_id IS NOT NULL
                    AND ps.verdict = 'Accepted'
                    AND ps.user_id = $user_id
                    AND ps.problem_id = $problemId;
                ";

                if (!$conn->query($sql)) {
                    echo 'Query error: ' . $conn->error;
                }
            } else {
                echo " but Error updating Records: " . $conn->error;
            }
        } else {
            echo "verdict: Wrong Answer!";
            $sql = "INSERT INTO problem_status (problem_id, user_id, verdict) VALUES ('$problemId', '$user_id', 'Wrong Answer')";
            if (!$conn->query($sql)) {
                echo " but Error updating Records: " . $conn->error;
            }
        }
    } else {
        echo "Failed to execute $exeFile.<br>";
    }

    $conn->close();
}
?>
