<?php require("userlogedin.php");

  $db = new PDO('sqlite:./database/priorydb.db');
  // Set errormode to exceptions
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $user = $_COOKIE["login"];
  $adm = "Select * from login where username == '$user' and admin == 1";

  $result = $db->query($adm);
  $count = count($result->fetchAll());

  if ($count != 1) {
    echo "<p>Insufficient permissions to access this page</p>";
    echo "<a href = 'navigationPage.html'>Back to Navigation</a>";
    die();
  }
?>
