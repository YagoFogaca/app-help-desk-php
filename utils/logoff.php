<?php
session_start();
session_destroy();
header('Location: http://localhost/app_help_desk/index.php');
return;
?>