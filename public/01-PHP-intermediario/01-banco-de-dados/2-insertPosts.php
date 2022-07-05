<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de cadastro</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>  
    <br/>
    <form action="#" method="POST">
        <div class="container">
            <h1>Cadastro de Posts</h1>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Título</label>
                <input name="title" class="form-control" id="exampleFormControlInput1" placeholder="Digite o Título do seu post">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Descrição</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</body>
</html>

<?php

$dsn = "mysql:dbname=curso_php;host=curso-php-db";
$dbuser = "root";
$dbpass = "root";

$title = "";
$description = "";

if(isset($_POST["title"]) && isset($_POST["description"])) {
    $title = addslashes($_POST["title"]);
    $description = addslashes($_POST["description"]);
}

$userLogged = "Marcos Henrique Silva";
$date = date('d-m-y h:i:s');

try {
    $pdo = new PDO($dsn, $dbuser, $dbpass);

    $sql = "INSERT INTO posts SET title = '$title', body = '$description', author = '$userLogged', created_at = '$date'";
    $sql = $pdo->query($sql);

   
} catch (PDOException $e) {
    echo "Erro ao conectar com o banco de dados: ". $e->getMessage();
}

?>

 <div class="container"><br/>
    <div class="alert alert-success" role="alert">
        Post cadastrado com sucesso!
    </div>
 </div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>