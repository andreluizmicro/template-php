<?php 
include 'Contato.php';
$contato = new Contato();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Contatos</title>
</head>
<body>

<h1>Contatos</h1>

<a href="adicionar.php">[ ADICIONAR ]</a><br><br>

<table border="1" width="600">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Ações</th>
    </tr>
    <?php
        $lista = $contato->getAll();
        foreach($lista as $contato): ?>
        <tr>
            <td><?php echo $contato['id']; ?></td>
            <td><?php echo $contato['nome']; ?></td>
            <td><?php echo $contato['email']; ?></td>
            <td style="text-align: center;">
                <a href="editar.php?id=<?php echo $contato['id']; ?>">[ EDITAR ]</a>
                <a href="excluir.php?id=<?php echo $contato['id']; ?>">[ EXCLUIR ]</a>
            </td>
        </tr>
        <?php
        endforeach;
    ?>
</table>

</body>
</html>