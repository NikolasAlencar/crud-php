<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entidade\Funcionario;

//instancia uma variavel funcionario e usa o metodo para retornar os funcionarios existentes e os lista na tela inicial
$funcionarios = Funcionario::getFuncionarios();

include __DIR__.'/gui/cabecalho.php';
include __DIR__.'/gui/listagem.php';
include __DIR__.'/gui/rodape.php';