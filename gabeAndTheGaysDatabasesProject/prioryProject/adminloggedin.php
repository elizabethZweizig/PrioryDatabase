<!DOCTYPE HTML>
<head>
    <title>Admin Access Check</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="divclass">
<?php require("userlogedin.php");

  $db = new PDO('sqlite:./database/priorydb.db');
  // Set errormode to exceptions
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $user = $_COOKIE["login"];
  $adm = "Select * from login where username == '$user' and admin == 1";

  $result = $db->query($adm);
  $count = count($result->fetchAll());

  if ($count != 1) {
    echo "<p>Insufficient permissions to access this page. Admin privileges needed.</p>";
    echo "<a href = 'navigationPage.php'>Back to Navigation</a>";
    die();
  }
?>
</div>
</body>
