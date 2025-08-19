<?php
    if (session_status() !== PHP_SESSION_ACTIVE) session_start([
        'cookie_httponly' => true,
        'cookie_secure' => true,
        'use_strict_mode' => true,
    ]);

    if (!isset($_SESSION['SignedIn']) || !isset($_SESSION['csrf_token'])) {
        header('Location: index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <title>All In One</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
</html>
<body>
    <header>
        <!-- Burger Menu Button -->
        <div id="menu-toggle" class="menu-button">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <h1>All In One</h1>
    </header>


    <nav id="side-menu" class="side-menu">
        <div class="menu-section">
            <div class="menu-item" data-id="my-account">
                <i class="fas fa-user icon"></i>
                My Account
            </div>
        </div>
        <div class="menu-section">
            <div class="menu-item" data-id="item-3">
                <i class="fas fa-cog icon"></i>
                Settings
            </div>
            <div class="menu-item" data-id="item-4">
                <i class="fas fa-sign-out-alt icon"></i>
                Sign Out
            </div>
        </div>
    </nav>

    <main>
        <button id="floating-action-button">
            <i class="fas fa-plus"></i>
        </button>
        <section class="account-form" id="my-account">
            <h2>My Account</h2>
        </section>
        <div id="modal"
            style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); justify-content: center; align-items: center; opacity: 0; transition: opacity 0.3s;">
            <div
                style="background-color: #fff; padding: 20px; box-shadow: 2px 2px 10px red; border-radius: 8px; width: 90%; max-width: 400px; transform: translateY(-20px); transition: transform 0.3s;">
                <h2 style="color: #000; margin-top: 0;">Add Beneficiary</h2>
                <label style="color: #000;">Name:</label><input id="name" type="text"
                    style="border: 1px solid #ff0000b8; margin-bottom: 10px; padding: 8px; width: 100%; box-sizing: border-box; border-radius: 4px;"><br>
                <label style="color: #000;">Bank Name:</label><input id="bank_name" type="text"
                    style="border: 1px solid #ff0000b8; margin-bottom: 10px; padding: 8px; width: 100%; box-sizing: border-box; border-radius: 4px;"><br>
                <label style="color: #000;">Account Number:</label><input id="account_number" type="text"
                    style="border: 1px solid #ff0000b8; margin-bottom: 10px; padding: 8px; width: 100%; box-sizing: border-box; border-radius: 4px;"><br>
                <label style="color: #000;">Branch Code:</label><input id="branch_code" type="text"
                    style="border: 1px solid #ff0000b8; margin-bottom: 10px; padding: 8px; width: 100%; box-sizing: border-box; border-radius: 4px;"><br>
                <label style="color: #000;">Account Type:</label><input id="account_type" type="text"
                    style="border: 1px solid #ff0000b8; margin-bottom: 10px; padding: 8px; width: 100%; box-sizing: border-box; border-radius: 4px;"><br>
                <label style="color: #000;">Payable Amount:</label><input id="payable_amount" type="number"
                    style="border: 1px solid #ff0000b8; margin-bottom: 10px; padding: 8px; width: 100%; box-sizing: border-box; border-radius: 4px;"><br>
                <div style="display: flex; justify-content: space-between;">                    
                    <button id="closeModalBtn"
                        style="background-color: #000000d6; color: #fff; box-shadow: 2px 2px 10px red;padding: 10px 20px; cursor: pointer; border-radius: 4px;">Close</button>
                </div>
            </div>
        </div>
    </main>


    <script src="assets/js/script.js"></script>
</body>

</html>