<?php

$file = $_FILES['arquivo'];

if(isset($file['tmp_name']) && !empty($file['tmp_name'])) {

    $fileName = md5(time().rand(0,99)).'.png';
    move_uploaded_file($file['tmp_name'], '../storage/'.$fileName);
    echo "Arquivo enviado com sucesso!";
}

?>  