<?php


	if empty($_POST(f_name) === true)
	{
		//send back
		header('Location: '.$project2.html);
		die();
	}

	if empty($_POST(m_name) === true)
	{
		//send back
		header('Location: '.$project2.html);
		die();
	}
	if empty($_POST(l_name) === true)
	{
		//send back
		header('Location: '.$project2.html);
		die();
	}
	if empty($_POST(ssn))
	{
		//send back
		header('Location: '.$project2.html);
		die();
	}
	else {
		try
	    {
	        //open the sqlite database file
	        $db = new PDO('sqlite:./database/airport.db');

	        // Set errormode to exceptions
	        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    $db->exec("insert into passengers values ('$_POST[f_name]', '$_POST[m_name]', '$_POST[l_name]', '$_POST[ssn]');");
	    catch(PDOException $e)
	    {
	        die('Exception : '.$e->getMessage());
	    }
	}
?>
