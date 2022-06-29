<?php

require_once 'conta.php';
require_once 'Titular.php';
require_once 'Cpf.php';
require_once 'Saldo.php';


$cpfUsuario1 = new Cpf('105.795.929-44');
$titularUsuario1 = new Titular('Gustavo Manzano');
$contaUm = new ContaBanco($titularUsuario1, $cpfUsuario1);


$cpfUsuario2 = new Cpf('123.456.789-10');
$titularUsuario2 = new Titular('Leoproso');
$contaDois = new ContaBanco($titularUsuario2, $cpfUsuario2);

$contaUm->deposita(500);
$contaUm->saca(452.38);

$contaDois->deposita(600);
$contaDois->transfere(300, $contaUm);

echo $contaDois->exibeTitular();
echo $contaUm->exibeTitular();

echo "NUMERO DE CONTAS CADASTRADAS: " . ContaBanco::exibeContasCadastradas();

