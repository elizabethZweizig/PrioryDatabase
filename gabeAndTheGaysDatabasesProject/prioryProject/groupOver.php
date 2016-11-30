<!--TODO: fix all the things to be for group overnightBeds-->

<?php
if (empty($_POST['person']))
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
if (empty($_POST['checkIn']))
{
  //send back
  header('Location: '.$individualOvernightRegistration.php);
  die();
}
if (empty($_POST['checkOut']))
{
  //send back
  header('Location: '.$individualOvernightRegistration.php);
  die();
}
if (empty($_POST['timeIn']))
{
  //send back
  header('Location: '.$individualOvernightRegistration.php);
  die();
}
if (empty($_POST['timeOut']))
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
    $person = $_POST['person'];
    $numPpl = $_POST['numPpl'];
    $groupName = $_POST['groupName'];
    $groupNeeds = $_POST['groupNeeds'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $timeIn = $_POST['timeIn'];
    $timeOut = $_POST['timeOut'];
    $dateRecvd = $_POST['dateRecvd'];
    $tour = $_POST['tour'];

    //prepares first sql (bedRes)
    $sqlStatement = $db->prepare('insert into groupInfo values (NULL, :person, :groupName, :groupNeeds, :tour);');

      // prepares the sql statement
      //$sqlStatement = $db->prepare("insert into passengers (f_name, m_name, l_name, ssn) values (:f_name, :m_name, :l_name, :ssn); ");

      // binds parameters to be used in sql statement
      $sqlStatement->bindParam(':person', $person);
      $sqlStatement->bindParam(':groupName', $groupName);
      $sqlStatement->bindParam(':groupNeeds', $groupNeeds);
      $sqlStatement->bindParam(':tour', $tour);
      //executes statement
      $sqlStatement->execute();
      //$db->exec("insert into passengers values ('$_POST[f_name]', '$_POST[m_name]', '$_POST[l_name]', '$_POST[ssn]');");

      $groupID = 0; //TODO: Rachel help get groupID of tuple just created

      $sqlStatement = $db->prepare(
        "insert into bedRes (
          bedResID,
          bedId,
          numPpl,
          checkIn,
          checkOut,
          timeIn,
          timeOut,
          dateRecvd)
          values (
            NULL,
            NULL,
            :numPpl,
            :checkIn,
            :checkOut,
            :timeIn,
            :timeOut,
            :dateRecvd
          );"
        );

        // prepares the sql statement
        //$sqlStatement = $db->prepare("insert into passengers (f_name, m_name, l_name, ssn) values (:f_name, :m_name, :l_name, :ssn); ");

        // binds parameters to be used in sql statement
        $sqlStatement->bindParam(':numPpl', $numPpl);
        $sqlStatement->bindParam(':checkIn', $checkIn);
        $sqlStatement->bindParam(':checkOut', $checkOut);
        $sqlStatement->bindParam(':timeIn', $timeIn);
        $sqlStatement->bindParam(':timeOut', $timeOut);
        $sqlStatement->bindParam(':dateRecvd', $dateRecvd);
        //executes statement
        $sqlStatement->execute();

        $bedResID = 0; //TODO: Rachel help get bedResID of tuple just created

        $sqlOB = $db->prepare('insert into overnightBeds values (NULL, :bedResID);');
        $sqlStatement->bindParam(':bedResID', $bedResID);

        $overnightID = 0; //TODO: Rachel help get overnightID of tuple just created

        $sqlOB = $db->prepare('insert into overnightBeds values (:overnightID, :groupID);');
        $sqlStatement->bindParam(':groupID', $groupID);
        $sqlStatement->bindParam(':overnightID', $overnightID);

      //TODO: notify admin of need to schedule beds for all people. include bedResID and overnightID
      //all new bed res should be tied to overnight id
    }
    catch(PDOException $e)
    {
      die('Exception : '.$e->getMessage());
    }
  }
  // sends to success page
  header("Location: success.html");
  ?>
