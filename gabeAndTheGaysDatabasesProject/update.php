<?php
try{
  //open the sqlite database file
  $db = new PDO('sqlite:./database/airport.db');
  // Set errormode to exceptions
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //prev page data
  $table = $_GET['table'];
  if ($table == 'passengers'){
    $row = $_GET['row'];
    $query1 = "SELECT * FROM passengers WHERE ssn = '$row';";
    $result1 = $db->prepare($query1);
    $result1->execute();
    foreach($result1 as $tuple1){
      echo "<form action = 'updateTable.php' method = 'post'>";
      echo "<input type='hidden' name='table' value='$table'/></br>";
      echo "<input type='hidden' name='prim' value='$row'/></br>";
      echo "<input type='text' name='f_name' value='$tuple1[f_name]' required/></br>";
      echo "<input type='text' name='m_name' value='$tuple1[m_name]'/></br>";
      echo "<input type='text' name='l_name' value='$tuple1[l_name]' required/></br>";
      echo "<input type='text' name='ssn' pattern='\d{3}-?\d{2}-?\d{4}' value='$tuple1[ssn]' required/></br>";
      echo "<input type='submit'></form>";
    }
  }
  else if ($table == 'flights'){
    $row = $_GET['row'];
    $query2 = "SELECT * FROM flights WHERE flight_no = '$row';";
    $result2 = $db->prepare($query2);
    $result2->execute();
    foreach($result2 as $tuple2){
      echo "<form action = 'updateTable.php' method = 'post'>";
      echo "<input type='hidden' name='table' value='$table'/></br>";
      echo "<input type='hidden' name='prim' value='$row'/></br>";
      echo "<input type='text' name='flight_no' value='$tuple2[flight_no]' required/></br>";
      echo "<input type='text' name='dep_loc' value='$tuple2[dep_loc]'/></br>";
      echo "<input type='text' name='dep_time' value='$tuple2[dep_time]' required/></br>";
      echo "<input type='text' name='arr_loc' value='$tuple2[arr_loc]' required/></br>";
      echo "<input type='text' name='arr_time' value='$tuple2[arr_time]' required/></br>";
      echo "<input type='text' name='tail_no' value='$tuple2[tail_no]' required/></br>";
      echo "<input type='submit'></form>";
    }
  }
  else if ($table == 'planes'){
    $row = $_GET['row'];
    $query3 = "SELECT * FROM planes WHERE tail_no = '$row';";
    $result3 = $db->prepare($query3);
    $result3->execute();
    foreach($result3 as $tuple3){
      echo "<form action = 'updateTable.php' method = 'post'>";
      echo "<input type='hidden' name='table' value='$table'/></br>";
      echo "<input type='hidden' name='prim' value='$row'/></br>";
      echo "<input type='text' name='tail_no' value='$tuple3[tail_no]' required/></br>";
      echo "<input type='text' name='make' value='$tuple3[make]'/></br>";
      echo "<input type='text' name='model' value='$tuple3[model]' required/></br>";
      echo "<input type='text' name='capacity' value='$tuple3[capacity]' required/></br>";
      echo "<input type='text' name='mph' value='$tuple3[mph]' required/></br>";
      echo "<input type='submit'></form>";
    }
  }
  else if ($table == 'onboard'){
    $row1 = $_GET['row1'];
    $row2 = $_GET['row2'];
    $query4 = "SELECT * FROM onboard WHERE ssn = '$row1' AND flight_no = '$row2';";
    $result4 = $db->prepare($query4);
    $result4->execute();
    foreach($result4 as $tuple4){
      echo "<form action = 'updateTable.php' method = 'post'>";
      echo "<input type='hidden' name='table' value='$table'/></br>";
      echo "<input type='hidden' name='prim1' value='$row1'/></br>";
      echo "<input type='hidden' name='prim2' value='$row2'/></br>";
      echo "<input type='text' name='ssn' value='$tuple4[ssn]' required/></br>";
      echo "<input type='text' name='flight_no' value='$tuple4[flight_no]'/></br>";
      echo "<input type='text' name='seat' value='$tuple4[seat]' required/></br>";
      echo "<input type='submit'></form>";
    }
  }
}
catch (PDOException $e){
  die('Exception : '.$e->getMessage());
}
?>
