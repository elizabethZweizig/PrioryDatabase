
<?php
try
{
  if (isset($_GET['res_id'])) {
    //open the sql database
    $db = new PDO('sqlite:./database/priorydb.db');// this will change

    //set errormode
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$table = $_GET['table'];
    $primary_key = $_GET['res_id'];

    $checkExistsInTable = $db->prepare("select count(*) from meetRes where meetResID = (:primary_key)");
    $exists = $checkExistsInTable->execute();

    if($exists > 0 && $primary_key > 0 ){
      $deleteStatement = $db->prepare("delete from meetRes where meetResID = (:primary_key);");

      $deleteStatement->bindParam(':primary_key', $primary_key);

      $deleteStatement->execute();
      header("Location: successCancel.html");
      exit();
    }
  } // else {
    //header("Location: failCancel.html");
    //}
}
catch(PDOException $e)
{
  die('Exception : '.$e->getMessage());
}
  header("Location: failCancel.html");
?>
