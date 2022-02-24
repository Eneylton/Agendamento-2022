<?php

namespace App\Entidy;

use \App\Db\Database;

use \PDO;

class Horario
{


    public $id;
    public $hora;

    public function cadastar()
    {


        $obdataBase = new Database('horario');

        $this->id = $obdataBase->insert([

            'hora'              => $this->hora

        ]);

        return true;
    }

    public function atualizar()
    {
        return (new Database('horario'))->update('id = ' . $this->id, [

            'hora'              => $this->hora
        ]);
    }


    public static function getList($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('horario'))->select($fields, $table, $where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }



    public static function getQtd($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('horario'))->select('COUNT(*) as qtd', 'horario', null, null)
            ->fetchObject()
            ->qtd;
    }


    public static function getID($fields, $table, $where, $order, $limit)
    {
        return (new Database('horario'))->select($fields, $table, 'id = ' . $where, $order, $limit)
            ->fetchObject(self::class);
    }


    public function excluir()
    {
        return (new Database('horario'))->delete('id = ' . $this->id);
    }


    public static function getUsuarioPorEmail($email)
    {

        return (new Database('horario'))->select('email = "' . $email . '"')->fetchObject(self::class);
    }
}
