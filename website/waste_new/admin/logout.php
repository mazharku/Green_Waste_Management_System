<?php include_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'inc' . DIRECTORY_SEPARATOR . 'header.php'; ?>
<?php
session_destroy();
header('Location:' . 'login.php');
?>