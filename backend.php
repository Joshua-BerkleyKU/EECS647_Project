<?php


$servername = "mysql.eecs.ku.edu";
$username = "j708b537";
$password = "Lais4suf";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

$query = "SELECT * FROM VISIT WHERE 'true'";
echo "<br>Based on the user input, I created the following query: <br>".$query."<br><br>";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "CRUISENUM: " . $row["CRUISENUM"]. " - COUNTRY: " . $row["COUNTRY"]. " PORTNAME: " . $row["PORTNAME"]. "<br>";
    }
  } else {
    echo "0 results";
  }
  $conn->close();
?>