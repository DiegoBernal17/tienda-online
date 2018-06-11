<?php
require_once('../global.php');
unset($_SESSION['user']);
unset($_SESSION['name']);
session_destroy();
header('Location: '.URL);
?>