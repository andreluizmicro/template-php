<?php
require "../../config.php";
$id = 0;

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = addslashes($_GET['id']);
}

if(isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    require "../../config.php";
    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email' WHERE id = '$id'";
    $pdo->query($sql);

    header("Location: index.php");
}

$sql = "SELECT * FROM usuarios WHERE id = '$id'";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0) {
    $user = $sql->fetch();
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
    <title>Editar Usuário</title>
</head>
<body>
    <center><h1>Editar usuário</h1></center>
    <form method="POST">
        Nome: <br/>
        <input type="text" name="nome" value="<?php echo $user['nome']?>"/><br/><br/>
        E-mail: <br/>
        <input type="text" name="email" value="<?php echo $user['email']?>" /><br/><br/>
        Senha: <br/>
        <input type="password" name="senha" /><br/><br/>

        <input type="submit" value="Cadastrar"/>
    </form>
</body>
</html>