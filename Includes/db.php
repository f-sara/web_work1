<?php
try {
    $conn = new PDO(
        'mysql:dbname=mydb;host=localhost;',
        'root',
        'root'
    );
    $stmt = $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch(PDOException $e) {
    echo 'DB connection error:'.$e->getMessage();
    exit(); 
}
?>
