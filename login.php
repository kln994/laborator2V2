<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="header">
    <h2>Login</h2>
</div>

<form method="post" action="login.php">
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username">
    </div>

    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>

    <div class="input-group">
        <button type="submit" name="register" class="btn">Login</button>
    </div>

    <p>
        Not yet a member? <a href="register.php">Register</a>
    </p>

</form>

</body>
</html>