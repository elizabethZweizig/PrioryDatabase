<?php
try{

  //open the sqlite database file
  $db = new PDO('sqlite:./database/airport.db');
  // Set errormode to exceptions
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //prev page data
  $table = $_GET[table];
  $row = $_GET[row];
  $row1 = $_GET[row1];
  $row2 = $_GET[row2];

  if ($table == 'passengers'){
    $query = "SELECT * FROM passengers WHERE ssn = $row";
    $result = $db->query($query);
    echo "<form action = 'updateTable.php' method = 'post'>";
    echo "<input type='hidden' name='table' value='$table'/></br>";
    echo "<input type='hidden' name='prim' value='$row'/></br>";
    echo "<input type='text' name='f_name' value='$result[f_name]' required/></br>";
    echo "<input type='text' name='m_name' value='$result[m_name]'/></br>";
    echo "<input type='text' name='l_name' value='$result[l_name]' required/></br>";
    echo "<input type='text' name='ssn' pattern='\d{3}-?\d{2}-?\d{4}' value='$result[ssn]' required/></br>";
    echo "<input type='submit'></form>";

  }
  else if ($table == 'flights'){

  }
  else if ($table == 'planes'){

  }
  else if ($table == 'onboard'){


  }

}
catch (PDOException $e){
  die('Exception : '.$e->getMessage());
}
?>
