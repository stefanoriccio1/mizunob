<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Profilo Utente</title>
    <link rel="shortcut icon" href="../img/favicon.ico">
    <script src="https://kit.fontawesome.com/8facfa452a.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
    <?php 
        include 'header.php'; 
        include '../includes/profile.inc.php';
        $profileInfos = getProfileInfos($userId);
    ?>
    <!-- Main -->
    <main class="container mt-5">
        <div id="profileContainer" class="container d-flex justify-content-center mt-5" style="margin-bottom: 5%;">
            <div class="col-md-4">
                <div class="card text-center" style="padding-top: 5%;">
                    <img src="<?php echo $profileInfos[0]['profile_picture']; ?>" class="card-img-top rounded-circle" alt="Foto Profilo" style="width: 50%; margin: 0 auto;">
                    <div class="card-body">
                        <h5 class="card-title" id="name"><?php echo $profileInfos[0]['name']; ?></h5>
                        <p class="card-text" id="last_name"><?php echo $profileInfos[0]['last_name']; ?></p>
                        <p class="card-text" id="email"><?php echo $profileInfos[0]['email']; ?></p>
                        <p class="card-text" id="ship_address"><?php echo $profileInfos[0]['ship_address']; ?></p>
                        <p class="card-text" id="bill_address"><?php echo $profileInfos[0]['billing_address']; ?></p>
                        <p class="card-text" id="vat"><?php echo $profileInfos[0]['vat']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php include 'footer.php'; ?>
    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../javascript/script.js"></script>
</body>
</html>
