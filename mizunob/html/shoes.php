<?php
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Mizuno</title>
    <link rel="shortcut icon" href="../img/favicon.ico" >
    <script src="https://kit.fontawesome.com/8facfa452a.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>
    <!-- Main -->
     <!-- Query for fetching all the products from db -->
    <?php
    include '../includes/producthandler.php';
    ?>
    <main class="container" id="productContainer">
        <h2>Check our Products!</h2>
        <div class="row">
            <?php
            if (!empty($products)) {
                foreach ($products as $product) {
                    echo '<div class="col-md-3" name="' . $product["id"] . '">
                            <div class="card mb-4 productCard position-relative">
                                <div class="position-absolute top-0 start-0 m-2">';
                    if ($isLoggedIn) {
                        echo '<form method="POST" action="../includes/wish.inc.php" style="display:inline;">
                                <input type="hidden" name="add_product_id" value="' . $product["id"] . '">
                                <input type="hidden" name="add_product_color" value="' . $product["color"] . '">
                                <button type="submit" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="fa-solid fa-heart"></i></button>
                            </form>
                            <form method="POST" action="../includes/cart.inc.php" style="display:inline;">
                                <input type="hidden" name="cart_product_id" value="' . $product["id"] . '">
                                <input type="hidden" name="cart_product_color" value="' . $product["color"] . '">
                                <button type="submit" class="btn btn-secondary" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Cart"><i class="fa-solid fa-cart-shopping"></i></button>
                            </form>';
                    }
                    echo '</div>
                            <img src="http://localhost/mizunob/img/products/' . basename($product["img"]) . '" class="card-img-top" alt="' . $product["name"] . '">
                            <div class="card-body">
                                <h5 class="card-title">' . $product["name"] . '</h5>
                                <p class="card-text">Colore: ' . $product["color"] . '</p>
                                <p class="card-text">Taglia: ' . $product["size"] . '</p>
                                <p class="card-text">Prezzo: €' . $product["price"] . '</p>
                                <p class="card-text">Quantità: ' . $product["qty"] . '</p>
                            </div>
                        </div>
                        </div>';
                }
            } else {
                echo '<p>Nessun prodotto trovato.</p>';
            }
            ?>
        </div>
    </main>
    <!-- Footer -->
    <?php include 'footer.php'; ?>
<!-- Javascrip -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../javascript/script.js"></script>
</body>
</html>
