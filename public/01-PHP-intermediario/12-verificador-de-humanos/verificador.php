<?php

if(isset($_POST['resposta']) && !empty($_POST['resposta'])) {
    if($_POST['resultado'] === $_POST['resposta']) {
        echo "HUMANO!";
    }else {
        echo "FAKE!";
    }
}else {
    header("Location: index.php");
    exit;
}