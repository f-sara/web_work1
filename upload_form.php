<!DOCTYPE html>
<html>
<head>
    <title>Pet Photo App - 写真を投稿する</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Pet Photo App</h1>
    </header>

    <main>
        <h2>写真を投稿する</h2>
        <form action="upload_process.php" method="POST" enctype="multipart/form-data">
            <label for="image">写真を選択:</label>
            <input type="file" id="image" name="image" accept="image/*" required><br>
            <label for="tags">動物の名前:</label>
            <input type="text" id="tags" name="tags" required><br>
            <button type="submit">投稿</button>
        </form>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Pet Photo App</p>
    </footer>
</body>
</html>
