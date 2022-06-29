<?php

class Cpf
{
    private string $cpf;

    public function __construct($cpf)
    {
        $cpf = filter_var($cpf, FILTER_VALIDATE_REGEXP, [
            'options' => [
                'regexp' => '/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/'
            ]
        ]);

        if($cpf === false) {
            echo "CPF INVÁLIDO";
            exit();
        }
        $this->cpf = $cpf;
    }
    public function exibeCpf(): string
    {
        return $this->cpf;
    }
}

