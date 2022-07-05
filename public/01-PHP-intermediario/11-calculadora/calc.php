<?php

if(isset($_GET['n1']) && isset($_GET['n2']) && isset($_GET['operador'])) {
    $n1 = floatval($_GET['n1']);
    $n2 = floatval($_GET['n2']);
    $operador = $_GET['operador'];
    
    switch($operador) {
        case '-':            
            $conta = $n1 - $n2;
            echo $n1. " - ".$n2." = ". $conta;
            break;
        case '+':            
            $conta = $n1 + $n2;
            echo $n1. " + ".$n2." = ". $conta;
            break;
        case '*':            
            $conta = $n1 * $n2;
            echo $n1. " * ".$n2." = ". $conta;
            break;
        case '/':            
            $conta = $n1 / $n2;
           echo $n1. " / ".$n2." = ". $conta;
            break;
    }

    
} else {
    header("Location: index.php");
}