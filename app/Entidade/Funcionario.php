<?php

namespace App\Entidade;

use \App\Entidade\Bd\Banco;
use \PDO;

class Funcionario {

    public $id;

    public $nome;

    public $cargo;

    public $salario;

    public $email;

    public $homeoffice;

    //metodo usado para cadastrar um novo funcionario usando o metodo insert que contem a query na classe banco, no final retorna o id
    public function cadastrar(){
        $obBanco = new Banco('funcionarios');
        $this->id = $obBanco->insert([
            'nome' => $this->nome,
            'cargo' => $this->cargo,
            'salario' => $this->salario,
            'email' => $this->email,
            'homeoffice' => $this->homeoffice
        ]);
        return true;
    }

    //metodo usado para excluir um funcionario usando o metodo delete que contem a query na classe banco
    public function excluir(){
        return (new Banco('funcionarios'))->delete('id = '.$this->id);
    }
    
    //metodo usado para editar as info de um funcionario usando o metodo atualizar que contem a query na classe banco
    public function atualizar(){
        return (new Banco('funcionarios'))->update('id = '.$this->id, [
            'nome' => $this->nome,
            'cargo' => $this->cargo,
            'salario' => $this->salario,
            'email' => $this->email,
            'homeoffice' => $this->homeoffice
        ]);
    }

    //metodo usado para retornar todos funcionarios usando o metodo select que contem a query na classe banco
    public static function getFuncionarios($where = null, $order = null, $limit = null){
        return (new Banco('funcionarios'))->select($where,$order,$limit)
        ->fetchAll(PDO::FETCH_CLASS,self::class);       
    }

    //metodo usado para retornar um funcionario usando o metodo select que contem a query na classe banco
    public static function getFuncionario($id){
        return (new Banco('funcionarios'))->select('id='.$id)
                                      ->fetchObject(self::class);
    }

    //metodo auxiliar para retornar um funcionario nos inputs do formulario
    public static function getFuncionario2($id){
        $query = "SELECT * FROM funcionarios WHERE id = $id";
        return (new Banco('funcionarios'))->execute($query)
        ->fetchObject(self::class);
    }
}