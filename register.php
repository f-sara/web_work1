<?php
session_start();
include 'templates/header.php';
?>

<main>
    <h2>新規登録</h2>
    <form action="register_process.php" method="POST">
        <label for="username">ユーザー名:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">登録</button>
    </form>
</main>

<?php include 'templates/footer.php'; ?>
