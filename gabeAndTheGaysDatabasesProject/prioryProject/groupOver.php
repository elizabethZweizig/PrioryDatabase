Last login: Sat Dec  3 15:42:15 on ttys000
lianabs-mac:~ yastaghr$ cd Desktop/School/Databases/databases_project/
lianabs-mac:databases_project yastaghr$ ssh -i "cs455.pem" ubuntu@ec2-54-218-120-86.us-west-2.compute.amazonaws.com
Welcome to Ubuntu 14.04.4 LTS (GNU/Linux 3.13.0-92-generic x86_64)

* Documentation:  https://help.ubuntu.com/

System information as of Sat Dec  3 04:37:20 UTC 2016

System load:  0.0               Processes:           114
Usage of /:   12.1% of 7.74GB   Users logged in:     1
Memory usage: 13%               IP address for eth0: 172.31.23.194
Swap usage:   0%

Graph this data and manage this system at:
https://landscape.canonical.com/

Get cloud support with Ubuntu Advantage Cloud Guest:
http://www.ubuntu.com/business/services/cloud

73 packages can be updated.
45 updates are security updates.

New release '16.04.1 LTS' available.
Run 'do-release-upgrade' to upgrade to it.


Last login: Sat Dec  3 04:37:20 2016 from 207.207.127.211
ubuntu@ip-172-31-23-194:~$ cd var/www/html
-bash: cd: var/www/html: No such file or directory
ubuntu@ip-172-31-23-194:~$ ls
project1.css  testing.php  testing.txt
ubuntu@ip-172-31-23-194:~$ cd ..
ubuntu@ip-172-31-23-194:/home$ cd var/www/html
-bash: cd: var/www/html: No such file or directory
ubuntu@ip-172-31-23-194:/home$ cd ./var/www/html
-bash: cd: ./var/www/html: No such file or directory
ubuntu@ip-172-31-23-194:/home$ cd ../../..
ubuntu@ip-172-31-23-194:/$ ls
bin   dev  home        lib    lost+found  mnt  proc  run   srv  tmp  var
boot  etc  initrd.img  lib64  media       opt  root  sbin  sys  usr  vmlinuz
ubuntu@ip-172-31-23-194:/$ cd var/www/html
ubuntu@ip-172-31-23-194:/var/www/html$ ls
airlineProject  prioryProject
ubuntu@ip-172-31-23-194:/var/www/html$ cd prioryProject/
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ ls
database            mainView.php           programSetup.php     success.html
exampleData.sql     makeAccount.html       signin.html          userlogedin.php
groupOvernight.php  printBedSchedules.php  signUserIn.php
groupOver.php       prioryEvent.php        style.css
login.php           prioryschema.sql       successfulLogin.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ ls
database                         mainView.php           signin.html
exampleData.sql                  makeAccount.html       signUserIn.php
groupOvernight.php               navigationPage.html    style.css
groupOver.php                    printBedSchedules.php  successfulLogin.php
individualOvernight.php          prioryEvent.php        success.html
individualOvernightRegister.php  prioryschema.sql       userlogedin.php
login.php                        programSetup.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano groupOver.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano groupOvernight.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano programSetup.php ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano groupOvernight.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano groupOvernight.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano userlogedin.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano successfulLogin.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano groupOver.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano groupOver.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano groupOver.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ ls
database                         mainView.php           signin.html
exampleData.sql                  makeAccount.html       signUserIn.php
groupOvernight.php               navigationPage.html    style.css
groupOver.php                    printBedSchedules.php  successfulLogin.php
individualOvernight.php          prioryEvent.php        success.html
individualOvernightRegister.php  prioryschema.sql       userlogedin.php
login.php                        programSetup.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano groupOver.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano groupOvernight.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano individualOvernight.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano login.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano groupOver.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano groupOvernight.php
ubuntu@ip-172-31-23-194:/var/www/html/prioryProject$ sudo nano groupOver.php

GNU nano 2.2.6                          File: groupOver.php

<?php

if (empty($_POST['person']))
{
  //send back to sign in page
  header('Location: '.$signin.html);
  die();
}

