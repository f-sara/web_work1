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
    <header>
        <div class="header-title">
            <h1>Pet Photo App</h1>
        </div>
        <div class="upload-form-button">
            <a href="upload_form.php">投稿</a>
        </div>
    </header>


    <main>
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
