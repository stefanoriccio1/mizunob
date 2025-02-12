<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Add a product to the cart
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_POST['cart_product_id']) && isset($_POST['cart_product_color']) == true) {
        $product_id = $_POST['cart_product_id'];
        $userid = $_SESSION['userId'];
        $product_color = $_POST['cart_product_color'];

        try {
            require_once 'dbh.inc.php';

             // Add product to cart
             $sql = "INSERT INTO cart (user_id, product_id, product_color) VALUES (:userid, :product_id, :product_color)";
             $stmt = $pdo->prepare($sql);

            // Binding parameters
             $stmt->bindParam(':userid', $userid);
             $stmt->bindParam(':product_id', $product_id);
             $stmt->bindParam(':product_color', $product_color);

             $stmt->execute();

         } catch (PDOException $e) {
             echo "Error: " . $e->getMessage();
         }

         // Closing connection
         $stmt = null;
         $pdo = null;
         header("Location: ../html/cart.php");
         exit();
    }
}

// Remove a product from the cart
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && isset($_POST['remove_product_cart'])) {
        $product_id = $_POST['remove_product_cart'];
        $userid = $_SESSION['userId'];
        $product_color = $_POST['remove_product_color'];

        try {
            require_once 'dbh.inc.php';
            $sql = "DELETE FROM cart WHERE user_id = :userid AND product_id = :product_id AND product_color = :product_color";
            $stmt = $pdo->prepare($sql);

            // Binding parameters
            $stmt->bindParam(':userid', $userid);
            $stmt->bindParam(':product_id', $product_id);
            $stmt->bindParam(':product_color', $product_color);

            $stmt->execute();

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Closing connection
        $stmt = null;
        $pdo = null;
        header("Location: ../html/cart.php");
        exit();
    }
}

// Retrieve products from the cart
function getCartProducts($userid) {
    try {
        require 'dbh.inc.php';
        $sql = "SELECT p.id, p.name, p.size, p.price, p.img, c.description AS color 
                FROM products AS p
                JOIN cart AS ca ON p.id = ca.product_id 
                JOIN product_colors AS pc ON p.id = pc.product_id
                JOIN colors AS c ON pc.color_id = c.id
                WHERE ca.user_id = :userid AND ca.product_color = c.description";
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