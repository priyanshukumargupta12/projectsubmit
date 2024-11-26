<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Submission Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="file"],
        button {
            margin-top: 5px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border: none;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Project Submission Portal</h1>
        <form id="submissionForm" action="upload.php" method="POST" enctype="multipart/form-data">
            <label for="studentName">Student Name:</label>
            <input type="text" id="studentName" name="studentName" required>

            <label for="universityRoll">University Roll Number:</label>
            <input type="text" id="universityRoll" name="universityRoll" required>

            <label for="classRoll">Class Roll Number:</label>
            <input type="text" id="classRoll" name="classRoll" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="projectFile">Upload Project (PDF only):</label>
            <input type="file" id="projectFile" name="projectFile" accept="application/pdf" required>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        const form = document.getElementById('submissionForm');
        form.addEventListener('submit', function (event) {
            const fileInput = document.getElementById('projectFile');
            const file = fileInput.files[0];
            if (file && file.type !== 'application/pdf') {
                alert('Only PDF files are allowed!');
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
