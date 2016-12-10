<?php
if (empty($_POST['username']))
{
  //send back
  header('Location: '.$signin.html);
  die();
}
if (empty($_POST['pwd']))
{
  //send back
  header('Location: '.$signin.html);
  die();
}

//open the sqlite database file
$db = new PDO('sqlite:./database/priorydb.db');
// Set errormode to exceptions
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$user = $_POST['username'];
$user = stripslashes($user);

$password = $_POST['pwd'];
$password = stripslashes($password);

$login = "SELECT * FROM login WHERE username == '$user' AND pwd == '$password'";

$result = $db->query($login);
$count = count($result->fetchAll());

if ($count == 1) {
  setCookie("login", $_POST['username'], time() + 3600);       // expires after an hour
  $_COOKIE["login"];
  
  //echo "SUCCESS";
  header('Location: showUserInfo.php');
}
else {
  //echo "CATASTROPHIC FAILURE";
  header('Location: signin.html');
  die();
}
?>
