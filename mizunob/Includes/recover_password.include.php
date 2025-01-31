<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['rec_email'];
    require_once 'dbh.inc.php';

    // Check if the email exists in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $token = bin2hex(random_bytes(50));
        $expires = date("U") + 1800; // Token valid for 30 minutes

        // Insert the token into the password_resets table
        $stmt = $pdo->prepare("INSERT INTO password_resets (email, token, expires, created_at, last_update) VALUES (:email, :token, :expires, NOW(), NOW())");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':expires', $expires);
        $stmt->execute();

        // Send the recovery email
        $to = $email;
        $subject = "Password Recovery";
        $message = "Click the link to reset your password: localhost/mizunob/html/reset_password.php?token=$token";
        mail($to, $subject, $message);

        echo "Recovery email sent!";
    } else {
        echo "Email not found.";
    }
}
?>
