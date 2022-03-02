<?php

namespace App\Entidy;

use \App\Db\Database;

use \PDO;

class InstrutorAluno
{


    public $id;
    public $instrutor_id;
    public $alunos_id;

    public function cadastar()
    {


        $obdataBase = new Database('instrutor_alunos');

        $this->id = $obdataBase->insert([

            'instrutor_id'              => $this->instrutor_id,
            'alunos_id'                 => $this->alunos_id

        ]);

        return true;
    }

    public function atualizar()
    {
        return (new Database('instrutor_alunos'))->update('id = ' . $this->id, [

            'instrutor_id'              => $this->instrutor_id,
            'alunos_id'                 => $this->alunos_id
        ]);
    }


    public static function getList($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('instrutor_alunos'))->select($fields, $table, $where, $order, $limit)
            ->fetchAll(PDO::FETCH_CLASS, self::class);
    }



    public static function getQtd($fields = null, $table = null, $where = null, $order = null, $limit = null)
    {

        return (new Database('instrutor_alunos'))->select('COUNT(*) as qtd', 'instrutor_alunos', null, null)
            ->fetchObject()
            ->qtd;
    }


    public static function getID($fields, $table, $where, $order, $limit)
    {
        return (new Database('instrutor_alunos'))->select($fields, $table, 'id = ' . $where, $order, $limit)
            ->fetchObject(self::class);
    }

    public static function getAlunosID($fields, $table, $where, $order, $limit)
    {
        return (new Database('instrutor_alunos'))->select($fields, $table, 'alunos_id = ' . $where, $order, $limit)
            ->fetchObject(self::class);
    }


    public function excluir()
    {
        return (new Database('instrutor_alunos'))->delete('id = ' . $this->id);
    }


    public static function getUsuarioPorEmail($email)
    {

        return (new Database('instrutor_alunos'))->select('email = "' . $email . '"')->fetchObject(self::class);
    }
}
