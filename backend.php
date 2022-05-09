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
$seasonid = strval($username).strval($seasonnum);


//get weapon info
$weaponname = $_POST["weaponname"];
$weaponkills = $_POST["weaponkills"];
$weapondeaths = $_POST["weapondeaths"];
$weaponheadshots = $_POST["weaponheadshots"];
$weaponacc = $_POST["weaponaccuracy"];

$button1 = isset($_POST['userbutton']);
$button2 = isset($_POST['seasonbutton']);
$button3 = isset($_POST['weaponbutton']);
echo "<div> button user is $button1 </div>";
echo "<div> button season is $button2 </div>";
echo "<div> button weapon is $button3 </div>";
/*
//user input
if ($username == "" )
{
  echo "<div> error needs a username </div>";
}
else
{
  $userfindquery = "SELECT * FROM Users WHERE UserID = '$username'";

  $resultfinduser = mysqli_query($conn,$userfindquery);

  if ($resultfinduser->num_rows > 0) {
    $userupdate = "UPDATE Users SET Wins = '$userwins', Losses = $userlosses, Matches = '$usermatches', Kills = '$userkills', 
    Deaths = '$userdeaths', Headshots = '$userheadshots' WHERE UserID = '$username'";

    $resultuserupdate = mysqli_query($conn,$userupdate);

    if ($resultfinduser->num_rows > 0)
    {
      // needed better response 
      echo "<div> it updated </div>";
    }
    else
    {
      echo "<div> it did not updated </div>";
    }
  } else {
    $userinputquery = "INSERT INTO Users(UserID, Wins, Losses, Matches, Kills, Deaths, Headshots)
    VALUES('$username', '$userwins', '$userlosses', '$usermatches', '$userkills', '$userdeaths', '$userheadshots')";

    $resultuser = mysqli_query($conn,$userinputquery);

    if ($resultfinduser->num_rows > 0)
    {
      // needed better response
      echo "<div> it inserted </div>";
    }
    else
    {
      echo "<div> it did not inserted </div>";
    }
  }
}
*/
/*
//weapon input
if ($username == ""  && $weaponname == "")
{
  echo "<div> error needs a username and a weapon name</div>";
}
else
{
  $weaponfindquery = "SELECT * FROM Weapons WHERE UserID = '$username' AND WeaponName = '$weaponname' ";

  $resultfindweapon = mysqli_query($conn,$weaponfindquery);

  if ($resultfindweapon->num_rows > 0) {
    $weaponupdate = "UPDATE Weapons SET Kills = '$weaponkills',Deaths = '$weapondeaths', Headshots = '$weaponheadshots', 
    HeadshotAccuracy = '$weaponacc' WHERE UserID = '$username' AND WeaponName = '$weaponname' ";

    $resultweaponupdate = mysqli_query($conn,$weaponupdate);

    if ($resultweaponupdate->num_rows > 0)
    {
      // needed better response 
      echo "<div> it updated </div>";
    }
    else
    {
      echo "<div> it did not updated </div>";
    }
  } else {
    $weaponinputquery = "INSERT INTO Weapons(UserID, WeaponName, Kills, Deaths, Headshots, HeadshotAccuracy)
    VALUES('$username', '$weaponname', '$weaponkills', '$weapondeaths', '$weaponheadshots', '$weaponacc')";

    $resultweapon = mysqli_query($conn,$weaponinputquery);

    if ($resultweapon->num_rows > 0)
    {
      // needed better response
      echo "<div> it inserted </div>";
    }
    else
    {
      echo "<div> it did not inserted </div>";
    }
  }
}
*/
/*
//season input
if ($username == "" && $seasonnum == "")
{
  echo "<div> error needs a username and season number</div>";
}
else
{
  $seasonfindquery = "SELECT * FROM SeasonsPlayed WHERE UserID = '$username' AND SeasonNum = '$seasonnum'";

  $resultfindseason = mysqli_query($conn,$seasonfindquery);

  if ($resultfindseason->num_rows > 0) {
    $seasonpdate = "UPDATE Seasons SET Wins = '$seasonwins', Losses = $seasonlosses, Matches = '$seasonmatches', 
    Kills = '$seasonkills', Deaths = '$seasondeaths', Headshots = '$seasonheadshots' WHERE UserID = '$seasonid'";

    $resultseasonupdate = mysqli_query($conn,$seasonpdate);

    if ($resultseasonupdate->num_rows > 0)
    {
      // needed better response 
      echo "<div> it updated </div>";
    }
    else
    {
      echo "<div> it did not updated </div>";
    }
  } else {
    $seasoninputquery = "INSERT INTO Seasons(SeasonID, Wins, Losses, Matches, Kills, Deaths, Headshots)
    VALUES('$seasonid', '$seasonwins', '$seasonlosses', '$seasonmatches', '$seasonkills', '$seasondeaths', '$seasonheadshots')";

    $resultseason = mysqli_query($conn,$seasoninputquery);

    $seasonPlayedinput = "INSERT INTO SeasonsPlayed(UserID, SeasonNum, SeasonID) 
    VALUES('$username', '$seasonnum', '$seasonid')";

    $resultseasonPlay = mysqli_query($conn,$seasonPlayedinput);

    if ($resultfindseason->num_rows > 0 && $resultseasonPlay->num_rows > 0)
    {
      // needed better response
      echo "<div> it inserted </div>";
    }
    else
    {
      echo "<div> it did not inserted </div>";
    }
  }
}
*/

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