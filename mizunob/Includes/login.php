<?php
// session starting in order to collect data and store them in the current session
session_start();

// checking if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collecting data from the form
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        try {
            // db connection
            require_once 'dbh.inc.php';
            // preparing and executing the query via pod
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // fetching the user from the database
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                // checking if the password is correct
                if (password_verify($password, $user['pwd'])) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $user['email'];
                    $username = $user['email'];
                    header("Location: ../html/homepage.php?login=success&username=$username");
                    exit();
                } else {
                    echo "<script>alert('password errata');</script>";
                }
            } else {
                echo "<script>alert('Utente non trovato');</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('Errore: " . $e->getMessage() . "');</script>";
        }
    } else {
        echo "<script>alert('Email o password non impostati');</script>";
    }
}
?>