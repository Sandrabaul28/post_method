<?php
$servername = "localhost"; // Change this if your MySQL server is running on a different host
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "form"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table
$sql = "CREATE TABLE if not exists users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    address TEXT,
    email VARCHAR(100),
    gender ENUM('male', 'female', 'other')
)";

if ($conn->query($sql) === TRUE) {
    // echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close connection
// $conn->close();
?>
