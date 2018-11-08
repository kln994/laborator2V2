<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css"> <!-- intrebare - de ce nu imi vede css-ul cu clasa .content din primul fisier? -->
</head>
<body>
    <div class="header">
        <h2>Home page</h2>
    </div>

    <div class="content">
        <?php if(isset($_SESSION['success'])): ?>
            <div class="error success">
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif; ?>

        <?php if(isset($_SESSION["username"])): ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong> </p>
        <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
        <?php endif ?>

    </div>

</body>
</html>