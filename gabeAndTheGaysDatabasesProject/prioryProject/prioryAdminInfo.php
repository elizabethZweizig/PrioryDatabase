<?php require("adminloggedin.php"); ?>

<!DOCTYPE HTML>
<head>
  <title>Priory Reservation Info</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php
  try
  {
    //open the sqlite database file
    $db = new PDO('sqlite:./database/priorydb.db');
    // Set errormode to exceptions
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // see all accounts
    $logins = "Select f_name as 'First Name', l_name as 'Last Name',
    address as 'Address', email as 'Email', cellNo as 'Phone Number',
    username as 'Username' FROM login";
    // see all groups
    $group = "Select groupName as 'Group Name', groupNeeds as 'Group Needs', tour as 'Tour Wanted'
    from groupInfo";
    // see all day visits
    $dayVisits = "Select day as 'Date', tour as 'Tour Wanted' from dayVisit";
    // see all overnight visits
    $nightVisits = "Select f_name as 'First Name', l_name as 'Last Name',
    checkIn as 'Check In Date', timeIn as 'Check In Time', checkOut as 'Check Out Date',
    timeOut as 'Time Out', dateRecvd as 'Date Res. Received'
    from nightVisit natural join bedRes natural join login";
    // see all bedroom reservations
    $beds = "Select bedID as 'Bedroom Name', numPpl as '# People in Room', checkIn as 'Check In Date',
    timeIn as 'Time In', checkOut as 'Check Out Date', timeOut as 'Check Out Time',
    dateRecvd as 'Date Received' from bedRes natural join nightVisit";
    // see all meeting room reservations
    $meetingRoom = "Select roomID as 'Room Name', dateUsed as 'Date', timeIn as 'Time In', timeOut as 'Time Out',
    numPpl as '# People' from login natural join groupInfo natural join groupRooms natural join
    meetRes";
    // see all groups' equipment reservations
    $equip = "Select type as 'Equip Type', groupName as 'GroupName', dateUsed as 'Date', timeIn as 'Time In',
    timeOut as 'Time Out', roomReq as 'Room Required' from equipment natural join equipRes
    natural join groupEquip natural join groupInfo";


    $loginResult = $db->query($logins);
    $groupResult = $db->query($group);
    $dayResult = $db->query($dayVisits);
    $nightResult = $db->query($nightVisits);
    $bedResult = $db->query($beds);
    $meetResult = $db->query($meetingRoom);
    $equipResult = $db->query($equip);

    echo "<h3>All Accounts</h3>";
    echo "<table>";
    $i = 0;
    foreach ($loginResult as $tuple)
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

    echo "<h3>Groups</h3>";
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

    echo "<h3>Day Visits</h3>";
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
    foreach ($nightResult as $tuple)
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
    foreach ($meetResult as $tuple)
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

    echo "<h3>Equipment Reservations</h3>";
    echo "<table>";
    $i = 0;
    foreach ($equipResult as $tuple)
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
</body>
