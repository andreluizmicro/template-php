<?php

abstract class Animal {
    private $nome;
    private $idade;

    abstract protected function andar();

    public function setNome($nome) {
        return $this->nome = $nome;
    }

    public function getNome() 
    {
        return $this->nome;
    }
}

class Cavalo extends Animal {
    private $quantidade_de_patas;
    private $tipo_de_pelo;

    public function andar() {

    }
}

$cavalo = new Cavalo();
$cavalo->setNome("jandaia");

echo $cavalo->getNome();

