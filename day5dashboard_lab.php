<?php
// DAY 5 LAB — FILE 2: Dashboard (protected page)
session_start();   // MUST be first — before any HTML output

// ---- Logout logic: triggered by ?action=logout ----
if (($_GET['action'] ?? '') === 'logout') {
    $_SESSION = [];          // 1. clear session vars in memory
    session_destroy();       // 2. destroy the server-side session file
    header("Location: day5_login.php");
    exit;                    // 3. stop execution
}

// ---- Protection check: no session? boot them out ----
if (!isset($_SESSION['user'])) {
    header("Location: day5_login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
<div style="max-width: 480px; margin: 40px; font-family: sans-serif;">
    <h1>Secure Dashboard</h1>
    <!-- Already escaped at storage time, so it's safe to print directly -->
    <p>Welcome back, <strong><?= $_SESSION['user'] ?></strong>!</p>
    <p><a href="day5_dashboard.php?action=logout">Log out</a></p>
</div>
</body>
</html>