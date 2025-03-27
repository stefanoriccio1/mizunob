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
    if (isset($_SESSION['signin_success']) && $_SESSION['signin_success']) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="signinAlert">
                <strong>Well done!</strong> You have successfully signed in!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        // Unset the session variable to prevent the alert from showing again on page refresh
        unset($_SESSION['signin_success']);
    }
    ?>
    <main id="mainSignin">
        <!-- form sign in -->
        <form id="signinForm" class="row col-4" action="../includes/signin.inc.php" method="post" enctype="multipart/form-data">
            <h2 style="color: #00138a;">Insert your data</h2>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name= "email" placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="name" class="form-control" id="floatingInput" name= "name" placeholder="Your Name">
                <label for="floatingInput">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="last_name" class="form-control" id="floatingInput" name= "last_name" placeholder="Your Last Name">
                <label for="floatingInput">Last Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name= "pwd" placeholder="Password">
                <label for="floatingPassword">Password</label> 
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Confirm Your Password">
                <label for="floatingPassword">Confirm Your Password</label>
            </div>    
            <div class="form-floating mb-3">
                <input type="address" class="form-control" id="floatingPassword" name= "ship_address" placeholder="Address">
                <label for="floatingPassword">Address</label>
            </div>    
            <div class="form-floating mb-3">
                <input type="vat" class="form-control" id="floatingPassword" name= "VAT" placeholder="VAT">
                <label for="floatingPassword">VAT</label>
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                <input class="form-control" type="file" id="profile_picture" name="profile_picture">
            </div>
            <div>
                <button type="submit" class="btn btn-outline-primary" id="signinbut">Sign In</button>
            </div>   
            <div class="alert alert-success alert-dismissible" role="alert" id="signinAlert" style="display: none;">
                <strong>Well done!</strong> You have successfully signed in!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>  
            <div style="margin-top: 5%;" id="ahaDiv">
                <a id="alreadyAccount" href="#">If you already have an account, please Login</a>
            </div>
        </form>
        <!-- form login -->
        <form id="loginForm" class="row col-4" method="post" action="../includes/login.php">
            <h2 style="color: #00138a;">Login</h2>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" required>
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <div>
                <button type="submit" class="btn btn-outline-primary" id="loginbut">Log In</button>
            </div>   
            <!-- <div class="alert alert-success alert-dismissible" role="alert" id="loginAlert" style="display: none;">
                <strong>Well done!</strong> You have successfully logged in!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>  -->
            <div style="margin-top: 5%;" id="fpDiv">
                <a id="forgottonePassword" href="recover_pwd.php">Click here if you forgot your password</a>
            </div>
        </form>
    </main>
    <!-- Footer -->
    <?php include 'footer.php'; ?>
<!-- Javascrip -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../javascript/script.js"></script>
</body>
</html>
