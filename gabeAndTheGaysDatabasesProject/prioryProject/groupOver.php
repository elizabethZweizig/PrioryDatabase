<?php

if (empty($_POST['person']))
{
  //send back to sign in page
  header('Location: '.$signin.html);
  die();
}

if (empty($_POST['numPpl']))
{
  //send back
  header('Location: '.$groupOvernight.php);
  die();
}
if (empty($_POST['checkIn']))
{
  //send back
  header('Location: '.$groupOvernight.php);
  die();
}
if (empty($_POST['checkOut']))
{
  //send back
  header('Location: '.$groupOvernight.php);
  die();
}
if (empty($_POST['timeIn']))
{
  //send back
  header('Location: '.$groupOvernight.php);
  die();
}
if (empty($_POST['timeOut']))
{
  //send back
  header('Location: '.$groupOvernight.php);
  die();
}
if (empty($_POST['dateRecvd']))
{
  //send back
  header('Location: '.$groupOvernight.php);
  die();
}
if (empty($_POST['tour']))
{
  //send back
  header('Location: '.$groupOvernight.php);
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
    $person = $_POST['person'];
    //    $person = $db->query("Select pID from login where username == 'person';");
    $numPpl = $_POST['numPpl'];
    $groupName = $_POST['groupName'];
    $groupNeeds = $_POST['groupNeeds'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $timeIn = $_POST['timeIn'];
    $timeOut = $_POST['timeOut'];
    $dateRecvd = $_POST['dateRecvd'];
    $tour = $_POST['tour'];
    $nullGroupID = NULL;

    //prepares first sql (bedRes)
    $sqlStatement = $db->prepare('insert into groupInfo
    (groupID, contactPerson, groupName, groupNeeds, tour) values
    (:groupID, :contactPerson, :groupName, :groupNeeds, :tour);');

    // binds parameters to be used in sql statement
    $sqlStatement->bindParam(':contactPerson', $person);
    $sqlStatement->bindParam(':groupName', $groupName);
    $sqlStatement->bindParam(':groupNeeds', $groupNeeds);
    $sqlStatement->bindParam(':tour', $tour);
    $sqlStatement->bindParam(':groupID', $nullGroupID);
    //executes statement
    $sqlStatement->execute();

    $nullBedResID = NULL;
    $nullBedID = 0; //wont acceppt null


    $sqlGetGroupID = $db->prepare('select groupID from groupInfo
    where contactPerson == :person and groupName == :groupName;');
    $sqlGetGroupID->bindParam(':person', $person);
    $sqlGetGroupID->bindParam(':groupName', $groupName);
    $groupID = $sqlGetGroupID->execute();

    $sqlStatement = $db->prepare(
    "insert into bedRes
    values (
    :BedResID,
    :bedID,
    :numPpl,
    :checkIn,
    :checkOut,
    :timeIn,
    :timeOut,
    :dateRecvd
  );"
);

// prepares the sql statement
//$sqlStatement = $db->prepare("insert into passengers
//(f_name, m_name, l_name, ssn) values (:f_name, :m_name, :l_name, :ssn); ");

// binds parameters to be used in sql statement
$sqlStatement->bindParam(':bedID', $nullBedID);
$sqlStatement->bindParam(':BedResID', $nullBedResID);
$sqlStatement->bindParam(':numPpl', $numPpl);
$sqlStatement->bindParam(':checkIn', $checkIn);
$sqlStatement->bindParam(':checkOut', $checkOut);
$sqlStatement->bindParam(':timeIn', $timeIn);
$sqlStatement->bindParam(':timeOut', $timeOut);
$sqlStatement->bindParam(':dateRecvd', $dateRecvd);
//executes statement
$sqlStatement->execute();

$result = $db->query("select bedResID
from bedRes
where checkIn == $checkIn AND checkOut == $checkOut  AND dateRecvd == $dateRecvd");


$bedResID = 0;
foreach ($result as $row) {
  $bedResID = $row["bedResID"];
}

$nullovernightID = NULL;

$sqlOB = $db->prepare('insert into overnightBeds values (:overnightID, :bedResID);');
$sqlOB->bindParam(':bedResID', $bedResID);
$sqlOB->bindParam(':overnightID', $nullovernightID);
$sqlOB->execute();

$quo = $db->query("select overnightID from overnightBeds where bedResID == $bedResID");
$overnightID = 0;
foreach($quo as $tuple){
  $overnightID = $tuple["overnightID"];
}

$sqlGO = $db->prepare('insert into groupOvernight values (:overnightID, :groupID);');
$sqlGO->bindParam(':groupID', $groupID);
$sqlGO->bindParam(':overnightID', $overnightID);
$sqlGO->execute();

//TODO: notify admin of need to schedule beds for all people. include bedResID and overnightID
//all new bed res should be tied to overnight id
//$to = NULL; //email of priory admin who sets up beds
//mail($to, "New Overnight Guests", "There is a group of ".$numPpl." wanting to overnight at the Priory from ".$checkIn." to ".$checkOut". Their current reservation has a BedResID of ".$BedResID."and$
}
catch(PDOException $e)
{
  die('Exception : '.$e->getMessage());
}
}
// sends to success page
header("Location: success.html");
?>
