<DOCCTYPE html>
  <?php require("adminloggedin.php"); ?>
  <?php include("nav.html"); ?>

  <html>
  <head>
    <title>Cancel Reservations</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="divclass">
      <h3>Cancel A Day Reservation</h3>
      <p>Input Reservation Number to Cancel</p>
      <form method='get' action='delete_day_res.php'><input type='text' name='res_id' placeholder='Reservation Number'/><input type='submit' value='Cancel Reservation'/></form>
      <h3>Cancel An Overnight Reservation</h3>
      <p>Input Reservation Number to Cancel</p>
      <form method='get' action='delete_overnight_res.php'><input type='text' name='res_id' placeholder='Reservation Number'/><input type='submit' value='Cancel Reservation'/></form>
    </div>
  </body>