if (empty($_POST['numPpl']))
{
  //send back
  header('Location: '.$groupOvernight.php);
  die();
}
if (empty($_POST['checkIn']))
{
  //send back
  header('Location: '.$groupOvernight.php);
  die();
}
if (empty($_POST['checkOut']))
{
  //send back
  header('Location: '.$groupOvernight.php);
  die();
}
if (empty($_POST['timeIn']))
{
  //send back
  header('Location: '.$groupOvernight.php);
  die();
}
if (empty($_POST['timeOut']))
{
  //send back
  header('Location: '.$groupOvernight.php);
  die();
}
if (empty($_POST['dateRecvd']))
{
  //send back
  header('Location: '.$groupOvernight.php);
  die();
}
if (empty($_POST['tour']))
{
  //send back
  header('Location: '.$groupOvernight.php);
  die();
}
else {
  try
  {
    //open the sqlite database file
    $db = new PDO('sqlite:./database/priorydb.db');
    // Set errormode to exceptions
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // sets vars = POST variables
    $person = $_POST['person'];
    $numPpl = $_POST['numPpl'];
    $groupName = $_POST['groupName'];
    $groupNeeds = $_POST['groupNeeds'];
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $timeIn = $_POST['timeIn'];
    $timeOut = $_POST['timeOut'];
    $dateRecvd = $_POST['dateRecvd'];
    $tour = $_POST['tour'];
    $nullGroupID = NULL;

    //prepares first sql (bedRes)
    $sqlStatement = $db->prepare('insert into groupInfo
    (groupID, contactPerson, groupName, groupNeeds, tour) values
    (:groupID, :person, :groupName, :groupNeeds, :tour);');

    // prepares the sql statement
    //$sqlStatement = $db->prepare("insert into passengers
    //(f_name, m_name, l_name, ssn) values (:f_name, :m_name, :l_name, :ssn); ");

    // binds parameters to be used in sql statement
    $sqlStatement->bindParam(':person', $person);
    $sqlStatement->bindParam(':groupName', $groupName);
    $sqlStatement->bindParam(':groupNeeds', $groupNeeds);
    $sqlStatement->bindParam(':tour', $tour);
    $sqlStatement->bindParam(':groupID', $nullGroupID);
    $nullBedResID = NULL;
    $nullBedID = 0; //wont acceppt null
    //executes statement
    $sqlStatement->execute();
    //$db->exec("insert into passengers values
    //('$_POST[f_name]', '$_POST[m_name]', '$_POST[l_name]', '$_POST[ssn]');");
    $sqlGetGroupID = $db->prepare('select groupID from groupInfo
    where contactPerson == :person and groupName == :groupName;');
    $sqlGetGroupID->bindParam(':person', $person);
    $sqlGetGroupID->bindParam(':groupName', $groupName);
    $groupID = $sqlGetGroupID->execute();

    $sqlStatement = $db->prepare(
      "insert into bedRes
      values (
        :BedResID,
        :bedID,
        :numPpl,
        :checkIn,
        :checkOut,
        :timeIn,
        :timeOut,
        :dateRecvd
      );"
    );

    // prepares the sql statement
    //$sqlStatement = $db->prepare("insert into passengers
    //(f_name, m_name, l_name, ssn) values (:f_name, :m_name, :l_name, :ssn); ");

    // binds parameters to be used in sql statement
    $sqlStatement->bindParam(':bedID', $nullBedID);
    $sqlStatement->bindParam(':BedResID', $nullBedResID);
    $sqlStatement->bindParam(':numPpl', $numPpl);
    $sqlStatement->bindParam(':checkIn', $checkIn);
    $sqlStatement->bindParam(':checkOut', $checkOut);
    $sqlStatement->bindParam(':timeIn', $timeIn);
    $sqlStatement->bindParam(':timeOut', $timeOut);
    $sqlStatement->bindParam(':dateRecvd', $dateRecvd);
    //executes statement
    $sqlStatement->execute();

    $sqlBedres = $db->prepare('select bedResID from bedRes
    where checkIn == :checkIn and checkOut == :checkOut and dateRecvd == :dateRecvd;');
    $sqlBedres->bindParam(':checkIn', $checkIn);
    $sqlBedres->bindParam(':checkOut', $checkOut);
    $sqlBedres->bindParam(':dateRecvd', $dateRecvd);
    $bedResID = $sqlBedres->execute();
    $nullovernightID = NULL;

    $sqlOB = $db->prepare('insert into overnightBeds values (:overnightID, :bedResID);');
    $sqlOB->bindParam(':bedResID', $bedResID);
    $sqlOB->bindParam(':overnightID', $nullovernightID);
    $sqlOB->execute();

    $sqlover = $db->prepare('select overnightID from overnightBeds where bedResID == :bedResID;');
    $sqlover->bindParam(':bedResID', $bedResID);
    $overnightID = $sqlover->execute();

    $sqlGO = $db->prepare('insert into groupOvernight values (:overnightID, :groupID);');
    $sqlGO->bindParam(':bedResID', $bedResID);
    $sqlGO->bindParam(':overnightID', $overnightID);
    $sqlGO->execute();

    //TODO: notify admin of need to schedule beds for all people. include bedResID and overnightID
    //all new bed res should be tied to overnight id
    //$to = NULL; //email of priory admin who sets up beds
    //mail($to, "New Overnight Guests", "There is a group of ".$numPpl." wanting to overnight at the Priory from ".$checkIn." to ".$checkOut". Their current reservation has a BedResID of ".$BedResID."and an overnightID of ".$overnightID.".");
  }
  catch(PDOException $e)
  {
    die('Exception : '.$e->getMessage());
  }
}
// sends to success page
header("Location: success.html");
?>
