<?php

if (empty($_POST['groupName'])){
  header('Location: equipReserve.php');
  die();
}
if (empty($_POST['equipID'])){
  header('Location: equipReserve.php');
  die();
}
if (empty($_POST['roomReq'])){
  header('Location: equipReserve.php');
  die();
}
if (empty($_POST['dateUsed'])){
  header('Location: equipReserve.php');
  die();
}

if (empty($_POST['timeIn'])){
  header('Location: equipReserve.php');
  die();
}

if (empty($_POST['timeOut'])){
  header('Location: equipReserve.php');
  die();
}

try
{
  $db = new PDO('sqlite:./database/priorydb.db');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $groupName = $_POST['groupName'];
  $groupNametest = "SELECT * FROM groupInfo WHERE groupName == '$groupName';";
  $result = $db->query($groupNametest);
  $count = count($result->fetchAll());
  if(!($count == 1)){
    header('Location: equipReserve.php');
    die();
  }
  $type = $_POST['equipID'];
  $equipIDtest = "SELECT * FROM equipment WHERE type == '$type';";
  $result2 = $db->query($equipIDtest);
  $count2 = count($result2->fetchAll());
  if(!($count2 == 1)){
    header('Location: equipReserve.php');
    die();
  }


  //sets vars = POST variables
  $groupName = $_POST['groupName'];
  $type = $_POST['equipID'];
  $roomReq = $_POST['roomReq'];
  $dateUsed = $_POST['dateUsed'];
  $timeIn = $_POST['timeIn'];
  $timeOut = $_POST['timeOut'];
  $nullequipResID = 'NULL';


  //Get groupID for associated groupName
  $groupIDtuple = $db->query("SELECT groupID FROM groupInfo WHERE groupName == '$groupName';");
  foreach($groupIDtuple as $tuple){
   $groupID = $tuple['groupID'];
}

  $equipIDtuple = $db->query("SELECT equipID FROM equipment WHERE type == '$type';");
  foreach($equipIDtuple as $tuple2){
   $equipID = $tuple2['equipID'];
}

//prepares first sql (groupRooms)
  $sqlStatement = $db->prepare("insert into groupEquip values
  (:groupID, :equipResID);");

  $sqlStatement->bindParam(':groupID', $groupID);
  $sqlStatement->bindParam(':equipResID', $nullequipResID);

  $sqlStatement1 = $db->prepare("insert into equipRes values
  (:equipResID, :roomReq, :equipID, :dateUsed, :timeIn, :timeOut);");

  echo $groupID;
  echo $roomReq+ 1;
  echo $dateUsed;
  echo $timeIn;
  echo $timeOut;
  echo $nullequipResID;

  $sqlStatement1->bindParam(':equipResID', $nullequipResID);
  $sqlStatement1->bindParam(':roomReq', $roomReq);
  $sqlStatement1->bindParam(':equipID', $equipID);
  $sqlStatement1->bindParam(':dateUsed', $dateUsed);
  $sqlStatement1->bindParam(':timeIn', $timeIn);
  $sqlStatement1->bindParam(':timeOut', $timeOut);

  $sqlStatement->execute();
  $sqlStatement1->execute();

}
catch(PDOException $e)
{
  die('Exception : '.$e->getMessage());
}

// sends to success page
header("Location: success.html");

?>
