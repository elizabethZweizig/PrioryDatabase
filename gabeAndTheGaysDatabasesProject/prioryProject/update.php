<?php require("userlogedin.php"); ?>
<head>
  <title>Account Info</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
try{
  //open the sqlite database file
  $db = new PDO('sqlite:./database/priorydb.db');
  // Set errormode to exceptions
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //prev page data
//  $table = $_GET['table'];
//  if ($table == 'login'){
    $user = $_COOKIE["login"];
    $query1 = "SELECT * FROM login WHERE username = '$user';";
    $result1 = $db->prepare($query1);
    $result1->execute();

      echo "<h2>Update Information</h2>";
      foreach($result1 as $tuple1){
      echo "<form action = 'updateLogin.php' method = 'post'>";
      // echo "<input type='hidden' name='table' value='$table'/></br>";
      //echo "<input type='hidden' name='prim' value='$row'/></br>";
      echo "First Name:  <input type='text' name='f_name' value='$tuple1[f_name]'/></br>";
      echo "Last Name    <input type='text' name='l_name' value='$tuple1[l_name]'/></br>";
      echo "Address      <input type='text' name='address' value='$tuple1[address]'/></br>";
      echo "Email        <input type='text' name='email' value='$tuple1[email]'/></br>";
      echo "Phone #      <input type='text' name='cellNo' value='$tuple1[cellNo]'/></br>";
      echo "Old Password <input type='text' name='oldPassword' placeholder='old password' value = ''/></br>";
      echo "New Password <input type='text' name='newPassword' placeholder='new password' value = ''/></br>";
      echo "<input type='submit'></form>";
    }
}

catch (PDOException $e){
  die('Exception : '.$e->getMessage());
}
?>

</body>
