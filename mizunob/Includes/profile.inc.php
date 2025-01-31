<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function getProfileInfos($userid){
    try {
    //DB connection
    require_once 'dbh.inc.php';

    // Get profile infos from db
    $sql = "SELECT u.name, u.last_name, u.email, u.ship_address, u.billing_address, u.vat, u.profile_picture
    FROM users AS u
    WHERE u.id = :userid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userid', $userid);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    return [];
    }
}


?>