<?php


$servername = "mysql.eecs.ku.edu";
$databaseusername = "j708b537";
$password = "Lais4suf";
$dbname = "j708b537";

//get user info
$username = $_POST["username"];
$userwins = $_POST["userwins"];
$userlosses = $_POST["userlosses"];
$usermatches = $_POST["usermatches"];
$userkills = $_POST["userkills"];
$userdeaths = $_POST["userdeaths"];
$userheadshots = $_POST["userheadshots"];

//get season info
$seasonnum = $_POST["seasonnum"];
$seasonwins = $_POST["seasonwins"];
$seasonlosses = $_POST["seasonlosses"];
$seasonmatches = $_POST["seasonmatches"];
$seasonkills = $_POST["seasonkills"];
$seasondeaths = $_POST["seasondeaths"];
$seasonheadshots = $_POST["seasonheadshots"];
$seasonid = $username + $seasonnum;

//get weapon info
$weaponname = $_POST["weaponname"];
$weaponkills = $_POST["weaponkills"];
$weapondeaths = $_POST["weapondeaths"];
$weaponheadshots = $_POST["weaponheadshots"];
$weaponacc = $_POST["weaponacc"];

echo "<div> $username </div>";
echo "<div> this is what $weaponname is </div>";

// Create connection
$conn = mysqli_connect($servername, $databaseusername, $password,$dbname);

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