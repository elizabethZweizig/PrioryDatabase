<?php
if (empty($_POST['f_name']))
{
  //send back
  header('Location: '.$makeAccount.html);
  die();
}

if (empty($_POST['l_name']))
{
  //send back
  header('Location: '.$makeAccount.html);
  die();
}
if (empty($_POST['address']))
{
  //send back
  header('Location: '.$makeAccount.html);
  die();
}
if (empty($_POST['email']))
{
  //send back
  header('Location: '.$makeAccount.html);
  die();
}
if (empty($_POST['cellNo']))
{
  //send back
  header('Location: '.$makeAccount.html);
  die();
}
if (empty($_POST['username']))
{
  //send back
  header('Location: '.$makeAccount.html);
  die();
}
if (empty($_POST['pwd']))
{
  //send back
  header('Location: '.$makeAccount.html);
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
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $addr = $_POST['address'];
    $eMail = $_POST['email'];
    $cell = $_POST['cellNo'];
    $user = $_POST['username'];
    $password = $_POST['pwd'];
    $nullPID = NULL;
    $zeroAdmin = 0;

    // prepares the sql statement
    //$sqlStatement = $db->prepare("insert into login (pID, f_name, l_name, address, em$
    $sqlStatement = $db->prepare("insert into login (pID, f_name, l_name, address, emai$
    // binds parameters to be used in sql statement
    $sqlStatement->bindParam(':pID', $nullPID);
    $sqlStatement->bindParam(':f_name', $fname);
    $sqlStatement->bindParam(':l_name', $lname);
    $sqlStatement->bindParam(':address', $addr);
    $sqlStatement->bindParam(':email', $eMail);
    $sqlStatement->bindParam(':cellNo', $cell);
    $sqlStatement->bindParam(':username', $user);
    $sqlStatement->bindParam(':pwd', $password);
    $sqlStatement->bindParam(':admin', $zeroAdmin);

    //executes statement
    $sqlStatement->execute();
  }
  catch(PDOException $e)
  {
    die('Exception : '.$e->getMessage());
  }
}
// sends to success page if no exception thrown
header('Location: '.$success.html);
?>
