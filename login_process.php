<?php
session_start();
include 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];

    try {
        // データベースに接続
        $conn = new PDO(
            'mysql:dbname=mydb;host=localhost;',
            'root',
            'root'
        );

        // エラーモードを設定
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // データベースからユーザー情報を取得する処理
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $login_email);
        $stmt->bindParam(':password', $login_password);

        // クエリを実行
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php"); // ログイン後にindex.phpにリダイレクト
            exit();
        } else {
            echo "ログインに失敗しました。";
        }
    } catch (PDOException $e) {
        echo 'エラー: ' . $e->getMessage();
    }
}
?>
<!-- ログインフォームを表示するHTMLコード -->
<!DOCTYPE html>
<html>
<head>
    <title>Pet Photo App - ログイン</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Pet Photo App</h1>
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
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Pet Photo App</p>
    </footer>
</body>
</html>
