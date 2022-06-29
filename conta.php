<?php

class ContaBanco
{
    private Cpf $cpf;
    private Titular $titular;
    private float $saldo;
    public static int $numeroDeContas = 0;

    public function __construct(Titular $titular, Cpf $cpf) {
        $this->saldo = 0;
        $this->cpf = $cpf;
        $this->titular = $titular;

        self::$numeroDeContas++;
    }

    public function deposita($valorADepositar): void
    {
        if ($valorADepositar < 10) {
            echo "Valor mínimo para depósito é R$10";
            return;
        }
        $this->saldo += $valorADepositar;
    }

    public function transfere($valorATransferir, ContaBanco $contaDestino): void
    {
        if ($valorATransferir > $this->saldo) {
            echo "Saldo Indiponível";
            return;
        }
        $this->saca($valorATransferir);
        $contaDestino->deposita($valorATransferir);
    }

    public function saca($valorASacar): void
    {
        if ($valorASacar > $this->saldo) {
            echo "Saldo insuficiente";
            return;
        }
        $this->saldo -= $valorASacar;
    }

    public function __destruct()
    {
        return self::$numeroDeContas--;
    }

    public static function exibeContasCadastradas(): int
    {
        return self::$numeroDeContas;
    }

    public function exibeTitular(): string
    {
        return "TITULAR: {$this->titular->exibeNome()}" . PHP_EOL .
            "CPF: {$this->cpf->exibeCpf()}" . PHP_EOL .
            "SALDO: R$ $this->saldo" . PHP_EOL . PHP_EOL;
    }


}

//GARBAGE COLLECTOR (__destruct)
//new ContaBanco(new Titular('123', 'viado'));//objeto instânciado sem referência (será destruído).
//ENCAPSULAMENTO DE ATRIBUTO:
/*
Importante frisar que o nível de acesso de uma conta (no contexto deste estudo) deve ser PRIVATE,
pois queremos que só a partir de tal endereço (variável que aponta para o objeto) conseguimos acessar
determinado objeto do tipo "ContaBanco".
Diferente dos métodos, que devem ser PUBLIC FUNCTION.
Com isso é possível impedir o acesso dos atributos em nossos objetos.
Por que nós impediríamos alguém de acessar os atributos dos objetos?
Por que nós queremos que as alterações feitas em nossos objetos sejam feitas apenas através dos métodos
(comportamentos) que definimos para este objeto, ou seja, eu não quero que através de um comando como:
$conta1->saldo = 300; a pessoa consiga deifinir o saldo da minha conta, eu quero que apenas por meio de
uma ferramenta de saque, que provoca o comportamento saque do meu objeto, faça essa alteração no saldo.
Ou seja, o acesso a esse saldo precisa ser permitido apenas ao método.
Tudo isso para garantir que as regras de negócio sejam respeitadas e seguidas.
*/

//readonly property: O valor atribuido ao atributo é lido apenas uma vez, não pode mais ser modificado.
//STATIC: Significa que este atributo pertence a classe e não a instância (objeto).
//SELF: referência a CLASSE, assim como $this referencia a instância (objeto).
//Métodos mágicos __construct e __destruct

//__construct:

/*
Ao invés usar métodos SETTER's, posso usar o __construct para instânciar meu objeto.
Ao usar o construct, defino que os atributos de meu objeto serão IMUTÁVEIS, não permitindo sua alterção
ao contrário do método SETTER, que deve ser usado para métodos que faram "MUTABILIDADE" de atributo.
como o método "saca", "deposita" e "transfere" que altera o atributo 'saldo' do meu objeto do tipo ContaBanco.
*/

//__destruct:

/*
Além do construtor, temos o destrutor. Quando um objeto perde sua variável de de endereço ou é
instânciado sem essa variável, o garbage collector (__destruct) limpa esse objeto, pois ele é inacessível.
*/

//função estática (atributo pertencente apenas a classe, e não ao objeto):
//métodos GETTER (tem retorno de tipos definidos) $this->atributo;
//métodos SETTER (sem retorno (void), apenas "seta" valores) $this->atributo = valor;

/*
DEFINIÇÃO DE MÉTODO:
Um método é uma função dentro de um Objeto, é um comportamento.
Definimos os métodos em nossa classe os métodos, esses métodos irão definir o comportamento de nosso objeto.
Dessa forma consigo manipular e fazer alterações no meu objeto chamando esses métodos.
 */

/*
CONCEITO DE ABSTRAÇÃO: A abstração é um dos pilares da programação orientada a objetos, e se trata de simplesmente
"filtrar" quais atributos são necessários para construir um objeto. O que é imprescindível para a criação de um bolo?
farinha fermento, ovos e óleo. Ou seja, da receita de um bolo de cenoura, eu abstraí apenas o que é imprescindível
para "construir" a base de um bolo, que todos os bolos tem.

Instância é a concretização de uma classe. Em termos intuitivos, uma classe é como um "molde" que gera instâncias
de um certo tipo; um objeto é algo que existe fisicamente e que foi "moldado" na classe.
Instância de um objeto é a criação dele. Instanciação de um objeto, criação de um objeto. Processo no qual esse objeto
foi construído.

//ATRIBUTOS: As variáveis presentes dentro de uma classe são denominadas ATRIBUTOS.

A variável na qual você referência o objeto não é o objeto em si, e sim uma REFERÊNCIA, um ENDEREÇO para acessar o objeto.
Isso significa que apartir do momento que você precisa fazer uma alteração em um objeto bolo do tipo NEGA_MALUCA,
você irá fazer isso acessando a variável que faz a referência desse objeto, conceito de passagem por valor ou referência...

