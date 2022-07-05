<?php
require "../../config.php";

if(isset($_POST['nome']) && !empty($_POST['nome'])){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";
    $pdo->query($sql);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
</head>
<body>
    <center><h1>Cadastrar usuário</h1></center>
    <form method="POST">
        Nome: <br/>
        <input type="text" name="nome" /><br/><br/>
        E-mail: <br/>
        <input type="text" name="email" /><br/><br/>
        Senha: <br/>
        <input type="password" name="senha" /><br/><br/>

        <input type="submit" value="Cadastrar"/>
    </form>
</body>
</html>