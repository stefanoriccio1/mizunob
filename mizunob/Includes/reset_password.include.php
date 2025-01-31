<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $new_password = $_POST['new_password'];
    require_once 'dbh.inc.php';

    // Verify the token
    $stmt = $pdo->prepare("SELECT * FROM password_resets WHERE token = :token AND expires >= :current_time");
    $stmt->bindParam(':token', $token);
    $stmt->bindParam(':current_time', date("U"));
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $email = $row['email'];

        // Update the password
        $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET pwd = :new_password WHERE email = :email");
        $stmt->bindParam(':new_password', $new_password_hashed);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Delete the used token
        $stmt = $pdo->prepare("DELETE FROM password_resets WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        echo "Password updated successfully!";
    } else {
        echo "Invalid or expired token.";
    }
}
?>
