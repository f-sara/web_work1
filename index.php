<?php
session_start();
include 'includes/db.php';

// ログインしていない場合はウェルカムページにリダイレクト
if (!isset($_SESSION['user_id'])) {
    header("Location: welcome.php");
    exit();
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Pet Photo App</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="header">
        <h1 class="header-title">Pet Photo App</h1>
    </header>

    <main>
        
        <!-- 写真投稿フォーム -->
        <h2>写真を投稿する</h2>
        <form action="upload_process.php" method="POST" enctype="multipart/form-data">
            <label for="image">写真を選択:</label>
            <input type="file" id="image" name="image" accept="image/*" required><br>
            <label for="tags">動物の名前:</label>
            <input type="text" id="tags" name="tags" required><br>
            <button type="submit">投稿</button>
        </form>

        <!-- 写真一覧 -->
        <h2>投稿一覧</h2>
        <div class="photos">
        <?php
        $sql = "SELECT * FROM photos";
        $result = $conn->query($sql);
        $rowCount = $result->rowCount();

        if ($rowCount > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='photo'>";
                echo "<img src='" . $row["filename"] . "' alt='Pet Photo'>";
                echo "<p>ジャンル: " . $row["tags"] . "</p>";
                echo "</div>";
            }
        } else {
            echo "写真がありません。";
        }
        ?>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Pet Photo App</p>
    </footer>
</body>
</html>
