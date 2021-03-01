<?php

namespace App\Entidade\Bd;

use \PDO;
use \PDOException;

class Banco{

    const HOST = 'localhost';

    const NAME = 'crud';

    const USER = 'root';

    const PASS = '';

    private $table;

    private $connection;

    //metodo construtor que recebe ou nao a tabela como parametro e inicia a conexao usando o metodo setConnection
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    //metodo usado para estabelecer a conexao com o banco de dados
    private function setConnection(){
        try{
          $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
          $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
          die('ERROR: '.$e->getMessage());
        }
    }

    //metodo usado para realizar as queries informadas como parametro
    public function execute($query,$params = []){
        try{
          $statement = $this->connection->prepare($query);
          $statement->execute($params);
          return $statement;
        }catch(PDOException $e){
          die('ERROR: '.$e->getMessage());
        }
    }

    //metodo usado para inserir funcionarios no banco de dados usando os valores como parametro, a query e executada pelo metodo execute
    public function insert($values){
        $fields = array_keys($values);
        $binds  = array_pad([],count($fields),'?');
    
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
    
        $this->execute($query,array_values($values));
    
        return $this->connection->lastInsertId();
    }

    //metodo usado para selecionar funcionarios no banco de dados existindo ou nao um limite ou order, a query e executada pelo metodo execute
    public function select($where = null, $order = null, $limit = null, $fields = '*'){
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';
    
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;
    
        return $this->execute($query);
    }

    //metodo usado para atualizar funcionarios no banco de dados usando os valores como parametro, a query e executada pelo metodo execute
    public function update($where,$values){
        $fields = array_keys($values);
    
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
    
        $this->execute($query,array_values($values));
    
        return true;
    }

    //metodo usado para excluir funcionarios no banco de dados usando os valores como parametro, a query e executada pelo metodo execute
    public function delete($where){
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;
        $this->execute($query);
  
        return true;
    }
}