<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectsubmission";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentName = $_POST['studentName'];
    $universityRoll = $_POST['universityRoll'];
    $classRoll = $_POST['classRoll'];
    $email = $_POST['email'];

    // File upload handling
    $file = $_FILES['projectFile'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed = array('pdf');

    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) { // Max 5MB
                $newFileName = uniqid('', true) . "." . $fileExt;
                $fileDestination = 'uploads/' . $newFileName;

                if (!is_dir('uploads')) {
                    mkdir('uploads');
                }

                move_uploaded_file($fileTmpName, $fileDestination);

                // Insert into database
                $sql = "INSERT INTO submissions (studentName, universityRoll, classRoll, email, filePath) 
                        VALUES ('$studentName', '$universityRoll', '$classRoll', '$email', '$fileDestination')";

                if ($conn->query($sql) === TRUE) {
                    echo "Submission successful!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Your file is too large.";
            }
        } else {
            echo "There was an error uploading your file.";
        }
    } else {
        echo "Only PDF files are allowed.";
    }
}

$conn->close();
?>
