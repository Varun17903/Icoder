<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Replace with your actual database username
$password = ""; // Replace with your actual database password
$dbname = "icoder";

// Initialize variables for messages and redirect
$successMessage = "";
$redirectBack = false;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO enrollments (fullName, email, phone, course) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullName, $email, $phone, $course);

    // Set parameters from POST data
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    // Execute SQL statement
    if ($stmt->execute()) {
        // Success message
        $successMessage = "Enrollment successful!";
        $redirectBack = true; // Set flag to redirect after displaying message
    } else {
        // Error message
        $errorMessage = "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Enrollment Status</title>
<style>
    .success-message {
        display: <?php echo $successMessage ? 'block' : 'none'; ?>;
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #5cb85c;
        color: white;
        padding: 15px;
        border-radius: 5px;
    }
</style>
</head>
<body>
<?php if ($successMessage): ?>
    <div class="success-message"><?php echo $successMessage; ?></div>
<?php endif; ?>

<!-- JavaScript for redirecting after 2 seconds -->
<?php if ($redirectBack): ?>
    <script>
        setTimeout(function() {
            window.location.href = document.referrer; // Redirect to previous page
        }, 2000); // 3 seconds
    </script>
<?php endif; ?>
</body>
</html>
