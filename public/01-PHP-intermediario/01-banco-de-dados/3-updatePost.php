<?php

$dsn = "mysql:dbname=curso_php;host=curso-php-db";
$dbuser = "root";
$dbpass = "root";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);

    $body = "Fala meu irmão";

    $sql = "UPDATE posts SET body = '$body' WHERE id = 13"; 
    $pdo->query($sql);

    echo "Post alterado com sucesso!";

} catch (PDOException $e) {
    echo "Erro ao conectar com o banco de dados: ". $e->getMessage();
}

?>