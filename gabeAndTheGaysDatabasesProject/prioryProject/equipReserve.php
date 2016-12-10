<?php require("userlogedin.php"); ?>
<?php include("nav.html"); ?>

<!DOCTYPE html>
<HTML>
  <head>
      <title> Reserve Equipment </title>
      <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
        <?php
        require("userlogedin.php")
        ?>
        <div class="divclass">
        <h1> Reserve Equipment </h1>
        <form action="equipRes.php" method = "post">
          Group Name <font color= "red"> *</font> :
          <input type="text" name = "groupName"required/><br>
          Equipment Requested <font color= "red">*</font> :
            <input type="text" name="equipID"required/><br>
          Is there a room associated with this equipment? (Type 1 for Yes and 0 for No)<font color= "red">*</font> :
          <input type="text" name="roomReq"required/><br>
          Date Requested: (MM-DD-YYYY) <font color= "red">*</font> :
           <input type= "text" name= "dateUsed"required/><br>
          Start Time: (ex. 15:30) <font color= "red">*</font> :
          <input type= "text" name= "timeIn"required/><br>
          End Time (ex. 17:00) <font color= "red">*</font> :
          <input type= "text" name= "timeOut"required/><br>


          <input type="submit" value="Submit">
        </form>
        </div>
   </body>
</HTML>
