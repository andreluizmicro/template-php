<?php
require "../../config.php";

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);

    $sql = "DELETE FROM usuarios WHERE id = '$id'";
    $pdo->query($sql);

    header("Location: index.php");
} else {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir usuário Usuário</title>
</head>
<body>
    <center><h1>Exlcuir Usuário</h1></center>
    
</body>
</html>