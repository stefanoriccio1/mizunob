<?php
session_start();

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Storing data from form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $lastName = $_POST["last_name"];
    $pwd = password_hash($_POST["pwd"], PASSWORD_BCRYPT);
    $email = $_POST["email"];
    $address = $_POST["ship_address"];
    $vat = $_POST["VAT"];
    $profile_picture = '';

    // Handling profile picture upload
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
        $target_dir = "../img/profiles/";
        $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file is a real image
        $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["profile_picture"]["size"] > 500000) {
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // File was not uploaded
        } else {
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                $profile_picture = $target_file;
            } else {
                // There was an error uploading your file
            }
        }
    }

    try {
        // Connecting to db
        require_once "dbh.inc.php";

        // Check if email already exists
        $query_check_email = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt_check_email = $pdo->prepare($query_check_email);
        $stmt_check_email->bindParam(':email', $email);
        $stmt_check_email->execute();
        
        if ($stmt_check_email->fetchColumn() > 0) {
            $_SESSION['error'] = "Email already exists.";
            header("Location: ../html/signin.php");
            die();
        }

        // Declaring the query with placeholders
        $query = "INSERT INTO users (name, last_name, pwd, email, ship_address, VAT, profile_picture) VALUES (:name, :last_name, :pwd, :email, :ship_address, :VAT, :profile_picture)";

        // Preparing query
        $stmt = $pdo->prepare($query);

        // Binding parameters to the query
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':last_name', $lastName);
        $stmt->bindParam(':pwd', $pwd);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':ship_address', $address);
        $stmt->bindParam(':VAT', $vat);
        $stmt->bindParam(':profile_picture', $profile_picture);

        // Executing query
        $stmt->execute();

        // Closing PDO connection
        $pdo = null;
        $stmt = null;

        $_SESSION['signin_success'] = true;

        // Redirecting to the signin page
        header("Location: ../html/signin.php");
        
        // Terminating the script
        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../html/homepage.php");
}
?>
