<?php

namespace App\Entidy;

use \App\Db\Database;

use \PDO;

class Agendar
{


    public $id;
    public $data;
    public $horario_id;
    public $alunos_id;
    public $usuarios_id;

    public function cadastar()
    {


        $obdataBase = new Database('agendar');

        $this->id = $obdataBase->insert([

            'nome'              => $this->nome,
            'horario_id'        => $this->horario_id,
            'alunos_id'         => $this->alunos_id,
            'usuarios_id'       => $this->usuarios_id

        ]);

        return true;
    }

    public function atualizar()
    {
        return (new Database('agendar'))->update('id = ' . $this->id, [

            'nome'              => $this->nome,
            'horario_id'        => $this->horario_id,
            'alunos_id'         => $this->alunos_id,
            'usuarios_id'       => $this->usuarios_id
        ]);
    }


    public static function getList($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('agendar'))->select($fields, $table, $where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }



    public static function getQtd($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('agendar'))->select('COUNT(*) as qtd', 'agendar', null, null)
            ->fetchObject()
            ->qtd;
    }


    public static function getID($fields, $table, $where, $order, $limit)
    {
        return (new Database('agendar'))->select($fields, $table, 'id = ' . $where, $order, $limit)
            ->fetchObject(self::class);
    }


    public function excluir()
    {
        return (new Database('agendar'))->delete('id = ' . $this->id);
    }


    public static function getUsuarioPorEmail($email)
    {

        return (new Database('agendar'))->select('email = "' . $email . '"')->fetchObject(self::class);
    }
}
