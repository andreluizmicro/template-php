<?php

$image = "dino.png";

list($largura_original, $altura_original) = getimagesize($image);
list($largura_mini, $altura_mini) = getimagesize("mini_imagem.png");

$imagem_final = imagecreatetruecolor($largura_original, $altura_original);

$imagem_original = imagecreatefrompng("dino.png");
$image_mini = imagecreatefrompng("mini_imagem.png");

imagecopy($imagem_final, $imagem_original, 0, 0, 0, 0, $largura_original, $altura_original);

imagecopy($imagem_final, $image_mini, 750, 550, 0 , 0, $largura_mini, $altura_mini);

header("Content-Type: image/png"); // Mostra na tela
imagepng($imagem_final, null);

imagepng($imagem_final, "imagem_marca_dagua.png");

echo "Imagem criada com sucesso!";

?>