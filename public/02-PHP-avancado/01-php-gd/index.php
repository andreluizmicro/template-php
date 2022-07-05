<?php

$arquivo = "dino.png";

$largura = 200;
$altura = 200;

list($largura_original, $altura_original) = getimagesize($arquivo);

$ratio = intval($largura_original / $altura_original);


if($largura/$altura > $ratio) {
    $largura = $altura * $ratio;
} else {
    $altura = $largura / $ratio ;
}

// Cria um novo documento
$image_final = imagecreatetruecolor($largura, $altura);

//carrega imagem
$imagem_original = imagecreatefrompng($arquivo);

// Coloca a imagem no documento
imagecopyresampled($image_final, $imagem_original, 
    0, 0, 0, 0,
    $largura, $altura, $largura_original, $altura_original
); 
// função imagecopyresampled diminiu proporcionalmente sempre melhor não perde muita qualidade

imagepng($image_final, "mini_imagem.png");

echo "Imagem redimensionada com sucesso!";

?>