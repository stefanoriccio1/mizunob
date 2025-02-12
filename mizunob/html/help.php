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
    <!-- Main -->
    <main>
        <div class="container-fluid helpguide">
            <h1>Help guide for Users</h1>
            <select class="form-select form-select-lg" id="selectHelp">
                <option>I can not login</option>
                <option>I forgot my password</option>
                <option>I need a refund</option>
                <option>I want to delete my account</option>
            </select>
        </div>
        <!-- Portal -->
        <div class="container my-5">
            <h1 class="text-center mb-4">Help Portal</h1>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Returns</h5>
                            <p class="card-text">Find information on how to return your items.</p>
                            <a href="returns.php" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Where is my order</h5>
                            <p class="card-text">Track the status of your order.</p>
                            <a href="#" class="btn btn-primary">Track Order</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Help</h5>
                            <p class="card-text">Get general help and support.</p>
                            <a href="#" class="btn btn-primary">Get Help</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Where to find us</h5>
                            <p class="card-text">Find our store locations.</p>
                            <a href="contacts.php" class="btn btn-primary">Find Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal's button -->
         <div class="container-fluid" style="text-align: center;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" style="margin-bottom: 5%;">
                    More Questions? Click on me!
                </button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Contacts</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                For anything you need: 0114567893
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a href="../html/homepage.php" class="btn btn-primary">Back to Homepage</a>
                            </div>
                        </div>
                    </div>
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
