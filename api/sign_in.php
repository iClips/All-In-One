<?php
    if (session_status() !== PHP_SESSION_ACTIVE)
        session_start(['cookie_httponly' => true,'cookie_secure' => true,'use_strict_mode' => true,]);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $password = $_POST['password'];

        // Simple check
        if ($username === 'user' && $password === 'pass') {
            session_regenerate_id(true);
            $_SESSION['SignedIn'] = true;
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
        }
    }
?>