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
    // need to add one more table for all reservations
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
    // $result = $db->query($reservations);
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
    $i = 0;
    foreach ($result1 as $tuple)
    {
            if ($i == "0") {
                    echo "<tr style='font-weight:bold'>";
                    foreach ($tuple as $key => $value)
                    {
                            echo "<td>";
                            print_r($key);
                            echo "</td>";
                    }
                    echo "</tr>";
            }
            echo "<tr>";
            foreach ($tuple as $key => $value)
            {
                    echo "<td>";
                    print_r($value);
                    echo "</td>";
            }
            echo "</tr>";
            $i++;
    }
    echo "</table>";

    echo "<h3>Equipment Info</h3>";
    echo "<table border='1'>";
    $i = 0;
    foreach ($result2 as $tuple)
    {
            if ($i == "0") {
                    echo "<tr style='font-weight:bold'>";
                    foreach ($tuple as $key => $value)
                    {
                            echo "<td>";
                            print_r($key);
                            echo "</td>";
                    }
                    echo "</tr>";
            }
            echo "<tr>";
            foreach ($tuple as $key => $value)
            {
                    echo "<td>";
                    print_r($value);
                    echo "</td>";
            }
            echo "</tr>";
            $i++;
    }
    echo "</table>";

    echo "<h3>Equipment Reservation Info</h3>";
    echo "<table border='1'>";
    $i = 0;
    foreach ($result3 as $tuple)
    {
            if ($i == "0") {
                    echo "<tr style='font-weight:bold'>";
                    foreach ($tuple as $key => $value)
                    {
                            echo "<td>";
                            print_r($key);
                            echo "</td>";
                    }
                    echo "</tr>";
            }
            echo "<tr>";
            foreach ($tuple as $key => $value)
            {
                    echo "<td>";
                    print_r($value);
                    echo "</td>";
            }
            echo "</tr>";
            $i++;
    }
    echo "</table>";

    echo "<h3>Bedroom Info</h3>";
    echo "<table border='1'>";
    $i = 0;
    foreach ($result4 as $tuple)
    {
            if ($i == "0") {
                    echo "<tr style='font-weight:bold'>";
                    foreach ($tuple as $key => $value)
                    {
                            echo "<td>";
                            print_r($key);
                            echo "</td>";
                    }
                    echo "</tr>";
            }
            echo "<tr>";
            foreach ($tuple as $key => $value)
            {
                    echo "<td>";
                    print_r($value);
                    echo "</td>";
            }
            echo "</tr>";
            $i++;
    }
    echo "</table>";

    echo "<h3>Bedroom Reservation Info</h3>";
    echo "<table border='1'>";
    $i = 0;
    foreach ($result5 as $tuple)
    {
            if ($i == "0") {
                    echo "<tr style='font-weight:bold'>";
                    foreach ($tuple as $key => $value)
                    {
                            echo "<td>";
                            print_r($key);
                            echo "</td>";
                    }
                    echo "</tr>";
            }
            echo "<tr>";
            foreach ($tuple as $key => $value)
            {
                    echo "<td>";
                    print_r($value);
                    echo "</td>";
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
    echo "<table border='1'>";
    $i = 0;
    foreach ($result6 as $tuple)
    {
            if ($i == "0") {
                    echo "<tr style='font-weight:bold'>";
                    foreach ($tuple as $key => $value)
                    {
                            echo "<td>";
                            print_r($key);
                            echo "</td>";
                    }
                    echo "</tr>";
            }
            echo "<tr>";
            foreach ($tuple as $key => $value)
            {
                    echo "<td>";
                    print_r($value);
                    echo "</td>";
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
    echo "<table border='1'>";
    $i = 0;
    foreach ($result7 as $tuple)
    {
            if ($i == "0") {
                    echo "<tr style='font-weight:bold'>";
                    foreach ($tuple as $key => $value)
                    {
                            echo "<td>";
                            print_r($key);
                            echo "</td>";
                    }
                    echo "</tr>";
            }
            echo "<tr>";
            foreach ($tuple as $key => $value)
            {
                    echo "<td>";
                    print_r($value);
                    echo "</td>";
            }
            echo "</tr>";
            $i++;
    }
    echo "</table>";

    echo "<h3>Program Info</h3>";
    echo "<table border='1'>";
    $i = 0;
    foreach ($result8 as $tuple)
    {
            if ($i == "0") {
                    echo "<tr style='font-weight:bold'>";
                    foreach ($tuple as $key => $value)
                    {
                            echo "<td>";
                            print_r($key);
                            echo "</td>";
                    }
                    echo "</tr>";
            }
            echo "<tr>";
            foreach ($tuple as $key => $value)
            {
                    echo "<td>";
                    print_r($value);
                    echo "</td>";
            }
            echo "</tr>";
            $i++;
    }
    echo "</table>";

    echo "<h3>Program Roster Info</h3>";
    echo "<table border='1'>";
    $i = 0;
    foreach ($result9 as $tuple)
    {
            if ($i == "0") {
                    echo "<tr style='font-weight:bold'>";
                    foreach ($tuple as $key => $value)
                    {
                            echo "<td>";
                            print_r($key);
                            echo "</td>";
                    }
                    echo "</tr>";
            }
            echo "<tr>";
            foreach ($tuple as $key => $value)
            {
                    echo "<td>";
                    print_r($value);
                    echo "</td>";
            }
            echo "</tr>";
            $i++;
    }
    echo "</table>";

  ?>
</p>
</body>
</html>
