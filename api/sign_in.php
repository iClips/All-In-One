<?php
    if (session_status() !== PHP_SESSION_ACTIVE)
            session_start(['cookie_httponly' => true,'cookie_secure' => true,'use_strict_mode' => true,]);
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate CSRF token
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            http_response_code(403);
            echo json_encode(['error' => 'Invalid CSRF token']);
            exit;
        }

        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $password = $_POST['password'];
        // Assume checking credentials from DB
        if ($username === 'user' && $password === 'pass') {
            session_regenerate_id(true);
            $_SESSION['SignedIn'] = true;
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
        }
    }
?>