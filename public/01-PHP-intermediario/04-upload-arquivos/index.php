<pre>
<?php
 //print_r($_FILES);
?>
</pre>
<?php
    if(isset($_FILES['file'])) {
        if(count($_FILES['file']['tmp_name']) > 0) {
            for($q = 0; $q < count($_FILES['file']['tmp_name']); $q++) {

                $fileName = md5($_FILES['file']['name'][$q].time().rand(0,999)).'.jpg';

                move_uploaded_file($_FILES['file']['tmp_name'][$q], '../storage/'.$fileName);               
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de Arquivos</title>
</head>
<body>
    <h1>UPLOAD ÚNICO</h1>
    <form method="POST" enctype="multipart/form-data" action="upload.php">
        <input type="file" name="arquivo" /><br/><br/>

        <input type="submit" value="Enviar" />
    </form>

    <h1>UPLOAD DE MÚLTIPLOS ARQUIVOS</h1>
    <form method="POST" enctype="multipart/form-data">
        
        Arquivo: <br/>
        <input type="file" name="file[]" multiple/><br/><br/>

        <input type="submit" value="Enviar Arquivo" />

    </form>
</body>
</html>