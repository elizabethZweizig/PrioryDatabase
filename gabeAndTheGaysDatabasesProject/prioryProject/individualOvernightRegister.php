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
    $checkIn = new DateTime($_POST['checkIn']);
    $checkOut = new DateTime($_POST['checkOut']);
    $timeIn = $_POST['timeIn'];
    $timeOut = $_POST['timeOut'];
    $dateRecvd = $_POST['dateRecvd'];
    $tour = $_POST['tour'];
    $nullBedResID = NULL;
    $nullBedID = 0; //doesn't accept zeroes

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
    //$sqlStatement = $db->prepare("insert into passengers
    //(f_name, m_name, l_name, ssn) values (:f_name, :m_name, :l_name, :ssn); ");

    // binds parameters to be used in sql statement
    $sqlStatement->bindParam(':numPpl', $numPpl);
    $sqlStatement->bindParam(':checkIn', date_format($checkIn,"Y-m-d"));
    $sqlStatement->bindParam(':checkOut', date_format($checkOut,"Y-m-d"));
    $sqlStatement->bindParam(':timeIn', $timeIn);
    $sqlStatement->bindParam(':timeOut', $timeOut);
    $sqlStatement->bindParam(':dateRecvd', $dateRecvd);
    $sqlStatement->bindParam(':BedResID', $nullBedResID);
    $sqlStatement->bindParam(':bedID', $nullBedID);
    //executes statement
    $sqlStatement->execute();
    //$db->exec("insert into passengers values
    //('$_POST[f_name]', '$_POST[m_name]', '$_POST[l_name]', '$_POST[ssn]');");

    //$sqlBedres = $db->prepare('select bedResID from bedRes where
    // checkIn == :checkIn AND checkOut == :checkOut AND dateRecvd == :dateRecvd;');
    $inString = date_format($checkIn,"Y-m-d");
    $outString = date_format($checkOut,"Y-m-d");
    //$sqlBedres->bindParam(':checkIn', date_format($checkIn,"Y-m-d") );
    //  $sqlBedres->bindParam(':checkOut', date_format($checkOut,"Y-m-d"));
    //    $sqlBedres->bindParam(':dateRecvd', $dateRecvd);
    $result = $db->query("select bedResID
    from bedRes
    where checkIn == $inString AND checkOut == $outString  AND dateRecvd == $dateRecvd");


    $bedResID = 0;
    foreach ($result as $row) {
      $bedResID = $row["bedResID"];
    }

    $sqlNight = $db->prepare('insert into nightVisit values (:person, :bedResID);');
    $sqlNight->bindParam(':person', $person);
    $sqlNight->bindParam(':bedResID', $bedResID);

    $period = new DatePeriod(
      $checkIn,
      new DateInterval('P1D'),
      $checkOut
    );

    foreach ($period as $day) {
      $sqlDay = $db->prepare('insert into dayVisit values (:person, :day, :tour);');
      $sqlDay->bindParam(':person', $person);
      $sqlDay->bindParam(':day', date_format($day, "Y-m-d"));
      $sqlDay->bindParam(':tour', $tour);
      $sqlDay->execute();
    }

    //TODO: notify admin of need to schedule beds. include bedResID and pID
    //all new bedres should be tied to pID
    //$to = NULL; //email of priory admin who sets up beds
    //mail($to, "New Overnight Guest", "There is an individual wanting to overnight at the Priory from ".$checkIn." to$
  }
  catch(PDOException $e)
  {
    die('Exception : '.$e->getMessage());
  }
}
// sends to success page
header("Location: success.html");
?>
