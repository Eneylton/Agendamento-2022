<?php

namespace App\Entidy;

use \App\Db\Database;

use \PDO;

class Aluno
{


    public $id;
    public $nome;
    public $categoria_id;

    public function cadastar()
    {


        $obdataBase = new Database('alunos');

        $this->id = $obdataBase->insert([

            'nome'              => $this->nome,
            'categoria_id'      => $this->categoria_id

        ]);

        return true;
    }

    public function atualizar()
    {
        return (new Database('alunos'))->update('id = ' . $this->id, [

            'nome'              => $this->nome,
            'categoria_id'      => $this->categoria_id
        ]);
    }


    public static function getList($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('alunos'))->select($fields, $table, $where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }



    public static function getQtd($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('alunos'))->select('COUNT(*) as qtd', 'alunos', null, null)
            ->fetchObject()
            ->qtd;
    }


    public static function getID($fields, $table, $where, $order, $limit)
    {
        return (new Database('alunos'))->select($fields, $table, 'id = ' . $where, $order, $limit)
            ->fetchObject(self::class);
    }


    public function excluir()
    {
        return (new Database('alunos'))->delete('id = ' . $this->id);
    }


    public static function getUsuarioPorEmail($email)
    {

        return (new Database('alunos'))->select('email = "' . $email . '"')->fetchObject(self::class);
    }
}
