<?php
//FILE 1 LOGIN PAGE
session_start();   // MUST be first — before any HTML output

// If already logged in, skip the form and go straight through
if (isset($_SESSION['user'])) {
    header("Location: day5_dashboard.php");
    exit;
}

// Handle the POST submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['username'])) {
    // Trim, then sanitize the username BEFORE storing it 
    $username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');

    $_SESSION['user'] = $username; 

    header("Location: day5_dashboard.php");
    exit;                            
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<div style="max-width: 360px; margin: 40px; font-family: sans-serif;">
    <h2>Sign In</h2>
    <form method="POST" action="">
        <p>Username:<br>
            <input type="text" name="username" placeholder="Enter username" required style="width:100%">
        </p>
        <button type="submit" style="padding: 8px 16px;">Login</button>
    </form>
</div>
</body>
</html>