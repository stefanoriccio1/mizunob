<?php
// Session starting in order to collect data and store them in the current session
session_start();

// Checking if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collecting data from the form
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        try {
            // DB connection
            require_once 'dbh.inc.php';
            // Preparing and executing the query via pod
            $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Fetching the user from the database
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                // Checking if the password is correct
                if (password_verify($password, $user['pwd'])) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $user['email'];
                    $_SESSION['userId'] = $user['id'];
                    $username = $user['email'];
                    header("Location: ../html/homepage.php?login=success&username=$username");
                    exit();
                } else {
                    echo "<script>alert('wrong password');</script>";
                }
            } else {
                echo "<script>alert('USer not found');</script>";
            }
        } catch (PDOException $e) {
            echo "<script>alert('Errore: " . $e->getMessage() . "');</script>";
        }
    } else {
        echo "<script>alert('User or email not setted');</script>";
    }
}
?>