<?php
try {
    // db connection
    require_once "dbh.inc.php";

} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>