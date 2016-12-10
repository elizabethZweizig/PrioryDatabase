<?php require("userlogedin.php"); ?>
<?php include("nav.html"); ?>

<!DOCTYPE html>
<head>
  <title>Navigation Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h1>Navigation Menu</h1>
  <h3 class="navh3"><a href="signin.html">Sign In as New User</a></h3>
  <h3 class="navh3"><a href="makeAccount.php">Make New Account</a></h3>
  <h3 class="navh3"><a href="programSetup.php">Schedule an Event</a></h3>
  <h3 class="navh3"><a href="reserveDay.php">Reserve a Meeting Room</a>
  <h3 class="navh3"><a href="individualOvernight.php">Schedule Single-Person Overnight Visit</a></h3>
  <h3 class="navh3"><a href="groupOvernight.php">Schedule Multiple-Person Overnight Visit</a></h3>
  <h3 class="navh3"><a href="equipReserve.php">Reserve Equipment</a></h3>
  <h3 class="navh3"><a href="showUserInfo.php">See Your Account Info</a></h3>
  <h3 style = "color: #cc0000; background-color: #ccefff; text-align: center; border-style: solid; border-width: 2px; border-color: darkblue; padding: 10px; width: 100%;">ADMIN ONLY PAGES</h3>
  <h3 class="navh3"><a href="deleteDayRes.php">Cancel a Reservation</a></h3>
  <h3 class="navh3"><a href="prioryAdminInfo.php">Priory Info</a></h3>
<!--subsumed by deleteDayRes.php
        <h3><a href="deleteOvernightRes.html">Delete Overnight Reservation</a> - Admin users only</h3>(working)
-->
</body>
