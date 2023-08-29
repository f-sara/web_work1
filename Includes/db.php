<?php
$db_host = 'localhost';
$db_name = 'pet_photo_app';
$db_user = 'your_username';
$db_pass = 'your_password';

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("データベース接続エラー: " . $conn->connect_error);
}
?>
