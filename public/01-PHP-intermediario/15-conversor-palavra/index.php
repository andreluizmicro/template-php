<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de palavras em digitos</title>
</head>
<body>
    <form method="POST">
        <strong>Conversor de Palavra em Dígito</strong><br><br>

        <input type="text" name="palavra"/> 
        <input type="submit" value="Enviar"/><br><br>
    </form>
    <hr>

    <?php 
        if(isset($_POST['palavra']) && !empty($_POST['palavra'])) {
            $palavra = trim($_POST['palavra']);   
            $palavras = explode(",", $palavra);

            $dicionario = [
                "um", "dois", "tres", "quatro", "cinco", "seis", "sete", "oito", "nove", "dez"
            ];

            for($i=0; $i <= count($dicionario); $i++) {
                if(isset($palavras[$i]) && in_array(trim($palavras[$i]), $dicionario)) {
                    var_dump($dicionario[$i]);    
                }
            }
            
        }
    ?>
</body>
</html>
