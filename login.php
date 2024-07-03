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

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['loginEmail'];
    $password = $_POST['loginPassword'];

    // Validate input (optional)
    // Implement further validation if needed

    // SQL query to fetch user details based on email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User found, verify password
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, log in user
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['full_name'];
            // Redirect to a logged-in page or homepage
            header("Location: index.html"); // Redirect to homepage
            exit();
        } else {
            // Password is incorrect
            echo "Invalid password";
        }
    } else {
        // User not found
        echo "User not found";
    }
}

// Close connection
$conn->close();
?>
