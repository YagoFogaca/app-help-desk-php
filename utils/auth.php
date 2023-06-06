<?php
session_start();
$user_auth = $_SESSION['auth'];
if (!$user_auth) {
  header('Location: index.php?auth=true');
  return;
}
?>