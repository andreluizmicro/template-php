<?php
require 'usuarios.php';
$usuario = new Usuario();

$result = $usuario->selecionar(16);

echo "<pre>";
print_r($result);

//$usuario->inserir("Felipe", "felipe@gmail.com", "123");
//$usuario->atualizar("Felipe Mateus", "felipe@gmail.com", "123", 17);
$usuario->excluir(17);