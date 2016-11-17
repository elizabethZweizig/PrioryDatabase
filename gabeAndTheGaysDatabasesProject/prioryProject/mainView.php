<!DOCTYPE html>
<html>
<body>
<h2>All Tables Here</h2>
<p>
  <?php
    // open db file
    $db = new PDO('sqlite:./database/priorydb.db');
    // Set errormode to exceptions
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //select * from all tables
    $login = "SELECT * FROM login";
    $equip = "SELECT * FROM equipment";
    $equipRes = "SELECT * FROM equipRes";
    $bedroom = "SELECT * FROM bedroom";
    $bedRes = "SELECT * FROM bedRes";
    $meetRoom = "SELECT * FROM meetRoom";
    $meetRes = "SELECT * FROM meetRes";
    $program = "SELECT * FROM program";
    $programRoster = "SELECT * FROM programRoster";

    // run all queries
    $result1 = $db->query($login);
    $result2 = $db->query($equip);
    $result3 = $db->query($equipRes);
    $result4 = $db->query($bedroom);
    $result5 = $db->query($bedRes);
    $result6 = $db->query($meetRoom);
    $result7 = $db->query($meetRes);
    $result8 = $db->query($program);
    $result9 = $db->query($programRoster);

    echo "<h3>Login Info</h3>";
    echo "<table border='1'>";
    echo "<tr style='font-weight:bold'><td>pID</td><td>f_name</td><td>l_name</td><td>address</td><td>email</td><td>cellNo</td><td>pwd</td><td>extraNeeds</td><td>admin</td></tr>";
    foreach($result1 as $tuple) {
      echo "<tr><td>$tuple[pID]</td><td>$tuple[f_name]</td><td>$tuple[l_name]</td><td>$tuple[address]</td><td>$tuple[email]</td><td>$tuple[cellNo]</td><td>$tuple[pwd]</td><td>$tuple[extraNeeds]</td><td>$tuple[admin]</td></tr>";
    }
    echo "</table>";

    echo "<h3>Equipment Info</h3>";
    echo "<table border='1'>";
    echo "<tr style='font-weight:bold'><td>equipID</td><td>type</td><td>equipRate</td></tr>";
    foreach($result2 as $tuple) {
      echo "<tr><td>$tuple[equipID]</td><td>$tuple[type]</td><td>$tuple[equipRate]</td></tr>";
    }
    echo "</table>";

    echo "<h3>Equipment Reservation Info</h3>";
    echo "<table border='1'>";
    echo "<tr style='font-weight:bold'><td>equipID</td><td>pID</td><td>dateUsed</td><td>timeIn</td><td>timeOut</td></tr>";
    foreach($result3 as $tuple) {
      echo "<tr><td>$tuple[equipID]</td><td>$tuple[pID]</td><td>$tuple[dateUsed]</td><td>$tuple[timeIn]</td><td>$tuple[timeOut]</td></tr>";
    }
    echo "</table>";

    echo "<h3>Bedroom Info</h3>";
    echo "<table border='1'>";
    echo "<tr style='font-weight:bold'><td>bedID</td><td>maxPpl</td><td>roomRate</td></tr>";
    foreach($result4 as $tuple) {
      echo "<tr><td>$tuple[bedID]</td><td>$tuple[maxPpl]</td><td>$tuple[roomRate]</td></tr>";
    }
    echo "</table>";

    echo "<h3>Bedroom Reservation Info</h3>";
    echo "<table border='1'>";
    echo "<tr style='font-weight:bold'><td>pID</td><td>bedID</td><td>numPpl</td><td>checkIn</td><td>checkOut</td><td>timeIn</td><td>timeOut</td><td>dateRecvd</td></tr>";
    foreach($result5 as $tuple) {
      echo "<tr><td>$tuple[pID]</td><td>$tuple[bedID]</td><td>$tuple[numPpl]</td><td>$tuple[checkIn]</td><td>$tuple[checkOut]</td><td>$tuple[timeIn]</td><td>$tuple[timeOut]</td><td>$tuple[dateRecvd]</td></tr>";
    }
    echo "</table>";

    echo "<h3>Meeting Room Info</h3>";
    echo "<table border='1'>";
    echo "<tr style='font-weight:bold'><td>roomID</td><td>maxPpl</td><td>meetRate</td></tr>";
    foreach($result6 as $tuple) {
      echo "<tr><td>$tuple[roomID]</td><td>$tuple[maxPpl]</td><td>$tuple[meetRate]</td></tr>";
    }
    echo "</table>";

    echo "<h3>Meeting Room Reservation Info</h3>";
    echo "<table border='1'>";
    echo "<tr style='font-weight:bold'><td>roomID</td><td>pID</td><td>numPpl</td><td>dateUsed</td><td>timeIn</td><td>timeOut</td><td>dateRecvd</td></tr>";
    foreach($result7 as $tuple) {
      echo "<tr><td>$tuple[roomID]</td><td>$tuple[pID]</td><td>$tuple[numPpl]</td><td>$tuple[dateUsed]</td><td>$tuple[timeIn]</td><td>$tuple[timeOut]</td><td>$tuple[dateRecvd]</td></tr>";
    }
    echo "</table>";

    echo "<h3>Program Info</h3>";
    echo "<table border='1'>";
    echo "<tr style='font-weight:bold'><td>programName</td><td>contact</td><td>roomID</td><td>cost</td><td>dateUsed</td><td>timeIn</td><td>timeOut</td></tr>";
    foreach($result8 as $tuple) {
      echo "<tr><td>$tuple[programName]</td><td>$tuple[contact]</td><td>$tuple[roomID]</td><td>$tuple[cost]</td><td>$tuple[dateUsed]</td><td>$tuple[timeIn]</td><td>$tuple[timeOut]</td></tr>";
    }
    echo "</table>";

    echo "<h3>Program Roster Info</h3>";
    echo "<table border='1'>";
    echo "<tr style='font-weight:bold'><td>programName</td><td>pID</td><td>numPpl</td><td>dateRecvd</td></tr>";
    foreach($result9 as $tuple) {
      echo "<tr><td>$tuple[programName]</td><td>$tuple[pID]</td><td>$tuple[numPpl]</td><td>$tuple[dateRecvd]</td></tr>";
    }
    echo "</table>";

  ?>
</p>
</body>
</html>
