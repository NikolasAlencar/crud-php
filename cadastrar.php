<?php

require __DIR__.'/vendor/autoload.php';

//define o titulo dinamico
define('TITLE','Cadastrar funcionário');

use \App\Entidade\Funcionario;

$obFuncionario = new Funcionario;

//Verifica se há nome, cargo, salario, email e atribui a variavel instanciada como funcionario, depois cadastra no banco de dados
if(isset($_POST['nome'],$_POST['cargo'],$_POST['salario'],$_POST['email'],$_POST['homeoffice'])){
    
    $obFuncionario->nome = $_POST['nome'];
    $obFuncionario->cargo = $_POST['cargo'];
    $obFuncionario->salario = $_POST['salario'];
    $obFuncionario->email = $_POST['email'];
    $obFuncionario->homeoffice = $_POST['homeoffice'];
    $obFuncionario->cadastrar();
    
    header('location: index.php?status=success');
    exit;
    
}

include __DIR__.'/gui/cabecalho.php';
include __DIR__.'/gui/formulario.php';
include __DIR__.'/gui/rodape.php';