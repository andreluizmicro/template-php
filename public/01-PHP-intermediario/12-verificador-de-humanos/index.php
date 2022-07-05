<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de Humanos</title>
</head>
<body>
    <h1>Verificador de Humanos</h1><br/>
    
    <form method="POST" action="verificador.php">
        <?php
            $n1 = rand(0, 10);
            $n2 = rand(0, 10);
        ?>
        <input type="hidden" value="<?php echo $n1 + $n2 ?>" name="resultado"/>
        <label><?php echo $n1. " + ". $n2;  ?></label>
        <input type="number" name="resposta" />
        <input type="submit" value="Verificar"/>
    </form>
</body>
</html>