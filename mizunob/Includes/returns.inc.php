<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_POST['numero_fattura'])) {
        $invoice_number = $_POST['numero_fattura'];

        try {
            // DB Connection
            require_once "dbh.inc.php";

            // Query Preparation
            $sql = "SELECT p.id, p.name, p.price, ii.quantity 
                    FROM invoices i 
                    JOIN invoice_items ii ON i.id = ii.invoice_id 
                    JOIN products p ON ii.product_id = p.id 
                    WHERE i.invoice_number = :invoice_number";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':invoice_number', $invoice_number);
            $stmt->execute();

            // Save results into Session
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($results) {
                $_SESSION['results'] = $results;
            } else {
                $_SESSION['results'] = [];
            }

            // redirect to returns.php
            header("Location: ../html/returns.php");
            exit();

        } catch (PDOException $e) {
            die("Query fallita: " . $e->getMessage());
        }

        $stmt = null;
        $pdo = null;
    }
}
?>
