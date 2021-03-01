<?php

require __DIR__.'/vendor/autoload.php';

//Define o titulo dinamico
define('TITLE','Editar funcionário');

use \App\Entidade\Funcionario;

//Verifica se o ID existe ou é numerico
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

$obFuncionario = new Funcionario;
$obFuncionario->getFuncionario2($_GET['id']);
$obFuncionario = Funcionario::getFuncionario($_GET['id']);

//Verifica se o funcionario foi instanciado
if(!$obFuncionario instanceof Funcionario){
    header('location: index.php?status=error');
    exit;
}

//Verifica se há nome, cargo, salario, email e atribui a variavel instanciada como funcionario e depois atualiza
if(isset($_POST['nome'],$_POST['cargo'],$_POST['salario'],$_POST['email'],$_POST['homeoffice'])){
    
    $obFuncionario->id = $_GET['id'];
    $obFuncionario->nome = $_POST['nome'];
    $obFuncionario->cargo = $_POST['cargo'];
    $obFuncionario->salario = $_POST['salario'];
    $obFuncionario->email = $_POST['email'];
    $obFuncionario->homeoffice = $_POST['homeoffice'];
    $obFuncionario->atualizar();

    header('location: index.php?status=success');
    exit;
    
}

include __DIR__.'/gui/cabecalho.php';
include __DIR__.'/gui/formulario.php';
include __DIR__.'/gui/rodape.php';