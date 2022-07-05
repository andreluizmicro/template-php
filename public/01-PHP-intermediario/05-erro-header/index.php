<?php
if(!empty($_POST['codigo']))    {
    $codigo = $_POST['codigo'];

    if($codigo == 'andre') {
        header("Location: https://www.google.com.br");
    } else {
        echo "Acesso negado!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro de Header Alredy Sent</title>
</head>
<body>  
    <form method="POST">
        Digite "andre" para acessar:
        <br><br>

        <input type="text" name="codigo"/><br><br>
        
        <input type="submit" value="Enviar" />
    </form>        
</body>
</html>