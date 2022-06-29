<?php

class Titular
{
    private string $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
        $this->validaNomeTitular($nome);
    }

    public function exibeNome(): string
    {
        return $this->nome;
    }

    public function validaNomeTitular($nome): void
    {
        if (mb_strlen($nome) < 5) {
            echo "MÍN.CARACTERES: 5";
        }
    }
}
