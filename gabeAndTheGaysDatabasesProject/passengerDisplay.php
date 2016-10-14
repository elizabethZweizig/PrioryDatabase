<!DOCTYPE html>
<html>
<body>
	<h2>Passenger and Plane Info</h2>
	<p>
		<?php
		try
		{
			//open the sqlite database file
			$db = new PDO('sqlite:./database/airport.db');
			// Set errormode to exceptions
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//select all passengers
			$query = "SELECT * FROM planes";
			$query2 = "SELECT * FROM flights";
			$query3 = "SELECT * FROM passengers";
			$query4 = "SELECT * FROM onboard";
			$result = $db->query($query);
			$result2 = $db->query($query2);
			$result3 = $db->query($query3);
			$result4 = $db->query($query4);
			echo "<h3>Plane Info</h3>";
			echo "<table border='1'>";
			echo "<tr style='font-weight:bold'><td>Tail No.</td><td>Make</td><td>Model</td><td>Capacity</td><td>MPH</td></tr></br>";
			//loop through each tuple in result set - planes info
			foreach($result as $tuple)
			{
				echo "<tr><td>$tuple[tail_no]</td><td>$tuple[make]</td><td>$tuple[model]</td><td>$tuple[capacity]</td><td>$tuple[mph]</td>";
				echo "<a href='./update.php?table=planes&row=$tuple[tail_no]'></a>";
				echo "<a href='./delete.php?table=planes&row=$tuple[tail_no]'></a>";
				//echo "<td><a href='./update.php'><button type='button' name='updatePlanes'>Update</button></a>";
				//echo "<a href='./delete.php'><button type='button' onclick='document.location.href='delete.php'' name='deletePlanes'>Delete</button></a></td></tr>";
			}


			echo "</table>";
			echo "<h3>Flight Info</h3>";
			echo "<table border='1'>"; // flights
			echo "<tr style='font-weight:bold'><td>Flight No.</td><td>Dep. Loc.</td><td>Dep. Time</td><td>Arr. Loc.</td><td>Arr. Time</td><td>Tail No.</td></tr>";
			foreach($result2 as $tuple2)
			{
				echo "<tr><td>$tuple2[flight_no]</td><td>$tuple2[dep_loc]</td><td>$tuple2[dep_time]</td><td>$tuple2[arr_loc]</td><td>$tuple2[arr_time]</td><td>$tuple2[tail_no]</td>";
				echo "<a href='./update.php?table=flights&row=$tuple2[flight_no]'></a>";
				echo "<a href='./delete.php?table=flights&row=$tuple2[flight_no]'></a>";
				//echo "<td><a href='./update.php'><button type='button' onclick='document.location.href='update.php'' name='updateFlights'>Update</button></a>";
				//echo "<a href='./delete.php'><button type='button' onclick='document.location.href='delete.php'' name='deleteFlights'>Delete</button></a></td></tr>";
			}
			echo "</table>";
			echo "<h3>Passenger Info</h3>";
			echo "<table border='1'>"; // passengers
			echo "<tr style='font-weight:bold'><td>First Name</td><td>Middle Name</td><td>Last Name</td><td>SSN</td></tr></br>";
			foreach($result3 as $tuple3)
			{
				echo "<tr><td>$tuple3[f_name]</td><td>$tuple3[m_name]</td><td>$tuple3[l_name]</td><td>$tuple3[ssn]</td>";
				echo "<a href='./update.php?table=passengers&row=$tuple3[ssn]'></a>";
				echo "<a href='./delete.php?table=passengers&row=$tuple3[ssn]'></a>";
				//echo "<td><a href='./update.php'><button type='button' onclick='document.location.href='update.php'' name='updatePassengers'>Update</button></a>";
				//echo "<a href='./delete.php'><button type='button' onclick='document.location.href='delete.php'' name='deletePassengers'>Delete</button></a></td></tr>";
			}
			echo "</table>";
			echo "<h3>Onboard Info</h3>";
			echo "<table border='1'>"; // onboard
			echo "<tr style='font-weight:bold'><td>SSN</td><td>Flight No.</td><td>Seat</td></tr>";
			foreach($result4 as $tuple4)
			{
				echo "<tr><td>$tuple4[ssn]</td><td>$tuple4[flight_no]</td><td>$tuple4[seat]</td>";
				echo "<a href='./update.php?table=onboard&row1=$tuple4[ssn]&row2=$tuple4[flight_no]'></a>";
				echo "<a href='./delete.php?table=onboard&row1=$tuple4[ssn]&row2=$tuple4[flight_no]'></a>";
				//echo "<td><a href='./update.php'><button type='button' onclick='document.location.href='update.php'' name='updateOnboard'>Update</button></a>";
				//echo "<a href='./delete.php'><button type='button' onclick='document.location.href='delete.php'' name='deleteOnboard'>Delete</button></a></td></tr>";
			}
			echo "</table>";
			$db = null;     //disconnect from db
		}
		catch(PDOException $e)
		{
			die('Exception : '.$e->getMessage());
		}
		?>
	</p>
</body>
</html>
