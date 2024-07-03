<?php
// Database connection parameters
$servername = "localhost"; // Replace with your MySQL server name
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "icoder"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input
    $full_name = mysqli_real_escape_string($conn, $_POST['fullName']);
    $email = mysqli_real_escape_string($conn, $_POST['signupEmail']);
    $password = mysqli_real_escape_string($conn, $_POST['signupPassword']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $check_email_query = "SELECT * FROM users WHERE email='$email'";
    $check_email_result = $conn->query($check_email_query);

    if ($check_email_result->num_rows > 0) {
        echo "Email already exists";
    } else {
        // Insert new user into database
        $insert_query = "INSERT INTO users (full_name, email, password) VALUES ('$full_name', '$email', '$hashed_password')";

        if ($conn->query($insert_query) === TRUE) {
            echo "New record created successfully";
            // Redirect to login page or homepage after successful registration
            header("Location: index.html"); // Redirect to homepage
            exit();
        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }
}

// Close connection
$conn->close();
?>
