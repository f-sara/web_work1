<?php
session_start();
include 'templates/header.php';
?>

<main>
    <h2>写真を投稿する</h2>
    <form action="upload_process.php" method="POST" enctype="multipart/form-data">
        <label for="image">写真を選択:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br>
        <label for="tags">ペットの名前（タグ）:</label>
        <input type="text" id="tags" name="tags" required><br>
        <button type="submit">投稿</button>
    </form>
</main>

<?php include 'templates/footer.php'; ?>
