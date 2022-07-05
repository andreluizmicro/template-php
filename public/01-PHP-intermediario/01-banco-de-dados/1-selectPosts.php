<?php

$dsn = "mysql:dbname=curso_php;host=curso-php-db";
$dbuser = "root";
$dbpass = "root";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);

    $sql = "SELECT * FROM posts";
    $sql = $pdo->query($sql);

    if($sql->rowCount() > 0) {
        foreach($sql->fetchAll() as $post) {
            echo "Título: <b>".$post["title"] . "</b><br>";
            echo "Descrição: <b>".$post["body"] . "</b><br>";
            echo "Autor: <b>".$post["author"] . "</b><br>";
            echo "----------------------------------- <br>";
        }

    } else {
        echo "Não há usuários cadastrados!";
    }   

    echo "----------------------------------------------------- <br>";

    $author = "Andre Luizs";
    $sql = "SELECT * FROM posts WHERE author = '$author'";
    $sql = $pdo->query($sql);

    if($sql->rowCount() > 0) {
        foreach($sql->fetchAll() as $post) {
            echo "Título: <b>".$post["title"] . "</b><br>";
            echo "Descrição: <b>".$post["body"] . "</b><br>";
            echo "Autor: <b>".$post["author"] . "</b><br>";
            echo "----------------------------------- <br>";
        }
    } else {
        echo "O Usuário $author não possui nenhum post cadastrado";
    }
    
} catch (PDOException $e) {
    echo "Erro ao conectar com o banco de dados: ". $e->getMessage();
}

?>