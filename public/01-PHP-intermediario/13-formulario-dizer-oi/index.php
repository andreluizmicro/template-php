
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário dizer Oi</title>
</head>
<body>
    
    <form method="POST">
        <label>Qual seu nome?</label><br>
        <input name="nome" required/><br/>
        <input type="submit" value="Enviar"/>
    </form>
    <br/>

    <?php
        if(isset($_POST['nome']) && !empty($_POST['nome'])) {
            echo "Opa," . $_POST['nome'];
        }
    ?> 
</body>
</html>