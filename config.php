<?php

$dsn = "mysql:dbname=curso_php;host=curso-php-db";
$dbuser = "root";
$dbpass = "root";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);

} catch (PDOException $e) {
    echo "Erro ao conectar com o banco de dados: ". $e->getMessage();
}

?>