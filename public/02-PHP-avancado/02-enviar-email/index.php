<?php 
if(isset($_POST['nome']) && !empty($_POST['nome'])) {

    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $msg = addslashes($_POST['msg']);

    $para = "andreluizmicro@gmail.com";
    $assunto = "Pergunta do Contato";
    $corpo = "Nome: ". $nome. " - E-mail". $email." - Mensagem: ".$msg;
    $cabecalho = "From: andreluizmicro@gmail.com"."\r\n"."Reply-To: ".$email."\r\n"."X-Mailer: PHP/".phpversion();

    mail($para, $assunto, $corpo, $cabecalho);

    echo "<h2>E-mail enviado com sucesso!</h2>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar E-mail</title>
</head>
<body>
        <h1>Enviar E-mail</h1>

       <form  method="POST">
        Nome: <br/>
        <input  type="text" name="nome" /><br/><br/>

        E-mail: <br/>
        <input type="email" name="email" /><br/><br/>

        Mensagem: <br/>
        <textarea name="msg"></textarea><br/><br/>

        <input type="submit" value="Enviar" />

       </form> 
</body>
</html>
