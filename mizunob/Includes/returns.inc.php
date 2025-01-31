<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
try {
    // DB connection
    require_once "dbh.inc.php";

} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>