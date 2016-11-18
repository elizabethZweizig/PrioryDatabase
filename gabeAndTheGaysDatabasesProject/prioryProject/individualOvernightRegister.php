<--TODO: fix all the things to be for indivreg-->

<?php
        if (empty($_POST['f_name']))
        {
                //send back
                header('Location: '.$project2.html);
                die();
        }

        if (empty($_POST['m_name']))
        {
                //send back
                header('Location: '.$project2.html);
                die();
        }
        if (empty($_POST['l_name']))
        {
                //send back
                header('Location: '.$project2.html);
                die();
        }
        if (empty($_POST['ssn']))
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


                // sets vars = POST variables
                $firstname = $_POST['f_name'];
                $midname = $_POST['m_name'];
                $lastname = $_POST['l_name'];
                $socialsec = $_POST['ssn'];

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
