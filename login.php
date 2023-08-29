<?php
session_start();
include 'templates/header.php';
?>

<main>
    <h2>ログイン</h2>
    <form action="login_process.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">ログイン</button>
    </form>
</main>

<?php include 'templates/footer.php'; ?>
