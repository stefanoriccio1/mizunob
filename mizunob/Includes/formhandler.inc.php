<?php

session_start();

// storing data from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $lastName = $_POST["last_name"];
    $pwd = password_hash($_POST["pwd"], PASSWORD_BCRYPT);
    $email = $_POST["email"];
    $address = $_POST["ship_address"];
    $vat = $_POST["VAT"];

    try{
        // connecting to db
        require_once "dbh.inc.php";
        // delcaring the query with placeholders
        $query = "INSERT INTO users (name, last_name, pwd, email, ship_address, VAT) VALUES (:name, :last_name, :pwd, :email, :ship_address, :VAT)";

        // preparing  query
        $stmt = $pdo->prepare($query);

        // binding parameters to the query
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':pwd', $pwd);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':ship_address', $address);
        $stmt->bindParam(':VAT', $vat);

        // executing query
        $stmt->execute();

        // closing PDO connection
        $pdo = null;
        $stmt = null;

        // redirecting to the signin page
        header("Location: ../html/signin.php");
        
        // Terminating the script
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    header("Location: ../html/homepage.php");
}