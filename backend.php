<?php


$servername = "mysql.eecs.ku.edu";
$databaseusername = "j708b537";
$password = "Lais4suf";
$dbname = "j708b537";


// Create connection
$conn = mysqli_connect($servername, $databaseusername, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";


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

if ($username == "" )
{
  echo "<div> error needs a username </div>";
}
else
{
  //need to look and see if there is a user with the same name in the database
  //if so then we need to change this to and update 

  $userinputquery = "INSERT INTO Users(UserID, Wins, Losses, Matches, Kills, Deaths, Headshots)
  VALUES($username, $userwins, $userlosses, $usermatches, $userkills, $userdeaths, $userheadshots)";
  $resultuser = mysqli_query($conn,$userinputquery);

  if ($resultuser->num_rows > 0) {
    // output data of each row
    while($row = $resultuser->fetch_assoc()) {
      echo "UserID: " . $username["CRUISENUM"]. " - Wins: " . $userwins["COUNTRY"]. " Headshots: " . $userheadshots["PORTNAME"]. "<br>";
    }
  } else {
    echo "0 results";
}
}

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