<?php
try {
    // db connection
    require_once "dbh.inc.php";

    // fetching products from the database
    $query = "SELECT p.name, p.size, p.price, p.img, c.description AS color 
              FROM products AS p
              LEFT JOIN colors AS c ON p.color_id = c.id";
    // preparing and executing the query via pod
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    // fetching results
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // closing PDO connection
    $pdo = null;
    $stmt = null;
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>