<?php
setCookie("logout", $_POST['username']);
$_COOKIE["logout"];

header('Location: signin.html');
die();
?>
