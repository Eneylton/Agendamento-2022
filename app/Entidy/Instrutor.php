<?php

namespace App\Entidy;

use \App\Db\Database;

use \PDO;

class Instrutor
{
    
    public $id; 
    public $nome;
    public $email; 
    public $senha; 
    public $categoria_id;
    public $veiculo_id;
    public $acessos_id; 
    public $cargos_id;
    public $usuarios_id;


    public function cadastar()
    {

        $obdataBase = new Database('instrutor');

        $this->id = $obdataBase->insert([

            'nome'                    => $this->nome,
            'email'                   => $this->email,
            'senha'                   => $this->senha,
            'categoria_id'            => $this->categoria_id,
            'veiculo_id'              => $this->veiculo_id,
            'acessos_id'              => $this->acessos_id,
            'usuarios_id'             => $this->usuarios_id,
            'cargos_id'               => $this->cargos_id

        ]);

        return true;
    }

    public function atualizar()
    {
        return (new Database('instrutor'))->update('id = ' . $this->id, [

            'nome'                    => $this->nome,
            'email'                   => $this->email,
            'senha'                   => $this->senha,
            'categoria_id'            => $this->categoria_id,
            'veiculo_id'              => $this->veiculo_id,
            'acessos_id'              => $this->acessos_id,
            'usuarios_id'             => $this->usuarios_id,
            'cargos_id'               => $this->cargos_id

        ]);
    }


    public static function getList($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('instrutor'))->select($fields, $table, $where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }



    public static function getQtd($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('instrutor'))->select('COUNT(*) as qtd', 'instrutor', null, null)
            ->fetchObject()
            ->qtd;
    }


    public static function getID($fields, $table, $where, $order, $limit)
    {
        return (new Database('instrutor'))->select($fields, $table, 'id = ' . $where, $order, $limit)
            ->fetchObject(self::class);
    }


    public function excluir()
    {
        return (new Database('instrutor'))->delete('id = ' . $this->id);
    }


    public static function getUsuarioPorEmail($email)
    {

        return (new Database('instrutor'))->select('email = "' . $email . '"')->fetchObject(self::class);
    }
}
