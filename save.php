<?php
$servername = "localhost";
$username = "root";
$password = "letmein";
$dbname = "helpqueue";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$tasktitle = $_POST['tasktitle'];
$sql = "INSERT INTO student (id, name, helped)
VALUES (0, '".$tasktitle."', 'NO')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully, Help is on the way";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>