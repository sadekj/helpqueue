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
$sql = "SELECT * FROM student ORDER BY id ASC;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    ?>
    <ol>
    <?php
    while($row = $result->fetch_assoc()) {
    	if ($row[helped] == "YES"){
    		echo "<li><strike>" . $row["name"] . "</strike></li>";
    	}else{	
        	echo "<li>" . $row["name"] . "</li>";
    	}
    }
    ?>
	</ol>
    <?php
} else {
    echo "0 results";
}

$conn->close();
?>