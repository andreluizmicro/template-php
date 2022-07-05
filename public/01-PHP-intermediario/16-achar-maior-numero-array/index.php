<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achar maior número array</title>
</head>
<body>
    <?php 

        $numeros = [];

        for($i=1; $i <= 10; $i++){
           array_push($numeros, rand(1, 100));
        }

        foreach($numeros as $numero) {
            echo $numero.", ";
        }
        echo "<br>MAIOR: ". max($numeros);
    
    ?>
</body>
</html>