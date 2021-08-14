<?php

declare(strict_types=1);

require_once 'vendor/autoload.php';

use League\CLImate\CLImate;

$climate = new CLImate();

$padding = $climate->padding(20);   

$padding->label('Fatoração de Valor')->result('[1]');
$padding->label('Sair')->result('[2]');
$climate->br();

$input = $climate->input('Selecione uma opção do MENU: ');

$input->accept([1, 2]);
$input->strict();   

$response = $input->prompt();

switch ($response) {
    case '1':
        $numero = $climate->input('Digite o numero a ser fatorado: ');
        $valorNumero = $numero->prompt();

        if ($valorNumero == 0) {
            $valorNumero = 1;
        }
        $i = $valorNumero - 1;
        $fator = 0;
        while ($i >= 1) {
           $fator = $fator + $valorNumero * $i;
           $climate->output($fator);
           $i--; 
        }
        $result = $fator;
        $climate->output(sprintf('Resultado da fatoração é : %s', $result)
    );
    break;

    case '2':
        $climate->out('Sistema Encerrado.');
    break;
    default:
        $climate->out('Sistema Encerrado.');
}