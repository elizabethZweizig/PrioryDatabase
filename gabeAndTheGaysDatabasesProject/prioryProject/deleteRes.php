<!DOCTYPE html>
<html>
<body>
  <title>Input A Reservation to be Cancelled</title>
  <link rel="stylesheet" type="text/css" href="index.css">
  <h2>Cancel A Reservation</h2>
  <div class="divclass">
    <form method='get' action='delete_res.php'><input type='text' name='res_id' placeholder='Reservation Number'/><input type='submit' value='Cancel Resrvation'/></form>
    <form action="#" method="post">
      <input type="radio" name="reservationType" value="overnight"> Overnight Reservation<br>
      <input type="radio" name="reservationType" value="Day Reservation"> Day Reservation<br>
    </form>
  </div>
</body>
