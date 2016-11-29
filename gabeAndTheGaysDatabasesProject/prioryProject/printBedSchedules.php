<!DOCTYPE html>
<html>
<head>
    <title>Room Schedule Viewer</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h2>Room Schedule</h2>

<?php

// open db file
$db = new PDO('sqlite:./database/priorydb.db');
// Set errormode to exceptions
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$bedroom = "SELECT * FROM bedroom";
$bedRes = "SELECT * FROM bedRes";
// $groupStuff = "SELECT * FROM groupOvernight NATURAL JOIN overnightBeds NATURAL JOIN groupInfo";
$result = "SELECT bedResID as 'Bedroom Reservation No',
                bedID as 'Room Name',
                numPpl as '# People in Room',
                contactPerson as 'Group Contact Person',
                groupName as 'Group Name',
                groupNeeds as 'Extra Group Needs',
                checkIn as 'Check In Date',
                timeIn as 'Check In Time',
                checkOut as 'Check Out Date',
                timeOut as 'Check Out Time',
                dateRecvd as 'Date Received'
                FROM groupOvernight NATURAL JOIN overnightBeds NATURAL JOIN groupInfo NATURAL JOIN bedRes";

$bedResult = $db->query($bedroom);
$resResult = $db->query($bedRes);
// $groupResult = $db->query($groupStuff);
$res = $db->query($result);

echo "<h3>Bedroom Info</h3>";
echo "<table>";
echo "<tr style='font-weight:bold'><td>BedID</td><td>MaxPpl</td><td>RoomRate</td></tr>";
//loop through each tuple in result set
foreach($bedResult as $tuple)
{
  echo "<tr><td>$tuple[bedID]</td><td>$tuple[maxPpl]</td><td>$tuple[roomRate]</td></tr>";
}
echo "</table>";

//echo "<h3>Bedroom Reservation Info</h3>";
//echo "<table>";
//echo "<tr style='font-weight:bold'><td>Bedroom Reservation No.</td><td>Bedroom Name</td><td># People in R$
//loop through each tuple in result set
//foreach($resResult as $tuple)
//{
//  echo "<tr><td>$tuple[bedResID]</td><td>$tuple[bedID]</td><td>$tuple[numPpl]</td><td>$tuple[checkIn] ", $
//}
//echo "</table>";

echo "<h3>Full Bedroom Reservation Info</h3>";
echo "<table>";
$i = 0;
foreach ($res as $tuple)
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
</body>
</html>
