<?php require("userlogedin.php"); ?>
<?php include("nav.html"); ?>

<!DOCTYPE html>
<html>
<head>
  <title>Main Table Viewer</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <p>
    <?php
    // open db file
    $db = new PDO('sqlite:./database/priorydb.db');
    // Set errormode to exceptions
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //select * from all tables
    // need to add one more table for all reservations
    $login = "SELECT * FROM login";
    $equip = "SELECT * FROM equipment";
    $equipRes = "SELECT * FROM equipRes";
    $groupEquip = "SELECT * FROM groupEquip";
    $bedroom = "SELECT * FROM bedroom";
    $bedRes = "SELECT * FROM bedRes";
    $meetRoom = "SELECT * FROM meetRoom";
    $meetRes = "SELECT * FROM meetRes";
    $groupInfo = "SELECT * FROM groupInfo";
    $dayVisit = "SELECT * FROM dayVisit";
    $nightVisit = "SELECT * FROM nightVisit";
    $groupRooms = "SELECT * FROM groupRooms";
    $prioryEvent = "SELECT * FROM prioryEvent";
    $eventRoom = "SELECT * FROM eventRoom";
    $eventRoster = "SELECT * FROM eventRoster";
    $groupOvernight = "SELECT * FROM groupOvernight";
    $overnightBeds = "SELECT * FROM overnightBeds";

    // run all queries
    // $result = $db->query($reservations);
    $result1 = $db->query($login);
    $result2 = $db->query($equip);
    $result3 = $db->query($equipRes);
    $result4 = $db->query($bedroom);
    $result5 = $db->query($bedRes);
    $result6 = $db->query($meetRoom);
    $result7 = $db->query($meetRes);
    $result9 = $db->query($groupInfo);
    $result10 = $db->query($dayVisit);
    $result11 = $db->query($nightVisit);
    $result12 = $db->query($groupRooms);
    $result13 = $db->query($prioryEvent);
    $result14 = $db->query($eventRoom);
    $result15 = $db->query($eventRoster);
    $result16 = $db->query($groupOvernight);
    $result17 = $db->query($overnightBeds);
    $result18 = $db->query($groupEquip);

    echo "<h3>Login Info</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result1 as $tuple)
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

    echo "<h3>Equipment Info</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result2 as $tuple)
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

    echo "<h3>Equipment Reservation Info</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result3 as $tuple)
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

    echo "<h3>Group Equipment Reservations</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result18 as $tuple)
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

    echo "<h3>Bedroom Info</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result4 as $tuple)
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

    echo "<h3>Bedroom Reservation Info</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result5 as $tuple)
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
    echo "<h4>Notes:</h4>";
    echo "<ul>";
    echo "<li>Maximum of 19 guests in 10 rooms, if guests share rooms</li>";
    echo "</ul>";

    echo "<h3>Meeting Room Info</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result6 as $tuple)
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
    echo "<h4>Notes:</h4>";
    echo "<ul>";
    echo "<li>MultiPurpose Rooms arranged lecture style - tables and chairs in
    each room is comfortable for up to 40 people. MP Rooms 1 and 2 combined
    accomodates 150 people lecture style and 125 at tables. Groups larger than
    100 will be charged an extra $1 per person</li>
    <li>$20 garbage fee for catered meal in Sophia only</li>
    <li>Guadalupe Room has a coffee table and 6-8 padded chairs</li>
    <li>Internet access, overhead projector, TV/VCR, and garbage fee for catered
    meals are all included in the MultiPurpose room cost</li>";
    echo "</ul>";

    echo "<h3>Meeting Room Reservation Info</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result7 as $tuple)
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

    echo "<h3>Group Info</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result9 as $tuple)
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

    echo "<h3>Day Visit Info</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result10 as $tuple)
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

    echo "<h3>Night Visit Info</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result11 as $tuple)
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

    echo "<h3>Group Rooms Info</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result12 as $tuple)
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

    echo "<h3>Priory Event Info</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result13 as $tuple)
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

    echo "<h3>Event Room Info</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result14 as $tuple)
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

    echo "<h3>Event Roster Info</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result15 as $tuple)
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

    echo "<h3>Group Overnight Info</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result16 as $tuple)
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

    echo "<h3>Overnight Beds Info</h3>";
    echo "<table>";
    $i = 0;
    foreach ($result17 as $tuple)
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

    ?>
  </p>
</body>
</html>
