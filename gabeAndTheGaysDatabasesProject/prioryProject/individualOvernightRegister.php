<!--TODO: fix all the things to be for indivreg-->

<?php
        if (empty($_POST['contact']))
        {
                //send back to sign in page
                header('Location: '.signin.html);
                die();
        }

        if (empty($_POST['numPpl']))
        {
                //send back
                header('Location: '.$individualOvernightRegistration.php);
                die();
        }
        if (empty($_POST['checkInDate']))
        {
                //send back
                header('Location: '.$individualOvernightRegistration.php);
                die();
        }
        if (empty($_POST['checkOutDate']))
        {
                //send back
                header('Location: '.$individualOvernightRegistration.php);
                die();
        }
        if (empty($_POST['checkInTime']))
        {
                //send back
                header('Location: '.$individualOvernightRegistration.php);
                die();
        }
        if (empty($_POST['checkOutTime']))
        {
                //send back
                header('Location: '.$individualOvernightRegistration.php);
                die();
        }
        if (empty($_POST['dateRecvd']))
        {
                //send back
                header('Location: '.$individualOvernightRegistration.php);
                die();
        }
        if (empty($_POST['tour']))
        {
                //send back
                header('Location: '.$individualOvernightRegistration.php);
                die();
        }
        else {
                try
            {
                //open the sqlite database file
                $db = new PDO('sqlite:./database/priorydb.db');

                // Set errormode to exceptions
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                // sets vars = POST variables
                $contact = $_POST['contact'];
                $numPpl = $_POST['numPpl'];
                $checkInDate = $_POST['checkInDate'];
                $checkOutDate = $_POST['checkOutDate'];
                $checkInTime = $_POST['checkInTime'];
                $checkOutTime = $_POST['checkOutTime'];
                $dateRecvd = $_POST['dateRecvd'];
                $tour = $_POST['tour'];



                // prepares the sql statement
								$sqlStatement = $db->prepare("insert into passengers (f_name, m_name, l_name, ssn) values (:f_name, :m_name, :l_name, :ssn); ");

                // binds parameters to be used in sql statement
                $sqlStatement->bindParam(':f_name', $firstname);
                $sqlStatement->bindParam(':m_name', $midname);
                $sqlStatement->bindParam(':l_name', $lastname);
                $sqlStatement->bindParam(':ssn', $socialsec);
								//executes statement
                $sqlStatement->execute();
				        //$db->exec("insert into passengers values ('$_POST[f_name]', '$_POST[m_name]', '$_POST[l_name]', '$_POST[ssn]');");
				        }
				    catch(PDOException $e)
				    {
				        die('Exception : '.$e->getMessage());
				    }
				}
				// sends to success page
				header("Location: success.html");
?>
