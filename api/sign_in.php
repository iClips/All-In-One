<?php
session_start([
    'cookie_httponly' => true,
]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Simple check
    if ($username === 'user' && $password === 'pass') {
        $_SESSION['SignedIn'] = true;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
    }
}
?>