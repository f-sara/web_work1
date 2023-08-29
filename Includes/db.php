<?php
try {
    $db = new PDO(
        'mysql:dbname=mydb;host=localhost;',
        'root',
        'root'
    );
    $stmt = $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch(PDOException $e) {
    echo 'DB connection error:'.$e->getMessage();
    exit(); 
}
?>
