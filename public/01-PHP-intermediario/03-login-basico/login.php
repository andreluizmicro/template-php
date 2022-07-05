<?php
session_start();
require '../../config.php';

if(isset($_POST['email']) && !empty($_POST['email'])) {
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $sql = $pdo->query($sql);
    
    if($sql->rowCount() > 0 ) {
        $user = $sql->fetch();
        
        $_SESSION['id'] = $user['id'];

        header("Location: index.php");
    }
}

?>
<h1>Página de login</h1>
<form method="POST">
    E-mail:<br/>
    <input type="email" name="email"/><br/><br/>

    Senha:<br/>
    <input type="password" name="senha"/><br/><br/>

    <input type="submit" value="Entrar"/>
</form>

