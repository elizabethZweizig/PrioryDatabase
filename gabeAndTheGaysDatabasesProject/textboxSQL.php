<DOCCTYPE html>
<html>
<body>
<title>Input An SQL Query</title>
<h3>Input An SQL Query</h3>
<?php
ini_set('display_errors', 'Off'); // gets rid of fetchAll() fatal error, which isnt even an issue???

echo "<form method='get'>";
echo "<input type='text' name='command' placeholder='Ex: select * from planes;'/>";

echo "<input type='submit' value='Submit Query'/>";
echo "</form>";

try
                {
                        //open the sqlite database file
                        $db = new PDO('sqlite:./database/airport.db');
                        // Set errormode to exceptions
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        $value = isset($_GET['command']) ? $_GET['command'] : '';

                        $result = $db->query($value,PDO::FETCH_ASSOC);

                        $array = $result->fetchAll();

                        print_r('Your Query: ' . $value . "<br><br>");
                        print_r('Result:' . "<br>");

                        if (strpos(strtolower($value), 'update') !== false)
                        {
                                print_r('Table Updated');
                        }
                        else if (strpos(strtolower($value), 'delete') !== false)
                        {
                                print_r('Table Info Deleted');
                        }
                        else
                        {
                                echo "<table border='1'>";
                                $i = 0;
                                foreach ($array as $tuple)
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
                        }
                }
catch(PDOException $e)
                {
                        die('Exception : '.$e->getMessage());
                }
?>
</body>
