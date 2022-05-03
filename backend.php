<?php

$servername = "mysql.eecs.ku.edu";
$username = "s096c429";
$password = "aePh3aid";
$dbname = "s096c429";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

$query = "SELECT * FROM VISIT WHERE COUNTRY = 'United States'";
echo "<br>Based on the user input, I created the following query: <br>".$query."<br><br>";
$result = mysqli_query($conn,$query);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "CRUISENUM: " . $row["CRUISENUM"]. " - COUNTRY: " . $row["COUNTRY"]. " PORTNAME: " . $row["PORTNAME"]. "<br>";
    }
  } else {
    echo "0 results";
}
mysqli_close($conn);
?>