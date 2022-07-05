<?php session_start(); 

require 'config.php';

if(isset($_SESSION['banco']) && !empty($_SESSION['banco'])) {
    $id = $_SESSION['banco'];

    $sql = $pdo->prepare("SELECT * FROM contas WHERE id = :id");
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {
        $info = $sql->fetch();
    } else {
        header("Location: login.php");
        exit;
    }

} else {
    header("Location: login.php");
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
    <title>Caixa Eletrônico</title>
</head>
<body>
    <h1>Banco XYZ</h1>
    Titular: <?php echo $info['titular'] ?><br/>
    Agência : <?php echo $info['agencia'] ?><br/>
    Conta : <?php echo $info['conta'] ?><br/>
    Saldo : <font color="blue" style="font-size: 18px;">R$ <?php echo $info['saldo'] ?></font><br/>
    <button type="button" class="btn btn-primary"><a href="sair.php" style="color: #FFF; text-decoration: none">Sair</a></button>
    <br>
    <hr>

    <h3>Movimentação/Extrato</h3><br>

    <button type="button" class="btn btn-success"><a href="add-transacao.php" style="text-decoration: none; color: #FFF">Adicionar transação</a></button><br><br>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Data</th>
                <th scope="col">Movimentação</th>
                <th scope="col">Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = $pdo->prepare("SELECT * FROM historico WHERE id_conta = :id_conta");
                $sql->bindValue(":id_conta", $id);
                $sql->execute();

                if($sql->rowCount() > 0) {
                    foreach($sql->fetchAll() as $item) {
                        ?>
                            <tr>
                                <td><?php echo date('d/m/Y H:i', strtotime($item['data_operacao'])); ?></td>
                                <td>
                                    <?php if($item['tipo'] == 0): ?>
                                        <span>Entrada</span>
                                    <?php else: ?>
                                        <span>Saída</span>
                                    <?php endif; ?>   
                                </td>
                                <td>
                                    <?php if($item['tipo'] ==0): ?>
                                        <font color="green">R$ <?php echo $item['valor']; ?></font>
                                    <?php else: ?>
                                        <font color="red">- R$ <?php echo $item['valor']; ?></font>
                                    <?php endif; ?>   
                                </td>
                                        
                            </tr>
                        <?php
                    }
                }

            ?>
        </tbody>
    </table>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

