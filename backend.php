<?php

$servername = "mysql.eecs.ku.edu";
$databaseusername = "j708b537";
$password = "Lais4suf";
$dbname = "j708b537";

$page_to_load = $_GET['page'];

switch ($page_to_load) {

  case 'addData':
    // Create connection
    $conn = mysqli_connect($servername, $databaseusername, $password, $dbname);

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
    $seasonid = strval($username) . strval($seasonnum);


    //get weapon info
    $weaponname = $_POST["weaponname"];
    $weaponkills = $_POST["weaponkills"];
    $weapondeaths = $_POST["weapondeaths"];
    $weaponheadshots = $_POST["weaponheadshots"];
    $weaponacc = $_POST["weaponaccuracy"];

    $userbutton = isset($_POST['userbutton']);
    $seasonbutton = isset($_POST['seasonbutton']);
    $weaponbutton = isset($_POST['weaponbutton']);

    //user input
    if ($userbutton == 1) {
      if ($username == "") {
        echo "<div> error needs a username </div>";
      } else {
        $userfindquery = "SELECT * FROM Users WHERE UserID = '$username'";

        $resultfinduser = mysqli_query($conn, $userfindquery);

        if ($resultfinduser->num_rows > 0) {
          $userupdate = "UPDATE Users SET Wins = '$userwins', Losses = $userlosses, Matches = '$usermatches', Kills = '$userkills', 
      Deaths = '$userdeaths', Headshots = '$userheadshots' WHERE UserID = '$username'";

          $resultuserupdate = mysqli_query($conn, $userupdate);

          if ($resultfinduser->num_rows > 0) {
            // needed better response 
            echo "<div> it updated </div>";
          } else {
            echo "<div> it did not updated </div>";
          }
        } else {
          $userinputquery = "INSERT INTO Users(UserID, Wins, Losses, Matches, Kills, Deaths, Headshots)
      VALUES('$username', '$userwins', '$userlosses', '$usermatches', '$userkills', '$userdeaths', '$userheadshots')";

          $resultuser = mysqli_query($conn, $userinputquery);

          if ($resultfinduser->num_rows > 0) {
            // needed better response
            echo "<div> it inserted </div>";
          } else {
            echo "<div> it did not inserted </div>";
          }
        }
      }
    }

    //weapon input
    if ($weaponbutton == 1) {
      if ($username == ""  || $weaponname == "") {
        echo "<div> error needs a username and a weapon name</div>";
      } else {
        $weaponfindquery = "SELECT * FROM Weapons WHERE UserID = '$username' AND WeaponName = '$weaponname' ";

        $resultfindweapon = mysqli_query($conn, $weaponfindquery);

        if ($resultfindweapon->num_rows > 0) {
          $weaponupdate = "UPDATE Weapons SET Kills = '$weaponkills',Deaths = '$weapondeaths', Headshots = '$weaponheadshots', 
      HeadshotAccuracy = '$weaponacc' WHERE UserID = '$username' AND WeaponName = '$weaponname' ";

          $resultweaponupdate = mysqli_query($conn, $weaponupdate);

          if ($resultweaponupdate->num_rows > 0) {
            // needed better response 
            echo "<div> it updated </div>";
          } else {
            echo "<div> it did not updated </div>";
          }
        } else {
          $weaponinputquery = "INSERT INTO Weapons(UserID, WeaponName, Kills, Deaths, Headshots, HeadshotAccuracy)
      VALUES('$username', '$weaponname', '$weaponkills', '$weapondeaths', '$weaponheadshots', '$weaponacc')";

          $resultweapon = mysqli_query($conn, $weaponinputquery);

          if ($resultweapon->num_rows > 0) {
            // needed better response
            echo "<div> it inserted </div>";
          } else {
            echo "<div> it did not inserted </div>";
          }
        }
      }
    }

    //season input
    if ($seasonbutton == 1) {
      if ($username == "" || $seasonnum == "") {
        echo "<div> error needs a username and season number</div>";
      } else {
        $seasonfindquery = "SELECT * FROM SeasonsPlayed WHERE UserID = '$username' AND SeasonNum = '$seasonnum'";

        $resultfindseason = mysqli_query($conn, $seasonfindquery);

        if ($resultfindseason->num_rows > 0) {
          $seasonpdate = "UPDATE Seasons SET Wins = '$seasonwins', Losses = $seasonlosses, Matches = '$seasonmatches', 
      Kills = '$seasonkills', Deaths = '$seasondeaths', Headshots = '$seasonheadshots' WHERE SeasonID = '$seasonid'";

          $resultseasonupdate = mysqli_query($conn, $seasonpdate);

          if ($resultseasonupdate->num_rows > 0) {
            // needed better response 
            echo "<div> it updated </div>";
          } else {
            echo "<div> it did not updated </div>";
          }
        } else {
          $seasoninputquery = "INSERT INTO Seasons(SeasonID, Wins, Losses, Matches, Kills, Deaths, Headshots)
      VALUES('$seasonid', '$seasonwins', '$seasonlosses', '$seasonmatches', '$seasonkills', '$seasondeaths', '$seasonheadshots')";

          $resultseason = mysqli_query($conn, $seasoninputquery);

          $seasonPlayedinput = "INSERT INTO SeasonsPlayed(UserID, SeasonNum, SeasonID) 
      VALUES('$username', '$seasonnum', '$seasonid')";

          $resultseasonPlay = mysqli_query($conn, $seasonPlayedinput);

          if ($resultfindseason->num_rows > 0 && $resultseasonPlay->num_rows > 0) {
            // needed better response
            echo "<div> it inserted </div>";
          } else {
            echo "<div> it did not inserted </div>";
          }
        }
      }
    }

    mysqli_close($conn);
    break;

  case 'getData':
    $username = $_GET["username"];
    $season = $_GET["season"];
    $weapon = $_GET["weapon"];
    if ($season == "") {
      $season = "All";
    }
    if ($weapon == "") {
      $weapon = "All";
    }
    if ($username == "") {
      echo "
      <head>
        <meta charset='utf-8' />
        <title>647 project | view user data</title><link rel='stylesheet' type='text/css' href='style.css' />
      </head>
      <body class='background'>
        <div>Error: No username provided.</div>
        <div id='viewDataPageBlock'>
			    <a href='647_project.html'>Go back</a>
		    </div>
      </body>";
    }

    // Create connection
    $conn = mysqli_connect($servername, $databaseusername, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    if ($season == "All" && $weapon == "All") {
      $query = "SELECT * FROM Users WHERE UserID='$username'";
      $result = mysqli_query($conn, $query);
      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
          echo "User: " . $row["UserID"]
            . "\nWins: " . $row["Wins"]
            . "\nLosses: " . $row["Losses"]
            . "\nMatches" . $row["Matches"]
            . "\nKills: " . $row["Kills"]
            . "\nDeaths: " . $row["Deaths"]
            . "\nHeadshots: " . $row["Headshots"]
            . "<br>";
        }
      } else {
        echo "
        <head>
          <meta charset='utf-8' />
          <title>647 project | view user data</title><link rel='stylesheet' type='text/css' href='style.css' />
        </head>
        <body class='background'>
          <div>Error: 0 results. Either this user has no data or the username was entered incorrectly.</div>
          <div id='viewDataPageBlock'>
            <a href='647_project.html'>Go back</a>
          </div>
        </body>";
      }
    } elseif ($weapon != "All") {
      $query = "SELECT * FROM Weapons WHERE UserID='$username' AND WeaponName='$weapon'"; //UserID, WeaponName, Kills, Deaths, Headshots, HeadshotAccuracy
      $result = mysqli_query($conn, $query);
      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) { //UserID, Wins, Losses, Matches, Kills, Deaths, Headshots
          echo "User: " . $row["UserID"]
            . "\nWeapon: " . $row["WeaponName"]
            . "\nKills: " . $row["Kills"]
            . "\nDeaths: " . $row["Deaths"]
            . "\nHeadshots: " . $row["Headshots"]
            . "\nHeadshotAccuracy: " . $row["HeadshotAccuracy"]
            . "<br>";
        }
      } else {
        echo "
      <head>
        <meta charset='utf-8' />
        <title>647 project | view user data</title><link rel='stylesheet' type='text/css' href='style.css' />
      </head>
      <body class='background'>
        <div>Error: 0 results. Either this user has no data for this weapon or the username or weapon name was entered incorrectly.</div>
        <div id='viewDataPageBlock'>
          <a href='647_project.html'>Go back</a>
        </div>
      </body>";
      }
    } elseif ($season != "All") {
      $query = "SELECT SeasonID, Wins, Losses, Matches, Kills, Deaths, Headshots FROM Seasons, SeasonsPlayed WHERE SeasonsPlayed.SeasonNum='$season' AND SeasonsPlayed.UserID='$username' AND SeasonsPlayed.SeasonID=Seasons.SeasonID";
      $result = mysqli_query($conn, $query);
      if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) { //UserID, Wins, Losses, Matches, Kills, Deaths, Headshots
          echo "Season: " . $row["SeasonID"]
            . "\nWins: " . $row["Wins"]
            . "\nLosses: " . $row["Losses"]
            . "\nMatches" . $row["Matches"]
            . "\nKills: " . $row["Kills"]
            . "\nDeaths: " . $row["Deaths"]
            . "\nHeadshots: " . $row["Headshots"]
            . "<br>";
        }
      } else {
        echo "
      <head>
        <meta charset='utf-8' />
        <title>647 project | view user data</title><link rel='stylesheet' type='text/css' href='style.css' />
      </head>
      <body class='background'>
        <div>Error: 0 results. Either this user has no data for this season or the username was entered incorrectly.</div>
        <div id='viewDataPageBlock'>
          <a href='647_project.html'>Go back</a>
        </div>
      </body>";
      }
    }


    mysqli_close($conn);
    break;

  default:
    die("Invalid page received: " + $page_to_load);
    break;
}
