<?php

function parImpar($num): void
{
    $num = 0;
    if($num % 2 == 0){
        echo "O NÚMERO É PAR";
    } else if($num % 2 != 0){
        echo "O NÚMERO É ÍMPAR";
    }
}