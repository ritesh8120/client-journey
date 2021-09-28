
<?php
$servername = "localhost";
$username = "root";
$password = "";

// Creating connection
$conn = mysqli_connect($servername, $username, $password);
// Checking connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Creating a database named client
$sql = "CREATE DATABASE client";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully with the name client";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// closing connection
mysqli_close($conn);



?>