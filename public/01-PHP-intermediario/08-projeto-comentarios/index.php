<?php

try {

    $pdo = new PDO("mysql:dbname=projeto_comentarios;host=curso-php-db", "root", "root");

}catch(PDOException $e) {
    echo "ERRO: ". $e->getMessage();
    exit();
}   

if(isset($_POST['nome']) && empty($_POST['nome']) === false) {
    $nome = $_POST['nome'];
    $msg = $_POST['mensagem'];

    $sql = $pdo->prepare("INSERT INTO mensagens SET nome = :nome, msg = :msg, data_msg = NOW()");
    $sql->bindValue(":nome", $nome);    
    $sql->bindValue(":msg", $msg);
    $sql->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de comentários </title>
</head>
<body>
    <fieldset>
        <!-- Sem action envia para o próprio aquivo -->
        <form method="POST">
        Nome: <br />
        <input type="text" name="nome" /><br><br>

        Mensagem: <br />
        <textarea name="mensagem"></textarea><br><br>

        <input type="submit" value="Enviar mensagem"/>
        </form>
    </fieldset>
    <br><br>

    <center><h1>Comentários</h1></center>

    <?php
        $sql = "SELECT * FROM mensagens ORDER BY data_msg DESC";
        $sql = $pdo->query($sql);
        
        if($sql->rowCount() > 0) {
            foreach($sql->fetchAll() as $msg):
             ?>
                <strong><?php echo $msg['nome']; ?></strong> - <?php echo $msg['data_msg']; ?><br>
                <?php echo $msg['msg']; ?>
                <hr>
             <?php
            endforeach;
        } else {
            echo "Nenhum comentário cadastrado :(";
        }
    ?>
</body>
</html>

