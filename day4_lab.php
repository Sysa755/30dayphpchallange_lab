<?php
// initialize the variables
$errorMsg   = '';
$successMsg = '';

// 2. Only process if the form was actually submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // claen/trim
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    //make sute they aint empty
    if (empty($email) || empty($password)) {
        $errorMsg = "Both email and password are required.";
    } else {
        //sanitization
        $safeEmail  = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $successMsg = "Login request for <strong>$safeEmail</strong> processed securely.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Secure Login</title>
</head>
<body>
<div style="max-width: 400px; margin: 20px; font-family: sans-serif;">
    <h3>Account Login</h3>

    <!-- Conditionally show error or success message above the form -->
    <?php if ($errorMsg): ?>
        <div style="color: #9f1239; padding: 10px; background: #ffe4e6; margin-bottom: 15px;">
            <?= $errorMsg ?>
        </div>
    <?php elseif ($successMsg): ?>
        <div style="color: #166534; padding: 10px; background: #dcfce7; margin-bottom: 15px;">
            <?= $successMsg ?>
        </div>
    <?php endif; ?>

    <!-- The form — action="" submits back to this same file -->
    <form method="POST" action="">
        <p>Email:<br>
            <input type="email" name="email" style="width:100%">
        </p>
        <p>Password:<br>
            <input type="password" name="password" style="width:100%">
        </p>
        <button type="submit" style="padding: 8px 16px;">Login</button>
    </form>
</div>
</body>
</html>