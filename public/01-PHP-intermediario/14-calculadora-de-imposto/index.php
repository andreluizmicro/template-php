<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de imposto</title>
</head>
<body>

    <h2>Calculadora de imposto</h2><br>
    <form method="POST">
        <label>Valor do produto:</label><br/>
        <input type="number" name="produto"/><br><br>

        <label>Taxa de imposto (em %)</label><br>
        <input type="number" name="imposto"/><br><br>

        <input type="submit" value="Calcular"/>
    </form>

    <br><br>

    <?php 
       if(isset($_POST['produto']) && !empty($_POST['produto']) && isset($_POST['imposto'])) {
        $valorProduto = floatval($_POST['produto']);
        $imposto = floatval($_POST['imposto']);

        echo "<label>Valor do produto: R$ ".$valorProduto."</label><br>";
        echo "<label>Taxa de imposto:". $imposto."%</label>";
        echo "<hr>";


        $valorImposto = $valorProduto * ($imposto / 100);
        $valorFinal = $valorProduto - $valorImposto;
        

        echo "Imposto: R$ ".$valorImposto."<br>";
        echo "Produto: R$ ". $valorFinal;
       }
    ?>

    



</body>
</html>