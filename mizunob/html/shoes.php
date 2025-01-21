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
                // for each product, printing a a card with all the needed details
                foreach ($products as $row) {
                    echo '<div class="col-md-3">';
                    echo '<a href="#">';
                    echo '<div class="card mb-4 productCard position-relative">';
                    echo '<div class="position-absolute top-0 start-0 m-2">';
                    echo '<a href="#" class="btn btn-secondary" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Wishlist"><i class="fa-solid fa-heart"></i></button>';
                    echo '<a href="#" class="btn btn-secondary" style="margin-right: 5px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Cart"><i class="fa-solid fa-cart-shopping"></i></a>';
                    echo '</div>';
                    echo '<img src="http://localhost/mizunob/img/products/' . basename($row["img"]) . '" class="card-img-top" alt="' . $row["name"] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["name"] . '</h5>';
                    echo '<p class="card-text">Colore: ' . $row["color"] . '</p>';
                    echo '<p class="card-text">Taglia: ' . $row["size"] . '</p>';
                    echo '<p class="card-text">Prezzo: €' . $row["price"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</a>';
                    echo '</div>';
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
