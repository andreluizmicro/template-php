<?php 

interface Animal {
    public function andar(); // Todo método é publico e não tem corpo
}

class Cachorro implements Animal {
    public function andar()
    {
        echo "Estou andando...";
    }
}

$cachorro =  new Cachorro();
$cachorro->andar();


?>