<?php
session_start();
include 'includes/db.php';

// ログインしていない場合はウェルカムページにリダイレクト
if (!isset($_SESSION['user_id'])) {
    header("Location: welcome.php");
    exit();
}

// 検索フォームで送信された値を受け取ります
$searchTags = isset($_POST['search_tags']) ? $_POST['search_tags'] : '';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Pet Photo App</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="header-title">
            <h1>Pet Photo App</h1>
        </div>
        <div class="upload-form-button">
            <a href="upload_form.php">投稿</a>
        </div>
    </header>

    <!-- 検索フォーム -->
    <div class="search-bar">
        <form action="index.php" method="POST">
            <input type="text" id="search_tags" name="search_tags" value="<?php echo $searchTags; ?>">
            <button type="submit">検索</button>
        </form>
    </div>

    <main>
        <div class="photos">
        <?php
        // 検索フォームで送信された値を使用して、写真を絞り込むクエリを作成します
        $sql = "SELECT * FROM photos";
        
        if (!empty($searchTags)) {
            $sql .= " WHERE tags LIKE :searchTags";
        }
        
        $stmt = $conn->prepare($sql);

        if (!empty($searchTags)) {
            $searchParam = '%' . $searchTags . '%';
            $stmt->bindParam(':searchTags', $searchParam);
        }

        $stmt->execute();

        $rowCount = $stmt->rowCount();

        if ($rowCount > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
