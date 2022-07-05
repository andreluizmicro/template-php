<?php
require '../../config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Plataforma</title>
</head>
<body>
    <a href="cadastrar.php">Adicionar Novo usuário</a>
    <table border="0" width="80%">
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Ações</th>
        </tr>
        <?php
            $sql = "SELECT * FROM usuarios";
            $sql = $pdo->query($sql);
            if($sql->rowCount() > 0 ) {
                foreach($sql->fetchAll() as $user) {
                    echo '<tr>';
                    echo '<td>'.$user['nome'].'</td>';
                    echo '<td>'.$user['email'].'</td>';
                    echo '<td><a href="editar.php?id='.$user['id'].'">Editar</a> - <a href="excluir.php?id='.$user['id'].'">Exlcuir</a></td>';
                    echo '</tr>';
                }
            }
        ?>
    </table>        
</body>
</html>
