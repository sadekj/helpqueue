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
        	?>
            <li><?php echo $row["name"];?> 
    <input class="save" value="Helped" type="button" onclick="helped(<?php echo $row["id"] ?>)"/>
            </li>
            <?php
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
<html>
 <head>
  <title>Help Queue</title>
  <script type="text/javascript" src="jquery-2.1.3.min.js"></script>
 </head>
 <body>
<script type="text/javascript">


        function helped(tasktitle){

            var current_time = 123;
            var dataString = 'current_time='+ current_time + '&tasktitle=' + tasktitle;

            $.ajax({
                type: "POST",
                url: "helped.php",
                data: dataString,
                    
                    success: function() {
                        alert("HEPED!")
                        location.reload();
                        }
            });
            return false;

        }

</script>
</body>
</html>