<?php require("userlogedin.php"); ?>

<?php include("nav.html"); ?>
<!DOCTYPE HTML>
<head>
  <title>Account Info</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class = "divclass">
    <h2>Account Info</h2>
    <a href = 'logout.php'><h3>Log Out</h3></a>
    <?php
    try
    {
      //open the sqlite database file
      $db = new PDO('sqlite:./database/priorydb.db');
      // Set errormode to exceptions
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $user = $_COOKIE["login"];

      $login = "Select f_name as 'First Name', l_name as 'Last Name',
      address as 'Address', email as 'Email', cellNo as 'Phone Number',
      username as 'Username', pwd as 'Password' FROM login WHERE username == '$user'";
      $dayVisit = "Select day as 'Date', tour as 'Tour Wanted' from dayVisit
      where pID == (Select pID from login where username == '$user')";
      $nightVisit = "Select checkIn as 'Check In Date', timeIn as 'Check In Time',
      checkOut as 'Check Out Date', timeOut as 'Time Out', dateRecvd as 'Date Res. Received'
      from nightVisit natural join bedRes natural join login where username == '$user'";
      $group = "Select groupName as 'Group Name', groupNeeds as 'Group Needs', tour as 'Tour Wanted'
      from groupInfo where contactPerson == (Select pID from login where username == '$user')";
      $equip = "Select type as 'Equip Type', groupName as 'GroupName', dateUsed as 'Date', timeIn as 'Time In',
      timeOut as 'Time Out', roomReq as 'Room Required' from equipment natural join equipRes
      natural join groupEquip natural join groupInfo natural join login where username == '$user'";
      $meetingRoom = "Select roomID as 'Room Name', dateUsed as 'Date', timeIn as 'Time In', timeOut as 'Time Out',
      numPpl as '# People' from login natural join groupInfo natural join groupRooms natural join
      meetRes where username == '$user'";
      $beds = "Select bedID as 'Bedroom Name', numPpl as '# People in Room', checkIn as 'Check In Date',
      timeIn as 'Time In', checkOut as 'Check Out Date', timeOut as 'Check Out Time',
      dateRecvd as 'Date Received' from bedRes natural join nightVisit natural join login where username == '$user'";

      $result = $db->query($login);
      $dayResult = $db->query($dayVisit);
      $nightsResult = $db->query($nightVisit);
      $groupResult = $db->query($group);
      $equipResult = $db->query($equip);
      $meetRoomResult = $db->query($meetingRoom);
      $bedResult = $db->query($beds);

      echo "<h3>Login Info</h3>";
      echo "<table>";
      $i = 0;
      foreach ($result as $tuple)
      {
        if ($i == "0") {
          echo "<tr style='font-weight:bold'>";
          foreach ($tuple as $key => $value)
          {
            if (!is_int($key)) {
              echo "<td>";
              print_r($key);
              echo "</td>";
            }
          }
          echo "</tr>";
        }
        echo "<tr>";
        foreach ($tuple as $key => $value)
        {
          if (!is_int($key)) {
            echo "<td>";
            print_r($value);
            echo "</td>";
          }
        }
        echo "</tr>";
        $i++;
      }
      echo "</table>";
      echo "<a href = 'update.php'>Update Account Info</a>";

      echo "<h3>Group Info</h3>";
      echo "<table>";
      $i = 0;
      foreach ($groupResult as $tuple)
      {
        if ($i == "0") {
          echo "<tr style='font-weight:bold'>";
          foreach ($tuple as $key => $value)
          {
            if (!is_int($key)) {
              echo "<td>";
              print_r($key);
              echo "</td>";
            }
          }
          echo "</tr>";
        }
        echo "<tr>";
        foreach ($tuple as $key => $value)
        {
          if (!is_int($key)) {
            echo "<td>";
            print_r($value);
            echo "</td>";
          }
        }
        echo "</tr>";
        $i++;
      }
      echo "</table>";

      echo "<h3>Single-Day Visits</h3>";
      echo "<table>";
      $i = 0;
      foreach ($dayResult as $tuple)
      {
        if ($i == "0") {
          echo "<tr style='font-weight:bold'>";
          foreach ($tuple as $key => $value)
          {
            if (!is_int($key)) {
              echo "<td>";
              print_r($key);
              echo "</td>";
            }
          }
          echo "</tr>";
        }
        echo "<tr>";
        foreach ($tuple as $key => $value)
        {
          if (!is_int($key)) {
            echo "<td>";
            print_r($value);
            echo "</td>";
          }
        }
        echo "</tr>";
        $i++;
      }
      echo "</table>";

      echo "<h3>Overnight Visits</h3>";
      echo "<table>";
      $i = 0;
      foreach ($nightsResult as $tuple)
      {
        if ($i == "0") {
          echo "<tr style='font-weight:bold'>";
          foreach ($tuple as $key => $value)
          {
            if (!is_int($key)) {
              echo "<td>";
              print_r($key);
              echo "</td>";
            }
          }
          echo "</tr>";
        }
        echo "<tr>";
        foreach ($tuple as $key => $value)
        {
          if (!is_int($key)) {
            echo "<td>";
            print_r($value);
            echo "</td>";
          }
        }
        echo "</tr>";
        $i++;
      }
      echo "</table>";

      echo "<h3>Bedroom Reservations</h3>";
      echo "<table>";
      $i = 0;
      foreach ($bedResult as $tuple)
      {
        if ($i == "0") {
          echo "<tr style='font-weight:bold'>";
          foreach ($tuple as $key => $value)
          {
            if (!is_int($key)) {
              echo "<td>";
              print_r($key);
              echo "</td>";
            }
          }
          echo "</tr>";
        }
        echo "<tr>";
        foreach ($tuple as $key => $value)
        {
          if (!is_int($key)) {
            echo "<td>";
            print_r($value);
            echo "</td>";
          }
        }
        echo "</tr>";
        $i++;
      }
      echo "</table>";

      echo "<h3>Meeting Room Reservations</h3>";
      echo "<table>";
      $i = 0;
      foreach ($meetRoomResult as $tuple)
      {
        if ($i == "0") {
          echo "<tr style='font-weight:bold'>";
          foreach ($tuple as $key => $value)
          {
            if (!is_int($key)) {
              echo "<td>";
              print_r($key);
              echo "</td>";
            }
          }
          echo "</tr>";
        }
        echo "<tr>";
        foreach ($tuple as $key => $value)
        {
          if (!is_int($key)) {
            echo "<td>";
            print_r($value);
            echo "</td>";
          }
        }
        echo "</tr>";
        $i++;
      }
      echo "</table>";

    }
    catch(PDOException $e)
    {
      die('Exception : '.$e->getMessage());
    }

    ?>
  </div>
</body>
