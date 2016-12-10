<?php

if (empty($_POST['groupName'])){
  header('Location: reserveDay.php');
  die();
}
if (empty($_POST['roomID'])){
  header('Location: reserveDay.php');
  die();
}
if (empty($_POST['numPpl'])){
  header('Location: reserveDay.php');
  die();
}
if (empty($_POST['dateUsed'])){
  header('Location: reserveDay.php');
  die();
}

if (empty($_POST['timeIn'])){
  header('Location: reserveDay.php');
  die();
}

if (empty($_POST['timeOut'])){
  header('Location: reserveDay.php');
  die();
}
else{
  try{
    $db = new PDO('sqlite:./database/priorydb.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $groupName = $_POST['groupName'];
    $groupNametest = "SELECT * FROM groupInfo WHERE groupName == '$groupName';";
    $result = $db->query($groupNametest);
    $count = count($result->fetchAll());
    if(!($count == 1)){
      header('Location: reserveDay.php');
      die();
    }

    $roomID = $_POST['roomID'];
    $roomIDtest = "SELECT * FROM meetRoom WHERE roomID == '$roomID';";
    $result2 = $db->query($roomIDtest);
    $count2 = count($result2->fetchAll());
    if(!($count2 == 1)){
      header('Location: reserveDay.php');
      die();
    }
    $numPpl = $_POST['numPpl'];
    $exceedMax = "SELECt maxPpl FROM meetRoom WHERE roomID == '$roomID';";
    $result3 = $db->query($exceedMax);
    if($numPpl>$result3){
      header('Location: reserveDay.php');
      die();
    }

    //sets vars = POST variables
    //$groupName = $_POST['groupName'];
    //  $roomID = $_POST['roomID'];
    //  $numPpl = $_POST['numPpl'];
    $dateUsed = $_POST['dateUsed'];
    $timeIn = $_POST['timeIn'];
    $timeOut = $_POST['timeOut'];
    $dateRecvd = $_POST['dateRecvd'];
    $nullmeetResID = NULL;


    //Get groupID for associated groupName
    $groupIDtuple = $db->query("SELECT groupID FROM groupInfo WHERE groupName == '$groupName';");
    foreach($groupIDtupe as $tuple){
      $groupID = $tuple['groupID'];
    }
    echo $groupID;

    //prepares first sql (groupRooms)
    $sqlStatement = $db->prepare("insert into groupRooms values
    (:groupID, :meetResID);");

    $sqlStatement->execute(array(
      'groupID' => $groupID,
      'meetResID' => $nullmeetResID));

      $sqlStatement1 = $db->prepare("insert into meetRes values
      (:meetResID, :roomID, :numPpl, :dateUsed, :timeIn, :timeOut, :dateRecvd);");

      $sqlStatement1->execute(array(
        'meetResID' => $nullmeetResID,
        'roomID' => $roomID,
        'numPpl' =>  $numPpl,
        'dateUsed' => $dateUsed,
        'timeIn' => $timeIn,
        'timeOut' => $timeOut,
        'dateRecvd' =>  $dateRecvd));
      }
      catch(PDOException $e)
      {
        die('Exception : '.$e->getMessage());
      }
    }
    // sends to success page
    header('Location: success.html');
?>
