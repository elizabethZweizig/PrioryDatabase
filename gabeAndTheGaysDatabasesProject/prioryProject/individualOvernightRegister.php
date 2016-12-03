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
  header('Location: '.$individualOvernight.php);
  die();
}
if (empty($_POST['checkIn']))
{
  //send back
  header('Location: '.$individualOvernight.php);
  die();
}
if (empty($_POST['checkOut']))
{
  //send back
  header('Location: '.$individualOvernight.php);
  die();
}
if (empty($_POST['timeIn']))
{
  //send back
  header('Location: '.$individualOvernight.php);
  die();
}
if (empty($_POST['timeOut']))
{
  //send back
  header('Location: '.$individualOvernight.php);
  die();
}
if (empty($_POST['dateRecvd']))
{
  //send back
  header('Location: '.$individualOvernight.php);
  die();
}
if (empty($_POST['tour']))
{
  //send back
  header('Location: '.$individualOvernight.php);
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
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $timeIn = $_POST['timeIn'];
    $timeOut = $_POST['timeOut'];
    $dateRecvd = $_POST['dateRecvd'];
    $tour = $_POST['tour'];
    $nullBedResID = NULL;
    $nullBedID = NULL;

    //prepares first sql (bedRes)
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
      //$sqlStatement = $db->prepare("insert into passengers (f_name, m_name, l_name, ssn) values (:f_name, :m_name, :l_name, :ssn); ");

      // binds parameters to be used in sql statement
      $sqlStatement->bindParam(':numPpl', $numPpl);
      $sqlStatement->bindParam(':checkIn', $checkIn);
      $sqlStatement->bindParam(':checkOut', $checkOut);
      $sqlStatement->bindParam(':timeIn', $timeIn);
      $sqlStatement->bindParam(':timeOut', $timeOut);
      $sqlStatement->bindParam(':dateRecvd', $dateRecvd);
      $sqlStatement->bindParam(':BedResID', $BedResID);
      $sqlStatement->bindParam(':bedID', $bedID);
      //executes statement
      $sqlStatement->execute();
      //$db->exec("insert into passengers values ('$_POST[f_name]', '$_POST[m_name]', '$_POST[l_name]', '$_POST[ssn]');");

      $sqlBedres = $db->prepare('select bedResID from bedRes where checkIn == :checkIn AND checkOut == :checkOut AND dateRecvd == :dateRecvd;');
      $sqlBedres->bindParam(':checkIn', $checkIn);
      $sqlBedres->bindParam(':checkOut', $checkOut);
      $sqlBedres->bindParam(':dateRecvd', $dateRecvd);
      $bedResID = $sqlBedres->execute();

      //for every day being stayed
      $oneDay = 8.64e7;
      //TODO: make this work (is js)
      for ($i = $checkIn.getTime(); i<=$checkOut.getTime(); $i+=$oneDay){
        $sqlNight = $db->prepare('insert into nightVisit values (:person, :day, :bedResID);');
        $sqlNight->bindParam(':person', $person);
        $hours = $i % 3.6e6;
        $minutes = ($i - ($hours * 3.6e6))% 60000;
        $time = "".$hours.":".$minutes."";
        $sqlNight->bindParam(':checkIn', $time); 
        $sqlNight->bindParam(':bedResID', $bedResID);
        $sqlNight->execute();

        $sqlDay = $db->prepare('insert into nightVisit values (:person, :day, :tour);');
        $sqlDay->bindParam(':tour', $tour);
        $sqlDay->execute();
      }

      //TODO: notify admin of need to schedule beds. include bedResID and pID
      //all new bedres should be tied to pID
      //$to = NULL; //email of priory admin who sets up beds
      //mail($to, "New Overnight Guest", "There is an individual wanting to overnight at the Priory from ".$checkIn." to ".$checkOut". Their current reservation has a BedResID of ".$BedResID."and their pID is ".$person.".");
    }
    catch(PDOException $e)
    {
      die('Exception : '.$e->getMessage());
    }
  }
  // sends to success page
  header("Location: success.html");
  ?>
