<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $register_email = $_POST['register_email'];
    $register_password = $_POST['register_password'];

    try {
        // データベースに接続
        $conn = new PDO(
            'mysql:dbname=mydb;host=localhost;',
            'root',
            'root'
        );

        // エラーモードを設定
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // ユーザー情報をデータベースに登録する処理
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $register_email);
        $stmt->bindParam(':password', $register_password);

        // クエリを実行
        $stmt->execute();

        // 登録したユーザーのIDをセッションに保存
        $_SESSION['user_id'] = $conn->lastInsertId();

        // 画面をリダイレクト
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo 'エラー: ' . $e->getMessage();
    }
}
?>
<!-- 新規登録フォームを表示するHTMLコード -->
<!DOCTYPE html>
<html>
<head>
    <title>Pet Photo App - 新規登録</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1 class="header-title">Pet Photo App</h1>
    </header>

    <main>
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
