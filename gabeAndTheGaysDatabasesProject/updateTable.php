<?php

try{
  //open the sqlite database file
  $db = new PDO('sqlite:./database/airport.db');
  // Set errormode to exceptions
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //thing to be updated
  $table = "$_POST['table']";

  if ($table == 'passengers'){

    $db->query("update passengers set f_name = '$_POST[f_name]', m_name = '$_POST[m_name]', l_name = '$_POST[l_name]', ssn = '$_POST[ssn]' where ssn = '$_POST[prim]';");

  }
  else if ($table == 'planes'){

    $db->query("update planes set tail_no = '$_POST[tail_no]', make = '$_POST[make]', model = '$_POST[model]', capacity = '$_POST[capacity]', mph = '$_POST[mph]' where tail_no = '$_POST[prim]';");

  }
  else if ($table == 'flights'){

    $db->query("update flights set flight_no='$_POST[flight_no]', dep_loc='$_POST[dep_loc]', dep_time='$_POST[dep_time]', arr_loc='$_POST[arr_loc]', arr_time='$_POST[arr_time]', tail_no='$_POST[tail_no]' where flight_no='$_POST[prim]';");

  }
  else if ($table == 'onboard'){
    //double primary key
    $ssnPrim = $_POST['prim1'];
    $flight_noPrim = $_POST['prim2'];
    $db->query("update onboard set ssn='$_POST[ssn]', flight_no='$_POST[flight_no]', seat='$_POST[seat]' where ssn=$ssnPrim AND flight_no=$flight_noPrim;");
  }
  else {
    die('Exception : Table not valid.');
  }

}
catch (PDOException $e){
  die('Exception : '.$e->getMessage());
}
header("Location: passengerDisplay.php");

?>
