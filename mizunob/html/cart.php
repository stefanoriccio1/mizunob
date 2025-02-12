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
    <link rel="shortcut icon" href="../img/favicon.ico">
    <script src="https://kit.fontawesome.com/8facfa452a.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
    <?php include 'header.php'; ?>
    <?php
    include '../includes/cart.inc.php';
    $cartProducts = getCartProducts($userId);
    ?>
    <!-- Main -->
    <main>
        
        <div class ="container" id="cartContainer">
            <h2 class="text-center">Your cart</h2>
            <div class="row">
            <?php
            if (!empty($cartProducts)) {
                foreach ($cartProducts as $product) {
                    echo '<div class="col-md-3" name="' . $product["id"] . '">';
                    echo '<div class="card mb-4 productCard position-relative">';
                    echo '<div class="position-absolute top-0 start-0 m-2">';
                    echo '<form method="POST" action="../includes/wish.inc.php" style="display:inline;">';
                    echo '<input type="hidden" name="add_product_id" value="' . $product["id"] . '">';
                    echo '<input type="hidden" name="add_product_color" value="' . $product["color"] . '">';
                    echo '<button type="submit" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add to Wishlist"><i class="fa-solid fa-heart"></i></button>';
                    echo '</form>';
                    echo '<form method="POST" action="../includes/cart.inc.php" style="display:inline;">';
                    echo '<input type="hidden" name="remove_product_cart" value="' . $product["id"] . '">';
                    echo '<input type="hidden" name="remove_product_color" value="' . $product["color"] . '">';
                    echo '<button type="submit" class="btn btn-secondary" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Remove from Cart"><i class="fa-solid fa-trash"></i></button>';
                    echo '</form>';
                    echo '</div>';
                    echo '<img src="http://localhost/mizunob/img/products/' . basename($product["img"]) . '" class="card-img-top" alt="' . $product["name"] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $product["name"] . '</h5>';
                    echo '<p class="card-text">Color: ' . $product["color"] . '</p>';
                    echo '<p class="card-text">Size: ' . $product["size"] . '</p>';
                    echo '<p class="card-text">Price: €' . $product["price"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>Your cart is empty.</p>';
            }
            ?>
        </div>
        </div>
    </main>
    <!-- Footer -->
    <?php include 'footer.php'; ?>
<!-- Javascrip -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../javascript/script.js"></script>
</body>
</html>
