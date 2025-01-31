<?php
try {
    // DB connection
    require_once "dbh.inc.php";

    // Fetching products from the database
    $query = "SELECT p.id, p.name, p.size, p.price, p.img, c.description AS color 
            FROM products AS p
            LEFT JOIN product_colors AS pc ON p.id = pc.product_id
            LEFT JOIN colors AS c ON pc.color_id = c.id";
    // Preparing and executing the query via pod
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    // Fetching results
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Closing PDO connection
    $pdo = null;
    $stmt = null;
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}
?>