<?php

if (empty($_POST['startDate']))
{
  //send back
  header('Location: '.$programSetup.php);
  die();
}
if (empty($_POST['endDate']))
{
  //send back
  header('Location: '.$programSetup.php);
  die();
}
if (empty($_POST['name']))
{
  //send back
  header('Location: '.$programSetup.php);
  die();
}
if (empty($_POST['description']))
{
  //send back
  header('Location: '.$programSetup.php);
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
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $nullEventID = NULL;

    //prepares first sql (bedRes)
    $sqlStatement = $db->prepare(
    "insert into prioryEvent
    values (
    :EventID,
    :startDate,
    :endDate,
    :name,
    :description
  );"
);

// prepares the sql statement
//$sqlStatement = $db->prepare("insert into passengers (f_name, m_name, l_name, ssn) values (:f_name, :m_name, :l_name, :ssn); ");

// binds parameters to be used in sql statement
$sqlStatement->bindParam(':EventID', $nullEventID);
$sqlStatement->bindParam(':startDate', $startDate);
$sqlStatement->bindParam(':endDate', $endDate);
$sqlStatement->bindParam(':name', $name);
$sqlStatement->bindParam(':description', $description);
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
