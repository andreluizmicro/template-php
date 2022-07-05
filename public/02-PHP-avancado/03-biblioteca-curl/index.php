<?php

// CURL -> FUNÇÃO BÁSICA FAZER REQUISIÇÕES PARA SERVIDORES EXTERNOS, BOA PARA INTEGRAÇÔES

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://www.checkitout.com.br/wb/pingpong");
//curl_setopt($ch, CURLOPT_URL, "https://api.github.com/users/andreluizmicro/repos");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "nome=Bonieky&idade=90&sexo=masculino");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$resposta = curl_exec($ch);
curl_close($ch);

print_r($resposta);

?>