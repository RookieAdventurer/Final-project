<?php
session_start();
$_SESSION = array();

session_destroy();

header('Location: ../view/Login.php');
exit();
