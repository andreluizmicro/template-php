<?php 
session_start();

require 'config.php';

if(isset($_POST['tipo'])) {
    $tipo = $_POST['tipo'];
    $valor = str_replace(",", ".", $_POST['valor']);
    $valor = floatval($valor);

    $sql = $pdo->prepare("INSERT INTO historico (id_conta, tipo, valor, data_operacao) VALUES (:id_conta, :tipo, :valor, NOW())");
    $sql->bindValue(":id_conta", $_SESSION['banco']);
    $sql->bindValue(":tipo", $tipo);
    $sql->bindValue(":valor", $valor);
    $sql->execute();

    if($tipo === '0') {
        $sql = $pdo->prepare("UPDATE contas SET saldo = saldo + :valor WHERE id = :id");
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":id", $_SESSION['banco']);
        $sql->execute();
    } else {
        $sql = $pdo->prepare("UPDATE contas SET saldo = saldo - :valor WHERE id = :id");
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":id", $_SESSION['banco']);
        $sql->execute();
    }

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Nova transação</title>
</head>
<body>
    <center>
        <h1>Realizar novo transação</h1>
    </center>
    <br>

    <div class="container-sm">
        <div class="container-sm">
            <form method="POST">
                <label>Tipo de Transação:</label><br/>
                <select class="form-select" aria-label="Default select example" name="tipo">
                    <option selected>[ -- Selecione o tipo de operação --]</option>
                    <option value="0">Depósito</option>
                    <option value="1">Retirada</option>
                </select>
                <br>
                
                <div class="mb-3">
                    <label for="valor" class="form-label">valor</label>
                    <input type="text" class="form-control" id="agencia" aria-describedby="valorHelp" name="valor" pattern="[0-9.,]{1,}">
                </div>
               
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </form>
        </div>
    <div class="container-sm">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

