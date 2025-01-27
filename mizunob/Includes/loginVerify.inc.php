<?php
session_start();
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
$userName = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$userId = isset($_SESSION['userId']) ? $_SESSION['userId'] : '';
?>