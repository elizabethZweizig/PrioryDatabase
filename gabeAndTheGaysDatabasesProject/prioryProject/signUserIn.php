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

$user = "\"".$_POST["username"]."\"";
$password = "\"".$_POST["pwd"]."\"";

$login = "SELECT * FROM login WHERE username == $user AND pwd == $password";

$result = $db->query($login);

if (!empty($result)){    // if no results - i.e. this username/password combo not in db
  setCookie("login", $_POST['pID'], time() + 3600);       // expires after an hour
  $_COOKIE["login"];

  header('Location: success.html');
}
else {
  header('Location: signin.html');
  die();
}
?>
