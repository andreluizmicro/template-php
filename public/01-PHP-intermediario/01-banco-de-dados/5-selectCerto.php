<?php

$dsn = "mysql:dbname=curso_php;host=curso-php-db";
$dbuser = "root";
$dbpass = "root";

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);

    $nome = 'Maria Jose';
    $id = 6;

    $sql = "UPDATE usuarios SET nome = :nome WHERE id = :id";
    
    $sql = $pdo->prepare($sql);
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':id', $id);
    $sql->execute();

    echo "Usuário atualizado com sucesso!";

} catch (PDOException $e) {
    echo "Erro ao conectar com o banco de dados: ". $e->getMessage();
}

?>
