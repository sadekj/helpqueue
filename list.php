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
<form method="post" name="tasktitleform" action="">
    <div class="title">
        <h1 id="message"></h1>
    </div>
    <input class="tasktitle" id="tasktitle" name="tasktitle" type="hidden" value='<?php echo $row["id"] ?>' />
    <input class="save" value="Helped" type="button" />
</form>

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
$(document).ready(function(){     

        $('.save').click(function(e){ 

            var current_time = 123;
            var tasktitle = $("input#tasktitle").val();
            var dataString = 'current_time='+ current_time + '&tasktitle=' + tasktitle;
            alert(dataString)

            $.ajax({
                type: "POST",
                url: "helped.php",
                data: dataString,
                    
                    success: function() {
                        alert("HEPED!")
                        $('.title').html("");
                        $('#message').html("✓ Logged!")
                        .hide()
                     
                            .fadeIn(1500, function() {
                            $('#message').append("");
                            });
                        }
            });
            return false;

        });
    });
</script>
</body>
</html>