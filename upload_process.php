<?php
session_start();
include 'includes/db.php';

// フォームからのデータを受け取る
$tags = $_POST['tags'];
$imageTmpPath = $_FILES["image"]["tmp_name"];
$imageName = $_FILES["image"]["name"];
$targetDirectory = "images/";
$targetFilePath = $targetDirectory . $imageName;

// アップロードされた画像を指定のディレクトリに移動
if (move_uploaded_file($imageTmpPath, $targetFilePath)) {
    // ファイルデータをデータベースに保存
    $sql = "INSERT INTO photos (user_id, filename, tags, date) VALUES (:user_id, :filename, :tags, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id', $_SESSION['user_id']);
    $stmt->bindParam(':filename', $targetFilePath); // ファイルのパスを保存
    $stmt->bindParam(':tags', $tags);
    $stmt->execute();

    // 画面をリダイレクトして写真一覧を表示
    header("Location: index.php");
    exit();
} else {
    echo "画像のアップロード中にエラーが発生しました。";
}
?>
