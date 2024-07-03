<?php
$hostname = "localhost";  // Change this if your MySQL server is hosted elsewhere
$username = "root";       // Your MySQL username
$password = "";           // Your MySQL password (leave blank if no password is set)
$database = "icoder";     // The name of your database (in this case, 'icoder')

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
