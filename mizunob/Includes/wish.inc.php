<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Add a product to the wishlist
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_POST['add_product_id'])) {
        $product_id = $_POST['add_product_id'];
        $userid = $_SESSION['userId'];

        try {
            require_once 'dbh.inc.php';

            // Check if the product is already in the wishlist
            $checkSql = "SELECT * FROM wishlists WHERE user_id = :userid AND product_id = :product_id";
            $checkStmt = $pdo->prepare($checkSql);
            $checkStmt->bindParam(':userid', $userid);
            $checkStmt->bindParam(':product_id', $product_id);
            $checkStmt->execute();

            if ($checkStmt->rowCount() == 0) {
                // If the product is not in the wishlist, add it
                $sql = "INSERT INTO wishlists (user_id, product_id) VALUES (:userid, :product_id)";
                $stmt = $pdo->prepare($sql);

                // Binding parameters
                $stmt->bindParam(':userid', $userid);
                $stmt->bindParam(':product_id', $product_id);

                $stmt->execute();
            } else {
                echo "Product already in wishlist";
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Closing connection
        $checkStmt = null;
        $stmt = null;
        $pdo = null;
        header("Location: ../html/shoes.php");
        exit();
    }
}
// Remove a product from wishlist
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_POST['remove_product_id'])) {
        $product_id = $_POST['remove_product_id'];
        $userid = $_SESSION['userId'];

        try {
            require_once 'dbh.inc.php';
            $sql = "DELETE FROM wishlists WHERE user_id = :userid AND product_id = :product_id";
            $stmt = $pdo->prepare($sql);

            // Binding parameters
            $stmt->bindParam(':userid', $userid);
            $stmt->bindParam(':product_id', $product_id);

            $stmt->execute();
        } catch (PDOException $e) {
            echo "Errore: " . $e->getMessage();
        }

        // Closing connection
        $stmt = null;
        $pdo = null;
        header("Location: ../html/wishlist.php");
        exit();
    }
}

// Retrieve products from the wishlist
function getWishlistProducts($userid) {
    try {
        require 'dbh.inc.php';
        $sql = "SELECT p.id, p.name, p.size, p.price, p.img, c.description AS color 
                FROM products AS p
                INNER JOIN wishlists AS w ON p.id = w.product_id 
                INNER JOIN colors AS c ON p.color_id = c.id
                WHERE w.user_id = :userid";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userid', $userid);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}
?>