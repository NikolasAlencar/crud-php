<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entidade\Funcionario;

//verifica o id
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

$obFuncionario = new Funcionario;
$obFuncionario->getFuncionario($_GET['id']);

//Verifica se o funcionario foi instanciado
if(!$obFuncionario instanceof Funcionario){
    header('location: index.php?status=error');
    exit;
}

//recebe o id do funcionario e usa ele como parametro para exclui-lo
if(isset($_POST['excluir'])){
    
    $obFuncionario->id = $_GET['id'];
    $obFuncionario->excluir();
    
    header('location: index.php?status=success');
    exit;
    
}

include __DIR__.'/gui/cabecalho.php';
include __DIR__.'/gui/confirmar-exclusao.php';
include __DIR__.'/gui/rodape.php';