<?php
        if (empty($_POST['flight_no']))
        {
                //send back
                header('Location: '.$project2.html);
                die();
        }

        if (empty($_POST['dep_loc']))
        {
                //send back
                header('Location: '.$project2.html);
                die();
        }
        if (empty($_POST['dep_time']))
        {
                //send back
                header('Location: '.$project2.html);
                die();
        }
        if (empty($_POST['arr_loc']))
        {
                //send back
                header('Location: '.$project2.html);
                die();
        }
        if (empty($_POST['arr_time']))
        {
                //send back
                header('Location: '.$project2.html);
                die();
        }
        if (empty($_POST['tail_no']))
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
                        $flightNo = $_POST['flight_no'];
                        $depLoc = $_POST['dep_loc'];
                        $depTime = $_POST['dep_time'];
                        $arrLoc = $_POST['arr_loc'];
                        $arrTime = $_POST['arr_time'];
                        $tailNo = $_POST['tail_no'];

                        // prepares the sql statement
                        $sqlStatement = $db->prepare("insert into flights (flight_no, dep_loc, dep_time, arr_loc, arr_time, tail_no) values (:flightNo, :depLoc, :depTime, :arrLoc, :arrTime, :tailNo); ");
                        // binds parameters to be used in sql statement
                        $sqlStatement->bindParam(':flight_no', $flightNo);
                        $sqlStatement->bindParam(':dep_loc', $depLoc);
                        $sqlStatement->bindParam(':dep_time', $depTime);
                        $sqlStatement->bindParam(':arr_loc', $arrLoc);
                        $sqlStatement->bindParam(':arr_time', $arrTime);
                        $sqlStatement->bindParam(':tail_no', $tailNo);
                        //executes statement
                        $sqlStatement->execute();
                }
            catch(PDOException $e)
            {
                die('Exception : '.$e->getMessage());
            }
        }
        // sends to success page
        header("Location: success.html");
?>
