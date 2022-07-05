<?php

class Animal2 {

    public function getNome()
    {
        echo "getNome da classe Animal";
    }

    public function testar() {
        echo "Testado!!!";
    }
}

class Cachorro extends Animal2 {

    public function getNome() // Polimorfismo -> Quando alteramos um método ou ação que já existia na classe Pai
    {
        $this->testar();
    }

}

$cachorro = new Cachorro();
$cachorro->getNome();
?>