<DOCCTYPE html>
<html>
<body>
<title>Input An SQL Query</title>
<h3>Input An SQL Query</h3>
<?php

echo "<form method='get'>";
echo "<input type='text' name='command' placeholder='Ex: select * from planes;'$

echo "<input type='submit' value='Submit Query'/>";
echo "</form>";

try
                {
                        //open the sqlite database file
                        $db = new PDO('sqlite:./database/airport.db');
                        // Set errormode to exceptions
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEP$

                        $value = isset($_GET['command']) ? $_GET['command'] : '$

                        echo $value;            // for testing only
                        echo "<br>";
                        //$value = "\'".$value."\'";
                        //echo $value;
                        //echo "<br>";

                        $result = $db->query($value,PDO::FETCH_ASSOC);

                        $array = $result->fetchAll();
                        print_r($array);

                }
catch(PDOException $e)
                {
                        die('Exception : '.$e->getMessage());
                }
?>
</body>
</html>
