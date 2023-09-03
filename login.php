<?php
session_start();
include 'includes/db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pet Photo App - ログイン・登録</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1 class="header-title">Pet Photo App</h1>
    </header>

    <main>
        <h2>ログイン</h2>
        <form action="login_process.php" method="POST">
        <label for="login_email">Email:</label>
        <input type="email" id="login_email" name="login_email" required><br>
        <label for="login_password">パスワード:</label>
        <input type="password" id="login_password" name="login_password" required><br>
        <button type="submit">ログイン</button>
    </form>

        <h2>新規登録</h2>
        <form action="register_process.php" method="POST">
           <label for="username">ユーザー名:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="register_email">Email:</label>
            <input type="email" id="register_email" name="register_email" required><br>
            <label for="register_password">パスワード:</label>
            <input type="password" id="register_password" name="register_password" required><br>
            <button type="submit">登録</button>
        </form>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Pet Photo App</p>
    </footer>
</body>
</html>
