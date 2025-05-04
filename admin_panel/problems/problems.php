<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "arcoj";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT problem_id, title, description, input, output, test_input, test_output, difficulty, example, editorial FROM problem";
$result = $conn->query($sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    error_log(print_r($_POST, true)); // Log the POST data for debugging

    // Check if 'problem_id' is set for updating an existing record
    if (isset($_POST['problem_id'])) {
        $problem_id = $_POST['problem_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $input = $_POST['input'];
        $output = $_POST['output'];
        $test_input = $_POST['test_input'];
        $test_output = $_POST['test_output'];
        $difficulty = $_POST['difficulty'];
        $example = $_POST['example'];
        $editorial = $_POST['editorial'];

        $sql = "UPDATE problem SET title='$title', description='$description', input='$input', output='$output',
                test_input='$test_input', test_output='$test_output', difficulty='$difficulty', example='$example',
                editorial='$editorial' WHERE problem_id='$problem_id'";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // Handle adding a new problem
        $title = $_POST['title'];
        $description = $_POST['description'];
        $input = $_POST['input'];
        $output = $_POST['output'];
        $test_input = $_POST['test_input'];
        $test_output = $_POST['test_output'];
        $difficulty = $_POST['difficulty'];
        $example = $_POST['example'];
        $editorial = $_POST['editorial'];

        $sql = "INSERT INTO problem (title, description, input, output, test_input, test_output, difficulty, example, editorial) 
                VALUES ('$title', '$description', '$input', '$output', '$test_input', '$test_output', '$difficulty', '$example', '$editorial')";

        if ($conn->query($sql) === TRUE) {
            echo "New problem added successfully";
        } else {
            echo "Error adding new problem: " . $conn->error;
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Admin | Problems</title> 
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <a href="#" class="logo clr-transition"><img src="../arc-removebg-preview.png" alt="Logo" style="position: absolute; top: 0px; left: 0px; width: 100px; z-index: 10;"></a>
            </div>

            <span class="logo_name">  OJ</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="../index.php"><i class="uil uil-estate"></i><span class="link-name">Dashboard</span></a></li>
                <li><a href="../users/users.php"><i class="uil uil-user"></i><span class="link-name">Users</span></a></li>
                <li><a href="../problems/problems.php"><i class="uil uil-chart"></i><span class="link-name">Problems</span></a></li>
                <li><a href="../Blog/blog.php"><i class="uil uil-file-alt"></i><span class="link-name">Blogs</span></a></li>
                <li><a href="../Contest_request/contest_request.php"><i class="uil uil-comments"></i><span class="link-name">Request Messages</span></a></li>
            </ul>
            <ul class="logout-mode">
                <li><a href="#"><i class="uil uil-signout"></i><span class="link-name">Logout</span></a></li>
                <li class="mode">
                    <a href="#"><i class="uil uil-moon"></i><span class="link-name">Dark Mode</span></a>
                    <div class="mode-toggle"><span class="switch"></span></div>
                </li>
            </ul>
        </div>
    </nav>


    <section class="dashboard">
        <div class="top">
            <img src="../images/arc-admin-logo.jpg" alt="">
        </div>

        <div class="dash-content">
            <div class="activity">
                <div class="title">
                    <i class="uil uil-chart"></i>
                    <span class="text">All Problemss</span>
                </div>

                <div class="container">
                    <div class="header">
                    <button class="add-problem-btn" onclick="showAddProblemForm()">Add Problem</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Problem ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Input</Input></th>
                                <th>Output</th>
                                <th>Example</th>
                                <th>Test Input</th>
                                <th>Test Output</th>
                                <th>Difficulty</th>
                                <th>Editorial</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="problemTableBody">
                        <?php
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>
                                            <td>" . $row["problem_id"] . "</td>                          
                                            <td>" . $row["title"] . "</td>
                                            <td>" . $row["description"] . "</td>
                                            <td>" . $row["input"] . "</td>
                                            <td>" . $row["output"] . "</td>
                                            <td>" . $row["example"] . "</td>
                                            <td>" . $row["test_input"] . "</td>
                                            <td>" . $row["test_output"] . "</td>
                                            <td>" . $row["difficulty"] . "</td>
                                            <td>" . $row["editorial"] . "</td>
                                            <td>
                                            <button class='edit-btn' onclick='openEditForm(this)'>Edit</button>
                              
                                            </td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7'>No problems found</td></tr>";
                            }
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            

<div class="modal" id="addProblemModal">
    <div class="modal-content">
        <span class="close" onclick="hideAddProblemForm()">&times;</span>
        <h2>Add Problem</h2>
        <form id="addProblemForm" onsubmit="addProblem(event)">
            <input type="hidden" id="problemId" name="problemId">

            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="description">Description:</label>
            <input type="text" id="description" name="description" required>

            <label for="input">Input:</label>
            <input type="text" id="input" name="input" required>

            <label for="output">Output:</label>
            <input type="text" id="output" name="output" required>

            <label for="example">Example:</label>
            <input type="text" id="example" name="example" required>

            <label for="testInput">Test Input:</label>
            <input type="text" id="testInput" name="test_input" required>

            <label for="testOutput">Test Output:</label>
            <input type="text" id="testOutput" name="test_output" required>

            <label for="difficulty">Difficulty:</label>
            <input type="text" id="difficulty" name="difficulty" required>

            <label for="editorial">Editorial:</label>
            <textarea id="editorial" name="editorial" required></textarea>

            <button type="submit">Add Problem</button>
        </form>
    </div>
</div>

                <div id="editProblemModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="hideEditProblemModal()">&times;</span>
        <h2>Edit Problem</h2>
        <form id="editProblemForm" onsubmit="updateProblem(event)">
            <input type="hidden" id="editProblemId" name="problem_id">
            
            <label for="editTitle">Title:</label>
            <input type="text" id="editTitle" name="title" required>
            
            <label for="editDescription">Description:</label>
            <textarea id="editDescription" name="description" required></textarea>
            
            <label for="editInput">Input:</label>
            <input type="text" id="editInput" name="input" required>
            
            <label for="editOutput">Output:</label>
            <input type="text" id="editOutput" name="output" required>
            
            <label for="editExample">Example:</label>
            <input type="text" id="editExample" name="example" required>
            
            <label for="editTestInput">Test Input:</label>
            <input type="text" id="editTestInput" name="test_input" required>
            
            <label for="editTestOutput">Test Output:</label>
            <input type="text" id="editTestOutput" name="test_output" required>
            
            <label for="editDifficulty">Difficulty:</label>
            <input type="text" id="editDifficulty" name="difficulty" required>
            
            <label for="editEditorial">Editorial:</label>
            <textarea id="editEditorial" name="editorial" required></textarea>
            
            <button type="submit">Update Problem</button>
        </form>
    </div>
</div>

                
            </div>
        </div>

    </section>

             


    <script src="problemscript.js"></script>
</body>
</html>