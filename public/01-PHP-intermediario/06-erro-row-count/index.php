<?php

try {
    $pdo = new PDO("mysql:dbname=curso_php;host=curso-php-db", "root", "root");
} catch(PDOException $e) {
    echo "ERRO: " . $e->getMessage();
}

$sql  = "SELECT * FROM posts";
$sql = $pdo->query($sql);

echo "TOTAL DE registos: " . $sql->rowCount();