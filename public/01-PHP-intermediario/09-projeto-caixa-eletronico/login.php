<?php 
session_start();

require 'config.php';

if(isset($_POST['agencia']) && !empty($_POST['agencia'])) {
    $agencia = addslashes($_POST['agencia']);
    $conta = addslashes($_POST['conta']);
    $senha = addslashes($_POST['senha']);

    $sql  = $pdo->prepare("SELECT * FROM contas WHERE agencia = :agencia AND conta = :conta AND senha = :senha");
    $sql->bindValue(":agencia", $agencia);
    $sql->bindValue(":conta", $conta);
    $sql->bindValue(":senha", md5($senha));
    $sql->execute();

    if($sql->rowCount() > 0) {
        $sql = $sql->fetch();

        $_SESSION["banco"] = $sql['id'];

        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <br/><br/>
    <center><h2>faça o login</h2></center>
    <div class="container-sm">
        <div class="container-sm">
            <form method="POST">
            <div class="mb-3">
                <label for="agencia" class="form-label">Agência</label>
                <input type="text" class="form-control" id="agencia" aria-describedby="agenciaHelp" name="agencia">
            </div>
            <div class="mb-3">
                <label for="conta" class="form-label">Conta</label>
                <input type="text" class="form-control" id="conta" name="conta">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="senha">
            </div>
            <button type="submit" class="btn btn-primary">Logar</button>
            </form>
        </div>
    <div class="container-sm">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

