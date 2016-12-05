<?php

try {
  //open the sqlite database file
  $db = new PDO('sqlite:./database/priorydb.db');
  // Set errormode to exceptions
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $user = $_COOKIE["login"];
  $db->query("update login set f_name = '$_POST[f_name]', l_name = '$_POST[l_name]', address = '$_POST[address]',  email = '$_POST[email]', cellNo = '$_POST[cellNo]' where username == '$user';");

  $pwd = $db->query("select pwd from login where username == '$user'");

  $pass = stripslashes($pwd);

  if ('$pass' != "" && '$pass' == '$pwd') {
    $db->query("update login set pwd = '$pass' where username == '$user';");
  }
}
catch (PDOException $e){
  die('Exception : '.$e->getMessage());
}
header("Location: showUserInfo.php");
?>
