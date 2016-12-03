<?php
  if ($_COOKIE['admin'] === NULL) {
    header('Location: '.$signin.html);
    die();
  }
?>
