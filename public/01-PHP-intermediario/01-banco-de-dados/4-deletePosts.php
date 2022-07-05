<?php

$dsn = "mysql:dbname=curso_php;host=curso-php-db";
$dbuser = "root";
$dbpass = "root";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);

    $sql = "DELETE FROM posts WHERE id = 15";
    $sql = $pdo->query($sql);

    echo "Usuário alterado com sucesso!";

} catch (PDOException $e) {
    echo "Erro ao conectar com o banco de dados: ". $e->getMessage();
}

?>
