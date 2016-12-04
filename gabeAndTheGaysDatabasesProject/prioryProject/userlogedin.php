<?php
  if ($_COOKIE['login'] === NULL) {
    header('Location: signin.html');
    die();
  }
?>
