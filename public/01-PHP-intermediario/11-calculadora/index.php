<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    
    <form method="GET" action="calc.php">
        <input type="number" name="n1">
        <select name="operador">
            <option value="-">-</option>
            <option value="+">+</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input name="n2"/>
        <input type="submit" value="Calcular" />
    </form>

</body>
</html>