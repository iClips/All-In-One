<?php
    if (session_status() !== PHP_SESSION_ACTIVE)
        session_start(['cookie_httponly' => true,'cookie_secure' => true,'use_strict_mode' => true,]);

    if (!isset($_SESSION['SignedIn']) || $_SESSION['SignedIn'] !== true) {
        http_response_code(403); // Forbidden
        echo json_encode(['error' => 'Access denied. Not Signed in.']);
        exit;
    }

    // If session variable is set
    echo json_encode(['message' => 'Access granted.']);
?>