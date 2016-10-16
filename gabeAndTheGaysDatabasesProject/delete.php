<?php
	try
	{
		if ($_GET['table'] == 'planes') {
		//open the sql database
		$db = new PDO('sqlite:./database/airport.db');

		//set errormode
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//$table = $_GET['table'];
		$primary_key = $_GET['row'];


		$deleteStatement = $db->prepare("delete from planes where tail_no = (:primary_key);");

		$deleteStatement->bindParam(':primary_key', $primary_key);

		$deleteStatement->execute();
	} elseif ($_GET['table'] == 'passengers') {
		//open the sql database
		$db = new PDO('sqlite:./database/airport.db');

		//set errormode
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//$table = $_GET['table'];
		$primary_key = $_GET['row'];


		$deleteStatement = $db->prepare("delete from passengers where ssn = (:primary_key);");

		$deleteStatement->bindParam(':primary_key', $primary_key);

		$deleteStatement->execute();
	} elseif ($_GET['table'] == 'flights') {
		//open the sql database
		$db = new PDO('sqlite:./database/airport.db');

		//set errormode
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//$table = $_GET['table'];
		$primary_key = $_GET['row'];


		$deleteStatement = $db->prepare("delete from flights where tail_no = (:primary_key);");

		$deleteStatement->bindParam(':primary_key', $primary_key);

		$deleteStatement->execute();
	} elseif ($_GET['table'] == 'onboard') {
		//open the sql database
		$db = new PDO('sqlite:./database/airport.db');

		//set errormode
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		//$table = $_GET['table'];
		$primary_key1 = $_GET['row1'];
		$primary_key2 = $_GET['row2'];


		$deleteStatement = $db->prepare("delete from onboard where ssn = (:primary_key1) and flight_no = (:primary_key2);");

		$deleteStatement->bindParam(':primary_key1', $primary_key1);
		$deleteStatement->bindParam(':primary_key2', $primary_key2);

		$deleteStatement->execute();
	}


	}
	catch(PDOException $e)
	{
		die('Exception : '.$e->getMessage());
	}
	header("Location: passengerDisplay.php");

	?>
