<?php

try {
    $pdo = new PDO("mysql:dbname=projeto_ordenar;host=curso-php-db", "root", "root");
}catch(PDOException $e){
    echo "Erro: " . $e->getMessage();
    exit();
}
if(isset($_GET['ordem']) && !empty($_GET['ordem'])) {
    $ordem = addslashes($_GET['ordem']);
    $sql = "SELECT * FROM usuarios ORDER BY ". $ordem;
} else {
    $ordem = "";
    $sql = "SELECT * FROM usuarios";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Ordenar</title>
</head>
<body>
    <!-- Esses dados serão enviados para a própria página -->
    <form method="GET">
        <select name="ordem" onchange="this.form.submit()">
            <option></option>
            <option value="nome" <?php echo ($ordem==="nome") ? 'selected' : ''; ?>>Pornome</option>
            <option value="idade" <?php echo ($ordem==="idade") ? 'selected' : ''; ?>>Por idade</option>
        </select>
    </form>
    <br>    
    <table border="1" width="400">
        <tr>
            <th>Nome</th>
            <th>Idade</th>
        </tr>
        <tr>
            <?php
                $sql = $pdo->query($sql);
                if($sql->rowCount() > 0) {
                    foreach($sql->fetchAll() as $user):
                        ?>
                        <tr>
                            <td><?php echo $user['nome'] ?></td>
                            <td><?php echo $user['idade'] ?></td>
                         </tr>       
                        <?php
                    endforeach;
                }
            ?>
        </tr>
    </table>
</body>
</html>